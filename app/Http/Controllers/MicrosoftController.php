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

use OAuth\OAuth2\Service\Microsoft;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;

class MicrosoftController extends Controller
{
    
    public function index(Request $request) {
       /* $code = $request->get('code');*/
        /*$ms = \OAuth::consumer('Microsoft');*/

        /*$url = $ms->getAuthorizationUri();
        return redirect((string)$url);*/

       /* $service = \OAuth::serviceFactory();
        var_dump($service);*/

        /*$storage = new Session();

        $credentials = new Credentials('000000004417959E', '-iDGWNzPdV8AZNUXnO8kV8PM3qd6Hrp0', '/Microsoft?success');

        $microsoft = $serviceFactory->createService('microsoft', $credentials, $storage, array('basic'));

        var_dump($microsoft);*/

        $code = $request->get('code');

        $ms = \OAuth::consumer('Microsoft');

        if ( ! is_null($code))
        {
            $token = $ms->requestAccessToken($code);

            $result = json_decode($ms->request('/me'), true);

            $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message. "<br/>";
            dd($result);
        }
        else
        {
            $url = $ms->getAuthorizationUri();
            return redirect((string)$url);
        }
    }

}
