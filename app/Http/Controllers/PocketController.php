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

class PocketController extends Controller {
  
  public function index(Request $request) {
//    $code = $request->get('code');
//
//    $pocket = \OAuth::consumer('Pocket');
//
//    if (!is_null($code)) {
//      $token = $pocket->requestAccessToken($code);
//      $result = json_decode($pocket->request('/me'), true);
//      $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
//      echo $message. "<br/>";
////      dd($result);
//    } else {
//      $url = $pocket->getAuthorizationUri();
//      return redirect((string)$url);
//    }

//    $url = 'https://getpocket.com/v3/oauth/request';
//    $data = array('consumer_key' => '50790-067541bc6daec667212f5e0e', 'redirect_uri' => '/');
//
//    $options = array(
//        'http' => array(
//            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//            'method'  => 'POST',
//            'content' => http_build_query($data),
//        ),
//    );
//    $context  = stream_context_create($options);
//    $result = file_get_contents($url, false, $context);
//    if ($result === FALSE) { /* Handle error */ }
//
//    var_dump($result);
//  }
      $apiKey = Config::get('mailchimp.apikey');
      $mc = new Mailchimp($apiKey);
      $listId = Config::get('mailchimp.listId');
      $code = $request->get('code');

      $ms = \OAuth::consumer('Pocket');

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
              $mc->put("lists/$listId/members/$member_email", [
                  'email_address' => $user->email,
                  'status'        => 'subscribed',
              ]);

              $user = Sentinel::findById($user->id);
              $activation = Activation::create($user);

              if (Activation::complete($user, $activation->code)) {
                  Sentinel::authenticate($user);

                  if(Sentinel::authenticate($user)) {
                      $user = Sentinel::check();
                      $user->verified = 1;
                      $user->status = "Verified";
                      $user->save();
                      return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
                  }
              }
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
