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
use Carbon\Carbon;
use Lang;
use Ramsey\Uuid\Uuid;
use App\Account;
use App\User;
use App\UserProfile;
use App\Role;
use GeoIP;
use Spatie\GoogleTagManager;

class EventsController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function index()
    {
        $events = Event::latest()->get();
        dd($events);
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
        $start_date = date('Y/m/d 19:00');
        $finish_date = date('Y/m/d 20:00');
        $timezone_select = self::getTimeZoneSelect();
        $ip = $_SERVER["REMOTE_ADDR"];
        $location = GeoIP::getLocation($ip);
        $pre_timezone = null;
        if($location['timezone']!=NULL || $location['timezone']!='') {
            $my_time_zone = $location['timezone'];
        }else if(isset($_COOKIE['time_zone'])) {
            $my_time_zone = $_COOKIE['time_zone'];
        }
        else if(session()->get('timezone')) {
            $my_time_zone = session()->get('timezone');
        }
        else{
            $my_time_zone = 'UTC';
        }

      Session::forget('timezone');

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

                return view('events.create', array(
                    'timezone_select' => $timezone_select,
                    'start_date' => $start_date,
                    'finish_date' => $finish_date,
                    'user_timezone' => $user_timezone,
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
      $user = User::find(5);
      $account= Account::find(4);
        $store_info = new Event();
        $store = $request->all();
        $store_info->uuid = Uuid::uuid4(4);
        $store_info->title = Input::get('title');
        $store_info->description = Input::get('description');
        $store_info->location = Input::get('location');
        $store_info->timezone = Input::get('timezone');
        $store_info->finish = Input::get('finish');
        $store_info->start = Input::get('start');

          $store_info->author_id = $user->id;
          $store_info->editor_id = $user->id;
          $store_info->account_id = $account->id;
          $store_info->permanent_url = Uuid::uuid4(4);
          $store_info->readable_url = Uuid::uuid4(4);

//      dd($store_info['author_id']);
    // for bootstrap-datepicker perform "08/10/2015 19:00" to "2015-10-08 19:00"
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

        return redirect('events')->with('success', Lang::get('message.success.create'));

    } else {

       event::create($store_info);
        Session::forget('timezone');
      return redirect('events')->with('success', Lang::get('message.success.create'));
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
//    else {
//      //show event for unregister user
//      return view('events.show', compact('event'));
//    }
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
    $event['timezone_select'] = self::getTimeZoneSelect($event['timezone']);
    // for bootstrap-datepicker
    $event['start'] = date('Y/m/d H:i', strtotime($event['start']));
    $event['finish'] = date('Y/m/d H:i', strtotime($event['finish']));
        $event['timezone'] =$event['timezone'];
    return view('events.edit', compact('event'));
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
      'description' => 'required|max:500',
      'type' => 'required',
      'location' => 'required|max:255',
      'url' => 'max:255',
      'timezone' => 'required',
      'start' => 'required',
      'finish' => 'required',
    ]);
    //$event = Event::findOrFail($uuid);
    $event = Event::whereUuid($uuid)->first();
    // for bootstrap-datepicker perform "08/10/2015 19:00" to "2015-10-08 19:00"
    $store_info = $request->all();
    $event['start'] = str_replace('/','-',$store_info['start']);
    $event['finish'] = str_replace('/','-',$store_info['finish']);
        $event['timezone'] =$event['timezone'];
    $event->update($request->all());

    // Is the user logged in?
    if (Sentinel::check()) {

        return redirect('events')->with('success', Lang::get('message.success.update'));

    } else {
      return redirect('events')->with('success', Lang::get('message.success.update'));
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
        '&details='.$event['description'].
        '&sprop=website:'.route('events.show',$uuid).
        '&location='.$event['location'].'&pli=1&uid=&sf=true&output=xml';
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
            $vCalendar = new \Eluceo\iCal\Component\Calendar('www.example.com');
            $vEvent = new \Eluceo\iCal\Component\Event();
            $vEvent
                ->setDtStart(new \DateTime($event_start_zero))
                ->setDtEnd(new \DateTime($event_finish_zero))
                ->setNoTime(true)
                ->setSummary('Christmas')
            ;
            $vCalendar->addComponent($vEvent);
            echo $vCalendar->render();
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
