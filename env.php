<?php

// preg formatted patterns for emails to whitelist on non-production environments; all other emails will be blocked:
$email_destination_whitelist = array(
	"/webadmin(?:\+.*)?@aptitudeit\.net/i",
	"/khendershot24(?:\+.*)?@gmail\.com/i"
);

$directory = array_pop(explode('/', dirname(dirname(dirname(__FILE__)))));
define('ENGINE_PROTECTED_PATH', '/home/aptitude/cms2/protected');
define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');

if ($directory == 'home') {
	if (file_exists(dirname(__FILE__) . "/.development")) {
		define('APP_PATH', dirname(__FILE__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "http://dev.aptitudecare.com/cms2-public";
		$SITE_URL = "http://dev.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
	} else {
		define('APP_PATH', dirname(__FILE__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "http://demo.aptitudecare.com/cms2-public";
		$SITE_URL = "http://demo.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
	}
} else {
	if (file_exists(dirname(__FILE__) . "/.development")) {
		define('APP_PATH', dirname(__FILE__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "http://{$directory}-dev.aptitudecare.com/cms2-public";
		$SITE_URL = "http://{$directory}-dev.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} else {
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
