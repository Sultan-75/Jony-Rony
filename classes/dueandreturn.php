<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Dueandreturn
{
    private $db;
    private $fm;
    private $qu;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
        $this->qu = new Query();
    }
    // method for  Select All
    public function getReturnlist()
    {
        $query = "SELECT * FROM tbl_return ORDER BY return_id desc";
        $result = $this->qu->select($query);
        return $result;
    }
    // method for  Delete All
    /*  public function delReturnlist()
    {
        $rtrows = mysqli_query($this->db->link, "select return_id from tbl_return");
        $allRtrows = mysqli_num_rows($rtrows);
        $query = "DELETE FROM tbl_return WHERE $allRtrows > 10";
        $result = $this->qu->delete($query);
        return $result;
    } */
    // method for  Select All
    public function getDuelist()
    {
        $query = "SELECT * FROM tbl_sale WHERE due > 0 ORDER BY sale_id desc";
        $result = $this->qu->select($query);
        return $result;
    }
    // 
    public function getsaleidfor_due($due_return_id)
    {
        $query = "SELECT * FROM tbl_sale WHERE sale_id = '$due_return_id' ";
        $result = $this->qu->select($query);
        return $result;
    }
    //
    public function upDueSalePage($exsist_due, $exsist_payment, $due_pay, $saleID, $customer_name, $customer_num, $product_name)
    {
        $exsist_due = mysqli_real_escape_string($this->db->link, $exsist_due);
        $exsist_payment = mysqli_real_escape_string($this->db->link, $exsist_payment);
        $due_pay = mysqli_real_escape_string($this->db->link, $due_pay);
        $saleID = mysqli_real_escape_string($this->db->link, $saleID);
        $customer_name = mysqli_real_escape_string($this->db->link, $customer_name);
        $customer_num = mysqli_real_escape_string($this->db->link, $customer_num);
        $product_name = mysqli_real_escape_string($this->db->link, $product_name);
        $after_due_payment = (float) $exsist_payment + (float) $due_pay;

        if ($due_pay == "") {
            echo "d_empty";
            exit();
        }

        if ($exsist_due ==  $due_pay) {
            //insesrt query
            $query_ = "INSERT INTO tbl_due(customer_name,customer_num,product_name,due_paid)VALUES('$customer_name','$customer_num','$product_name','$due_pay')";
            $this->qu->insert($query_);

            $no_due = 0;
            $upquery = "UPDATE tbl_sale SET 
            payment='$after_due_payment',due='$no_due' 
            WHERE sale_id='$saleID' ";
            $upt = $this->qu->update($upquery);
            if ($upt) {
                echo "success";
                exit();
            }
        } elseif ($exsist_due > $due_pay) {
            //insesrt query
            $query_ = "INSERT INTO tbl_due(customer_name,customer_num,product_name,due_paid)VALUES('$customer_name','$customer_num','$product_name','$due_pay')";
            $this->qu->insert($query_);

            $after_payment_due_exsist = (float) $exsist_due - (float) $due_pay;
            $upquery2 = "UPDATE tbl_sale SET 
            payment='$after_due_payment',due='$after_payment_due_exsist' 
            WHERE sale_id='$saleID' ";
            $upt = $this->qu->update($upquery2);
            if ($upt) {
                echo "success";
                exit();
            }
        } else {
            exit();
        }
    }
    // select from due table 
    public function AllDueEnties()
    {
        $query = "SELECT * FROM tbl_due ORDER BY id desc";
        $result = $this->qu->select($query);
        return $result;
    }
}
