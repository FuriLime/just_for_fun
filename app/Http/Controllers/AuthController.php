<?php namespace App\Http\Controllers;
use Sentinel;
use View;
use Validator;
use Input;
use Session;
use Redirect;
use Lang;
use URL;
use \Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use \Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Reminder;
//use Mail;
use Socialite;
use App\Account;
use App\User;
use App\UserProfile;
use App\AccountProfile;
use App\Role;
use App\Activation;
use Mailchimp\Mailchimp;
use Config;
use Ramsey\Uuid\Uuid;
use Honeypot;

class AuthController extends JoshController
{
    /**
     * Account sign in.
     *
     * @return View
     */
      // Id of newsletter list


    public function getSignin()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        // Show the page
        return View('admin.login');
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postSignin()
    {
        // Declare the rules for the form validation
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|between:3,32',
            'my_name'   => 'honeypot',
            'my_time'   => 'required|honeytime:5'

        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);


        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return back()->withInput()->withErrors($validator);
        }
        $email= Input::only('email');
        // Redirect to the dashboard page

        try {

            $user = User::where('email', $email['email'])->get();
//            dd($user);
            if(!empty($user['0'])) {
                $activeUser = $user['0']['original']['verified'];
                if ($activeUser == 0) {
                    $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
                    return back()->withInput()->withErrors($this->messageBag);
                }
            }
            // Try to log the user in
            if(Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false)) && $activeUser==1)
            {


                $user = Sentinel::check();

                $user_email = $user["attributes"]["email"];
                return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
            }

            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));

        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay' )));
        }

        // Ooops.. something went wrong
        return back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */

    public function getSignup()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        // Show the page
        return View('register');
    }


    public function postSignup()
    {
        // Declare the rules for the form validation
        $rules = array(
            'email'            => 'required|email|unique:users',
            'password'         => 'required|between:3,32',
            'my_name'   => 'honeypot',
            'my_time'   => 'required|honeytime:5'
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }

        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
            ));
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
            //add user to 'User' group
            $role = Role::find(2);
            $rolew = [
               0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
            ];

            $role->users()->attach($rolew);
//            $role->accounts()->attach($account_user);


            //un-comment below code incase if user have to activate manually
            // Data to be used on the email view
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
            return Redirect::back()->with('success', 'Message with confirmation link has been sent to '.$user->email.'. Please click on the link in the letter that would activate your account.');
        } catch (UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     * @return
     */
    public function getActivate($userId, $activationCode)
    {

        $activate = new Activation();
        $user = User::find($userId);
        $email = $user->email;
        $hash_email = md5($email);
        $apiKey = Config::get('mailchimp.apikey');
        $mc = new Mailchimp($apiKey);
        $listId = Config::get('mailchimp.listId');
        if ($activate->isUserHasCode($userId, $activationCode)){
            $activate->activateUser($userId);
            $result_member = $mc->get("lists/$listId/members");
            foreach($result_member['members'] as $email_user){
                $member_user[] = $email_user->email_address;
            }
            if (in_array($email, $member_user)) {
                $mc->patch("lists/$listId/members/$hash_email", [
                    'email_address' => $email,
                    'status' => 'subscribed',
                ]);
            }
            else {
                $mc->post("lists/$listId/members", [
                    'email_address' => $email,
                    'status'        => 'subscribed',
                ]);
            }

            if($activate->isUserActivate($userId)){
                $user = User::find($userId);
                Sentinel::login($user, false);
                if (Sentinel::check()) {
                    return Redirect::route('dashboard');
                }
            }
        }
        else{
            return Redirect::route("home")->with('error', Lang::get('auth/message.account_not_activated'));
        }
    }


    /**
     * Forgot password form processing page.
     *
     * @return Redirect
     */
    public function postForgotPassword()
    {
        // Declare the rules for the validator
        $rules = array(
            'email' => 'required|email',
            'my_email'   => 'honeypot',
            'my_time'   => 'required|honeytime:5',
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toforgot')->withInput()->withErrors($validator);
        }

        // Get the user password recovery code
        $user = Sentinel::findByCredentials(['email' => Input::get('email')] );

        if($user)
        {
            //get reminder for user
            $reminder = Reminder::exists($user) ?: Reminder::create($user);

            // Data to be used on the email view
            $data = array(
                'user'              => $user,
                'forgotPasswordUrl' => URL::route('forgot-password-confirm',[$user->id, $reminder->code]),
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
                ['name' => 'PASSRESET',             'content' => $data['forgotPasswordUrl']],
                ['name' => 'RESETVALID',            'content' => 'We not have this data yet'],
                ['name' => 'DCREDITS',              'content' => '30'],
                ['name' => 'ECREDITS',              'content' => 'We not have this data yet'],
                ['name' => 'ACCTYPE',               'content' => 'We not have this data yet'],
                ['name' => 'RENEWDATE',             'content' => 'We not have this data yet'],
                ['name' => 'FREETEXT',              'content' => 'content-FREETEXT'],
                ['name' => 'CONFEMAIL',              'content' => $data['forgotPasswordUrl']],
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
        else
        {
            // Redirect to the forgot password page
            return Redirect::to(URL::previous() . '#toforgot')->with('error', Lang::get('auth/message.forgot-password.error'));
        }
        //  Redirect to the forgot password
        return Redirect::to(URL::previous() . '#toforgot')->with('success', Lang::get('auth/message.forgot-password.success'));
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param number $userId
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId,$passwordResetCode = null)
    {
        // Find the user using the password reset code
        if(!$user = Sentinel::findById($userId))
        {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
        }


        // Show the page
        return View('admin.auth.forgot-password-confirm');
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param number $userId
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm($userId, $passwordResetCode = null)
    {
        // Declare the rules for the form validation
        $rules = array(
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
            'my_pass'   => 'honeypot',
            'my_time'   => 'required|honeytime:5',
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::route('forgot-password-confirm', $passwordResetCode)->withInput()->withErrors($validator);
        }

        // Find the user using the password reset code
        $user = Sentinel::findById($userId);
        if(!$reminder = Reminder::complete($user, $passwordResetCode,Input::get('password')))
        {
            // Ooops.. something went wrong
            return Redirect::route('signin')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
        }

        // Password successfully reseted
        return Redirect::route('signin')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return Redirect::to('/')->with('success', 'You have successfully logged out!');
    }
}