<?php

namespace App\Http\Controllers;


use App\Http\Requests;
// use Request;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Mail;

class MailController extends Controller
{
    //

    public function emailSend(Request $request){

    	$all = $request->all();

    	Mail::queue('mailchimp', compact('all'), function($message) use($all){
    		$message->from($all['sender_email'])
    				->to($all['recipient_email'])
    				->subject($all['subject']);
    	});

    	return redirect('/');

    }
}
