<?php

// preg formatted patterns for emails to whitelist on non-production environments; all other emails will be blocked:
$email_destination_whitelist = array(
	"/kemish(?:\+.*)?@aptitudeit\.net/i",
	"/khendershot24(?:\+.*)?@gmail\.com/i"
);

	define('ENGINE_PROTECTED_PATH', '/home/aptitude/dev/cms2/protected');
	define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');
	define('APP_PATH', dirname(__FILE__));
	define('APP_PROTECTED_PATH', APP_PATH . "/protected");
	define('APP_PUBLIC_PATH', APP_PATH . "/public");
	$ENGINE_URL = "http://dev.aptitudecare.com/cms2-public";
	$SITE_URL = "http://dev.aptitudecare.com";
	$SECURE_CDN_URL = $SITE_URL;

/*
if (file_exists(dirname(__FILE__) . "/.development")) {
	define('ENGINE_PROTECTED_PATH', '/var/www/admit_app/cms2/protected');
	define('ENGINE_PUBLIC_PATH', '/var/www/admit_app/cms2/public');
	define('APP_PATH', dirname(__FILE__));
	define('APP_PROTECTED_PATH', APP_PATH . "/protected");
	$ENGINE_URL = "https://admit.aptitudeit.net/cms2-public";
	$SITE_URL = "https://admit.aptitudeit.net";
	define('DEVELOPMENT', true);
} elseif (file_exists(dirname(__FILE__) . "/.staging")) {
	define('ENGINE_PROTECTED_PATH', '/home/cms2/staging/cms2/protected');
	define('ENGINE_PUBLIC_PATH', '/home/cms2/staging/cms2/public');
	define('APP_PATH', dirname(__FILE__));
	define('APP_PROTECTED_PATH', APP_PATH . "/protected");
	$ENGINE_URL = "https://my-staging.ahcfacilities.com/cms2-public";
	$SITE_URL = "https://my-staging.ahcfacilities.com";
	define('DEVELOPMENT', true);
	define('STAGING', true);
} else {
	define('ENGINE_PROTECTED_PATH', '/home/cms2/production/cms2/protected');
	define('ENGINE_PUBLIC_PATH', '/home/cms2/production/cms2/public');
	define('APP_PATH', dirname(__FILE__));
	define('APP_PROTECTED_PATH', APP_PATH . "/protected");
	$ENGINE_URL = "https://my.ahcfacilities.com/cms2-public";
	$SITE_URL = "https://my.ahcfacilities.com";
	define('DEVELOPMENT', false);
	define('STAGING', false);
	define('SLICING', false);
	define('PRODUCTION', true);
}
*/