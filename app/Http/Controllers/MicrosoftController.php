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

class MicrosoftController extends Controller {
  
  public function index(Request $request) {
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

        $role = Sentinel::findRoleById(2);
        $role->users()->attach($user);
        
        $user = Sentinel::findById($user->id);
        $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code)) {
          Sentinel::authenticate($user);
          
          if(Sentinel::authenticate($user)) {
            $user = Sentinel::check();

            if (Sentinel::inRole('admin')) {
              return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
            } else if (Sentinel::inRole('user')) {
              return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
            }
          }
        }
      }

      if (Activation::completed($user)) {
        Sentinel::authenticate($user);

        if(Sentinel::authenticate($user)) {
          $user = Sentinel::check();

          if (Sentinel::inRole('admin')) {
            return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
          } else if (Sentinel::inRole('user')) {
            return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
          }
        }
      }

      return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));

    } else {
      $url = $ms->getAuthorizationUri();
      return redirect((string)$url);
    }
  }

}
