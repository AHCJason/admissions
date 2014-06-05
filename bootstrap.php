<?php

require_once "env.php";
define(TEST_EMAIL, "");
define(APP_EMAIL, "");
define(DEV_EMAIL, "test@localhost");
define('SITE_EMAIL', "@ahcfacilities.com");


if (DEVELOPMENT == true) {
	ini_set('html_errors', 'on');
	ini_set('display_errors', 'on');
} else {
	ini_set('html_errors', 'off');
	ini_set('display_errors', 'off');
}

//Before anything heavy gets loaded, branch out to image subsystem if necessary.
if (isset($_REQUEST['image']) && $_REQUEST['image'] != '') {
		require_once ENGINE_PUBLIC_PATH . "/image.php";
}

//Loads smarty, __autoload(), common includes,
require_once ENGINE_PROTECTED_PATH . "/engine_load.php";

//Load common functions
require_once APP_PROTECTED_PATH . "/lib/common.php";

/*  
//CMSv2 MySQL db connection
$dbCMS = new db_mysql();
if (DEVELOPMENT == TRUE) {
	$dbCMS->dbname = "cms2_dev";	
} else {
	$dbCMS->dbname = "cms2";
}

$dbCMS->host = "localhost";
$dbCMS->username = "cms2";
$dbCMS->password = "2ooB6kHA";
$dbCMS->conn();
*/

function dbCMS() { global $dbCMS; return $dbCMS; }
//MySQL db connection
$db = new db_mysql();
$db->dbname = "admit_ahc";
$db->host = "localhost";
$db->username = "ahc";
$db->password = "8uVoqNjvB6eq";
$db->conn();

// Site wide business stuff
$availOptions = array(
// states in which the company has facilities
"facilityStates" => 
	array(
		"AZ" => "Arizona",
		"CO" => "Colorado",
		"ID" => "Idaho",
		"NM" => "New Mexico",
		"NV" => "Nevada",
		"UT" => "Utah"
	),

// available ethnicities
"ethnicities" => 
	array(
		"African American", "Asian", "Caucasian", "Hispanic", "Other"
	),

"maritalStatus" => 
	array(
		"Married", "Single", "Divorced", "Widowed"
	),
	
// Available statuses

"patientStatus" =>
	array(
		"In Progress", "Completed", "Not Started", "Declined"
	)
);


smarty()->assign("availOptions", $availOptions);

// Email defaults
Email::setDefaultFrom("notifications@aptitudecare.com", "AptitudeCare");
Email::setDefaultReplyTo("noreply@aptitudecare.com", "");
Email::setupSMTP("smtp.gmail.com", "465", true, "ssl", "notifications@aptitudecare.com", "notifyme");

if (DEVELOPMENT == true) {
	// Email::setOverrideAddress(true, "info@aptitudeit.net");
}

if (STAGING == true) {
	// Email::setOverrideAddress(true, "kemish@aptitudeit.net");
}

// For non-production environments, enable the email whitelist filter: don't allow emails to go out to the general public
// for these environments under any circumstances!
if ( (DEVELOPMENT == true || STAGING == true) && PRODUCTION != true) {
	// turn email whitelisting on if you specified a whitelist
	if (isset($email_destination_whitelist)) {
		Email::setRestricted(true);
		Email::setWhitelist($email_destination_whitelist);
	}
}


// Development environments don't have email queuing, cron jobs, etc. Just send.
if (DEVELOPMENT == true) {
	Email::$disableQueue = true;
}

//Authentication
$auth = Authentication::getInstance();
function auth() { global $auth; return $auth; }
smarty()->assign("auth", $auth);

//Hand control back to the engine, which will fire the MainController
require_once ENGINE_PROTECTED_PATH . "/engine_postbootstrap.php";
