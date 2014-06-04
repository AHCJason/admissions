<?php

// preg formatted patterns for emails to whitelist on non-production environments; all other emails will be blocked:
$email_destination_whitelist = array(
	"/webadmin(?:\+.*)?@aptitudeit\.net/i",
	"/khendershot24(?:\+.*)?@gmail\.com/i"
);

$directory = array_pop(explode('/', dirname(dirname(dirname(__FILE__)))));
$site_name = basename(__DIR__);

// Set unchanging variables
define('APP_PATH', dirname(__FILE__));
define('APP_PROTECTED_PATH', APP_PATH . "/protected");
define('APP_PUBLIC_PATH', APP_PATH . "/public");


if ($directory == 'Sites') { // then this is a local directory
	if (file_exists(dirname(__FILE__) . "/.development")) {
	
		// set local paths
		define('ENGINE_PROTECTED_PATH', '/mnt/hgfs/Sites/aptitudecare/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/mnt/hgfs/Sites/aptitudecare/cms2/public');

		// set root path and site name for use in script files
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', basename(__DIR__));
		
		// set urls
		$ENGINE_URL = "https://local.aptitudecare.com/cms2-public";
		$SITE_URL = "https://local.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} 
	
	
} elseif ($directory == 'aptitudecare') {  // this is the local sites directory
	// set local paths
	define('ENGINE_PROTECTED_PATH', '/mnt/hgfs/Sites/aptitudecare/cms2/protected');
	define('ENGINE_PUBLIC_PATH', '/mnt/hgfs/Sites/aptitudecare/cms2/public');
	
	// set root path and site name for use in script files
	define('ROOT_PATH', dirname(dirname(dirname(__FILE__))));
	define('SITE_NAME', basename(__DIR__));
	
	// set urls --- will use the site_name in the url
	$ENGINE_URL = "https://{$site_name}-local.aptitudecare.com/cms2-public";
	$SITE_URL = "https://{$site_name}-local.aptitudecare.com";
	$SECURE_CDN_URL = $SITE_URL;
	define('DEVELOPMENT', true);

} elseif ($directory == "home") {  // this is a remote directory
	if (file_exists(dirname(__FILE__) . "/.development")) {
		// set remote paths
		define('ENGINE_PROTECTED_PATH', '/home/aptitude/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');

		// set root path and site name for use in script files
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', basename(__DIR__));
		
		// set urls
		$ENGINE_URL = "https://dev.aptitudecare.com/cms2-public";
		$SITE_URL = "https://dev.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	} else { // this is the remote demo site
		define('ENGINE_PROTECTED_PATH', '/home/aptitude/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');
		
		// set root path and site name for use in script files
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', "");
		
		// set urls
		$ENGINE_URL = "https://demo.aptitudecare.com/cms2-public";
		$SITE_URL = "https://demo.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEMO', true);
	}


} else {
	$directory = array_pop(explode('/', dirname(dirname(__FILE__))));
	
	if (file_exists(dirname(__FILE__) . "/.development")) { // if this file exists then it is a dev directory
		// set remote paths
		define('ENGINE_PROTECTED_PATH', '/home/aptitude/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');
	
		// set root path and site name for use in script files
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', '');
		
		// set urls
		$ENGINE_URL = "https://{$directory}-dev.aptitudecare.com/cms2-public";
		$SITE_URL = "https://{$directory}-dev.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', true);
	
	} else {  // otherwise we are in the live site
		// set remote paths
		define('ENGINE_PROTECTED_PATH', '/home/aptitude/cms2/protected');
		define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');
	
		// set root path and site name for use in script files
		define('ROOT_PATH', dirname(dirname(__FILE__)));
		define('SITE_NAME', basename(basename(__DIR__)));
		
		// set urls
		$ENGINE_URL = "https://{$directory}.aptitudecare.com/cms2-public";
		$SITE_URL = "https://{$directory}.aptitudecare.com";
		$SECURE_CDN_URL = $SITE_URL;
		define('DEVELOPMENT', false);
		define('PRODUCTION', true);
	}
}
