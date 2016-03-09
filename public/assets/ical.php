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

//	$file = "BEGIN:VCALENDAR
//		BEGIN:VEVENT\r\n";
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
//		END:VCALENDAR";
//    //dd($file);
//	echo $file;
//	exit;

    $vCalendar = new \Eluceo\iCal\Component\Calendar('http://event.test-y-sbm.com/assets/ical.php?name=TEst&sd=20160309&st=170000&fd=20160309&ft=180000&loc=Qween,%20%D0%BC%D0%B0%D0%B3%D0%B0%D0%B7%D0%B8%D0%BD,%20%D0%A0%D0%BE%D1%81%D1%82%D0%BE%D0%B2-%D0%BD%D0%B0-%D0%94%D0%BE%D0%BD%D1%83,%20%D0%A0%D0%BE%D1%81%D1%82%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F%20%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,%20%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F&desc=');
    $vEvent = new \Eluceo\iCal\Component\Event();
    $vEvent
        ->setDtStart(new \DateTime($date))
        ->setDtEnd(new \DateTime($date_end))
        ->setNoTime(true)
        ->setSummary('Christmas')
    ;
    $vCalendar->addComponent($vEvent);
    echo $vCalendar->render();
    exit;

}