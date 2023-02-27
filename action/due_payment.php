<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/dueandreturn.php');
$duertn = new Dueandreturn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $exsist_due = $_POST['exsist_due'];
    $exsist_payment = $_POST['exsist_payment'];
    $due_pay = $_POST['due_pay'];
    $saleID = $_POST['saleID'];
    $customer_name = $_POST['customer_name'];
    $customer_num = $_POST['customer_num'];
    $product_name = $_POST['product_name'];

    $duertn->upDueSalePage($exsist_due, $exsist_payment, $due_pay, $saleID, $customer_name, $customer_num, $product_name);
}
