<?php
/**
* Sentinel filter
*
* Checks if the user is logged in
*/

Route::filter('Sentinel', function()
{
	if ( ! Sentinel::check()) {
 		return Redirect::to('/')->with('error', 'You must be logged in!');
 	}
});

/**
 * Model binding into route
 */
Route::model('blogcategory', 'App\BlogCategory');
Route::model('blog', 'App\Blog');
Route::pattern('slug', '[a-z0-9- _]+');

Route::group(array('prefix' => 'admin'), function () {

	# Error pages should be shown without requiring login
	Route::get('404', function () {
	    return View('admin/404');
	});
	Route::get('500', function () {
	    return View::make('admin/500');
	});

	# Lock screen
	Route::get('lockscreen', function () {
	    return View::make('admin/lockscreen');
	});

	# All basic routes defined here
	// Route::get('signin', function () {
	//     return View::make('admin/login');
	// });

	# Register2

	// Route::get('register2', function () {
	//     return View::make('admin/register2');
	// });
	// Route::post('register2',array('as' => 'register2','uses' => 'AuthController@postRegister2'));
//    Route::get('{userId}', array('as' => 'subscripltion_and_credits.index', 'uses' => 'UsersController@getSubscriptionAndCredits'));
//    Route::get('index', 'UsersController@getBillingAndInvoices');
//    Route::get('index','UsersController@getSubscriptionAndCredits');
//    Route::get('{userId}', array('as' => 'bonuses_and_free_staff.index', 'uses' => 'UsersController@getBonusesAndFreeStuff'));
//
//    Route::get('/', array('as' => 'billing_and_invoices.index', 'uses' => 'UsersController@getBillingAndInvoices'));

    # Logout
	Route::get('logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));

	# Account Activation
    Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));


//    Route::get('users/{userId}/delete', array('as' => 'delete', 'uses' => 'UsersController@getDelete'));

    # Dashboard / Index
	Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));

            # User Management
            Route::group(array('prefix' => 'users', 'before' => 'Sentinel'), function () {
                Route::get('/', array('as' => 'users', 'uses' => 'UsersController@getIndex'));
                Route::get('create', array('as' => 'create/user', 'uses' => 'UsersController@getCreate'));
                Route::post('create', 'UsersController@postCreate');
                Route::get('{userId}/edit', array('as' => 'users.update', 'uses' => 'UsersController@getEdit'));
                Route::post('{userId}/edit', 'UsersController@postEdit');
                Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
                Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
                Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
                Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
                Route::get('index', 'UsersController@getBillingAndInvoices');
            });

    Route::get('deleted_users', array('as' => 'deleted_users', 'before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

//    Route::group(array('prefix' => 'users/{userId}', 'before' => 'Sentinel'), function () {
//        Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
//        Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
//    });

    Route::get('billing_and_invoices', 'UsersController@getBillingAndInvoices');
    Route::get('notisfaction', 'UsersController@getInterests');
    Route::post('notisfaction', 'UsersController@updateInterests');
    Route::get('subscription_and_credits','UsersController@getSubscriptionAndCredits');
    Route::get('bonuses_and_free_staff','UsersController@getBonusesAndFreeStuff');
//    Route::get('billing_and_invoices','UsersController@getEditBillingDetails');

	# Group Management
    Route::group(array('prefix' => 'groups','before' => 'Sentinel'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@getIndex'));
        Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@getCreate'));
        Route::post('create', 'GroupsController@postCreate');
        Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@getEdit'));
        Route::post('{groupId}/edit', 'GroupsController@postEdit');
        Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@getDelete'));
        Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'GroupsController@getModalDelete'));
        Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
		Route::get('any_user', 'UsersController@getUserAccess');
		Route::get('admin_only', 'UsersController@getAdminOnlyAccess');
    });


    /*routes for blog*/
//	Route::group(array('prefix' => 'blog','before' => 'Sentinel'), function () {
//		Route::get('/', array('as' => 'blogs', 'uses' => 'BlogController@getIndex'));
//		Route::get('create', array('as' => 'create/blog', 'uses' => 'BlogController@getCreate'));
//		Route::post('create', 'BlogController@postCreate');
//		Route::get('{blog}/edit', array('as' => 'update/blog', 'uses' => 'BlogController@getEdit'));
//		Route::post('{blog}/edit', 'BlogController@postEdit');
//		Route::get('{blog}/delete', array('as' => 'delete/blog', 'uses' => 'BlogController@getDelete'));
//		Route::get('{blog}/confirm-delete', array('as' => 'confirm-delete/blog', 'uses' => 'BlogController@getModalDelete'));
//		Route::get('{blog}/restore', array('as' => 'restore/blog', 'uses' => 'BlogController@getRestore'));
//        Route::get('{blog}/show', array('as' => 'blog/show', 'uses' => 'BlogController@show'));
//        Route::post('{blog}/storecomment', array('as' => 'restore/blog', 'uses' => 'BlogController@storecomment'));
//	});

    /*routes for blog category*/
//	Route::group(array('prefix' => 'blogcategory','before' => 'Sentinel'), function () {
//		Route::get('/', array('as' => 'blogcategories', 'uses' => 'BlogCategoryController@getIndex'));
//		Route::get('create', array('as' => 'create/blogcategory', 'uses' => 'BlogCategoryController@getCreate'));
//		Route::post('create', 'BlogCategoryController@postCreate');
//		Route::get('{blogcategory}/edit', array('as' => 'update/blogcategory', 'uses' => 'BlogCategoryController@getEdit'));
//		Route::post('{blogcategory}/edit', 'BlogCategoryController@postEdit');
//		Route::get('{blogcategory}/delete', array('as' => 'delete/blogcategory', 'uses' => 'BlogCategoryController@getDelete'));
//		Route::get('{blogcategory}/confirm-delete', array('as' => 'confirm-delete/blogcategory', 'uses' => 'BlogCategoryController@getModalDelete'));
//		Route::get('{blogcategory}/restore', array('as' => 'restore/blogcategory', 'uses' => 'BlogCategoryController@getRestore'));
//	});

    Route::post('crop_demo','JoshController@crop_demo');

	/* laravel example routes */
	# datatables
	Route::get('datatables', 'DataTablesController@index');
	Route::get('datatables/data', array('as' => 'admin.datatables.data', 'uses' => 'DataTablesController@data'));

	# Remaining pages will be called from below controller method
	# in real world scenario, you may be required to define all routes manually

	Route::get('{name?}', 'JoshController@showView');

});


Route::group(array('prefix' => 'user'), function () {
    Route::get('{userId}/edit', array('as' => 'info.update', 'uses' => 'UsersController@getEdit'));
});

#frontend views

# Signin / Signup / Forgot-password
Route::get('signin', array('as' => 'signin','uses' => 'AuthController@getSignin'));
Route::post('signin','AuthController@postSignin');
Route::get('signup', array('as' => 'signup','uses' => 'AuthController@getSignup'));
Route::post('signup',array('as' => 'signup','uses' => 'AuthController@postSignup'));
Route::post('forgot-password',array('as' => 'forgot-password','uses' => 'AuthController@postForgotPassword'));

# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

# Logout
Route::get('logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));

# Personal cabinet
//Route::get('member/{userEmail}', array('as' => 'members_home', 'uses' => 'AccountController@index');
Route::get('member', array('as' => 'member_home', 'uses' => 'AccountController@index') );

# Events
Route::resource('events', 'EventsController');
Route::get('event/add', 'EventsController@create');
Route::post('event/add', 'EventsController@store');

Route::get('events/{uuid}/delete', array('as' => 'events.delete', 'uses' => 'EventsController@getDelete'));
Route::get('events/{readable_url}/clone', array('as' => 'events.clone', 'uses' => 'EventsController@cloned'));
Route::post('events/{readable_url}/clone', array('as' => 'events.clone', 'uses' => 'EventsController@clonne'));
Route::get('events/{uuid}/confirm-delete', array('as' => 'events.confirm-delete', 'uses' => 'EventsController@getModalDelete'));
Route::post('event/addtocalendar', array('as' => 'event.addtocalendar', 'uses' => 'EventsController@addToCalendar'));
Route::get('events/favorite', 'EventsController@favorite');

Route::get('confirm/{readable_url}', array('as' => 'confirm', 'uses' => 'EventsController@confirm'));

Route::get('/', array('as' => 'home', function () {
    return View::make('index');
}));


Route::get("sitemap.xml", array(
    "as"   => "sitemap",
    "uses" => "SiteMap@sitemap"
));

Route::get('oauthwindows', 'MicrosoftController@index');
Route::get('oauthpocket', 'PocketController@index');

// Route::get('/', function(){
// 	$data = [
// 		'title'=>'sdfsdfsdfsdf',
// 		'content'=>'sdfsdfsdfsdf'
// 	];

// 	Mail::send('mailchimp', $data, function($message){
// 		$message->to('sergey.ch.ysbm@gmail.com', 'ssdfsdf')->subject('sdfsfd');
// 	});
// });

//Route::get('welcome', 'MailController@emailSend');
//Route::post('welcome', array('as' => 'welcome','uses' =>  'MailController@postEmailSend'));


Route::get('/facebook','FacebookController@facebook');
Route::get('/oauthfacebook','FacebookController@oauthfacebook');


Route::get('/google','googleController@google');
Route::get('/oauthgoogle','googleController@oauthgoogle');

Route::get('twitter',array('as' => 'twitter','uses' =>   'twitterController@twitter'));
Route::get('oauthtwitter',array('as' => 'oauthtwitter','uses' =>  'twitterController@oauthtwitter'));
Route::post('oauthtwitter',array('as' => 'oauthtwitter','uses' =>  'twitterController@oauthtwitter'));

Route::get('/linked', 'linkedController@linked');
Route::get('/oauthlinkedin','linkedController@oauthlinked');

Route::get('blog', array('as' => 'blog', 'uses' => 'BlogController@getIndexFrontend'));
Route::get('blog/{slug}/tag', 'BlogController@getBlogTagFrontend');
Route::get('blogitem/{slug?}', 'BlogController@getBlogFrontend');
Route::post('blogitem/{blog}/comment', 'BlogController@storeCommentFrontend');

Route::get('{name?}', 'JoshController@showFrontEndView');


Route::get('auth/invite', 'InviteController@create');
Route::post('auth/invite', 'InviteController@store');
Route::get('auth/invite-only', 'InviteController@invitesonly');

Route::get('cal/{calendar}/{uuid}/', 'EventsController@addToCalendar');

# End of frontend views