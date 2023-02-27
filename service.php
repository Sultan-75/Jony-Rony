<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New Service</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        All Sells
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        New Service
      </li>
    </ol>
  </div>

  <div class="row mb-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card mb-4 px-1">
        <div class="card-body">
          <div style="display: none;" id="sr1" class="alert alert-danger" role="alert">
            <span class="sr_eror text-center" id="sr_eror" style="display: none;">Fields Must Not Empty</span>
          </div>
          <div style="display: none;" id="sr2" class="alert alert-success" role="alert">
            <span class="sr_msg text-center" id="sr_msg" style="display: none;">Insert Successfull</span>
          </div>
          <form action="" method="POST">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="customer_name" class="font-weight-bold">Customer Name</label>
                  <input type="text" name="customer_name" class="form-control" id="customer_name">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="customer_num" class="font-weight-bold">Phone Number</label>
                  <input type="text" name="customer_num" class="form-control" id="customer_num">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="service_details" class="font-weight-bold">Service Details</label>
                  <input type="text" name="service_details" class="form-control" id="service_details">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="service_exp" class="font-weight-bold">Service Expence</label>
                  <input type="text" name="service_exp" value="0" class="form-control" id="service_exp">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="service_price" class="font-weight-bold">Service Price</label>
                  <input type="text" name="service_price" class="form-control" id="service_price">
                </div>
              </div>
            </div>
            <button type="submit" id="ServiceSubmit" class="btn btn-accent font-weight-bold float-right px-4 py-2">Add Service</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
  <!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>