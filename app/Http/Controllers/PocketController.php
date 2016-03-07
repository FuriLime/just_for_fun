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

class PocketController extends Controller {
  
  public function index(Request $request) {
    /*$code = $request->get('code');

    $pocket = \OAuth::consumer('Pocket');

    if (!is_null($code)) {
      $token = $pocket->requestAccessToken($code);
      $result = json_decode($pocket->request('/me'), true);
      $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
      echo $message. "<br/>";
      dd($result);
    } else {
      $url = $pocket->getAuthorizationUri();
      return redirect((string)$url);
    }*/

    $url = 'https://getpocket.com/v3/oauth/request';
    $data = array('consumer_key' => '50790-067541bc6daec667212f5e0e', 'redirect_uri' => '/');

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    var_dump($result);
  }

}
