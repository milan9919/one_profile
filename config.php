<?php
session_start();
define('SITE_URL', 'http://' . $_SERVER["SERVER_NAME"] . '/one_profile/');
define('DIR_URL', $_SERVER["DOCUMENT_ROOT"] . '/one_profile/');

// define('SITE_URL', 'http://' . $_SERVER["SERVER_NAME"] . '/project/one_profile/');
// define('DIR_URL', $_SERVER["DOCUMENT_ROOT"] . '/project/one_profile/');

define('SITE_IMG', SITE_URL . 'assets/imgs/');

define('SITE_NAME', 'OneProfile');
define('ENVIRONMENT',"local");
define("SITE_UPD", SITE_URL . "upload/");
define("DIR_UPD", DIR_URL . "upload/");

define("FRONT_SITE_CSS", SITE_URL . "assets/css/");
define("FRONT_SITE_JS", SITE_URL . "assets/js/");

error_reporting(E_ALL);

global $db;

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'u927605346_linkedin_user');
define('DB_PASSWORD', 'Linkedin@123');
define('DB_NAME', 'u927605346_linkedin_db');
define('DB_USER_TBL', 'tbl_users');

$dbConfig = array("host" => "localhost", "dbname" => "u927605346_linkedin_db", "username" => "u927605346_linkedin_user", "password" => "Linkedin@123");
// $dbConfig = array("host" => "localhost", "dbname" => "kart", "username" => "root", "password" => "password");
// $dbConfig = array("host" => "localhost", "dbname" => "one_profile", "username" => "root", "password" => "");

require_once('pdo/pdohelper.php');
require_once('pdo/pdowrapper.php');
require_once('pdo/pdowrapper-child.php');
require_once('pdo/main_html.php');
require_once('pdo/function.php');

$db = new PdoWrapper($dbConfig);

$helper = new PDOHelper();

$msgType = isset($_SESSION["msgType"])?$_SESSION["msgType"]:NULL;
unset($_SESSION['msgType']);

// LinkedIn API configuration
define('LIN_CLIENT_ID', '77cerunaiuemee');
define('LIN_CLIENT_SECRET', 'QQ9rTW3ZfqCyTocT');
define('LIN_REDIRECT_URL', 'https://rajnishdholakiya.com/one_profile');
// define('LIN_REDIRECT_URL', 'http://localhost/project/linkedin_login_with_php/index.php');
define('LIN_SCOPE', 'r_liteprofile r_emailaddress'); //API permissions

// Include the oauth client library
require_once 'linkedin-oauth-client-php/http.php';
require_once 'linkedin-oauth-client-php/oauth_client.php';

?>