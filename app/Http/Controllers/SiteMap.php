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
use App\Events;
use DB;
use Hash;
use Carbon\Carbon;

class SiteMap extends Controller {

    public function sitemap()
    {
        $events = Events::remember(59) // chach this query for 59 minutes
        ->select(["id", "updated_at"])
            // you may want to add where clauses here according to your needs
            ->orderBy("id", "desc")
            ->take(50000) // each Sitemap file must have no more than 50,000 URLs and must be no larger than 10MB
            ->get();

        $content = View::make('sitemap', ['events' => $events]);
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }
}