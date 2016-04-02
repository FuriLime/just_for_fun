<?php 

$ID =  $_GET['name'];
$file_name = str_replace(" ", "_", $ID);

if (isset($ID) && $ID != "") {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream; charset=utf-8');
	header('Content-Disposition: attachment; filename=' . $file_name . '.ics');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Charset: utf8');

	$date = strip_tags($_GET['sd']);
	$time = strip_tags($_GET['st']);

	$date_end = strip_tags($_GET['fd']);
	$time_end = strip_tags($_GET['ft']);

    $file .= "BEGIN:VCALENDAR\r\n";
    $file .= "VERSION:2.0\r\n";
    $file .= "PRODID:-//hacksw/handcal//NONSGML v1.0//EN\r\n";
    $file .= "UID:41r8cefge2pi3tmt7tt766baf4@google.com\r\n";
    $file .= "BEGIN:VEVENT\r\n";
    $file .= "DTSTAMP:".$date . "T" . $time ."Z\r\n";
    $file .= "DTSTART:".$date . "T" . $time ."Z\r\n";
    $file .= "DTEND:". $date_end . "T" . $time_end ."Z\r\n";
    $file .= "SUMMARY:".$_GET['name']."\r\n";
    $file .= "DESCRIPTION:".$_GET['desc']."\r\n";
    $file .= "LOCATION:" . strip_tags($_GET['loc']) . "\r\n";
    $file .= "END:VEVENT\r\n";
    $file .= "END:VCALENDAR\r\n";
    echo $file;
    exit;
}