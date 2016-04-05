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
use App\Account;
use App\User;
use App\UserProfile;
use App\AccountProfile;
use App\Role;
use DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Hash;
use Mailchimp\Mailchimp;
use Illuminate\Http\Request;
use Storage;


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
        'image' => 'mimes:jpg,jpeg,bmp,png|max:10000'
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
            'image'              => 'mimes:jpg,jpeg,bmp,png|max:10000'
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        //check whether use should be activated by default or not
//        $activate = Input::get('activate')?true:false;

        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
                'dob'   => Input::get('dob'),
                'bio'   => Input::get('bio'),
                'image'   => isset($safeName)?$safeName:'',
                'gender'   => Input::get('gender'),
                'country'   => Input::get('country'),
                'state'   => Input::get('state'),
                'city'   => Input::get('city'),
                'address'   => Input::get('address'),
                'timezone'   => Input::get('timezone'),
            ));

            //create user profile
            $user_profile = new UserProfile();
            $user_profile->user_id = $user['id'];
            $user_profile->dob = Input::get('dob');
            $user_profile->bio =  Input::get('bio');
            $user_profile->gender =  Input::get('gender');
            $user_profile->country =  Input::get('country');
            $user_profile->state =  Input::get('state');
            $user_profile->city =  Input::get('city');
            $user_profile->address =  Input::get('address');
            $user_profile->timezone =  Input::get('timezone');
            $user_profile->save();

            //create account
            $account_user = new Account();
            $account_user->	account_type_id = '1';
            $account_user->name = $user['uuid'];
            $account_user->slug = $user['uuid'];
            $account_user->save();
            //create account profile
            $account_profile = new AccountProfile();
            $account_profile->account_id = $account_user->id;
            $account_profile->save();

            if (Input::file('image'))
            {

                $destinationPath = base_path().'/public/'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension

                $fileName = $user['id'].'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName);
                //save new file path into db
                $user_profile->image   = $fileName;
                $s3 = \Storage::disk('S3_BUCKET_USERDATA');
                $filePath = '/ef-test-userdata/' . $fileName;
                $s3->put($filePath, file_get_contents($user_profile->image), 'public');
                $user_profile->image=NULL;
                $user_profile->image ='http://ef-test-userdata.s3.amazonaws.com/ef-test-userdata/'.$fileName;
            }
            $role = Role::find(2);
            $rolew = [
                0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
            ];
            $role->users()->attach($rolew);

            //check for activation and send activation mail if not activated by default
            if(!Input::get('activate')) {
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
            }else{
                $user->verified ="1";
                $user->status = "Verified";
                $user->save();
                $user_profile->image ='http://ef-test-userdata.s3.amazonaws.com/ef-test-userdata/'. $fileName;
                $user_profile->save();
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
    public function postEdit($id = null, Request $request)
    {


        try {
            // Get the user information
            $user = Sentinel::findById($id);
            $user_profile = $user->user_profile()->first();

            $us_email = Sentinel::getUser()->email;
            $email = md5($user->email);
            $apiKey = Config::get('mailchimp.apikey');
            $mc = new Mailchimp($apiKey);
            $listId = Config::get('mailchimp.listId');
            $result1 = $mc->get("/lists/$listId/members/$email", [
                'fields' => 'id,interests,email_address'
            ]);

            $mc->delete("/lists/$listId/members/$email");
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('users')->with('error', $error);
        }

        //
        $this->validationRules['email'] = "required|email|unique:users,email,{$user->email},email";

        // Do we want to update the user password?
        if (!$password = Input::get('password')) {
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
            if (Input::file('image'))
            {

                $destinationPath = base_path().'/public/'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension

                $fileName = $user['id'].'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName);

                //delete old pic if exists
                if(File::exists(public_path() . $destinationPath.$user_profile->image))
                {
                    File::delete(public_path() . $destinationPath.$user_profile->image);
                }

                //save new file path into db
                $user_profile->image   = $fileName;
                $s3 = \Storage::disk('S3_BUCKET_USERDATA');
                $filePath = '/ef-test-userdata/' . $fileName;
                $s3->put($filePath, file_get_contents($user_profile->image), 'public');
                $user_profile->image=NULL;
                $user_profile->image ='http://ef-test-userdata.s3.amazonaws.com/ef-test-userdata/'.$fileName;
            }


            // Get the current user groups
            $userRoles = $user->roles()->lists('id')->all();

            // Get the selected groups
            $selectedRoles = Input::get('groups', array());
            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $acc_id = $user->accounts()->first()->id;
            // Remove the user from groups
            foreach ($userRoles as $roleId) {
                DB::table('account_user')->where('account_id', '=', $acc_id)
                    ->where('user_id', '=', $user->id)
                    ->where('role_id', '=', $roleId)->delete();

            }


            // Assign the user to groups
            foreach ($selectedRoles as $roleId) {

                $role = Role::find($roleId);
                $rolew = [
                    0 => ['user_id' => $user->id, 'account_id' => $acc_id, 'role_id'=>$role->id],
                ];

                $role->users()->attach($rolew);
            }

            $new_email = md5(Input::get('email'));
            $mc->put("/lists/$listId/members/$new_email", [
                'email_address' => Input::get('email'),
                'merge_fields' => ['FNAME' => $user->first_name, 'LNAME' => $user->last_name, 'OLDEMAIL'=>$us_email],
                'interests'=>$result1['interests'],
                'status' => 'subscribed'
            ]);
            // Was the user updated?
            if ($user->save() && $user_profile->save()) {

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
//             Check if we are not trying to delete ourselves
//            if ($user->id === Sentinel::getUser()->id)  {
//
//            }
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
                $delete_code = str_random(30);

                $data = array(
//                        'user'          => $user,
//                    'deleteUrl' => URL::route('delete', array('user_id' => $user->id, '?delete_code' => $delete_code)),
                    'deleteUrl' => url().'/admin/users/'.$user->id.'/delete?delete_code='.$delete_code,
                );
                if($_GET) {
                    if ($_GET['delete_code'] == $delete_code) {
                        User::destroy($id);
                        return Redirect::route('home')->with('success', 'You account was delete');
                    }
                }else {
                    Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                        $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                        $m->subject('Hello ' . $user->first_name);
                    });
                    return Redirect::route('home')->with('success', 'Message with confirmation link has been sent to ' . $user->email . '. Please click on the link in the letter that would delete your account.');
                }
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
            $user->activate();
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

        $result_member = $mc->get("/lists/$listId/members/$email");
        $categories = $mc->get("/lists/$listId/interest-categories");
        foreach($categories['categories'] as $cat_id){
            $new_cat_id[] = $cat_id->id;
        }
        if ($result_member){
            $result1 = $mc->get("/lists/$listId/members/$email", [
                'fields' => 'id,interests,email_address'
            ]);

            $result = $mc->get("/lists/$listId/interest-categories/$new_cat_id[0]/interests", [
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
                $mc->post("/lists/$listId/members", [
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
        $user_name = Sentinel::getUser()->first_name;
        $user_last = Sentinel::getUser()->last_name;
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
//            'merge_fields' => ['FNAME'=>$user_name, 'LNAME'=>$user_last],
            'interests'    => $data
        ]);
        return redirect('admin/notisfaction')->with('success', Lang::get('message.success.update'));
    }
}

