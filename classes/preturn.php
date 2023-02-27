<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Preturn
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

    public function Return_Insert($data)
    {

        $product_id_sale = $this->fm->validation($data['product_id']);
        $product_id_sale = mysqli_real_escape_string($this->db->link, $data['product_id']);

        $sale_id = $this->fm->validation($data['sale_id']);
        $sale_id = mysqli_real_escape_string($this->db->link, $data['sale_id']);

        $product_price = $this->fm->validation($data['product_price']);
        $product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);

        $customer_name = $this->fm->validation($data['customer_name']);
        $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);

        $customer_num = $this->fm->validation($data['customer_num']);
        $customer_num = mysqli_real_escape_string($this->db->link, $data['customer_num']);

        $product_name = $this->fm->validation($data['product_name']);
        $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);

        $return_selling_price = $this->fm->validation($data['selling_price']);
        $return_selling_price = mysqli_real_escape_string($this->db->link, $data['selling_price']);

        $return_selling_qty = $this->fm->validation($data['selling_qty']);
        $return_selling_qty = mysqli_real_escape_string($this->db->link, $data['selling_qty']);

        $return_total_amount = $this->fm->validation($data['total_amount']);
        $return_total_amount = mysqli_real_escape_string($this->db->link, $data['total_amount']);

        $return_payment = $this->fm->validation($data['payment']);
        $return_payment = mysqli_real_escape_string($this->db->link, $data['payment']);

        $return_profit = $this->fm->validation($data['profit']);
        $return_profit = mysqli_real_escape_string($this->db->link, $data['profit']);

        $return_due = $this->fm->validation($data['due']);
        $return_due = mysqli_real_escape_string($this->db->link, $data['due']);

        $return_qty = $this->fm->validation($data['return_qty']);
        $return_qty = mysqli_real_escape_string($this->db->link, $data['return_qty']);

        if ($return_qty == "") {
            echo "return_empty";
            exit();
        } else {

            if ($sale_id > 0) {

                if ($return_selling_qty ==  $return_qty) {
                    $delquery = "DELETE FROM tbl_sale  WHERE sale_id='$sale_id' ";
                    $this->qu->delete($delquery);

                    $query = "SELECT product_qty FROM tbl_product WHERE product_id='$product_id_sale' ";
                    $Originalqty = $this->qu->select($query)->fetch_assoc();
                    $Originalqty_2 = $Originalqty['product_qty'];
                    $currentqty = (int)$Originalqty_2 + (int)$return_qty;
                    $currenttotal = (int) $currentqty * (float)$product_price;
                    $upquery = "UPDATE tbl_product SET  product_qty = '$currentqty', 
                    product_total='$currenttotal' WHERE product_id='$product_id_sale' ";
                    $this->qu->update($upquery);
                  
                    $insert_ret_query = "INSERT INTO tbl_return (customer_name,customer_num,product_name,return_selling_price,return_selling_qty,return_total_amount,product_id_sale) 
                        VALUES ('$customer_name','$customer_num','$product_name','$return_selling_price','$return_qty','$return_total_amount','$product_id_sale') ";
                    $Inserted_row_sell = $this->qu->insert($insert_ret_query);
                    if ($Inserted_row_sell) {
                        echo "return_success";
                        exit();
                    }
                } else if ($return_selling_qty > $return_qty) {
                    $new_qty_for_sale = (int)$return_selling_qty - (int)$return_qty;
                    $after_return_total = (int) $new_qty_for_sale * (float)$return_selling_price;
                    $new_profit = (float)$after_return_total - ((float)$product_price * (int)$new_qty_for_sale);
                    $no_due = 0;

                    if ($after_return_total <= $return_payment) {
                        $upquery_2 = "UPDATE tbl_sale SET  selling_qty = '$new_qty_for_sale',
                    total_amount='$after_return_total',payment='$after_return_total',due='$no_due',profit='$new_profit' 
                    WHERE sale_id='$sale_id' ";
                        $this->qu->update($upquery_2);
                    } elseif ($after_return_total > $return_payment) {
                        $new_due_2 = (float)$return_total_amount - (float)$after_return_total;
                        $new_due = (float)$return_due - (float)$new_due_2;
                        $upquery_3 = "UPDATE tbl_sale SET  selling_qty = '$new_qty_for_sale',
                    total_amount='$after_return_total',due='$new_due',profit='$new_profit' 
                    WHERE sale_id='$sale_id' ";
                        $this->qu->update($upquery_3);
                    }


                    $query = "SELECT product_qty FROM tbl_product WHERE product_id='$product_id_sale' ";
                    $Originalqty = $this->qu->select($query)->fetch_assoc();
                    $Originalqty_2 = $Originalqty['product_qty'];
                    $currentqty = (int)$Originalqty_2 + (int)$return_qty;
                    $currenttotal = (int) $currentqty * (float)$product_price;
                    $upquery = "UPDATE tbl_product SET  product_qty = '$currentqty', 
                    product_total='$currenttotal' WHERE product_id='$product_id_sale' ";
                    $this->qu->update($upquery);


                    $return_total = (int) $return_qty * (float)$return_selling_price;
                    $insert_ret_query = "INSERT INTO tbl_return (customer_name,customer_num,product_name,return_selling_price,return_selling_qty,return_total_amount,product_id_sale) 
                        VALUES ('$customer_name','$customer_num','$product_name','$return_selling_price','$return_qty','$return_total','$product_id_sale') ";
                    $Inserted_row_sell = $this->qu->insert($insert_ret_query);
                    if ($Inserted_row_sell) {
                        echo "return_success";
                        exit();
                    }
                }
            }
        }
    }

    //
}
