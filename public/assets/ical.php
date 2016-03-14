<?php 

$ID =  strip_tags($_GET['name']);

if (isset($ID) && $ID != "") {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream; charset=utf-8');
	header('Content-Disposition: attachment; filename=' . $ID . '.ics');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Charset: utf8');

	$date = strip_tags($_GET['sd']);
	$time = strip_tags($_GET['st']);

	$date_end = strip_tags($_GET['fd']);
	$time_end = strip_tags($_GET['ft']);

	$file = "BEGIN:VCALENDAR
		BEGIN:VEVENT\r\n";
//
//	$file .= "DTSTART:" . $date . "T" . $time . "Z\r\n";
//	$file .= "DTEND:" . $date_end . "T" . $time_end . "Z\r\n";
//	$file .= "LOCATION:" . strip_tags($_GET['loc']) . "\r\n";
//	$file .= "DESCRIPTION:" . iconv('windows-1251', 'UTF-8', trim(strip_tags(html_entity_decode
//			(strip_tags($_GET['desc']), ENT_QUOTES, 'windows-1251')))) . "\r\n";
//	$file .= "SUMMARY:" . iconv('windows-1251', 'UTF-8', strip_tags($_GET['name'])) . "\r\n";
//	$file .= "PRIORITY:3
//		BEGIN:VALARM
//		ACTION:DISPLAY
//		TRIGGER:-PT15M
//		END:VALARM
//		END:VEVENT
//		END:VCALENDAR";  $mail[0]  = "BEGIN:VCALENDAR";

    $file .= "PRODID:-//Google Inc//Google Calendar 70.9054//EN";
    $file .= "VERSION:2.0";
    $file .= "CALSCALE:GREGORIAN";
    $file .= "METHOD:REQUEST";
    $file .= "BEGIN:VEVENT";
    $file .= "DTSTART;TZID=America/Sao_Paulo:" . $date;
    $file .= "DTEND;TZID=America/Sao_Paulo:" . $date_end;
    $file .= "DTSTAMP;TZID=America/Sao_Paulo:";
    $file .= "UID:" ;
    $file .= "ORGANIZER;";
    $file .= "CREATED:" ;
    $file .= "DESCRIPTION:" . strip_tags($_GET['desc']);
    $file .= "LAST-MODIFIED:" ;
    $file .= "LOCATION:" .  strip_tags($_GET['loc']);
    $file .= "SEQUENCE:0";
    $file .= "STATUS:CONFIRMED";
    $file .= "SUMMARY:" . strip_tags($_GET['loc']);
    $file .= "TRANSP:OPAQUE";
    $file .= "END:VEVENT";
    $file .= "END:VCALENDAR";
    //dd($file);
	echo $file;
	exit;

//    $tz  = 'Europe/Berlin';
//    $dtz = new \DateTimeZone($tz);
//    date_default_timezone_set($tz);
//// 1. Create new calendar
//    $vCalendar = new \Eluceo\iCal\Component\Calendar('www.example.com');
//// 2. Create timezone rule object for Daylight Saving Time
//// 3. Create timezone rule object for Standard Time
//// 5. Create an event
//    $vEvent = new \Eluceo\iCal\Component\Event();
//    $vEvent->setDtStart(new \DateTime($date));
//    $vEvent->setDtEnd(new \DateTime($date_end));
//    $vEvent->setSummary($_GET['desc']);
//// 6. Adding Timezone
//    $vEvent->setUseTimezone(true);
//// 7. Add event to calendar
//    $vCalendar->addComponent($vEvent);
//// 8. Set headers
//    header('Content-Type: text/calendar; charset=utf-8');
//    header('Content-Disposition: attachment; filename="cal.ics"');
//// 9. Output
//    echo $vCalendar->render();

}