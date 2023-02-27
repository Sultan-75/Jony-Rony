<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/product.php');
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertProduct = $pd->ProductInsert($_POST);
}
