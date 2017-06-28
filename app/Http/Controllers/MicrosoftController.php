<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use App\Role;
use App\UserProfile;
use App\AccountProfile;
use Auth;
use Redirect;
use Lang;
use URL;
use Input;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUser;
use Sentinel;
use Activation;
use Mailchimp\Mailchimp;
use Config;

class MicrosoftController extends Controller {
  
  public function index(Request $request) {
      $apiKey = Config::get('mailchimp.apikey');
      $mc = new Mailchimp($apiKey);
      $listId = Config::get('mailchimp.listId');
      $code = $request->get('code');

    $ms = \OAuth::consumer('Microsoft');

    if (!is_null($code)) {
      $token = $ms->requestAccessToken($code);
      $result = json_decode($ms->request('/me'), true);
      
      $user = User::whereemail($result['emails']['account'])->first();

      if (!$user) {
        $user = new User;
        $user->first_name = $result['first_name'];
        $user->email = $result['emails']['account'];
        $user->save();
          $user_profile = new UserProfile();
          $user_profile->user_id = $user['id'];
          $user_profile->save();
          $account_user = new Account();
          $account_user->	account_type_id = '1';
          $account_user->name = $user['uuid'];
          $account_user->slug = $user['uuid'];
          $account_user->save();
          $account_profile = new AccountProfile();
          $account_profile->account_id = $account_user->id;
          $account_profile->save();
          $role = Role::find(2);
          $rolew = [
              0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
          ];

          $role->users()->attach($rolew);
          $member_email = md5($user->email);
          if(!$mc->get("/lists/$listId/members/$member_email")){
              $mc->post("/lists/$listId/members", [
                  'email_address' => $user->email,
                  'status'        => 'subscribed',
              ]);
          }else{
              $mc->put("/lists/$listId/members/$member_email", [
                  'email_address' => $user->email,
                  'status'        => 'subscribed',
              ]);
          }

        $user = Sentinel::findById($user->id);
        $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code)) {
          Sentinel::authenticate($user);
          
          if(Sentinel::authenticate($user)) {
            $user = Sentinel::check();
              $user->verified = 1;
              $user->status = "Verified";
              $count = $user->login_count;
              $count = $count+1;
              $user->login_count = $count;
              $user->save();
              return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
          }
        }
      }else{
          $count = $user->login_count;
          $count = $count+1;
          $user->login_count = $count;
          $user->save();
          $member_email = md5($user->email);
          $mc->patch("/lists/$listId/members/$member_email", [
              'merge_fields' => ['LOGINCOUNT' => $user->login_count],
          ]);
      }

      if (Activation::completed($user)) {
        Sentinel::authenticate($user);

        if(Sentinel::authenticate($user)) {
          $user = Sentinel::check();
           return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));

        }
      }

      return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));

    } else {
      $url = $ms->getAuthorizationUri();
      return redirect((string)$url);
    }
  }

}
