<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Session.php');
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../lib/Query.php');
include_once($filepath . '/../helpers/Format.php');

class User
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

    // User Registration 
    public function UserRegistration($user_name, $user_email, $user_pass, $role)
    {
        $user_name = $this->fm->validation($_POST['user_name']);
        $user_name = mysqli_real_escape_string($this->db->link, $user_name);
        $user_email = $this->fm->validation($_POST['user_email']);
        $user_email = mysqli_real_escape_string($this->db->link, $user_email);
        $user_pass = $this->fm->validation($_POST['user_pass']);
        $user_pass = mysqli_real_escape_string($this->db->link, md5($user_pass));
        $role = $this->fm->validation($_POST['role']);
        $role = mysqli_real_escape_string($this->db->link, $role);

        if ($user_name == "" || $user_email == "" || $user_pass == "" || $role == "") {
            echo "reg_empty";
            exit();
        } elseif (filter_var($user_email, FILTER_VALIDATE_EMAIL) === false) {
            echo "email_error";
            exit();
        } else {
            $checkQuery = "SELECT * FROM tbl_user WHERE user_email = '$user_email' ";
            $checkResult = $this->qu->select($checkQuery);
            if ($checkResult != false) {
                echo "user_exsit";
                exit();
            } else {
                $query = "INSERT INTO tbl_user (user_name,user_email,user_pass,role)VALUES ('$user_name','$user_email','$user_pass','$role')";
                $inserted_User = $this->qu->insert($query);
                if ($inserted_User) {
                    echo "reg_success";
                    exit();
                }
            }
        }
    }
    // user LOgin 
    public function UserLogin($user_email, $user_pass)
    {
        $user_email = $this->fm->validation($_POST['user_email']);
        $user_email = mysqli_real_escape_string($this->db->link, $user_email);

        $user_pass = $this->fm->validation($_POST['user_pass']);
        $user_pass = mysqli_real_escape_string($this->db->link, md5($user_pass));

        if ($user_pass == "" || $user_email == "") {
            echo "empty";
            exit();
        } else {
            $query = "SELECT * FROM tbl_user WHERE user_email='$user_email' AND user_pass='$user_pass' ";
            $result = $this->qu->select($query);
            if ($result) {
                $value = $result->fetch_assoc();
                Session::init();
                Session::set("login", true);
                Session::set("user", $value['user_name']);
                Session::set("userId", $value['User_id']);
                Session::set("Role", $value['role']);
            } else {
                echo "eror";
                exit();
            }
        }
    }
    // select all user 
    public function AllUser()
    {
        $query = "SELECT * FROM tbl_user WHERE role ='0' || role ='1' ORDER BY User_id asc";
        $result = $this->qu->select($query);
        return $result;
    }
    // Method for  Delete 
    public function usrDeleteById($delusr)
    {
        $delcat = mysqli_real_escape_string($this->db->link, $delusr);
        $query = " DELETE FROM tbl_user WHERE User_id='$delusr' ";
        $this->qu->delete($query);
       
    }
} // End Of Main Class
