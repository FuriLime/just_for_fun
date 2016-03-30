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

class LinkedController extends Controller
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


    public function linked()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function oauthlinked()
    {

        $userFace = Socialite::driver('linkedin')->user();
        $user = User::whereemail($userFace->getEmail(), $userFace->getName())->first();
        if(!$user){
            $user = new User;
            $user->first_name = $userFace->getName();
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
                    if(Sentinel::check()) {
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
               if(Sentinel::check()) {
                   return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
               }
               }

        }
        return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));
    }
}
