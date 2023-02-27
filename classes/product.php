<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Product
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
    // method for insert Product
    public function ProductInsert($data)
    {
        $product_name = $this->fm->validation($data['product_name']);
        $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);

        $cat_id = $this->fm->validation($data['cat_id']);
        $cat_id = mysqli_real_escape_string($this->db->link, $data['cat_id']);

        $product_qty = $this->fm->validation($data['product_qty']);
        $product_qty = mysqli_real_escape_string($this->db->link, $data['product_qty']);

        $product_price = $this->fm->validation($data['product_price']);
        $product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);
        $product_total = (float)$product_price * (int)$product_qty;

        if ($product_name == "" || $cat_id == "" || $product_qty == "" || $product_price == "") {
            echo "pd_empty";
            exit();
        } else {
            $query = "INSERT INTO tbl_product(product_name,cat_id,product_qty,product_price,product_total) 
            VALUES('$product_name','$cat_id','$product_qty','$product_price','$product_total')";
            $Inserted_row = $this->qu->insert($query);
            if ($Inserted_row) {
                echo "pd_success";
                exit();
            }
        }
    }
    // Method for select all Product with (ALIAS)
    public function GetAllPdById()
    {
        // Use Of Alias
        $query = "SELECT p.*, c.category FROM
        tbl_product AS p, tbl_category AS c WHERE p.cat_id = c.cat_id 
        ORDER BY p.product_id desc";
        $result = $this->qu->select($query);
        return $result;
    }
    // Method for select  Product folder with category
    public function ProductbyFolder($catID)
    {
        $catID = mysqli_real_escape_string($this->db->link, $catID);
        $sq = "SELECT cat_id FROM tbl_product WHERE cat_id='$catID'";
        $res = $this->qu->select($sq);
        if ($res) {
            $sql = "SELECT * FROM tbl_product WHERE cat_id='$catID'  ORDER BY cat_id desc";
            $result = $this->qu->select($sql);
            return $result;
        }
    }
    // Method for Product Delete
    public function ProductDeleteById($delproduct)
    {
        $delproduct = mysqli_real_escape_string($this->db->link, $delproduct);
        $query = " DELETE FROM tbl_product WHERE product_id='$delproduct' ";
        $result = $this->qu->delete($query);
        if ($result) {
            $Msg = "<span class='Done'>Product Deleted Successfully </span>";
            return $Msg;
        }
    }
}
