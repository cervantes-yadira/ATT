<?php
$indexLocation = 'http://localhost:63342/Sprint4/index.php';
//$indexLocation =  'https://dragonfly.greenriverdev.com/sprint5/index.php'; //cpanel

global $location;
global $indexLocation;
include $location . 'page_locations.php';;

if (isset($_SESSION['permission']) && $_SESSION['permission'] === '0'){
    // Redirect to User dashboard if a user navigates here
    header("Location:$indexLocation");
}
?>