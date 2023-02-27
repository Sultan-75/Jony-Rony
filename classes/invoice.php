<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Invoice
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
     /* sell items ivoice */
    public function itemforinvoice($sell_invoice_id)
    {
        $query = "SELECT * FROM tbl_sale WHERE sale_id='$sell_invoice_id' ";
        $result_i = $this->qu->select($query);
        return $result_i;
    }
}

