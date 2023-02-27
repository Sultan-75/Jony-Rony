<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Allstaf
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
    // method for insert category
    public function AddStaf($data)
    {
        
        $staff_name = $this->fm->validation($data['staff_name']);
        $staff_name = mysqli_real_escape_string($this->db->link, $data['staff_name']);

        $staff_num = $this->fm->validation($data['staff_num']);
        $staff_num = mysqli_real_escape_string($this->db->link, $data['staff_num']);

        $staff_nid = $this->fm->validation($data['staff_nid']);
        $staff_nid = mysqli_real_escape_string($this->db->link, $data['staff_nid']);

        $staff_salary = $this->fm->validation($data['staff_salary']);
        $staff_salary = mysqli_real_escape_string($this->db->link, $data['staff_salary']);

        $staff_address = $this->fm->validation($data['staff_address']);
        $staff_address = mysqli_real_escape_string($this->db->link, $data['staff_address']);

        if ($staff_name == "" || $staff_num == "" || $staff_nid == "" || $staff_salary == "" || $staff_address == "") {
            echo "stf_empty";
            exit();
        }else {
            $query = "INSERT INTO tbl_staff(staff_name,staff_num,staff_nid,staff_salary,staff_address)
            VALUES('$staff_name','$staff_num','$staff_nid','$staff_salary','$staff_address')";
            $insert = $this->qu->insert($query);
            if ($insert) {
                echo "stf_success";
                exit();
            }
        }
    }
    // method for  Select All
    public function getAllstf()
    {
        $query = "SELECT * FROM tbl_staff ORDER BY staff_id asc";
        $result = $this->qu->select($query);
        return $result;
    }
    // Method for Category Delete 
    /* public function catDeleteById($delcat)
    {
        $delcat = mysqli_real_escape_string($this->db->link, $delcat);
        $query = " DELETE FROM tbl_category WHERE cat_id='$delcat' ";
        $result = $this->qu->delete($query);
        if ($result) {
            $Msg = "<span class='Done'>Category Deleted Successfully </span>";
            return $Msg;
        }
    } */
}
