<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Staff</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        All Staff
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
       Add Staff
      </li>
    </ol>
  </div>

  <div class="row mb-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card mb-4 px-1">
        <div class="card-body">
          <div style="display: none;" id="st1" class="alert alert-danger" role="alert">
            <span class="st_eror text-center" id="st_eror" style="display: none;">Fields Must Not Empty</span>
          </div>
          <div style="display: none;" id="st2" class="alert alert-success" role="alert">
            <span class="st_msg text-center" id="st_msg" style="display: none;">Insert Successfull</span>
          </div>
          <form action="" method="POST">
              <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="staff_name" class="font-weight-bold">Staff Name</label>
                  <input type="text" name="staff_name" class="form-control" id="staff_name">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="staff_num" class="font-weight-bold">Phone Number</label>
                  <input type="text" name="staff_num" class="form-control" id="staff_num">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="staff_nid" class="font-weight-bold">Staff NID</label>
                  <input type="text" name="staff_nid" class="form-control" id="staff_nid">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="staff_salary" class="font-weight-bold">Staff Salary</label>
                  <input type="text" name="staff_salary" class="form-control" id="staff_salary">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="staff_address" class="font-weight-bold">Staff Address</label>
                  <input type="text" name="staff_address" class="form-control" id="staff_address">
                </div>
              </div>
            </div>
            <button type="submit" id="StaffSubmit" class="btn btn-accent btn-lg  px-5 py-2 font-weight-bold">Submit</button>
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