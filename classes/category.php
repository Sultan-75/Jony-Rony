<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class Category
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
    public function AddCategory($category)
    {
        $category = $this->fm->validation($_POST['category']);
        $category = mysqli_real_escape_string($this->db->link, $category);

        $checkQuery = "SELECT * FROM tbl_category WHERE category = '$category' ";
        $checkResult = $this->qu->select($checkQuery);

        if ($category == "") {
            echo "cat_empty";
            exit();
        }
        if ($checkResult != false) {
            echo "cat_error";
            exit();
        } else {
            $query = "INSERT INTO tbl_category(category)VALUES('$category')";
            $catinsert = $this->qu->insert($query);
            if ($catinsert) {
                echo "cat_success";
                exit();
            }
        }
    }
    // method for categrory Select All
    public function getAllcat()
    {
        $query = "SELECT * FROM tbl_category ORDER BY cat_id asc";
        $result = $this->qu->select($query);
        return $result;
    }
    // Method for Category Delete 
    public function catDeleteById($delcat)
    {
        $delcat = mysqli_real_escape_string($this->db->link, $delcat);
        $query = " DELETE FROM tbl_category WHERE cat_id='$delcat' ";
        $result = $this->qu->delete($query);
        if ($result) {
            $Msg = "<span class='Done'>Category Deleted Successfully </span>";
            return $Msg;
        }
    }
}
