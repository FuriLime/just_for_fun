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
      var_dump($result);
    } else {
      $url = $ms->getAuthorizationUri();
      return redirect((string)$url);
    }
  }

}
