<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/user.php');
$usr = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $role = $_POST['role'];
    $cat_add = $usr->UserRegistration($user_name, $user_email, $user_pass, $role);
}
