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
        dd($userTwit);
        $user = User::wherefirst_name($userTwit->getName())->first();
        if(!$user){
            $user = new User;
            $user->first_name = $userTwit->getName();
            $user->email = $userTwit->getName().'@twitter.com';
            $user->save();
            $role = Sentinel::findRoleById(2);
            $role->users()->attach($user);
            $user = Sentinel::findById($user->id);
            $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code))
        {
            Sentinel::authenticate($user);
              if(Sentinel::authenticate($user))
            {
                $user = Sentinel::check();
                if (Sentinel::inRole('admin')) {
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
                } else if (Sentinel::inRole('user'))  {
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
                }
            }
        }
             
            
        }
       

        if (Activation::completed($user))
        {
            Sentinel::authenticate($user);
              if(Sentinel::authenticate($user))
            {
                $user = Sentinel::check();
                if (Sentinel::inRole('admin')) {
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
                } else if (Sentinel::inRole('user'))  {
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
                }
            }
        }
                // Show the page
        return Redirect::route("/")->with('error', Lang::get('auth/message.signin.error'));
        // }
        // Auth::login($user);
    }
}
