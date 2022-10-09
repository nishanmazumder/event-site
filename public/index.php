<?php
/*
|--------------------------------------------------------------------------
| All Sections
|--------------------------------------------------------------------------
|
| Define all essential sections as variable...
|
*/

$header = dirname(__DIR__) . '/public/web/inc/header.php';
$banner = dirname(__DIR__) . '/public/web/inc/banner.php';
$about =  dirname(__DIR__) . '/public/web/inc/about.php';
$event =  dirname(__DIR__) . '/public/web/inc/event.php';
$ticket = dirname(__DIR__) . '/public/web/inc/ticket.php';
$faq =  dirname(__DIR__) . '/public/web/inc/faq.php';
$contact = dirname(__DIR__) . '/public/web/inc/contact.php';
$footer = dirname(__DIR__) . '/public/web/inc/footer.php';


/*
|--------------------------------------------------------------------------
| Load Sections
|--------------------------------------------------------------------------
|
| Load all essential sections...
|
*/

$home_page_sections = [$header, $banner, $about, $event, $ticket, $faq, $contact, $footer];

foreach ($home_page_sections as $home_page_section) {
	if (file_exists($home_page_section)) {
		include $home_page_section;
	} else {
		echo "File Not Found " . $home_page_section;
	}
}
