<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/allstaf.php');
$stf = new Satff();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stf->AddStaf($_POST);
}
