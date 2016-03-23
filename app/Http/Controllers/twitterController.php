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
            $user = Sentinel::findByCredentials(['email' => $user->email]);
            if($user)
            {
                //get reminder for user
                $reminder = Reminder::exists($user) ?: Reminder::create($user);

                // Data to be used on the email view
                $data = array(
                    'user'          => $user,
                    'activationUrl' => URL::route('activate', array('user_id' => $user->id, 'activation_code' => User::find($user->id)->activate->code)),
                );

                // Send the activation code through email
                $subject = date('Y-m-d H:i:s') . " Subjectline";  // using a time in there to easily now which email was received for testing
                $to_email = $user->email;
                $to_name = 'asdasd';
                $from_email = 'test@eventfellows.org';
                $from_name = 'From Name Here';

                $template_content = array(
                    array(
                        'name' => 'example name from first array in file',
                        'content' => 'example content from first array in file'
                    )
                );

                $global_merge_vars = [
                    ['name' => 'emailname',             'content' => $to_email],
                    ['name' => 'NNAME',                 'content' => 'User reigester without first nickname'],
                    ['name' => 'FNAME',                 'content' => 'User reigester without first name'],
                    ['name' => 'LNAME',                 'content' => 'User reigester without last name'],
                    ['name' => 'LOGINCOUNT',            'content' => 'We not have this data yet'],
                    ['name' => 'PASSRESET',             'content' => $data['activationUrl']],
                    ['name' => 'RESETVALID',            'content' => 'We not have this data yet'],
                    ['name' => 'DCREDITS',              'content' => '30'],
                    ['name' => 'ECREDITS',              'content' => 'We not have this data yet'],
                    ['name' => 'ACCTYPE',               'content' => 'We not have this data yet'],
                    ['name' => 'RENEWDATE',             'content' => 'We not have this data yet'],
                    ['name' => 'FREETEXT',              'content' => 'content-FREETEXT'],
                    ['name' => 'COLOR1',                'content' => '#ee12ab'], // merge value not in mandrill code yet
                    // ['name' => 'logo',              'content' => 'https://gallery.mailchimp.com/af80e28befb4c13871210c7c0/images/9db15bbf-b6f3-4fa2-9afe-402ec9b558f6.jpg'],
                    ['name' => 'logo',              'content' => 'https://gallery.mailchimp.com/af80e28befb4c13871210c7c0/images/868e7c81-a24b-4468-931e-8d8a5ff5dc92.png'],
                ];
                $message = [
                    'html' => '<p>Example HTML content 12345</p>',
                    'text' => 'Example text content 56789',
                    'subject' => $subject,
                    'from_email' => $from_email ,
                    'from_name' => $from_name,
                    'to' => array(
                        array(
                            'email' => $to_email,
                            'name' => $to_name,
                        ),
                    ),
                    'headers' => array('Reply-To' => 'message.reply@twofy.de'),
                    'important' => false,
                    'track_opens' => null,
                    'track_clicks' => null,
                    'auto_text' => null,
                    'auto_html' => null,
                    'inline_css' => null,
                    'url_strip_qs' => null,
                    'preserve_recipients' => null,
                    'view_content_link' => null,
                    'tracking_domain' => null,
                    'signing_domain' => null,
                    'return_path_domain' => null,
                    'merge' => true,
                    'merge_language' => 'mailchimp',
                    'global_merge_vars' => $global_merge_vars,
                ];

                // Quick setup -> Mail should always be pushed to Queue and send as a background job!!!
                \MandrillMail::messages()->sendTemplate('test-template', $template_content, $message);
//            Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
//                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
//                $m->subject('Account Password Recovery');
//            });
            }

                //un-comment below code incase if user have to activate manually
                // Data to be used on the email view

//
//
//            $apiKey = Config::get('mailchimp.apikey');
//            $mc = new Mailchimp($apiKey);
//            $listId = Config::get('mailchimp.listId');
//            $mc->post("lists/$listId/members", [
//                'email_address' => $user->email,
//                'status'        => 'subscribed',
//            ]);
//            $user = Sentinel::findById($user->id);
//
//            $activation = Activation::create($user);
//
//        if (Activation::complete($user, $activation->code))
//        {
//
//            Sentinel::authenticate($user);
//              if(Sentinel::authenticate($user))
//            {
//                $user = Sentinel::check();
//
//                return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
//
//            }
//        }
//
//
//        }
//        if (Activation::completed($user))
//        {
//            Sentinel::authenticate($user);
//              if(Sentinel::authenticate($user))
//            {
//                $user = Sentinel::check();
//
//                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
//
//            }
        }
                // Show the page
        return Redirect::route("home")->with('error', Lang::get('auth/message.signin.error'));
        // }
        // Auth::login($user);
    }
}
