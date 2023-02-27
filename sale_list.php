<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sold List & Product Return</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        All Sells
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        Sold List
      </li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="table-responsive p-3 ">
          <table class="table table-bordered  table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>S.N</th>
                <th>Action</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Product's Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Payment</th>
                <th>Due</th>
                <th>Profit</th>
                <th>Date</th>
                <th>IMEI NO</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $getselpd = $sel->AllProductSell();
              if ($getselpd) {
                $i = 0;
                while ($result = $getselpd->fetch_assoc()) {
                  $i++;
              ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td style="white-space:nowrap;">
                      <a onclick="return confirm('Are You Sure To Return this Product!');" href="return.php?sell_return_id=<?php echo $result['sale_id']; ?>" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Return"><i class="fas fa-undo-alt"></i></a>
                      <a href="invoice.php?sell_invoice_id=<?php echo $result['sale_id']; ?>" class="btn btn-sm btn-outline-secondary mt-1" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fas fa-file-invoice"></i></a>
                    </td>
                    <td><?php echo $result['customer_name']; ?></td>
                    <td><?php echo $result['customer_num']; ?></td>
                    <td style="white-space:nowrap;"><?php echo $result['product_name']; ?></td>
                    <td><?php echo $result['selling_price']; ?></td>
                    <td><?php echo $result['selling_qty']; ?></td>
                    <td><?php echo $result['total_amount']; ?></td>
                    <td><?php echo $result['payment']; ?></td>
                    <td><?php echo $result['due']; ?></td>
                    <td><?php echo $result['profit']; ?></td>
                    <td><?php echo $fm->formatDate($result['date']); ?></td>
                    <td><?php echo $result['product_imei']; ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>