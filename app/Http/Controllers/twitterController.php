<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Redirect;
use Lang;
use URL;
use Input;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUser;
use Sentinel;
use Activation;


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
        dd($userTwit->getNickName());
        $user = User::wherefirst_name($userTwit->getNickName())->first();
        if(!$user){
            $user = new User;
            $user->first_name = $userTwit->getNickName();
//            $user->email = $userTwit->getName().'@twitter.com';
            $user->save();
            $account_user = new Account();
            $account_user->	account_type_id = '1';
            $account_user->name = $user['email'];
            $account_user->slug = $user['email'];
            $account_user->save();
            $role = Role::find(2);
            $rolew = [
                0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
            ];

            $role->users()->attach($rolew);
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
