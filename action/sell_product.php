<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/sell.php');
$sel = new Sell();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $SPBI = $sel->SellProductBYId($_POST);
}

