<?php

namespace App\Http\Controllers;


use App\Http\Requests;
// use Request;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Weblee\Mandrill\Mail;

class MailController extends Controller
{
    //

    public function getEmailSend(){

       if(isset($_POST)){
            var_dump($_POST);
        }

        return view('welcome');
//        return redirect()->route('oauthtwitter');
    }

    public function postEmailSend(Request $request){
        $this->validate($request, [
            'email'  => 'required|email|unique:users',
    ]);
        return redirect()->route('oauthtwitter');

    }
}
