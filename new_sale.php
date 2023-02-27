<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

$sale_id = $_GET['sale_id'];

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New Sale</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        All Sells
      </li>
      <li class="breadcrumb-item">
        <a href="sale_list.php" class="text-decoration-none">Sold List</a>
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        New Sale
      </li>
    </ol>
  </div>
  <div class="row mb-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div style="display: none;" id="sp1" class="alert alert-danger" role="alert">
        <span class="sp_eror text-center" id="sp_eror" style="display: none;">Fields Must Not Empty</span>
      </div>
      <div style="display: none;" id="sp2" class="alert alert-success" role="alert">
        <span class="sp_msg text-center" id="sp_msg" style="display: none;">Product sale done</span>
      </div>
      <div class="card mb-4 px-1">
        <div class="card-body">

          <form oninput="total_amount.value=parseFloat(selling_price.value)*parseInt(selling_qty.value),due.value=parseFloat((total_amount.value)-(parseFloat(payment.value)+parseFloat(discount.value))).toFixed(2),profit.value=parseFloat((total_amount.value)-parseFloat(discount.value))-((product_price.value)*parseInt(selling_qty.value))" action="" method="POST">
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
              <div class="col-md-7 col-sm-12">
                <?php

                $getsellpd = $sel->GetProductSellById($sale_id);
                if ($getsellpd) {

                  while ($result = $getsellpd->fetch_assoc()) {

                ?>
                    <div class="form-group">
                      <label for="product_name" class="font-weight-bold">Product Name</label>
                      <input type="text" value="<?php echo $result['product_name']; ?>" name="product_name" class="form-control" id="product_name" readonly>
                      <input type="hidden" value="<?php echo $result['product_qty']; ?>" name="product_qty" id="product_qty">
                      <input type="hidden" value="<?php echo $result['product_price']; ?>" name="product_price" id="product_price">
                      <input type="hidden" value="<?php echo $result['product_id']; ?>" name="product_id" id="product_id">

                    </div>
                <?php }
                } ?>
              </div>
              <div class="col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="product_imei" class="font-weight-bold">IMEI Number</label>
                  <input type="text" name="product_imei" class="form-control" id="product_imei">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="selling_price" class="font-weight-bold">Selling Price</label>
                  <input type="text" name="selling_price" class="form-control" id="selling_price">
                </div>
              </div>
              <div class="col-md-2 col-sm-12">
                <div class="form-group">
                  <label for="selling_qty" class="font-weight-bold">Quantity</label>
                  <input type="text" name="selling_qty" class="form-control" id="selling_qty">
                </div>
              </div>
              <div class="col-md-5 col-sm-12">
                <div class="form-group">
                  <label for="total_amount" class="font-weight-bold">Total Amount</label>
                  <input type="text" readonly name="total_amount" class="form-control" id="total_amount">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="payment" class="font-weight-bold">Payment</label>
                  <input type="text" name="payment" class="form-control" id="payment">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="discount" class="font-weight-bold">Discount</label>
                  <input type="text" value="0" name="discount" class="form-control" id="discount">
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="due" class="font-weight-bold">Due</label>
                  <input type="text" readonly name="due" class="form-control" id="due">
                  <input type="hidden" readonly name="profit" class="form-control" id="profit">
                </div>
              </div>
            </div>
            <button type="submit" id="saleSubmit" class="btn btn-accent float-right px-4 py-2 font-weight-bold">New Sale</button>
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