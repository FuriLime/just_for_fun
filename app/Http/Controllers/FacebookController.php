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

class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function oauthfacebook()
    {
        $apiKey = Config::get('mailchimp.apikey');
        $mc = new Mailchimp($apiKey);
        $listId = Config::get('mailchimp.listId');
        $userFace = Socialite::driver('facebook')->user();
        $user = User::whereemail($userFace->getEmail())->first();
        if(!$user){
            $user = new User;
            $user->email = $userFace->getEmail();
            $user->save();
            $account_user = new Account();
            $account_user->	account_type_id = '1';
            $account_user->name = $user->uuid;
            $account_user->slug = $user->uuid;
            $account_user->save();
            $account_profile = new AccountProfile();
            $account_profile->account_id = $account_user->id;
            $account_profile->save();
            $role = Role::find(2);
            $rolew = [
                0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
            ];
//            $member_email = md5($user->email);
//            $mc->put("lists/$listId/members/$member_email", [
//                'email_address' => $user->email,
//                'status'        => 'subscribed',
//            ]);
            $role->users()->attach($rolew);
            $user_profile = new UserProfile();
            $user_profile->user_id = $user->id;
            $user_profile->save();
            $user = Sentinel::findById($user->id);
            $activation = Activation::create($user);

            if (Activation::complete($user, $activation->code))
            {
            Sentinel::authenticate($user);
              if(Sentinel::authenticate($user))
            {
                $user = Sentinel::check();
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
            }
        }

        }


        if (Activation::completed($user))
        {
            Sentinel::authenticate($user);
            if(Sentinel::authenticate($user))
            {
                $user = Sentinel::check();
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
            }
        }
        return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));
    }
}
