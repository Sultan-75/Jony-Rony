<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/user.php');
$usr = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // No need to use if server redquest method when using ajax.
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];

    $UserLog = $usr->UserLogin($user_email, $user_pass);
}
