<?php

// preg formatted patterns for emails to whitelist on non-production environments; all other emails will be blocked:
$email_destination_whitelist = array(
	"/webadmin(?:\+.*)?@aptitudeit\.net/i",
	"/kemish.hendershot(?:\+.*)?@gmail\.com/i"
);

$site_name = basename(__DIR__);

// Set unchanging variables
define('APP_PATH', dirname(__FILE__));
define('APP_PROTECTED_PATH', APP_PATH . '/protected');
define('APP_PUBLIC_PATH', APP_PATH . '/public');

if (file_exists(dirname(__FILE__) . '/.development')) { // if this file exists then it is a dev directory
	define(DEVELOPMENT, true);
}


// set remote paths
define('ENGINE_PROTECTED_PATH', '/home/aptitude/cms2/protected');
define('ENGINE_PUBLIC_PATH', '/home/aptitude/cms2/public');

// set root path and site name for use in script files
define('ROOT_PATH', dirname(__FILE__));
// define('DB', '');

// set urls
$ENGINE_URL = 'https://' . $_SERVER['SERVER_NAME'] . '/cms2-public';
$SITE_URL = 'https://' . $_SERVER['SERVER_NAME'] . '/admission/';
$HOMEHEALTH_URL = 'https://' . $_SERVER['SERVER_NAME'];
$SECURE_CDN_URL = $SITE_URL;


