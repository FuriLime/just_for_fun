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

// 1. Create new calendar
    $vCalendar = new \Eluceo\iCal\Component\Calendar('www.example.com');
// 2. Create an event
    $vEvent = new \Eluceo\iCal\Component\Event();
    $vEvent->setDtStart(new \DateTime('2012-12-24'));
    $vEvent->setDtEnd(new \DateTime('2012-12-24'));
    $vEvent->setNoTime(true);
    $vEvent->setSummary('Christmas');
// Adding Timezone (optional)
    $vEvent->setUseTimezone(true);
// 3. Add event to calendar
    $vCalendar->addComponent($vEvent);
// 4. Set headers
    header('Content-Type: text/calendar; charset=utf-8');
    header('Content-Disposition: attachment; filename="cal.ics"');
// 5. Output
    echo $vCalendar->render();
}