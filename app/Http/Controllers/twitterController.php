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
use Illuminate\Support\Facades\Route;
use Redirect;
use Lang;
use URL;
use Input;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUser;
use Sentinel;
use Activation;
use Ramsey\Uuid\Uuid;
use Mailchimp\Mailchimp;
use Config;

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


        if(!isset($_GET['email'])){
            $userTwit = Socialite::driver('twitter')->user();
            $user = User::wheretwit_nick($userTwit->getNickName())->first();
        }
        else{
            $user=NULL;
        }
        if(!$user){
            if(isset($_GET['email'])){
                $user = new User;
                $user->twit_nick = $_GET['twitnick'];
                $user->email = $_GET['email'];

            }else{
                $user = new User;
                $user->twit_nick = $userTwit->getNickName();

//            $user->email = $userTwit->getNickName().'@twitter.com';

                if(empty( $user->email))
                {
                    return view('welcome', ['twitnick'=> $userTwit->getNickName()]);
                }
            }
            $user->save();

            $apiKey = Config::get('mailchimp.apikey');
            $mc = new Mailchimp($apiKey);
            $listId = Config::get('mailchimp.listId');
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
//            $mc->post("lists/$listId/members", [
//                'email_address' => $user->email,
//                'status'        => 'subscribed',
//            ]);
            $role->users()->attach($rolew);
            $user_profile = new UserProfile();
            $user_profile->user_id = $user->id;
            $user_profile->save();

            $user = Sentinel::findById($user->id);

            $activation = Activation::create($user);
dd($user->id);
        if (Activation::complete($user, $activation->code) )
        {
              Sentinel::authenticate($user);
              if(Sentinel::authenticate($user))
            {
                $user = Sentinel::check();

                return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));

            }
        }


        }
//        if (Activation::completed($user))
//        {
//            dd('sdfsdf');
//            Sentinel::authenticate($user);
//              if(Sentinel::authenticate($user))
//            {
//                $user = Sentinel::check();
//
//                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
//
//            }
//        }
        // Show the page
        return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));
        // }
        // Auth::login($user);
    }
}
