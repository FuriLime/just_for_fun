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
use App\Event;
use DB;
use Hash;
use Cache;
use Response;
use Carbon\Carbon;

class SiteMap extends Controller {

    public function sitemap()
    {
        $events = Cache::remember('users', 50, function()
        {
            return DB::table('events')->get();
        });

        $content = View::make('sitemap', ['events' => $events]);
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }
}