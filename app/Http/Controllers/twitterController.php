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
use DB;


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
        $apiKey = Config::get('mailchimp.apikey');
        $mc = new Mailchimp($apiKey);
        $listId = Config::get('mailchimp.listId');

        if(!isset($_GET['email'])){
            $userTwit = Socialite::driver('twitter')->user();
            $user = User::wheretwit_nick($userTwit->getNickName())->first();
        }else{
            $user=NULL;
        }
        if(!$user){
            if(isset($_GET['email'])){
                $user = new User;
                $user->twit_nick = $_GET['twitnick'];
                $user_isset=DB::table('users')->where('email', $_GET['email'])->first();
                if($user_isset) {
                    return Redirect::route("home")->with('error', Lang::get('auth/message.account_already_exists'));
                }else{
                    $user->email = $_GET['email'];
                }
            }else{
                $user = new User;
                $user->twit_nick = $userTwit->getNickName();
                if(empty( $user->email))
                {
                    return view('welcome', ['twitnick'=> $userTwit->getNickName()]);
                }
            }
            $user->save();

            $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code) && $user->verified==1)
        {
                return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
        }
            else{
                try{

                    $user_profile = new UserProfile();
                    $user_profile->user_id = $user['id'];
                    $user_profile->save();
                    $account_user = new Account();
                    $account_user->	account_type_id = '1';
                    $account_user->name = $user['uuid'];
                    $account_user->slug = $user['uuid'];
                    $account_user->save();
                    $account_profile = new AccountProfile();
                    $account_profile->account_id = $account_user->id;
                    $account_profile->save();
                    $role = Role::find(2);
                    $rolew = [
                        0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
                    ];

                    $role->users()->attach($rolew);
                    $member_email = md5($user->email);
                    if(!$mc->get("/lists/$listId/members/$member_email")){
                        $mc->post("/lists/$listId/members", [
                            'email_address' => $user->email,
                            'status'        => 'subscribed',
                        ]);
                    }else{
                        $mc->put("/lists/$listId/members/$member_email", [
                            'email_address' => $user->email,
                            'status'        => 'subscribed',
                        ]);
                    }

                    $data = array(
                        'user'          => $user,
                        'activationUrl' => URL::route('activate', array('user_id' => $user->id, 'activation_code' => User::find($user->id)->activate->code)),
                    );
                    $subject = date('Y-m-d H:i:s') . " Subjectline";  // using a time in there to easily now which email was received for testing
                    $to_email = $user->email;
                    $to_name = 'asdasd';
                    $from_email = 'test@eventfellows.org';
                    $from_name = 'EventFellow';

                    $template_content = array(
                        array(
                            'name' => 'example name from first array in file',
                            'content' => 'example content from first array in file'
                        )
                    );

                    $global_merge_vars = [
                        ['name' => 'emailname',             'content' => $to_email],
                        ['name' => 'NNAME',                 'content' => 'User reigester without nickname'],
                        ['name' => 'LOGINCOUNT',            'content' => 'We not have this data yet'],
                        ['name' => 'PASSRESET',             'content' => 'reset password'],
                        ['name' => 'RESETVALID',            'content' => $data['activationUrl']],
                        ['name' => 'DCREDITS',              'content' => '30'],
                        ['name' => 'ECREDITS',              'content' => 'We not have this data yet'],
                        ['name' => 'ACCTYPE',               'content' => ''],
                        ['name' => 'RENEWDATE',             'content' => 'We not have this data yet'],
                        ['name' => 'FREETEXT',              'content' => 'content-FREETEXT'],
                        ['name' => 'CONFEMAIL',              'content' => $data['activationUrl']],
                        ['name' => 'COLOR1',                'content' => '#ee12ab'],


                        // merge value not in mandrill code yet
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
                    // Redirect to the home page with success menu
                    return Redirect::route("home")->with('success', 'Message with confirmation link has been sent to '.$user->email.'. Please click on the link in the letter that would activate your account.');
                } catch (UserExistsException $e) {
                    $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
                }
            }
        }else{
            $count = $user->login_count;
            $count = $count+1;
            $user->login_count = $count;
            $user->save();
            $member_email = md5($user->email);
            $mc->patch("/lists/$listId/members/$member_email", [
                'merge_fields' => ['LOGINCOUNT' => $user->login_count],
            ]);
        }
        if (Activation::completed($user) && $user->verified==1)
        {
            Sentinel::authenticate($user);
            if(Sentinel::authenticate($user))
            {
                return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
            }
        }else{
            return Redirect::route("home")->with('error', Lang::get('auth/message.account_not_activated'));
        }
    }
}
