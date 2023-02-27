<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/category.php');
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $cat_add = $cat->AddCategory($category);
}
