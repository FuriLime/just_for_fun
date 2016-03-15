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

    $file .= "BEGIN:VEVENT\r\n";
    $file .= "DTSTART;VALUE=DATE:".$date . "T" . $time ."Z\r\n";
    $file .= "DTEND;VALUE=DATE:". $date_end . "T" . $time_end ."Z\r\n";
    $file .= "UID:41r8cefge2pi3tmt7tt766baf4@google.com\r\n";
//    $file .= "COMMENT;X-COMMENTER=MAILTO:me@home.com:<p>Hey Everyone: I think I have talked to everyone about setting up a brainstorm/initial planning meeting for a complete overhaul of the current FCAG site. I have penciled in a meeting for Tuesday April 10  @ 7:00 PM 8:30 PM.  Would you be able to attend?\r\n";
    $file .= "CLASS:PUBLIC\r\n";
    $file .= "DESCRIPTION:".strip_tags($_GET['desc'])."\r\n";
    $file .= "LOCATION:" . strip_tags($_GET['loc']) . "\r\n";
    $file .= "SEQUENCE:2\r\n";
    $file .= "STATUS:CONFIRMED\r\n";
    $file .= "SUMMARY:".strip_tags($_GET['name'])."\r\n";
    $file .= "TRANSP:TRANSPARENT\r\n";
    $file .= "END:VEVENT\r\n";

    echo $file;
    exit;
}