<?php

namespace App\Http\Controllers;
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

class officeController extends Controller
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
    public function office()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    public function oauthoffice()
    {

        $userFace = Socialite::driver('microsoft')->user();
        $user = User::whereemail($userFace->getEmail(), $userFace->getName())->first();
        if(!$user){
            $user = new User;
            $user->first_name = $userFace->getName();
            $user->email = $userFace->getEmail();
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
        return Redirect::route("home")->with('success', Lang::get('auth/message.signin.fail'));
    }
}
