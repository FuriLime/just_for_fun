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
    $tz  = 'Europe/Berlin';
    $dtz = new \DateTimeZone($tz);
    date_default_timezone_set($tz);
// 1. Create new calendar
    $vCalendar = new \Eluceo\iCal\Component\Calendar('www.example.com');
// 2. Create timezone rule object for Daylight Saving Time
    $vTimezoneRuleDst = new \Eluceo\iCal\Component\TimezoneRule(\Eluceo\iCal\Component\TimezoneRule::TYPE_DAYLIGHT);
    $vTimezoneRuleDst->setTzName('CEST');
    $vTimezoneRuleDst->setDtStart(new \DateTime('1981-03-29 02:00:00', $dtz));
    $vTimezoneRuleDst->setTzOffsetFrom('+0100');
    $vTimezoneRuleDst->setTzOffsetTo('+0200');
    $dstRecurrenceRule = new \Eluceo\iCal\Property\Event\RecurrenceRule();
    $dstRecurrenceRule->setFreq(\Eluceo\iCal\Property\Event\RecurrenceRule::FREQ_YEARLY);
    $dstRecurrenceRule->setByMonth(3);
    $dstRecurrenceRule->setByDay('-1SU');
    $vTimezoneRuleDst->setRecurrenceRule($dstRecurrenceRule);
// 3. Create timezone rule object for Standard Time
    $vTimezoneRuleStd = new \Eluceo\iCal\Component\TimezoneRule(\Eluceo\iCal\Component\TimezoneRule::TYPE_STANDARD);
    $vTimezoneRuleStd->setTzName('CET');
    $vTimezoneRuleStd->setDtStart(new \DateTime('1996-10-27 03:00:00', $dtz));
    $vTimezoneRuleStd->setTzOffsetFrom('+0200');
    $vTimezoneRuleStd->setTzOffsetTo('+0100');
    $stdRecurrenceRule = new \Eluceo\iCal\Property\Event\RecurrenceRule();
    $stdRecurrenceRule->setFreq(\Eluceo\iCal\Property\Event\RecurrenceRule::FREQ_YEARLY);
    $stdRecurrenceRule->setByMonth(10);
    $stdRecurrenceRule->setByDay('-1SU');
    $vTimezoneRuleStd->setRecurrenceRule($stdRecurrenceRule);
// 4. Create timezone definition and add rules
    $vTimezone = new \Eluceo\iCal\Component\Timezone($tz);
    $vTimezone->addComponent($vTimezoneRuleDst);
    $vTimezone->addComponent($vTimezoneRuleStd);
    $vCalendar->setTimezone($vTimezone);
// 5. Create an event
    $vEvent = new \Eluceo\iCal\Component\Event();
    $vEvent->setDtStart(new \DateTime('2012-12-24', $dtz));
    $vEvent->setDtEnd(new \DateTime('2012-12-24', $dtz));
    $vEvent->setSummary('Summary with some german "umlauten" and a backslash \\: Kinder mögen Äpfel pflücken.');
// 6. Adding Timezone
    $vEvent->setUseTimezone(true);
// 7. Add event to calendar
    $vCalendar->addComponent($vEvent);
// 8. Set headers
    header('Content-Type: text/calendar; charset=utf-8');
    header('Content-Disposition: attachment; filename="cal.ics"');
// 9. Output
    echo $vCalendar->render();

}