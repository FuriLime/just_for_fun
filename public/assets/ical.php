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

	if (!CModule::IncludeModule("iblock"))
			return;

	$obElement = CIBlockElement::GetByID($ID);
	$arEl = $obElement->GetNext();

	$date = strip_tags($_GET['sd']);
	$time = strip_tags($_GET['st']);

	$date_end = strip_tags($_GET['fd']);
	$time_end = strip_tags($_GET['ft']);

	$file = "BEGIN:VCALENDAR
		BEGIN:VEVENT\r\n";

	$file .= "DTSTART:" . $date . "T" . $time . "Z\r\n";
	$file .= "DTEND:" . $date_end . "T" . $time_end . "Z\r\n";
	$file .= "LOCATION:" . $_SERVER['SERVER_NAME'] . $arEl['DETAIL_PAGE_URL'] . "\r\n";
	$file .= "DESCRIPTION:" . iconv('windows-1251', 'UTF-8', trim(strip_tags(html_entity_decode
			($arEl['DETAIL_TEXT'], ENT_QUOTES, 'windows-1251')))) . "\r\n";
	$file .= "SUMMARY:" . iconv('windows-1251', 'UTF-8', $arEl['NAME']) . "\r\n";
	$file .= "PRIORITY:3
		BEGIN:VALARM
		ACTION:DISPLAY
		TRIGGER:-PT15M
		END:VALARM
		END:VEVENT
		END:VCALENDAR";
	echo $file;
	exit;
}