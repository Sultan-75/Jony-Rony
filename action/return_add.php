<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/preturn.php');
$rt = new Preturn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $PRt = $rt->Return_Insert($_POST);
}

