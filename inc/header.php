<?php
include_once($filepath . '/lib/Session.php');
Session::checkSession();

spl_autoload_register(function ($class) {
  include_once "classes/" . $class . ".php";
});

$usr = new User();
$cat = new Category();
$pd = new Product();
$sel = new Sell();
$fm = new Format();
$rt = new Preturn();
$duertn = new Dueandreturn();
$sv = new Newservice();
//$ivn = new Invoice();
$stf = new Allstaf();
$logic = new Dashboardlogic();

?>

<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
  Session::destroy();
  header("Location:index.php");
  exit();
}
?>
<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$nav_active_action = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="img/logo/logo2.png" rel="icon" />
  <title>Shop - Admin - Dashboard</title>
  <!-- Bootstarp & fontawesome css files -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Admin template css files -->
  <link href="css/ruang-admin.min.css" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a href="dashboard.php" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-mobile-alt fa-2x"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Jony&Rony</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?php if ($nav_active_action == "dashboard") {
                            echo "active";
                          } else {
                            echo "noactive";
                          } ?>">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt text-accent"></i>
          <span class="text-accent">Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fab fa-product-hunt text-accent"></i>
          <span class="text-accent">Products</span>
        </a>
        <div id="collapseBootstrap" class="collapse <?php if ($nav_active_action == "add_product" or $nav_active_action == "product_list" or $nav_active_action == "product_folder" or $nav_active_action == "product_view") {
                                                      echo "show";
                                                    } else {
                                                      echo "notahow";
                                                    } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products</h6>
            <a class="collapse-item <?php if ($nav_active_action == "add_product") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="add_product.php">Add Product</a>
            <a class="collapse-item <?php if ($nav_active_action == "product_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="product_list.php">Product List</a>
            <a class="collapse-item <?php if ($nav_active_action == "product_folder") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="product_folder.php">Product Folders</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
          <i class="fab fa-sellcast text-accent"></i>
          <span class="text-accent">All Sells</span>
        </a>
        <div id="collapseForm" class="collapse <?php if ($nav_active_action == "sale_list" or $nav_active_action == "service" or $nav_active_action == "service_list" or $nav_active_action == "sell_reports") {
                                                  echo "show";
                                                } else {
                                                  echo "notshow";
                                                } ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">All Sells</h6>
            <a class="collapse-item <?php if ($nav_active_action == "sale_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="sale_list.php">Sold List</a>
            <a class="collapse-item <?php if ($nav_active_action == "service") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="service.php">New Service</a>
            <a class="collapse-item <?php if ($nav_active_action == "service_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="service_list.php">Service List</a>
            <a class="collapse-item <?php if ($nav_active_action == "sell_reports") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="sell_reports.php">Sells Report</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExp" aria-expanded="true" aria-controls="collapseForm">
          <i class="fas fa-sort-amount-down text-accent"></i>
          <span class="text-accent">Expense</span>
        </a>
        <div id="collapseExp" class="collapse <?php if ($nav_active_action == "add_expence") {
                                                echo "show";
                                              } else {
                                                echo "notshow";
                                              } ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Expence</h6>
            <a class="collapse-item <?php if ($nav_active_action == "add_expence") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="add_expence.php">All Expence</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseForm">
          <i class="fas fa-stream text-accent"></i>
          <span class="text-accent">All Category</span>
        </a>
        <div id="collapseCategory" class="collapse <?php if ($nav_active_action == "add_category" or $nav_active_action == "category_list") {
                                                      echo "show";
                                                    } else {
                                                      echo "notshow";
                                                    } ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">All Category</h6>
            <a class="collapse-item <?php if ($nav_active_action == "add_category") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="add_category.php">Add Category</a>
            <a class="collapse-item <?php if ($nav_active_action == "category_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="category_list.php">Category List</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseList" aria-expanded="true" aria-controls="collapseForm">
          <i class="fas fa-list text-accent"></i>
          <span class="text-accent">Due & Return List</span>
        </a>
        <div id="collapseList" class="collapse <?php if ($nav_active_action == "due_list" or $nav_active_action == "return_list") {
                                                  echo "show";
                                                } else {
                                                  echo "notshow";
                                                } ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Due & Return List</h6>
            <a class="collapse-item <?php if ($nav_active_action == "due_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="due_list.php">Due List</a>
            <a class="collapse-item <?php if ($nav_active_action == "return_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="return_list.php">Return List</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaf" aria-expanded="true" aria-controls="collapseForm">
          <i class="fas fa-users text-accent"></i>
          <span class="text-accent">All Staff</span>
        </a>
        <div id="collapseStaf" class="collapse <?php if ($nav_active_action == "add_staff" or $nav_active_action == "staff_list") {
                                                  echo "show";
                                                } else {
                                                  echo "notshow";
                                                } ?>" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">All Staff</h6>
            <a class="collapse-item <?php if ($nav_active_action == "add_staff") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="add_staff.php">Add Staff</a>
            <a class="collapse-item <?php if ($nav_active_action == "staff_list") {
                                      echo "active";
                                    } else {
                                      echo "noactive";
                                    } ?>" href="staff_list.php">Staff List</a>
          </div>
        </div>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="
              navbar navbar-expand navbar-light
              bg-navbar
              topbar
              mb-4
              static-top
            ">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog fa-2x mr-2 text-light" style="max-width: 60px"></i>
                <span class="ml-2 d-none d-lg-inline text-white font-weight-bold"><?php echo Session::get("user"); ?></span>
              </a>
              <div class="
                                        dropdown-menu dropdown-menu-right
                                        shadow
                                        animated--grow-in
                                        " aria-labelledby="userDropdown">
                <?php if (Session::get('Role') == '0' || Session::get('Role') == '2') { ?>
                  <a class="dropdown-item" href="user.php">
                    <i class="fas fa-user-tie fa-sm fa-fw mr-2 text-info"></i>
                    User
                  </a>
                  <hr class="bg-danger">
                <?php } ?>

                <a class="dropdown-item" href="?action=logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                  Logout
                </a>

              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->