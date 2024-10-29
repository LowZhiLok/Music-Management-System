<!-- Low Zhi Lok & Lee Kai Mun -->
<?php 
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'loa_music_website');
define('SITE_URL', 'http://localhost/IP_Assignment/');

include_once('OOPdbcon.php');
$db = new OOPdbcon;
// Can reuse this authentication_code.php for "login", "register", "homepage"
// include("codes/authentication_code.php");

function base_url($slug){
    echo SITE_URL.$slug;
}

function redirect($message, $page){
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}

function validateInput($dbcon, $input){
    return mysqli_real_escape_string($dbcon, $input);
}

?>