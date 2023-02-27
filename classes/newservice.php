<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Newservice
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
    public function New_Services($data)
    {
        $customer_name = $this->fm->validation($data['customer_name']);
        $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
        $customer_num = $this->fm->validation($data['customer_num']);
        $customer_num = mysqli_real_escape_string($this->db->link, $data['customer_num']);
        $service_details = $this->fm->validation($data['service_details']);
        $service_details = mysqli_real_escape_string($this->db->link, $data['service_details']);
        $service_price = $this->fm->validation($data['service_price']);
        $service_price = mysqli_real_escape_string($this->db->link, $data['service_price']);
        $service_exp = $this->fm->validation($data['service_exp']);
        $service_exp = mysqli_real_escape_string($this->db->link, $data['service_exp']);

        if($customer_name == "" || $customer_num == "" || $service_details == "" || $service_exp == "" || $service_price == ""){
             echo "ser_empty";
            exit();
        }else{
            $query = "INSERT INTO tbl_sale_services(customer_name,customer_num,service_details,service_price,service_exp) 
            VALUES('$customer_name','$customer_num','$service_details','$service_price','$service_exp')";
            $Inserted_row = $this->qu->insert($query);
            if ($Inserted_row) {
                echo "ser_success";
                exit();
            }
        }
    }
     // method for  Select All
    public function getAllser()
    {
        $query = "SELECT * FROM tbl_sale_services ORDER BY service_id desc";
        $result = $this->qu->select($query);
        return $result;
    }
     // Method for Delete 
    public function serDeleteById($delser)
    {
        $delser = mysqli_real_escape_string($this->db->link, $delser);
        $query = " DELETE FROM tbl_sale_services WHERE service_id='$delser' ";
        $this->qu->delete($query);
    }
}
