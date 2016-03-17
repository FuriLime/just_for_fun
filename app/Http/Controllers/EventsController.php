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
use GeoIP;
use DB;

class EventsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $events = Event::latest()->get();
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

        Session::forget('timezone');
        Session::forget('start');
        Session::forget('finish');

        // Is the user logged in?
        if (Sentinel::check()) {
//      if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {
            // for bootstrap-datepicker
            //registered user
//                $start_date_tmp = strtotime("+1 day");
            if(Sentinel::getUser()->timezone){
                $user_timezone = Sentinel::getUser()->timezone;
            } else{
                $user_timezone = $my_time_zone;
            }
            $duration = strtotime($finish_date) - strtotime($start_date);
            if ($duration >= 3600 && $duration < 86400){
                $duration_time=floor($duration/3600);

            } else{
                $duration_time = 1;
            }
            return view('events.create', array(
                'timezone_select' => $timezone_select,
                'start_date' => $start_date,
                'finish_date' => $finish_date,
                'user_timezone' => $user_timezone,
                'duration' => $duration_time,
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
        if(isset($_POST['timezone'])) {
            session()->put('timezone', $_POST['timezone']);
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
        ]);
        if(Sentinel::check()){
            $userId = Sentinel::getUser()->id;
            $user = User::find($userId);
            $account= DB::table('account_user')->select('account_user.account_id')->where('account_user.user_id', '=', $userId)->get('account_id');
        }else {
            $user = new User();
            $user->email = Uuid::uuid4();
            $user->save();
            $userId = $user->id;
            $user = User::find($userId);
            $account_user = new Account();
            $account_user->	account_type_id = '1';
            $account_user->name = $user->uuid;
            $account_user->slug = $user->uuid;
            $account_user->save();

            //add user to 'User' group
            $role = Role::find(2);
            $rolew = [
                0 => ['account_id' => $account_user->id, 'user_id' => $user->id],
            ];

            $role->users()->attach($rolew);
            $account= DB::table('account_user')->select('account_user.account_id')->where('account_user.user_id', '=', $userId)->get('account_id');
        }
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
        $store_info->author_id = $user->id;
        $store_info->editor_id = $user->id;
        $store_info->account_id = $account[0]->account_id;
        $store_info->permanent_url = Uuid::uuid4();
        $store_info->readable_url = Uuid::uuid4();
        $store_info->test = Input::get('test');

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
//          dd($store_info);
//        event::create($store_info);
            $store_info->save();
            Session::forget('timezone');
            Session::forget('start');
            Session::forget('finish');

            return redirect('events')->with('success', Lang::get('message.success.create'));

        } else {
            $store_info->save();
            Session::forget('timezone');
            Session::forget('start');
            Session::forget('finish');
            return redirect('confirm');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $uuid
     * @return Response
     */
    public function show($uuid)
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
        $event = Event::whereUuid($uuid)->first();
        $date = new \DateTime($event['start'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($my_time_zone));
        $event_start_zero = $date;
        $date = new \DateTime($event['finish'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($my_time_zone));
        $event_finish_zero = $date;
        $event['period'] = date($event_start_zero->format('Y-m-d H:i')).' - '.date($event_finish_zero->format('Y-m-d H:i'));
        // Is the user logged in?
        if (Sentinel::check()) {
//      if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {
            //$event = Event::findOrFail($uuid);
            return view('events.show', compact('event'));
        }
//    }
//
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
    public function edit($uuid)
    {
        //$event = Event::findOrFail($id);
        $event = Event::whereUuid($uuid)->first();
        $date = new \DateTime($event['start'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event['timezone']));
        $event_start_zero = $date;
        $date = new \DateTime($event['finish'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event['timezone']));
        $event_finish_zero = $date;
        $event['timezone_select'] = self::getTimeZoneSelect($event['timezone']);
        // for bootstrap-datepicker
        $event['start'] = date($event_start_zero->format('Y-m-d H:i'));
        $event['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
//        $event['timezone'] =$event['timezone'];
        $event['duration'] = strtotime($event['finish']) - strtotime($event['start']);

        if ($event['duration'] >= 3600 && $event['duration'] < 86400){
            $event['duration_time']=floor($event['duration']/3600);

        }
        else if ($event['duration'] >= 86400 && $event['duration'] < 2592000) {
            // разница меньше месяца => ...дней назад
            $event['duration_day']=floor($event['duration']/86400);
            $event['duration_time']=floor($event['duration_day']%86400);

        }else{
            $event['duration_time'] = 1;
        }
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
        $this->validate($request, [
            'title' => 'required|max:80',
            'description' => 'max:500',
            'location' => 'max:255',
            'event_url' => 'max:255',
            'timezone' => 'required',
            'start' => 'required',
            'finish' => 'required',
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
        $event['test'] = Input::get('test');

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
    public function cloned($uuid)
    {
        //$event = Event::findOrFail($id);
        $event = Event::whereUuid($uuid)->first();
        $date = new \DateTime($event['start'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event['timezone']));
        $event_start_zero = $date;
        $date = new \DateTime($event['finish'], new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone($event['timezone']));
        $event_finish_zero = $date;
        $event['timezone_select'] = self::getTimeZoneSelect($event['timezone']);
        // for bootstrap-datepicker
        $event['start'] = date($event_start_zero->format('Y-m-d H:i'));
        $event['finish'] = date($event_finish_zero->format('Y-m-d H:i'));
//        $event['timezone'] =$event['timezone'];
        return view('events.clone', compact('event'));
    }


    public function clonne($uuid, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:80',
            'description' => 'max:500',
            'location' => 'max:255',
            'event_url' => 'max:255',
            'timezone' => 'required',
            'start' => 'required',
            'finish' => 'required',
        ]);
        //$event = Event::findOrFail($uuid);
        $event = Event::whereUuid($uuid)->first();
        // for bootstrap-datepicker perform "08/10/2015 19:00" to "2015-10-08 19:00"
        $store_info = $request->all();
        $eventold = Event::whereUuid($uuid)->first();

        $event = new Event();
        $event['title'] = $store_info['title'];
        if(Sentinel::check()){
            $userId = Sentinel::getUser()->id;
            $user = User::find($userId);
            $account= DB::table('account_user')->select('account_user.account_id')->where('account_user.user_id', '=', $userId)->get('account_id');
            $event['account_id'] = $account[0]->account_id;
            $event['author_id'] = $userId;
            $event['editor_id'] = $userId;
        }else {
            $event['account_id'] = $eventold['account_id'];
            $event['author_id'] = $eventold['author_id'];
            $event['editor_id'] = $eventold['editor_id'];
        }
        $event['permanent_url'] = Uuid::uuid4();
        $event['readable_url'] = Uuid::uuid4();
        $event['description'] = $store_info['description'];
        $event['location'] = $store_info['location'];
//        $event['event_url'] = $store_info['event_url'];
        $event['timezone'] = $store_info['timezone'];
        $event['Street'] = $store_info['Street'];
        $event['City'] = $store_info['City'];
        $event['State'] = $store_info['State'];
        $event['Country'] = $store_info['Country'];
//        $event['status'] = $store_info['status'];

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
        $event->save();

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
        switch ($calendar) {

            case 'Google':
                $timezone = '';
                $result = 'success';
                $calendar_link = 'https://www.google.com/calendar/render?action=TEMPLATE'.
                    '&text='.$event['title'].
                    '&dates='.$event_start_zero->format('Ymd').'T'.$event_start_zero->format('His').'Z/'.
                    $event_finish_zero->format('Ymd').'T'.$event_finish_zero->format('His').'Z'.
                    $timezone.
                    '&sprop=website:'.route('events.show',$uuid).
                    '&location='.$event['location'].'&pli=1&uid=&sf=true&output=xml'.
                    '&details='.$event['description'];
                break;

            case 'Yahoo':
                // https://docs.google.com/document/d/1scDk4WxGzDSGAF6OWiRkKwdQg9zD8kDReTH9cvTZnVo/edit
                $result = 'success';
                $calendar_link = 'https://calendar.yahoo.com/?v=60'.
                    '&TITLE='.$event['title'].
                    '&ST='.$event_start_zero->format('Ymd').'T'.$event_start_zero->format('His').'Z'.
                    // 'Z' does not work at End Time (Yahoo bug), using duration parameter
                    //'&ET='.$event_finish_zero->format('Ymd').'T'.$event_finish_zero->format('His').'Z'.
                    '&DUR='.$duration.
                    '&URL='.route('events.show',$uuid).
                    '&in_loc='.$event['location'].
                    '&DESC='.$event['description'];
                break;

            case 'Microsoft':
                $result = 'success';
                $calendar_link = 'https://calendar.live.com/calendar/calendar.aspx?rru=addevent&dtstart='.
                    $event_start_zero->format('Ymd').'T'.
                    $event_start_zero->format('His').'Z' .
                    '&dtend='. $event_finish_zero->format('Ymd').'T'.$event_finish_zero->format('His').'Z' .
                    '&summary='. $event['title'] .
                    '&location='. $event['location'] .
                    '&description='. $event['description'];
                break;

            case 'Outloock':
                $result = 'success_load';
                $calendar_link = '/assets/ical.php?name='. $event['title'] .
                    '&sd='. $event_start_zero->format('Ymd') .
                    '&st='. $event_start_zero->format('His') .
                    '&fd='. $event_finish_zero->format('Ymd') .
                    '&ft='. $event_finish_zero->format('His') .
                    '&loc='. $event['location'] .
                    '&desc='. $event['description'];
                break;

            case 'iCal':
                $result = 'success_load';
                $calendar_link = '/assets/ical.php?name='. $event['title'] .
                    '&sd='. $event_start_zero->format('Ymd') .
                    '&st='. $event_start_zero->format('His') .
                    '&fd='. $event_finish_zero->format('Ymd') .
                    '&ft='. $event_finish_zero->format('His') .
                    '&loc='. $event['location'] .
                    '&desc='. $event['description'];
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
