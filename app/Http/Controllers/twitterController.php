<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Account;
use App\Role;
use App\UserProfile;
use Auth;
use Redirect;
use Lang;
use URL;
use Input;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUser;
use Sentinel;
use Activation;
use Ramsey\Uuid\Uuid;


class twitterController extends Controller
{


     public function index()
    {
        //
    }

   public function twitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function oauthtwitter()
    {
        $userTwit = Socialite::driver('twitter')->user();
       // dd($userTwit->getNickName());
        $user = User::wheretwit_nick($userTwit->getNickName())->first();
        if(!$user){
            $user = new User;
            $user->twit_nick = $userTwit->getNickName();
            $user->email = Uuid::uuid4();
            $user->save();
            $account_user = new Account();
            $account_user->	account_type_id = '1';
            $account_user->name = $user->uuid;
            $account_user->slug = $user->uuid;
            $account_user->save();
            $role = Role::find(2);
            $rolew = [
                0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
            ];

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
                // Show the page
        return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));
        // }
        // Auth::login($user);
    }
}
