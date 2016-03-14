<?php namespace App\Http\Controllers;
use Sentinel;
use View;
use Validator;
use Input;
use Session;
use Redirect;
use Lang;
use URL;
use Mail;
use File;
use Config;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;
use Mailchimp\Mailchimp;
use App\Role;
class UsersController extends JoshController
{
    protected $countries = array(
        ""   => "Select Country",
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegowina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, the Democratic Republic of the",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote d'Ivoire",
        "HR" => "Croatia (Hrvatska)",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard and Mc Donald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran (Islamic Republic of)",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macau",
        "MK" => "Macedonia, The Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint LUCIA",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia (Slovak Republic)",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SH" => "St. Helena",
        "PM" => "St. Pierre and Miquelon",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen Islands",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands (British)",
        "VI" => "Virgin Islands (U.S.)",
        "WF" => "Wallis and Futuna Islands",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    );

    /**
     * Declare the rules for the form validation
     *
     * @var array
     */
    protected $validationRules = array(
        'first_name'       => 'required|min:3',
        'last_name'        => 'required|min:3',
        'email'            => 'required|email|unique:users',
        'password'         => 'required|between:3,32',
        'password_confirm' => 'required|same:password',
        'pic' => 'mimes:jpg,jpeg,bmp,png|max:10000'
    );

       // Id of newsletter list

    /**
     * Show a list of all the users.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the users
        $users = User::All();

        // Show the page
        return View('admin.users.index', compact('users'));
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function getCreate()
    {
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();

        // Show the page
        return View('admin/users/create',compact('groups'));
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function postCreate()
    {
        // Declare the rules for the form validation
        $rules = array(
            'first_name'       => 'required|min:3',
            'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
            'group'            => 'required|numeric',
            'pic'              => 'mimes:jpg,jpeg,bmp,png|max:10000'
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //upload image
        if ($file = Input::file('pic'))
        {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName        = str_random(10).'.'.$extension;
            $file->move($destinationPath, $safeName);
        }

        //check whether use should be activated by default or not
        $activate = Input::get('activate')?true:false;

        try {
            // Register the user
            $user = Sentinel::register(array(
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
                'dob'   => Input::get('dob'),
                'bio'   => Input::get('bio'),
                'pic'   => isset($safeName)?$safeName:'',
                'gender'   => Input::get('gender'),
                'country'   => Input::get('country'),
                'state'   => Input::get('state'),
                'city'   => Input::get('city'),
                'address'   => Input::get('address'),
                'postal'   => Input::get('postal'),
            ),$activate);

            //add user to 'User' group
            $role = Sentinel::findRoleById(Input::get('group'));
            $role->users()->attach($user);

            //check for activation and send activation mail if not activated by default
            if(!Input::get('activate')) {
                // Data to be used on the email view
                $data = array(
                    'user'          => $user,
                    'activationUrl' => URL::route('activate', $user->id, Activation::create($user)->code),
                );

                // Send the activation code through email
                Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject('Welcome ' . $user->first_name);
                });
            }

            // Redirect to the home page with success menu
            return Redirect::route("users")->with('success', Lang::get('users/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/users/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/users/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/users/message.user_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }

    /**
     * User update.
     *
     * @param  int  $id
     * @return View
     */
    public function getEdit($id = null)
    {
            // Get the user information
            if($user = Sentinel::findById($id))
            {
                // Get this user groups
                $userRoles = $user->getRoles()->lists('name', 'id')->all();
                $user_profile = $user->user_profile()->first();

                // Get a list of all the available groups
                $roles = Sentinel::getRoleRepository()->all();

            }
            else
            {
                // Prepare the error message
                $error = Lang::get('users/message.user_not_found', compact('id'));

                // Redirect to the user management page
                return Redirect::route('users')->with('error', $error);
            }

        $countries = $this->countries;
        $status = Activation::completed($user);

        // Show the page
        return View('admin/users/edit', compact('user', 'user_profile', 'roles', 'userRoles','countries','status'));
//        return View('admin/layouts/edit', compact('user', 'roles', 'userRoles','countries','status'));
    }

    /**
     * User update form processing page.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function postEdit($id = null)
    {


        try {
            // Get the user information
            $user = Sentinel::findById($id);
            $user_profile = $user->user_profile()->first();

            $us_email = Sentinel::getUser()->email;
            $email = md5(Sentinel::getUser()->email);
            $apiKey = Config::get('mailchimp.apikey');
            $mc = new Mailchimp($apiKey);
            $listId = Config::get('mailchimp.listId');
//            $mc->delete("lists/$listId/members/$email");
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        //
        $this->validationRules['email'] = "required|email|unique:users,email,{$user->email},email";

        // Do we want to update the user password?
        if ( ! $password = Input::get('password')) {
            unset($this->validationRules['password']);
            unset($this->validationRules['password_confirm']);
        }

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $this->validationRules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        try {
            // Update the user
            $user->first_name  = Input::get('first_name');
            $user->last_name   = Input::get('last_name');
            $user->email       = Input::get('email');
            $user_profile->dob   = Input::get('dob');
            $user_profile->bio   = Input::get('bio');
            $user_profile->gender   = Input::get('gender');
            $user_profile->country   = Input::get('country');
            $user_profile->state   = Input::get('state');
            $user_profile->city   = Input::get('city');
            $user_profile->address   = Input::get('address');
            $user_profile->timezone   = Input::get('timezone');

            // Do we want to update the user password?
            if ($password) {
                $user->password = Hash::make($password);
            }

            // is new image uploaded?
            if ($file = Input::file('pic'))
            {
                $fileName        = $file->getClientOriginalName();
                $extension       = $file->getClientOriginalExtension() ?: 'png';
                $folderName      = '/uploads/users/';
                $destinationPath = public_path() . $folderName;
                $safeName        = str_random(10).'.'.$extension;
                $file->move($destinationPath, $safeName);

                //delete old pic if exists
                if(File::exists(public_path() . $folderName.$user->pic))
                {
                    File::delete(public_path() . $folderName.$user->pic);
                }

                //save new file path into db
                $user->pic   = $safeName;

            }

            // Get the current user groups
            $userRoles = $user->roles()->lists('id')->all();

            // Get the selected groups
            $selectedRoles = Input::get('groups', array());

            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $rolesToAdd    = array_diff($selectedRoles, $userRoles);
            $rolesToRemove = array_diff($userRoles, $selectedRoles);

            // Assign the user to groups
            foreach ($rolesToAdd as $roleId) {
                dd($user->accounts()->first()->id);
                $role = Role::find($roleId);
                $rolew = [
                    0 => ['user_id' => $user->id],
                ];

                $role->users()->attach($rolew);

//                $role->users()->attach($user);
            }

            // Remove the user from groups
            foreach ($rolesToRemove as $roleId) {
                $role = Role::find($roleId);
                $rolew = [
                    0 => ['user_id' => $user->id],
                ];
                $role->users()->detach($rolew);
            }

            // Activate / De-activate user
//            $status = $activation = Activation::completed($user);
//            if(Input::get('activate') != $status)
//            {
//                if(Input::get('activate'))
//                {
//                    $activation = Activation::exists($user);
//                    if($activation)
//                    {
//                        Activation::complete($user, $activation->code);
//                    }
//                }
//                else
//                {
//                    //remove existing activation record
//                    Activation::remove($user);
//                    //add new record
//                    Activation::create($user);
//
//                    //send activation mail
//                    $data = array(
//                        'user'          => $user,
//                        'activationUrl' => URL::route('activate', array('user_id' => $user->id, 'activation_code' => User::find($user->id)->activate->code)),
//                    );
//
//                    // Send the activation code through email
//                    Mail::send('emails.register-activate', $data, function ($m) use ($user) {
//                        $m->to($user->email, $user->first_name . ' ' . $user->last_name);
//                        $m->subject('Welcome ' . $user->first_name);
//                    });
//
//                }
//            }

            // Was the user updated?
            if ($user->save() && $user_profile->save()) {

                $mc->post("lists/$listId/members", [
                    'email_address' => $user->email,
                    'merge_fields' => ['FNAME'=>$user->first_name, 'LNAME'=>$user->last_name, 'CHENGED'=>$us_email],
                    'status'        => 'subscribed',
                ]);

                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('users.update', $id)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (LoginRequiredException $e) {
            $error = Lang::get('users/message.user_login_required');
        }

        // Redirect to the user page
        return Redirect::route('users.update', $id)->withInput()->with('error', $error);
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();

        // Show the page
        return View('admin/deleted_users', compact('users'));
    }

    /**
     * Delete Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id)  {
                // Prepare the error message
                $error = Lang::get('users/message.error.delete');

                return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id' ));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('delete/user',['id' => $user->id]);
        return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getDelete($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('users')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id' ));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int      $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // Prepare the success message
            $success = Lang::get('users/message.success.restored');

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
            if($user->country) {
                $user->country = $this->countries[$user->country];
            }

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        // Show the page
        return View('admin.users.show', compact('user'));

    }

    /**
     * Get user access state
     *
     * @return View
     */
    public function getUserAccess()
    {
        if (Sentinel::getUser()->inRole('admin')) {

            $userAccess = "admin";
        }
        else {
            $userAccess = "others";

        }

        // Show the page
        return View('admin/groups/any_user', compact('userAccess'));
    }

    /**
     * Show View or redirect to 404
     *
     * @return View
     */
    public function getAdminOnlyAccess()
    {
        if (Sentinel::getUser()->inRole('admin')) {

            return View('admin/groups/admin_only');
        }
        else {
            return View('admin/404');
        }

        // fallback
        return View('admin/404');
    }

    public function getSubscriptionAndCredits()
    {
        return View('admin.subscription_and_credits.index');
    }

    public function getBillingAndInvoices()
    {
//        return view('admin.billing_and_invoices.edit_billing_details');
        return view('admin.billing_and_invoices.index');
    }

    public function getBonusesAndFreeStuff()
    {
        return view('admin.bonuses_and_free_staff.index');
    }

    public function getCancelSubscription()
    {
        return view('admin.subscription_and_credits.cancel_subscription');
    }

    public function getEditBillingDetails()
    {
        return view('admin.billing_and_invoices.edit_billing_details');
    }

    public function geteditPaymentMethod()
    {
        return view('admin.billing_and_invoices.edit_payment_method');
    }



    //get membre`s interests
    public function getInterests()
    {
        $email = md5(Sentinel::getUser()->email);
        $user_email = Sentinel::getUser()->email;
        $apiKey = Config::get('mailchimp.apikey');
        $listId = Config::get('mailchimp.listId');
        $mc = new Mailchimp($apiKey);

        $result_member = $mc->get("lists/$listId/members");
        $categories = $mc->get("lists/$listId/interest-categories");
        foreach($categories['categories'] as $cat_id){
                $new_cat_id[] = $cat_id->id;
        }
        foreach($result_member['members'] as $email_user){
            $member_user[] = $email_user->email_address;
        }
        if (in_array($user_email, $member_user)){
            $result1 = $mc->get("lists/$listId/members/$email", [
                'fields' => 'id,interests,email_address'
            ]);

            $result = $mc->get("lists/$listId/interest-categories/$new_cat_id[0]/interests", [
                'fields' => ['interests' => ['name']]
            ]);

            foreach ($result['interests'] as $key => $interes) {

                $val_name[$key]['id'] = $interes->id;
                $val_name[$key]['name'] = $interes->name;
                foreach ($result1['interests'] as $k => $check) {
                    if ($interes->id == $k) {
                        $val_name[$key]['check'] = $check;
                    }
                }
            }
            return View('admin.notisfaction', compact('val_name'));
        }
        else{
            try {
                $mc->post("lists/$listId/members", [
                    'email_address' => $user_email,
                    'status'        => 'subscribed',
                ]);

            }
            catch (\Mailchimp_List_AlreadySubscribed $e){
//                $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
            }
            catch (\Mailchimp_Error $e) {
                // do something
            }
            return View('admin.notisfaction');
        }

    }


    public function updateInterests(){
        $email = md5(Sentinel::getUser()->email);
        $check_true= array();
        foreach($_POST['check'] as $check){
            $check_id[] = $check["'id'"];
            if(in_array("on", $check)){
                $check_true[] = true;

            }
            else{
                $check_true[] = false;
            }

        }
        foreach ($check_id as $key=>$value){
            $data[$value] = $check_true[$key];
        }
        $apiKey = Config::get('mailchimp.apikey');
        $mc = new Mailchimp($apiKey);
        $listId = Config::get('mailchimp.listId');
        $mc->patch("lists/$listId/members/$email", [
            'merge_fields' => ['FNAME'=>'Davy', 'LNAME'=>'Jones'],
            'interests'    => $data
        ]);
        return redirect('admin/notisfaction')->with('success', Lang::get('message.success.update'));
    }
}

