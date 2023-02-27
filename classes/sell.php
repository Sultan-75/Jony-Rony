<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Sell
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
    public function GetProductSellById($sale_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id='$sale_id' ";
        $result = $this->qu->select($query);
        return $result;
    }
    public function SellProductBYId($data)
    {

        $sale_id_p = $this->fm->validation($data['product_id']);
        $sale_id_p = mysqli_real_escape_string($this->db->link, $data['product_id']);

        $customer_name = $this->fm->validation($data['customer_name']);
        $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);

        $customer_num = $this->fm->validation($data['customer_num']);
        $customer_num = mysqli_real_escape_string($this->db->link, $data['customer_num']);

        $product_name = $this->fm->validation($data['product_name']);
        $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);

        $product_qty = $this->fm->validation($data['product_qty']);
        $product_qty = mysqli_real_escape_string($this->db->link, $data['product_qty']);

        $product_price = $this->fm->validation($data['product_price']);
        $product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);

        $selling_price = $this->fm->validation($data['selling_price']);
        $selling_price = mysqli_real_escape_string($this->db->link, $data['selling_price']);

        $selling_qty = $this->fm->validation($data['selling_qty']);
        $selling_qty = mysqli_real_escape_string($this->db->link, $data['selling_qty']);

        $total_amount = $this->fm->validation($data['total_amount']);
        $total_amount = mysqli_real_escape_string($this->db->link, $data['total_amount']);

        $payment = $this->fm->validation($data['payment']);
        $payment = mysqli_real_escape_string($this->db->link, $data['payment']);

        $discount = $this->fm->validation($data['discount']);
        $discount = mysqli_real_escape_string($this->db->link, $data['discount']);

        $due = $this->fm->validation($data['due']);
        $due = mysqli_real_escape_string($this->db->link, $data['due']);

        $profit = $this->fm->validation($data['profit']);
        $profit = mysqli_real_escape_string($this->db->link, $data['profit']);

        $product_imei = $this->fm->validation($data['product_imei']);
        $product_imei = mysqli_real_escape_string($this->db->link, $data['product_imei']);

        $after_sell_qty = (int)$product_qty - (int)$selling_qty;
        $after_product_total = (int)$after_sell_qty * (float)$product_price;

        if ($sale_id_p > 0) {
            $query = "UPDATE tbl_product SET  product_qty = '$after_sell_qty',product_total='$after_product_total' WHERE product_id='$sale_id_p' ";
            $this->qu->update($query);
        }
        if ($product_name == "" || $selling_price == "" || $selling_qty == "" || $total_amount == "" || $payment == "" || $discount == "" || $due == "") {
            echo "sell_empty";
            exit();
        } else {
            $insert_sell_query = "INSERT INTO tbl_sale (customer_name,customer_num,product_name,selling_price,selling_qty,total_amount,payment,due,profit,product_id,product_price,product_imei) 
        VALUES ('$customer_name','$customer_num','$product_name','$selling_price','$selling_qty','$total_amount','$payment','$due','$profit','$sale_id_p','$product_price','$product_imei') ";
            $Inserted_row_sell = $this->qu->insert($insert_sell_query);
            if ($Inserted_row_sell) {
                echo "sell_success";
                exit();
            }
        }
    }
    /* all sell product */
    public function AllProductSell()
    {
        $query = "SELECT * FROM tbl_sale ORDER BY sale_id desc ";
        $result = $this->qu->select($query);
        return $result;
    }
    /* sell items with */
    public function SellItemById($sell_return_id)
    {
        $query = "SELECT * FROM tbl_sale WHERE sale_id='$sell_return_id' ";
        $result = $this->qu->select($query);
        return $result;
    }
    /**************************** sell service ***************************/
    public function serviceAdd($data)
    {
        $expence_details = $this->fm->validation($data['expence_details']);
        $expence_details = mysqli_real_escape_string($this->db->link, $data['expence_details']);
        $expence_amount = $this->fm->validation($data['expence_amount']);
        $expence_amount = mysqli_real_escape_string($this->db->link, $data['expence_amount']);

        if ($expence_details == "" || $expence_amount == "") {
            echo "ex_empty";
            exit();
        }
        $insert_ex = "INSERT INTO tbl_expance (ex_details,ex_amount) 
        VALUES ('$expence_details','$expence_amount') ";
        $Inserted_row_sell2 = $this->qu->insert($insert_ex);
        if ($Inserted_row_sell2) {
            echo "ex_success";
            exit();
        }
    }
    /* select all */
    public function AllexpenceSell()
    {
        $query = "SELECT * FROM tbl_expance ORDER BY ex_id desc";
        $result = $this->qu->select($query);
        return $result;
    }
    // Method for Delete 
    public function exDeleteById($delex)
    {
        $delex = mysqli_real_escape_string($this->db->link, $delex);
        $query = " DELETE FROM tbl_expance WHERE ex_id='$delex' ";
        $this->qu->delete($query);
    }
    //
}
