<?php

// preg formatted patterns for emails to whitelist on non-production environments; all other emails will be blocked:
$email_destination_whitelist = array(
	"/webadmin(?:\+.*)?@aptitudeit\.net/i",
	"/khendershot24(?:\+.*)?@gmail\.com/i"
);

$directory = array_pop(explode('/', dirname(dirname(dirname(__FILE__)))));
define('ENGINE_PROTECTED_PATH', '/mnt/hgfs/Sites/aptitudecare/cms2/protected');
define('ENGINE_PUBLIC_PATH', '/mnt/hgfs/Sites/aptitudecare/cms2/public');

$site_name = basename(__DIR__);

if ($directory == 'Sites') {
	if (file_exists(dirname(__FILE__) . "/.development")) {
		define('APP_PATH', dirname(__FILE__));
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', basename(__DIR__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "https://local.aptitudecare.com/cms2-public";
		$SITE_URL = "https://local.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} elseif ($directory == 'aptitudecare') {
		define('APP_PATH', dirname(__FILE__));
		define('ROOT_PATH', dirname(dirname(dirname(__FILE__))));
		define('SITE_NAME', basename(__DIR__));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "https://{$site_name}-local.aptitudecare.com/cms2-public";
		$SITE_URL = "https://{$site_name}-local.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} else {
		define('APP_PATH', dirname(__FILE__));
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', '');
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "https://demo.aptitudecare.com/cms2-public";
		$SITE_URL = "https://demo.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEMO', true);
	}
} else {
	$directory = array_pop(explode('/', dirname(dirname(__FILE__))));
	if (file_exists(dirname(__FILE__) . "/.development")) {
		define('APP_PATH', dirname(__FILE__));
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', '');
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "https://{$directory}-dev.aptitudecare.com/cms2-public";
		$SITE_URL = "https://{$directory}-dev.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} else {
		define('APP_PATH', dirname(__FILE__));
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', basename(basename(__DIR__)));
		define('APP_PROTECTED_PATH', APP_PATH . "/protected");
		define('APP_PUBLIC_PATH', APP_PATH . "/public");
		$ENGINE_URL = "https://{$directory}.aptitudecare.com/cms2-public";
		$SITE_URL = "https://{$directory}.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', false);
		define('PRODUCTION', true);
	}
}
