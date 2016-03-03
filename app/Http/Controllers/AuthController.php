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
use App\User;
use App\Activate;
use \Mailchimp;
use Weblee\Mandrill\Mail;

class AuthController extends JoshController
{
    /**
     * Account sign in.
     *
     * @return View
     */

    protected $mailchimp;
    protected $listId = '3b2e9de273';        // Id of newsletter list

    public function __construct(\Mailchimp\Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }



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
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return back()->withInput()->withErrors($validator);
        }

        try {
            // Try to log the user in
            if(Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false)))
            {
                // Redirect to the dashboard page

                $user = Sentinel::check();
                $user_email = $user["attributes"]["email"];

                //if (Sentinel::inRole('admin')) {
                return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signin.success'));
                /*} else {
                    //return Redirect::route("members/".$user_email)->with('success', Lang::get('auth/message.signin.success'));
                    return Redirect::route("member_home")->with('success', Lang::get('auth/message.signin.success'));
                }*/
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
    public function postSignup()
    {
        // Declare the rules for the form validation
        $rules = array(
            // 'first_name'       => 'required|min:3',
            // 'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            // 'email_confirm'    => 'required|email|same:email',
            'password'         => 'required|between:3,32',
            'my_name'   => 'honeypot',
            'my_time'   => 'required|honeytime:5'
            // 'password_confirm' => 'required|same:password',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toregister')->withInput()->withErrors($validator);
        }

        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
            ));


            //add user to 'User' group
            $role = Sentinel::findRoleById(2);
            $role->users()->attach($user);



            //un-comment below code incase if user have to activate manually

            // Data to be used on the email view
            $data = array(
                'user'          => $user,
                'activationUrl' => URL::route('activate', array('user_id' => $user->id, 'activation_code' => User::find($user->id)->activate->code)),
            );


            // Send the activation code through email
//            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
//                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
//                $m->subject('Welcome ' . $user->first_name);
//            });

            //Redirect to login page
            //return Redirect::to("admin/login")->with('success', Lang::get('auth/message.signup.success'));
            // return 'ok';


            // login user automatically



            // Log the user in
            //Sentinel::login($user, false);
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
        $activate = new Activate();
        $user = User::find($userId);
        $email = $user->email;
        $hash_email = md5($email);
        if ($activate->isUserHasCode($userId, $activationCode)){
            $activate->activateUser($userId);
            $result_member = $this->mailchimp->get("lists/$this->listId/members");
            foreach($result_member['members'] as $email_user){
                $member_user[] = $email_user->email_address;
            }
            if (in_array($email, $member_user)) {
                $this->mailchimp->patch("lists/$this->listId/members/$hash_email", [
                    'email_address' => $email,
                    'status' => 'subscribed',
                ]);
            }
            else {
              $this->mailchimp->post("lists/$this->listId/members", [
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
            Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Account Password Recovery');
            });
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
            'password_confirm' => 'required|same:password'
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

    /**
     * Account sign up form processing for register2 page
     *
     * @return Redirect
     */
    public function postRegister2()
    {
        // Declare the rules for the form validation
        $rules = array(
            'first_name'       => 'required|min:3',
            'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'email_confirm'    => 'required|email|same:email',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
            'terms'            => 'accepted',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
            ));

            //add user to 'User' group
            $role = Sentinel::findRoleById(2);
            $role->users()->attach($user);


            /*
            //un-comment below code incase if user have to activate manually

            // Data to be used on the email view
            $data = array(
                'user'          => $user,
                'activationUrl' => URL::route('activate', $user->getActivationCode()),
            );

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome ' . $user->first_name);
            });

            //Redirect to login page
            return Redirect::to("admin/login")->with('success', Lang::get('auth/message.signup.success'));

            */

            // login user automatically



            // Log the user in
            Sentinel::login($user, false);

            // Redirect to the home page with success menu
            return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signup.success'));

        } catch (UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

}
