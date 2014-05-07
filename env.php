<?php

// preg formatted patterns for emails to whitelist on non-production environments; all other emails will be blocked:
$email_destination_whitelist = array(
	"/webadmin(?:\+.*)?@aptitudeit\.net/i",
	"/khendershot24(?:\+.*)?@gmail\.com/i"
);

$directory = array_pop(explode('/', dirname(dirname(dirname(__FILE__)))));

if ($directory == 'aptitude') {
	define('ENGINE_PROTECTED_PATH', '/home/aptitude/dev/cms2/protected');
	define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');
	define('APP_PATH', dirname(__FILE__));
	define('APP_PROTECTED_PATH', APP_PATH . "/protected");
	define('APP_PUBLIC_PATH', APP_PATH . "/public");
	$ENGINE_URL = "http://dev.aptitudecare.com/cms2-public";
	$SITE_URL = "http://dev.aptitudecare.com";
	$SECURE_CDN_URL = $SITE_URL;
} else {
	if (file_exists(dirname(__FILE__) . "/.development")) {
		define('ENGINE_PROTECTED_PATH', '/home/aptitude/sites/' . $directory . '/dev/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/home/aptitude/sites/' . $directory . '/dev/cms2/public');
		define('APP_PATH', dirname(__FILE__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "http://{$directory}-dev.aptitudecare.com/cms2-public";
		$SITE_URL = "http://{$directory}-dev.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} else {
		define('ENGINE_PROTECTED_PATH', '/home/aptitude/sites/' . $directory . '/live/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/home/aptitude/sites/' . $directory . '/live/cms2/public');
		define('APP_PATH', dirname(__FILE__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "http://{$directory}.aptitudecare.com/cms2-public";
		$SITE_URL = "http://{$directory}.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', false);
		define('PRODUCTION', true);
	}
}
