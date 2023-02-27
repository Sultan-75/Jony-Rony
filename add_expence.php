<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

if (isset($_GET['delex'])) {
  $delex = $_GET['delex'];
  $sel->exDeleteById($delex);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Expence</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        Expence
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        All Expence
      </li>
    </ol>
  </div>

  <div class="row mb-3">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
        Add Expence
      </button>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row mb-3">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- Simple Tables -->
      <div class="card">
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>S.N</th>
                <th>Expence Details</th>
                <th>Expence Amount</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <!-- <tfoot>
              <tr>
                <th>S.N</th>
                h>Expence Details</th>
                <th>Expence Amount</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </tr>
            </tfoot> -->
            <tbody>
              <?php
              $getexp = $sel->AllexpenceSell();
              if ($getexp) {
                $i = 0;
                while ($result = $getexp->fetch_assoc()) {
                  $i++;
              ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['ex_details']; ?></td>
                    <td><?php echo $result['ex_amount']; ?></td>
                    <td><?php echo $fm->formatDate($result['date']); ?></td>
                    <td class="text-center">
                      <a onclick="return confirm('Are You Sure To Delete !');" href="?delex=<?php echo $result['ex_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <!--Row-->
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12">
            <div class="card">
              <div style="display: none;" id="e1" class="alert alert-danger" role="alert">
                <span class="e_empty text-center" id="e_empty" style="display: none;">Fields Must Not Empty</span>
              </div>
              <div style="display: none;" id="e2" class="alert alert-success" role="alert">
                <span class="e_msg text-center" id="e_msg" style="display: none;">Expence Add Successfully</span>
              </div>
              <div class="card px-1">
                <h3 class="text-center pt-3">Add new Expence</h3>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="expence_details" class="font-weight-bold">Expence Details</label>
                          <input type="text" name="expence_details" class="form-control" id="expence_details" placeholder="ex: electricity bill">
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="expence_amount" class="font-weight-bold">Expence Amount</label>
                          <input type="text" name="expence_amount" class="form-control" id="expence_amount" placeholder="ex: 500">
                        </div>
                      </div>
                    </div>
                    <button type="submit" id="ExpenceSubmit" class="btn btn-accent float-right px-4 py-2 font-weight-bold">Add Expence</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>