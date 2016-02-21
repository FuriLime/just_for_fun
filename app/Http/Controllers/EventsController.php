<?php namespace App\Http\Controllers;

use Sentinel;
use Session;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Event;
use Request;
use Carbon\Carbon;
use Lang;
use Uuid;
use App\User;
use GeoIP;

class EventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {
                $events = Event::latest()->get();
                foreach ($events as $event) {
                    if (Sentinel::getUser()->timezone) {
                        $my_time_zone = Sentinel::getUser()->timezone;
                    } else {
                        $my_time_zone = 'Asia/Tokyo';
                    }
                    $date = new \DateTime($event->start, new \DateTimeZone('UTC'));
                    $date->setTimezone(new \DateTimeZone($my_time_zone));
                    $event_start_zero = $date;

                    $date = new \DateTime($event->finish, new \DateTimeZone('UTC'));
                    $date->setTimezone(new \DateTimeZone($my_time_zone));
                    $event_finish_zero = $date;

                    $event->startt = date($event_start_zero->format('Y-m-d H:i'));
                    $event->finisht = date($event_finish_zero->format('Y-m-d H:i'));
                }
                return view('events.index', compact('events'));

            }
        }else {
                //show all events for unregister user
                $events = Event::latest()->get();
                foreach ($events as $event) {
                    $date = new \DateTime($event->start, new \DateTimeZone('UTC'));
                    $ip = $_SERVER["REMOTE_ADDR"];
//                    $location = GeoIP::getLocation($ip);
//                    foreach ($location as $timezone) {
//                        $my_time_zone = $timezone;
//                    }
////                        $my_time_zone = $location['timezone'];
//                    dd(Session::has('timezone'))
                    $my_time_zone = 'Asia/Tokyo';
                    $date->setTimezone(new \DateTimeZone($my_time_zone));
                    $event_start_zero = $date;
                    $date = new \DateTime($event->finish, new \DateTimeZone('UTC'));
                    $date->setTimezone(new \DateTimeZone($my_time_zone));
                    $event_finish_zero = $date;
                    $event->startt = date($event_start_zero->format('Y-m-d H:i'));
                    $event->finisht = date($event_finish_zero->format('Y-m-d H:i'));
                }
                return view('events.index', compact('events'));
            }
        }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Requests $request)
	{
		// Is the user logged in?
		if (Sentinel::check()) {
			if (Sentinel::inRole('admin') || Sentinel::inRole('user')) {
                // for bootstrap-datepicker
                //registered user
                $start_date_tmp = strtotime("+1 day");
                $start_date = date('Y/m/d 19:00');
                $finish_date = date('Y/m/d 20:00', $start_date_tmp);
                $timezone_select = self::getTimeZoneSelect();
                if(Sentinel::getUser()->timezone){
                    $my_time_zone = Sentinel::getUser()->timezone;
                } else{
                    $timezone_select = self::getTimeZoneSelect();
//                    dd($_GET['data']);
                    $my_time_zone = 'Asia/Tokyo';
                }
                return view('events.create', array(
                    'timezone_select' => $timezone_select,
                    'start_date' => $start_date,
                    'finish_date' => $finish_date,
                    'user_timezone' => $my_time_zone
                ));
			}
		} else {
			//create events unregister user
			$start_date_tmp = strtotime("+1 day");
			$start_date = date('Y/m/d 19:00');
			$finish_date = date('Y/m/d 20:00', $start_date_tmp);
			$default_timezone = date_default_timezone_get();
            $timezone_select = self::getTimeZoneSelect();
            $my_time_zone = 'Asia/Tokyo';
            $name = Input::all();
//            if ($request->isMethod('get')){
//                var_dump($request->is('ajax'));
//            }



            if($request->is('ajax')) {
                var_dump('ajax');
            }
            else if($request->is('http')){
                var_dump('http');
            }
            else{
                var_dump('ggg');
            }
//            var_dump($request->is('ajax'));
//            $name = $_GET['name'];
            $newLat = $request->input('data');
//            var_dump($name);
//            $my_time_zone = $name['usertimezone'];
			return view('events.create', array(
				'timezone_select' => $timezone_select,
				'start_date' => $start_date,
				'finish_date' => $finish_date,
				'user_timezone'=>$my_time_zone));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:80',
			'description' => 'required|max:500',
			// 'type' => 'required',
			'location' => 'required|max:255',
			'url' => 'max:255',
			'timezone' => 'required',
			'start' => 'required',
			'finish' => 'required',
		]);

		$store_info = $request->all();
		$store_info['uuid'] = Uuid::generate(4)->string;
		// for bootstrap-datepicker perform "08/10/2015 19:00" to "2015-10-08 19:00"
		$date = new \DateTime($store_info['start'], new \DateTimeZone($store_info['timezone']));
		$date->setTimezone(new \DateTimeZone('UTC'));
		$event_start_zero = $date;
		$date = new \DateTime($store_info['finish'], new \DateTimeZone($store_info['timezone']));
		$date->setTimezone(new \DateTimeZone('UTC'));
		$event_finish_zero = $date;


		// $event['period'] = date($event_start_zero->format('Y-m-d H:i')).' - '.date($event_finish_zero->format('Y-m-d H:i'));
		$store_info['start'] = $event_start_zero->format('Y-m-d H:i');
		$store_info['finish'] =$event_finish_zero->format('Y-m-d H:i');

		// Is the user logged in?
		if (Sentinel::check()) {
			if (Sentinel::inRole('admin')) {
				event::create($store_info);
				return redirect('admin/events')->with('success', Lang::get('message.success.create'));
			}

			else  if (Sentinel::inRole('user')){
				event::create($store_info);
				return redirect('events')->with('success', Lang::get('message.success.create'));
			}

		} else {

			event::create($store_info);
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
		// Is the user logged in?
		if (Sentinel::check()) {
			if (Sentinel::inRole('admin')) {
				// //$event = Event::findOrFail($uuid);
				$event = Event::whereUuid($uuid)->first();
				return view('events.show', compact('event'));
			} else if(Sentinel::inRole('user')){
					//$event = Event::findOrFail($uuid);
			$event = Event::whereUuid($uuid)->first();
 			//изменить в зависимоси от настроет пользователя
			$date = new \DateTime($event['start'], new \DateTimeZone($event['timezone']));
                if(Sentinel::getUser()->timezone){
                    $my_time_zone = Sentinel::getUser()->timezone;
                }else {
                    $my_time_zone = 'Asia/Tokyo';
                }
			$date->setTimezone(new \DateTimeZone($my_time_zone));
			$event_start_zero = $date;

			$date = new \DateTime($event['finish'], new \DateTimeZone($event['timezone']));
			$date->setTimezone(new \DateTimeZone($my_time_zone));
			$event_finish_zero = $date;

			$event['period'] = date($event_start_zero->format('Y-m-d H:i')).' - '.date($event_finish_zero->format('Y-m-d H:i'));
			return view('events.show', compact('event'));

		}
		else {
				//$event = Event::findOrFail($uuid);
				$event = Event::whereUuid($uuid)->first();
				return view('events.show', compact('event'));
			}
		}

		else {
			//$event = Event::findOrFail($uuid);

			//show event for unregister user
			$event = Event::whereUuid($uuid)->first();

 			//изменить в зависимоси от настроет пользователя
			$date = new \DateTime($event['start'], new \DateTimeZone($event['timezone']));
            $my_time_zone = 'Asia/Tokyo';
			$date->setTimezone(new \DateTimeZone($my_time_zone));
			$event_start_zero = $date;

			$date = new \DateTime($event['finish'], new \DateTimeZone($event['timezone']));
			$date->setTimezone(new \DateTimeZone($my_time_zone));
			$event_finish_zero = $date;
			$event['period'] = date($event_start_zero->format('Y-m-d H:i')).' - '.date($event_finish_zero->format('Y-m-d H:i'));
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
			if (Sentinel::inRole('admin')) {
				return redirect('admin/events')->with('success', Lang::get('message.success.update'));
			} else {
				return redirect('events')->with('success', Lang::get('message.success.update'));
			}
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
			if (Sentinel::inRole('admin')) {
				$confirm_route =  route('admin.events.delete',['uuid'=>$uuid]);
				return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));
			} else {
				$confirm_route =  route('events.delete',['uuid'=>$uuid]);
				return View('layouts/modal_confirmation', compact('error','model', 'confirm_route'));
			}
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
			if (Sentinel::inRole('admin')) {
				return redirect('admin/events')->with('success', Lang::get('message.success.delete'));
			} else {
				return redirect('events')->with('success', Lang::get('message.success.delete'));
			}
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
		$date->setTimezone(new \DateTimeZone('UTC'));
		$event_start_zero = $date;

		$date = new \DateTime($event['finish'], new \DateTimeZone($event['timezone']));
		$date->setTimezone(new \DateTimeZone('UTC'));
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

		// registration and credits check for later
		/*
		// Is the user logged in?
		if (Sentinel::check()) {
			return redirect('events')->with('success', Lang::get('message.success.delete'));
		} else {
			return redirect('events')->with('success', Lang::get('message.success.delete'));
		}
		*/
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
           if(Sentinel::check()) {
               if (Sentinel::getUser()->timezone) {
                   $my_time_zone = Sentinel::getUser()->timezone;
               }
               else {

                   $my_time_zone = $query = 'Asia/Tokyo';
               }
           }
            else {
//                $ip = $_SERVER["REMOTE_ADDR"];
////               $ip = '178.136.229.229';
//                $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
//                if ($query && $query['status'] == 'success') {
//                    $my_time_zone = $query['timezone'];
//                }
                $my_time_zone = 'Europe/Kiev';
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
					$dst = date('I'); // this will be 1 in DST or else 0

//                     $structure .= "<option data-countrycode='".$location['country_code']."' data-offset='".$utc_offset."' ".(($timeZone == $selectedZone) ? 'selected="selected "':'') . " value=\"".($timeZone)."\">(".$p. " UTC) " .str_replace('_',' ',$city)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( ".$timeZone." | DST ".$dst.")</option>";
                	$structure .= "<option data-countrycode='".$location['country_code']."' data-offset='".$utc_offset."' ".(($timeZone == $my_time_zone) ? 'selected="selected "':'') . " value=\"".($timeZone)."\">".$timeZone."</option>";
                }

                $selectContinent = $continent;
            }
        }

        $structure .= '</optgroup></select>';

		// restore current timezone
		date_default_timezone_set($current_timezone);
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
