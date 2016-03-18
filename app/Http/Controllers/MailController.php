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

    public function getEmailSend()
    {

        if (isset($_GET)) {
            var_dump($_GET);
        }
$email = 'serg@adfsdf.codf';
        return view('welcome', compact('email'));
//        return redirect()->route('oauthtwitter');
    }

    public function postEmailSend(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
        ]);

    }
}