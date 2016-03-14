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
//
//	$file = "BEGIN:VCALENDAR
//		BEGIN:VEVENT\r\n";
////
////	$file .= "DTSTART:" . $date . "T" . $time . "Z\r\n";
////	$file .= "DTEND:" . $date_end . "T" . $time_end . "Z\r\n";
////	$file .= "LOCATION:" . strip_tags($_GET['loc']) . "\r\n";
////	$file .= "DESCRIPTION:" . iconv('windows-1251', 'UTF-8', trim(strip_tags(html_entity_decode
////			(strip_tags($_GET['desc']), ENT_QUOTES, 'windows-1251')))) . "\r\n";
////	$file .= "SUMMARY:" . iconv('windows-1251', 'UTF-8', strip_tags($_GET['name'])) . "\r\n";
////	$file .= "PRIORITY:3
////		BEGIN:VALARM
////		ACTION:DISPLAY
////		TRIGGER:-PT15M
////		END:VALARM
////		END:VEVENT
////		END:VCALENDAR";  $mail[0]  = "BEGIN:VCALENDAR";

    $file =  "BEGIN:VCALENDAR\r\n";
    $file .= "PRODID:-//Google Inc//Google Calendar 70.9054//EN\r\n";
    $file .= "VERSION:2.0\r\n";
    $file .= "CALSCALE:GREGORIAN\r\n";
    $file .= "METHOD:PUBLISH\r\n";
    $file .= "X-WR-CALNAME:".strip_tags($_GET['name'])."\r\n";
    $file .= "X-WR-TIMEZONE:America/New_York\r\n";
    $file .= "BEGIN:VTIMEZONE\r\n";
    $file .= "TZID:America/New_York\r\n";
    $file .= "X-LIC-LOCATION:".strip_tags($_GET['loc'])."\r\n";
    $file .= "BEGIN:DAYLIGHT\r\n";
    $file .= "TZOFFSETFROM:-0500\r\n";
    $file .= "TZOFFSETTO:-0400\r\n";
    $file .= "TZNAME:EDT\r\n";
    $file .= "DTSTART:19700308T020000\r\n";
    $file .= "RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=2SU\r\n";
    $file .= "END:DAYLIGHT\r\n";
    $file .= "BEGIN:STANDARD\r\n";
    $file .= "TZOFFSETFROM:-0400\r\n";
    $file .= "TZOFFSETTO:-0500\r\n";
    $file .= "TZNAME:EST\r\n";
    $file .= "DTSTART:19701101T020000\r\n";
    $file .= "RRULE:FREQ=YEARLY;BYMONTH=11;BYDAY=1SU\r\n";
    $file .= "END:STANDARD\r\n";
    $file .= "END:VTIMEZONE\r\n";

    $file .= "BEGIN:VEVENT\r\n";
    $file .= "DTSTART;VALUE=DATE:".$date . "T" . $time ."Z\r\n";
    $file .= "DTEND;VALUE=DATE".$date_end . "T" . $time_end ."Z\r\n";
    $file .= "DTSTAMP:20071003T171517Z\r\n";
    $file .= "ORGANIZER;CN=David:MAILTO:me@home.com\r\n";
    $file .= "UID:41r8cefge2pi3tmt7tt766baf4@google.com\r\n";
//    $file .= "COMMENT;X-COMMENTER=MAILTO:me@home.com:<p>Hey Everyone: I think I have talked to everyone about setting up a brainstorm/initial planning meeting for a complete overhaul of the current FCAG site. I have penciled in a meeting for Tuesday April 10  @ 7:00 PM 8:30 PM.  Would you be able to attend?\r\n";
    $file .= "CLASS:PUBLIC\r\n";
    $file .= "CREATED:20070402T234821Z\r\n";
    $file .= "DESCRIPTION:Website Brainstorm Session\r\n";
    $file .= "LAST-MODIFIED:20070411T115625Z\r\n";
    $file .= "LOCATION:FCAG\r\n";
    $file .= "SEQUENCE:2\r\n";
    $file .= "STATUS:CONFIRMED\r\n";
    $file .= "SUMMARY:FCAG Website Meeting\r\n";
    $file .= "TRANSP:TRANSPARENT\r\n";
    $file .= "END:VEVENT\r\n";
    $file .= "END:VCALENDAR\r\n";
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