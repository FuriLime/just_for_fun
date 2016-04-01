<?php namespace App\Http\Controllers;

use Sentinel;
use Session;
use Cookie;
use Eloquent;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Event;
use Illuminate\Http\Request;
use Response;
use Auth;
use Carbon\Carbon;
use Lang;
use Ramsey\Uuid\Uuid;
use App\Account;
use App\User;
use App\UserProfile;
use App\Role;
use App\AccountType;
use GeoIP;
use DB;
use OpenGraph;
use Twitter;
use SEOMeta;
use Share;
class EventsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $events = Event::latest()->get();
        SEOMeta::setTitle('Events');
        SEOMeta::setDescription('user`s events');
        SEOMeta::addKeyword(['event', 'show', 'timezone', 'time']);
        OpenGraph::setDescription('Show events');
        OpenGraph::setTitle('Events');
        OpenGraph::addProperty('type', 'articles');
        foreach ($events as $event) {
            $date = new \DateTime($event->start, new \DateTimeZone('UTC'));
            $date->setTimezone(new \DateTimeZone($event->timezone));
            $event_start_zero = $date;

            $date = new \DateTime($event->finish, new \DateTimeZone('UTC'));
            $date->setTimezone(new \DateTimeZone($event->timezone));
            $event_finish_zero = $date;

            $event->startt = date($event_start_zero->format('Y-m-d H:i'));
            $event->finisht = date($event_finish_zero->format('Y-m-d H:i'));
        }
        //if user logined
        if (Sentinel::check()) {
//            if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {

            return view('events.index', compact('events'));
//                }
        }
        else {
            //if not logined user
            return view('events.index', compact('events'));
        }
    }

    /*Confirm page*/
    public function confirm($readable_url)
    {
        $event = Event::whereReadable_url($readable_url)->first();

        return view('confirm', compact('event'));


    }

    /*End Confirm page*/

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if(session()->get('start')) {
            $start_date = session()->get('start');
        }else {
            $start_date = date('Y/m/d 19:00');
        }
        if(session()->get('finish')) {
            $finish_date = session()->get('finish');
        }else {
            $finish_date = date('Y/m/d 20:00');
        }


        $timezone_select = self::getTimeZoneSelect();
        $ip = $_SERVER["REMOTE_ADDR"];
        $location = GeoIP::getLocation($ip);
        $pre_timezone = null;
        if($location['timezone']!=NULL || $location['timezone']!='') {
            $my_time_zone = $location['timezone'];
        }else if(isset($_COOKIE['time_zone'])) {
            $my_time_zone = $_COOKIE['time_zone'];
        }
        else{
            $my_time_zone = 'UTC';
        }

        if(session()->get('timezone')) {
            $my_time_zone = session()->get('timezone');
        }
        SEOMeta::setTitle('Create event');
        SEOMeta::setDescription('Create your event');
        SEOMeta::addMeta('article:country', $location['country'], 'property');
        SEOMeta::addMeta('article:city', $location['city'], 'property');
        SEOMeta::addMeta('article:continent', $location['continent'], 'property');
        SEOMeta::addMeta('article:timezone', $my_time_zone, 'property');
//        SEOMeta::addMeta('article:slug', $timezone_select, 'property');
        SEOMeta::addKeyword(['event', 'create', 'timezone']);

        OpenGraph::setDescription('Create your event');
        OpenGraph::setTitle('Create event');
        OpenGraph::setUrl($request->path());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');
        $duration = strtotime($finish_date) - strtotime($start_date);
        //hours
        if ($duration>= 3600 && $duration < 86400){
            if(($duration% 3600) == 0){
                $duration_day= 0 .'d';
                $duration_hour=( $duration / 3600 ) % 24 .'h';
                $duration_min=0 .'m';
            }else {
                $duration_day= 0 .'d';
                $duration_hour=( $duration / 3600 ) % 24 .'h';
                $duration_min=( $duration/ 60 ) % 60 .'m';
            }

        }
        //days
        else if ($duration >= 86400) {
            if($duration%86400==0){
                $duration_day= ($duration / 86400 ) % 30 .'d';
                $duration_hour=0 .'h';
                $duration_min=0 .'m';
            }else {
                $duration_day=($duration / 86400 ) % 30 .'d';
                $duration_hour=( $duration / 3600 ) % 24 .'h';
                $duration_min=( $duration/ 60 ) % 60 .'m';
            }


        }else{
            $duration_day= 0 .'d';
            $duration_hour=0 .'h';
            $duration_min=0 .'m';
        }

        Session::forget('timezone');
        Session::forget('start');
        Session::forget('finish');

        // Is the user logged in?
        if (Sentinel::check()) {
            if(Sentinel::getUser()->timezone){
                $user_timezone = Sentinel::getUser()->timezone;
            } else{
                $user_timezone = $my_time_zone;
            }
                 return view('events.create', array(
                'timezone_select' => $timezone_select,
                'start_date' => $start_date,
                'finish_date' => $finish_date,
                'user_timezone' => $user_timezone,
                'duration_min' => $duration_min,
                'duration_hour' => $duration_hour,
                'duration_day' => $duration_day,
            ));
//      }
        } else {
            //create events unregister user
//      $start_date_tmp = strtotime("+1 hour");
            $user_timezone = $my_time_zone;

            return view('events.create', array(
                'timezone_select' => $timezone_select,
                'start_date' => $start_date,
                'finish_date' => $finish_date,
                'user_timezone' => $user_timezone,
                'duration_min' => $duration_min,
                'duration_hour' => $duration_hour,
                'duration_day' => $duration_day,
            ));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(isset($_POST['timezone'])) {
            session()->put('timezone', $_POST['timezone']);
        }
        if(isset($_POST['start'])) {
            session()->put('start', $_POST['start']);
        }
        if(isset($_POST['finish'])) {
            session()->put('finish', $_POST['finish']);
        }

        $this->validate($request, [
            'title' => 'required|max:80',
            'description' => 'max:500',
            // 'type' => 'required',
            'location' => 'max:255',
            'url' => 'max:255',
            'timezone' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'my_title'   => 'honeypot',
            'my_time'   => 'required|honeytime:5',
        ]);
        $store_info = new Event();
        $store_info->uuid = Uuid::uuid4(4);
        $store_info->title = Input::get('title');
        $store_info->description = Input::get('description');
        $store_info->location = Input::get('location');
        $store_info->country = Input::get('Country');
        $store_info->state = Input::get('State');
        $store_info->city = Input::get('City');
        $store_info->street = Input::get('Street');
        $store_info->timezone = Input::get('timezone');
        $store_info->finish = Input::get('finish');
        $store_info->start = Input::get('start');
        $store_info->lat = Input::get('lat');
        $store_info->lng = Input::get('lng');

        if(Sentinel::check()){
            $userId = Sentinel::getUser()->id;
            $user = User::find($userId);
            $account= DB::table('account_user')->select('account_user.account_id')->where('account_user.user_id', '=', $userId)->get('account_id');
            $store_info->author_id = $user->id;
            $store_info->editor_id = $user->id;
            $store_info->account_id = $account[0]->account_id;
        }else{
            $store_info->author_id = NULL;
            $store_info->editor_id = NULL;
            $store_info->account_id = NULL;
        }
        $store_info->permanent_url = Uuid::uuid4();
        $store_info->event_url = url().'/events/'. $store_info->readable_url;
        $store_info->status = Input::get('active');

        if(Sentinel::check()) {
            $store_info->test = Input::get('test');
        }
        else{
            $store_info->test = "1";
        }

        $date = new \DateTime($store_info->start, new \DateTimeZone($store_info->timezone));
        $date->setTimezone(new \DateTimeZone('UTC'));
        $event_start_zero = $date;
        $date = new \DateTime($store_info->finish, new \DateTimeZone($store_info->timezone));
        $date->setTimezone(new \DateTimeZone('UTC'));
        $event_finish_zero = $date;

        // $event['period'] = date($event_start_zero->format('Y-m-d H:i')).' - '.date($event_finish_zero->format('Y-m-d H:i'));
        $store_info->start = $event_start_zero->format('Y-m-d H:i');
        $store_info->finish = $event_finish_zero->format('Y-m-d H:i');

        // Is the user logged in?
        if (Sentinel::check()) {
            $store_info->save();
            Session::forget('timezone');
            Session::forget('start');
            Session::forget('finish');
            $store_info->event_url = url().'/events/'. $store_info->readable_url;
            $store_info->update();

            return redirect('confirm/'.$store_info->readable_url);
        } else {
            $store_info->save();
            Session::forget('timezone');
            Session::forget('start');
            Session::forget('finish');
            $store_info->event_url = url().'/events/'. $store_info->readable_url;
            $store_info->update();
            return redirect('confirm/'.$store_info->readable_url);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function show($readable_url)
    {

        $ip = $_SERVER["REMOTE_ADDR"];
        $location = GeoIP::getLocation($ip);
        if($location['timezone']!=NULL || $location['timezone']!='') {
            $my_time_zone = $location['timezone'];
        }else if(isset($_COOKIE['time_zone'])) {
            $my_time_zone = $_COOKIE['time_zone'];
        }
        else{
            $my_time_zone = 'UTC';
        }

        $event = Event::whereReadable_url($readable_url)->first();
        SEOMeta::setTitle($event->title);
        SEOMeta::setDescription($event->description);
        SEOMeta::addMeta('article:start', $event->start, 'property');
        SEOMeta::addMeta('article:finish', $event->finish, 'property');
        SEOMeta::addMeta('article:stutus', $event->status, 'property');
        SEOMeta::addMeta('article:location', $event->location, 'property');
        SEOMeta::addMeta('article:timezone', $event->timezone, 'property');
        SEOMeta::addMeta('article:slug', $event->readable_url, 'property');
        SEOMeta::addKeyword(['event', $event->title, $event->status]);

        OpenGraph::setTitle($event->title);
        OpenGraph::setDescription($event->description);
        OpenGraph::setUrl(url().'/events/'. $event->readable_url);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        $date = new \DateTime($event['start'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($my_time_zone));
        $event_start_zero = $date;
        $date = new \DateTime($event['finish'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($my_time_zone));
        $event_finish_zero = $date;
        $event['period'] = date($event_start_zero->format('Y-m-d H:i')).' - '.date($event_finish_zero->format('Y-m-d H:i'));

        $event['user_time_zone'] = $my_time_zone;
        $event['start_time_user'] = date($event_start_zero->format('H:i'));
        $event['finish_time_user'] = date($event_finish_zero->format('H:i'));


        $dateEvent = new \DateTime($event->start, new \DateTimeZone('UTC'));
        $dateEvent->setTimezone(new \DateTimeZone($event->timezone));
        $event_start_event = $dateEvent;
        $dateEvent = new \DateTime($event->finish, new \DateTimeZone('UTC'));
        $dateEvent->setTimezone(new \DateTimeZone($event->timezone));
        $event_finish_event = $dateEvent;

        $event['start_time_event'] = date($event_start_event->format('H:i'));
        $event['finish_time_event'] = date($event_finish_event->format('H:i'));

        $event['timezone_select'] = self::getTimeZoneSelect($event['timezone']);

        //share to social networks
        $event['facebook']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->facebook();
        $event['twitter']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->twitter();
        $event['gplus']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->gplus();
        $event['linkedin']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->linkedin();


        $event['email']=Share::load(url().'/events/'. $event->readable_url, $event->title)->email();
        $event['gmail']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->gmail();


        $event['tumblr']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->tumblr();
        $event['digg']=Share::load(url().'/events/'. $event->readable_url, $event->title."\r\n".$event->description."\r\n")->digg();


        $event['evernote']=Share::load(url().'/events/'. $event->readable_url, $event->title)->evernote();


                // Is the user logged in?
        if (Sentinel::check()) {
//      if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {
            //$event = Event::findOrFail($uuid);
            return view('events.show', compact('event'));
        }
        else {
            //show event for unregister user
            return view('events.show', compact('event'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function edit($readable_url)
    {
        if(session()->get('start')) {
            $event['start'] = session()->get('start');
        }
        if(session()->get('finish')) {
            $event['finish'] = session()->get('finish');
        }
        if(session()->get('timezone')) {
            $event['timezone'] = session()->get('timezone');
        }
        //$event = Event::findOrFail($id);
        $event = Event::whereReadable_url($readable_url)->first();
        SEOMeta::setDescription($event->description);
        SEOMeta::addMeta('article:start', $event->start, 'property');
        SEOMeta::addMeta('article:finish', $event->finish, 'property');
        SEOMeta::addMeta('article:stutus', $event->status, 'property');
        SEOMeta::addMeta('article:location', $event->location, 'property');
        SEOMeta::addMeta('article:timezone', $event->timezone, 'property');
        SEOMeta::addMeta('article:slug', $event->readable_url, 'property');
        SEOMeta::addKeyword(['event', $event->title, $event->status]);

        OpenGraph::setDescription($event->resume);
        OpenGraph::setTitle($event->title);
        OpenGraph::setUrl(url().'/events/'. $event->readable_url);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        $date = new \DateTime($event['start'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event['timezone']));
        $event_start_zero = $date;
        $date = new \DateTime($event['finish'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event['timezone']));
        $event_finish_zero = $date;
        $event['timezone_select'] = self::getTimeZoneSelect($event['timezone']);
        // for bootstrap-datepicker

        if(session()->get('start')) {
            $event['start'] = session()->get('start');
        }else {
            $event['start'] = date($event_start_zero->format('Y-m-d H:i'));
        }
        if(session()->get('start')) {
            $event['finish'] = session()->get('finish');
        }else {
            $event['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
        }

        if(session()->get('timezone')) {
            $event['timezone'] = session()->get('timezone');
        }else {
            $event['timezone'] = $event['timezone'];
        }
        $event['duration'] = strtotime($event['finish']) - strtotime($event['start']);
//minutes
        if ($event['duration']< 3600 ) {
            if (($event['duration'] % 3600) == 0) {
                $event['duration_day'] = 0 . 'd';
                $event['duration_hour'] = 0 . 'h';
                $event['duration_min'] = ($event['duration'] / 3600) % 60 . 'm';
            } else {
                $event['duration_day'] = 0 . 'd';
                $event['duration_hour'] = 0 . 'h';
                $event['duration_min'] = ($event['duration'] / 60) % 60 . 'm';
            }
        }
        //hours
        elseif ($event['duration']>= 3600 && $event['duration'] < 86400) {
            if (($event['duration'] % 3600) == 0) {
                $event['duration_day'] = 0 . 'd';
                $event['duration_hour'] = ($event['duration'] / 3600) % 24 . 'h';
                $event['duration_min'] = 0 . 'm';
            }else {
                $event['duration_day'] = 0 . 'd';
                $event['duration_hour'] = ($event['duration'] / 3600) % 24 . 'h';
                $event['duration_min'] = ($event['duration'] / 60) % 60 . 'm';
            }
            //days
            }else if ($event['duration'] >= 86400) {
                if($event['duration']%86400==0){
                    $event['duration_day']= ($event['duration'] / 86400 ) % 30 .'d';
                    $event['duration_hour']=0 .'h';
                    $event['duration_min']=0 .'m';
                }else {
                    $event['duration_day']=($event['duration'] / 86400 ) % 30 .'d';
                    $event['duration_hour']=( $event['duration'] / 3600 ) % 24 .'h';
                    $event['duration_min']=( $event['duration']/ 60 ) % 60 .'m';
                }
            }else{
            $event['duration_day']= 0 .'d';
            $event['duration_hour']=0 .'h';
            $event['duration_min']=0 .'m';
            }
        Session::forget('start');
        Session::forget('finish');
        Session::forget('timezone');
        return view('events.create', compact('event'));
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function update($uuid, Request $request)
    {
        if(isset($_POST['timezone'])) {
            session()->put('timezone', $_POST['timezone']);
        }
        if(isset($_POST['start'])) {
            session()->put('start', $_POST['start']);
        }
        if(isset($_POST['finish'])) {
            session()->put('finish', $_POST['finish']);
        }
        if(isset($_POST['timezone'])) {
            session()->put('timezone', $_POST['timezone']);
        }

        $this->validate($request, [
            'title' => 'required|max:80',
            'description' => 'max:500',
            'location' => 'max:255',
            'event_url' => 'max:255',
            'timezone' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'my_title'   => 'honeypot',
            'my_time'   => 'required|honeytime:5',
        ]);
        //$event = Event::findOrFail($uuid);
        // for bootstrap-datepicker perform "08/10/2015 19:00" to "2015-10-08 19:00"
        $store_info = $request->all();
        $event = Event::whereUuid($uuid)->first();
        $event['title'] = $store_info['title'];
        $event['description'] = $store_info['description'];
        $event['location'] = $store_info['location'];
        $event['timezone'] = $store_info['timezone'];
        $event['Street'] = $store_info['Street'];
        $event['City'] = $store_info['City'];
        $event['State'] = $store_info['State'];
        $event['Country'] = $store_info['Country'];
        $event['lat'] = $store_info['lat'];
        $event['lng'] = $store_info['lng'];
        if(Sentinel::check()) {
            $event['test'] = Input::get('test');
        }else{$event['test'] = "1"; }

        $event['status'] = Input::get('active');


        $date = new \DateTime($store_info['start'], new \DateTimeZone($event['timezone']));
        $date->setTimezone(new \DateTimeZone('UTC'));
        $event_start_zero = $date;

        $date = new \DateTime($store_info['finish'], new \DateTimeZone($event['timezone']));
        $date->setTimezone(new \DateTimeZone('UTC'));
        $event_finish_zero = $date;

        // for bootstrap-datepicker
        $event['start'] = date($event_start_zero->format('Y-m-d H:i'));
        $event['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
//        $event['timezone'] =$event['timezone'];
        $event->update();

        // Is the user logged in?
        if (Sentinel::check()) {

            return redirect('events')->with('success', Lang::get('message.success.update'));

        } else {
            return redirect('events')->with('success', Lang::get('message.success.update'));
        }
    }
    public function cloned($readable_url)
    {

        if(session()->get('start')) {
            $event_clone['start'] = session()->get('start');
        }
        if(session()->get('finish')) {
            $event_clone['finish'] = session()->get('finish');
        }
        if(session()->get('timezone')) {
            $event_clone['timezone'] = session()->get('timezone');
        }
        //$event = Event::findOrFail($id);
        $event_clone = Event::whereReadable_url($readable_url)->first();

        SEOMeta::setTitle($event_clone->title);
        SEOMeta::setDescription($event_clone->description);
        SEOMeta::addMeta('article:start', $event_clone->start, 'property');
        SEOMeta::addMeta('article:finish', $event_clone->finish, 'property');
        SEOMeta::addMeta('article:stutus', $event_clone->status, 'property');
        SEOMeta::addMeta('article:location', $event_clone->location, 'property');
        SEOMeta::addMeta('article:timezone', $event_clone->timezone, 'property');
        SEOMeta::addMeta('article:slug', $event_clone->readable_url, 'property');
        SEOMeta::addKeyword(['event', $event_clone->title, $event_clone->status]);

        OpenGraph::setDescription($event_clone->resume);
        OpenGraph::setTitle($event_clone->title);
        OpenGraph::setUrl(url().'/events/'. $event_clone->readable_url);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-us');

        $date = new \DateTime($event_clone['start'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event_clone['timezone']));
        $event_start_zero = $date;
        $date = new \DateTime($event_clone['finish'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event_clone['timezone']));
        $event_finish_zero = $date;
        $event_clone['timezone_select'] = self::getTimeZoneSelect($event_clone['timezone']);
        // for bootstrap-datepicker
        $event_clone['start'] = date($event_start_zero->format('Y-m-d H:i'));
        $event_clone['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
//        $event['timezone'] =$event['timezone'];


        if(session()->get('start')) {
            $event_clone['start'] = session()->get('start');
        }else {
            $event_clone['start'] = date($event_start_zero->format('Y-m-d H:i'));
        }
        if(session()->get('start')) {
            $event_clone['finish'] = session()->get('finish');
        }else {
            $event_clone['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
        }

        if(session()->get('timezone')) {
            $event_clone['timezone'] = session()->get('timezone');
        }else {
            $event_clone['timezone'] = $event_clone['timezone'];
        }
        $event_clone['duration'] = strtotime($event_clone['finish']) - strtotime($event_clone['start']);
        //minutes
        if ($event_clone['duration']< 3600 ) {
            if (($event_clone['duration'] % 3600) == 0) {
                $event_clone['duration_day'] = 0 . 'd';
                $event_clone['duration_hour'] = 0 . 'h';
                $event_clone['duration_min'] = ($event_clone['duration'] / 3600) % 60 . 'm';
            } else {
                $event_clone['duration_day'] = 0 . 'd';
                $event_clone['duration_hour'] = 0 . 'h';
                $event_clone['duration_min'] = ($event_clone['duration'] / 60) % 60 . 'm';
            }
        }
        //hours
        elseif ($event_clone['duration']>= 3600 && $event_clone['duration'] < 86400) {
            if (($event_clone['duration'] % 3600) == 0) {
                $event_clone['duration_day'] = 0 . 'd';
                $event_clone['duration_hour'] = ($event_clone['duration'] / 3600) % 24 . 'h';
                $event_clone['duration_min'] = 0 . 'm';
            }else {
                $event_clone['duration_day'] = 0 . 'd';
                $event_clone['duration_hour'] = ($event_clone['duration'] / 3600) % 24 . 'h';
                $event_clone['duration_min'] = ($event_clone['duration'] / 60) % 60 . 'm';
            }
            //days
        }else if ($event_clone['duration'] >= 86400) {
            if($event_clone['duration']%86400==0){
                $event_clone['duration_day']= ($event_clone['duration'] / 86400 ) % 30 .'d';
                $event_clone['duration_hour']=0 .'h';
                $event_clone['duration_min']=0 .'m';
            }else {
                $event_clone['duration_day']=($event_clone['duration'] / 86400 ) % 30 .'d';
                $event_clone['duration_hour']=( $event_clone['duration'] / 3600 ) % 24 .'h';
                $event_clone['duration_min']=( $event_clone['duration']/ 60 ) % 60 .'m';
            }
        }else{
            $event_clone['duration_day']= 0 .'d';
            $event_clone['duration_hour']=0 .'h';
            $event_clone['duration_min']=0 .'m';
        }

        Session::forget('start');
        Session::forget('finish');
        Session::forget('timezone');

        return view('events.create', compact('event_clone'));
    }


    public function clonne(Request $request)
    {
        if(isset($_POST['timezone'])) {
            session()->put('timezone', $_POST['timezone']);
        }
        if(isset($_POST['start'])) {
            session()->put('start', $_POST['start']);
        }
        if(isset($_POST['finish'])) {
            session()->put('finish', $_POST['finish']);
        }
        if(isset($_POST['timezone'])) {
            session()->put('timezone', $_POST['timezone']);
        }
        $this->validate($request, [
            'title' => 'required|max:80',
            'description' => 'max:500',
            'location' => 'max:255',
            'location' => 'max:255',
            'event_url' => 'max:255',
            'timezone' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'my_title'   => 'honeypot',
            'my_time'   => 'required|honeytime:5',
        ]);
        //$event = Event::findOrFail($uuid);
        // for bootstrap-datepicker perform "08/10/2015 19:00" to "2015-10-08 19:00"
        $store_info = $request->all();
        $event_clone = new Event();
        $event_clone['title'] = $store_info['title'];
        if(Sentinel::check()){
            $userId = Sentinel::getUser()->id;
            $account= DB::table('account_user')->select('account_user.account_id')->where('account_user.user_id', '=', $userId)->get('account_id');
            $event_clone['account_id'] = $account[0]->account_id;
            $event_clone['author_id'] = $userId;
            $event_clone['editor_id'] = $userId;
        }else {
            $event_clone['account_id'] = NULL;
            $event_clone['author_id'] = NULL;
            $event_clone['editor_id'] = NULL;
        }
        $event_clone['permanent_url'] = Uuid::uuid4();
        $event_clone['description'] = $store_info['description'];
        $event_clone['location'] = $store_info['location'];
        $event_clone['timezone'] = $store_info['timezone'];
        $event_clone['Street'] = $store_info['Street'];
        $event_clone['City'] = $store_info['City'];
        $event_clone['State'] = $store_info['State'];
        $event_clone['Country'] = $store_info['Country'];
        $event_clone['lng'] = $store_info['lng'];
        $event_clone['lat'] = $store_info['lat'];
        if(Sentinel::check()) {
            $event_clone['test'] = Input::get('test');
        }else{$event_clone['test'] = "1"; }

        $event_clone['status'] = Input::get('active');

        $date = new \DateTime($store_info['start'], new \DateTimeZone($event_clone['timezone']));
        $date->setTimezone(new \DateTimeZone('UTC'));
        $event_start_zero = $date;

        $date = new \DateTime($store_info['finish'], new \DateTimeZone($event_clone['timezone']));
        $date->setTimezone(new \DateTimeZone('UTC'));
        $event_finish_zero = $date;

        // for bootstrap-datepicker
        $event_clone['start'] = date($event_start_zero->format('Y-m-d H:i'));
        $event_clone['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
//        $event['timezone'] =$event['timezone'];

        $event_clone->save();

        // Is the user logged in?
        if (Sentinel::check()) {

            return redirect('events')->with('success', Lang::get('message.success.clone'));

        } else {
            return redirect('events')->with('success', Lang::get('message.success.clone'));
        }
    }
    /**
     * Delete confirmation for the given Event.
     *
     * @param  int      $uuid
     * @return View
     */
    public function getModalDelete($uuid = null)
    {
        $error = '';
        $model = '';

        // Is the user logged in?
        if (Sentinel::check()) {
//      if (Sentinel::inRole('admin')) {
//        $confirm_route =  route('admin.events.delete',['uuid'=>$uuid]);
//        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));
//      } else {
            $confirm_route =  route('events.delete',['uuid'=>$uuid]);
            return View('layouts/modal_confirmation', compact('error','model', 'confirm_route'));
//      }
        } else {
            $confirm_route =  route('events.delete',['uuid'=>$uuid]);
            return View('layouts/modal_confirmation', compact('error','model', 'confirm_route'));
        }
    }

    /**
     * Delete the given Event.
     *
     * @param  int      $uuid
     * @return Redirect
     */
    public function getDelete($uuid = null)
    {
        $event = Event::whereUuid($uuid)->first();
        $delete = Event::destroy( $event['id'] );
        // Is the user logged in?
        if (Sentinel::check()) {
//      if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {
            return redirect('events')->with('success', Lang::get('message.success.delete'));
//      }
        } else {
            return redirect('events')->with('success', Lang::get('message.success.delete'));
        }

    }

    /**
     * Add to calendar handler.
     *
     * @param  char36 $uuid, string $calendar
     * @return Url
     */
    public function addToCalendar(Request $request)
    {



        $info = $request->all();

        $uuid = $info['uuid'];
        $calendar = $info['calendar'];

        $event = Event::whereUuid($uuid)->first();


        // perform events time to 00.00 timezone
        $date = new \DateTime($event['start'], new \DateTimeZone($event['timezone']));
        $date->setTimezone(new \DateTimeZone($event->timezone));
        $event_start_zero = $date;
        if($event->author_id!=NULL) {
            $author_event = DB::table('users')->where('id', '=', $event->author_id)->first();
            if($author_event->twit_nick!=NULL){
                $user_twit = $author_event->twit_nick;
                $text_twit = "Twitter Handle: ".$user_twit;
            }
            else{
                $text_twit = "";
            }

        }else {
            $text_twit = "";
        }

        $date = new \DateTime($event['finish'], new \DateTimeZone($event['timezone']));
        $date->setTimezone(new \DateTimeZone($event->timezone));
        $event_finish_zero = $date;

        $difference = strtotime($event['finish']) - strtotime($event['start']);
        $minuteDifference = (int) ($difference / 60);
        $hourDifference = (int) ($minuteDifference / 60);
        $minutesLeft = $minuteDifference - $hourDifference * 60;

        if ($hourDifference > 99) { $duration = '9900'; }
        else {
            if ($hourDifference < 10) { $hourDifference = '0'.$hourDifference; }
            if ($minutesLeft < 10) { $minutesLeft = '0'.$minutesLeft; }
            $duration = $hourDifference.$minutesLeft;
        }
        $result = $error_massage = $calendar_link = '';
        $dec_title = "This calendar entry has been created with a Free Personal Account from EventFellows";
        $dec_footer = "Powered by EventFellows - start creating calendar entries for your own event now. https://eventfellows.com/referrer/{$event->uuid} ";
        $link_event = "Link to the EventPage:\r\n".$event->event_url;
        $loc = urlencode($event['location']);
        $title = urlencode($event['title']);

        $desc = urlencode($dec_title."\r\n")."-------------------------------------------------------------------------------------------------------".
            urlencode("\r\n".$event['title']."\r\n".$event['description']."\r\n". $text_twit ."\r\n". $link_event."\r\n".
                "-------------------------------------------------------------------------------------------------------\r\n". $dec_footer);


        $event_ical_desc = urlencode($event['description']);

        $desc_ical = $dec_title.'\r\n'.
        "-------------------------------------------------------------------------------------------------------". '\r\n'.
        $title.'\r\n'.
        $event['description'].'\r\n'.
        $text_twit .'\r\n'.
        $link_event.'\r\n'.
        "-------------------------------------------------------------------------------------------------------".'\r\n'.
        $dec_footer;

        switch ($calendar) {

            case 'Google':
                $timezone = '';
                $result = 'success';
                $calendar_link = 'https://www.google.com/calendar/render?action=TEMPLATE'.
                    '&text='.$title.
                    '&dates='.$event_start_zero->format('Ymd').'T'.$event_start_zero->format('His').'Z/'.
                    $event_finish_zero->format('Ymd').'T'.$event_finish_zero->format('His').'Z'.
                    $timezone.
                    '&sprop=website:'.route('events.show',$uuid).
                    '&location='.$loc.'&pli=1&uid=&sf=true&output=xml'.
                    '&details='.$desc;
                break;

            case 'Yahoo':
                // https://docs.google.com/document/d/1scDk4WxGzDSGAF6OWiRkKwdQg9zD8kDReTH9cvTZnVo/edit

                $result = 'success';
                $calendar_link = 'https://calendar.yahoo.com/?v=60'.
                    '&TITLE='.$title.
                    '&ST='.$event_start_zero->format('Ymd').'T'.$event_start_zero->format('His').'Z'.
                    // 'Z' does not work at End Time (Yahoo bug), using duration parameter
                    //'&ET='.$event_finish_zero->format('Ymd').'T'.$event_finish_zero->format('His').'Z'.
                    '&DUR='.$duration.
                    '&URL='.route('events.show',$uuid).
                    '&in_loc='.$loc.
                    '&DESC='.$desc;
                break;

            case 'Microsoft':

                $result = 'success';
                $calendar_link = 'https://calendar.live.com/calendar/calendar.aspx?rru=addevent&dtstart='.
                    $event_start_zero->format('Ymd').'T'.
                    $event_start_zero->format('His').'Z' .
                    '&dtend='. $event_finish_zero->format('Ymd').'T'.$event_finish_zero->format('His').'Z' .
                    '&summary='. $title .
                    '&location='. $loc .
                    '&description='. $desc;
                break;

            case 'Outloock':
                $result = 'success_load';
                $calendar_link = '/assets/ical.php?name='. $title .
                    '&sd='. $event_start_zero->format('Ymd') .
                    '&st='. $event_start_zero->format('His') .
                    '&fd='. $event_finish_zero->format('Ymd') .
                    '&ft='. $event_finish_zero->format('His') .
                    '&loc='. $event['location'] .
                    '&desc='. $desc_ical;
                break;

            case 'iCal':
                $result = 'success_load';
                $calendar_link = '/assets/ical.php?name='. $title .
                    '&sd='. $event_start_zero->format('Ymd') .
                    '&st='. $event_start_zero->format('His') .
                    '&fd='. $event_finish_zero->format('Ymd') .
                    '&ft='. $event_finish_zero->format('His') .
                    '&loc='. $event['location'] .
                    '&desc='. $desc_ical;
                break;

            default:
                $result = 'error';
                $error_massage = 'Not supported for now';
                break;
        }

        echo json_encode(array(
            'result' => $result,
            'calendar_link' => $calendar_link,
            'error_massage' => $error_massage,
        ));
        exit(0);
    }

    /**
     * Timezone select - generator.
     *
     */

    public static function getTimeZoneSelect()
    {
        $regions = array(
            'Africa' => \DateTimeZone::AFRICA,
            'America' => \DateTimeZone::AMERICA,
            'Antarctica' => \DateTimeZone::ANTARCTICA,
            'Aisa' => \DateTimeZone::ASIA,
            'Atlantic' => \DateTimeZone::ATLANTIC,
            'Europe' => \DateTimeZone::EUROPE,
            'Indian' => \DateTimeZone::INDIAN,
            'Pacific' => \DateTimeZone::PACIFIC,
            'Australia' => \DateTimeZone::AUSTRALIA,
            'Arctic' => \DateTimeZone::ARCTIC
        );

        // save current timezone (DST-detect change it below)
        $current_timezone = date_default_timezone_get();

        $ip = $_SERVER["REMOTE_ADDR"];
        $location = GeoIP::getLocation($ip);
        if($location['timezone']!=NULL || $location['timezone']!='') {
            $user_time_zone = $location['timezone'];
        }else if(isset($_COOKIE['time_zone'])) {
            $user_time_zone = $_COOKIE['time_zone'];
        }
        else{
            $user_time_zone = 'UTC';
        }

        if(Sentinel::check()) {
            if (Sentinel::getUser()->timezone) {
                $my_time_zone = Sentinel::getUser()->timezone;
            }
            else {
                $my_time_zone = $user_time_zone;
            }
        }
        else {
            $my_time_zone = $user_time_zone;
        }

        if(session()->get('timezone')) {
            $my_time_zone = session()->get('timezone');
        }

        $structure = '<select class="form-control timezone" name="timezone" id="timezone">';
        $structure .= '<option value="">'.$my_time_zone.'</option>';

        foreach ($regions as $mask) {
            $zones = \DateTimeZone::listIdentifiers($mask);
            $zones = self::prepareZones($zones);

            foreach ($zones as $zone) {
                $continent = $zone['continent'];
                $city = $zone['city'];
                $subcity = $zone['subcity'];
                $p = $zone['p'];
                $timeZone = $zone['time_zone'];

                if (!isset($selectContinent)) {
                    $structure .= '<optgroup label="'.$continent.'">';
                }
                elseif ($selectContinent != $continent) {
                    $structure .= '</optgroup><optgroup label="'.$continent.'">';
                }

                if ($city) {
                    if ($subcity) {
                        $city = $city . '/'. $subcity;
                    }

                    $utc_offset = (float) $p;
                    $utc_offset = $utc_offset * 60;

                    // country code
                    $location['country_code']  = '';
                    //$tz = new \DateTimeZone($timeZone);
                    //$location = $tz->getLocation();

                    // DST
                    date_default_timezone_set($timeZone);
//          $dst = date('I'); // this will be 1 in DST or else 0

//                     $structure .= "<option data-countrycode='".$location['country_code']."' data-offset='".$utc_offset."' ".(($timeZone == $selectedZone) ? 'selected="selected "':'') . " value=\"".($timeZone)."\">(".$p. " UTC) " .str_replace('_',' ',$city)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( ".$timeZone." | DST ".$dst.")</option>";
                    $structure .= "<option data-countrycode='".$location['country_code']."' data-offset='".$utc_offset."' ".(($timeZone == $my_time_zone) ? 'selected="selected "':'') . " value=\"".($timeZone)."\">".$timeZone."</option>";
                }

                $selectContinent = $continent;
            }
        }

        $structure .= '</optgroup></select>';

        // restore current timezone
        date_default_timezone_set($current_timezone);
        /*
            if(session()->get('timezone')) {
              date_default_timezone_set(session()->get('timezone'));
            }*/

        return $structure;
    }

    private static function prepareZones(array $timeZones)
    {
        $list = array();
        foreach ($timeZones as $zone) {
            $time = new \DateTime(NULL, new \DateTimeZone($zone));
            $p = $time->format('P');
            if ($p > 13) {
                continue;
            }
            $parts = explode('/', $zone);

            $list[$time->format('P')][] = array(
                'time_zone' => $zone,
                'continent' => isset($parts[0]) ? $parts[0] : '',
                'city' => isset($parts[1]) ? $parts[1] : '',
                'subcity' => isset($parts[2]) ? $parts[2] : '',
                'p' => $p,
            );
        }

        ksort($list, SORT_NUMERIC);

        $zones = array();
        foreach ($list as $grouped) {
            $zones = array_merge($zones, $grouped);
        }

        return $zones;
    }

}
