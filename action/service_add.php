<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/newservice.php');
$sv = new Newservice();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sv->New_Services($_POST);
}
