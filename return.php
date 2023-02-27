<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

$sell_return_id = $_GET['sell_return_id'];

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New Return</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        All Sells
      </li>
      <li class="breadcrumb-item">
        <a href="#" class="text-decoration-none">Return List</a>
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        New Return
      </li>
    </ol>
  </div>
  <div class="row mb-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div style="display: none;" id="rt1" class="alert alert-danger" role="alert">
        <span class="rt_empty text-center" id="rt_empty" style="display: none;">Fields Must Not Empty</span>
      </div>
      <div style="display: none;" id="rt2" class="alert alert-success" role="alert">
        <span class="rt_msg text-center" id="rt_msg" style="display: none;">Return successfull</span>
      </div>
      <div class="card mb-4 px-1">
        <div class="card-body">

          <form action="" method="POST">
            <?php

            $getsellitem = $sel->SellItemById($sell_return_id);
            if ($getsellitem) {
              while ($result = $getsellitem->fetch_assoc()) {
            ?>
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="customer_name" class="font-weight-bold">Customer Name</label>
                      <input type="text" readonly value="<?php echo $result['customer_name']; ?>" name="customer_name" class="form-control" id="customer_name">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="customer_num" class="font-weight-bold">Phone Number</label>
                      <input type="text" readonly value="<?php echo $result['customer_num']; ?>" name="customer_num" class="form-control" id="customer_num">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 col-sm-12">

                    <div class="form-group">
                      <label for="product_name" class="font-weight-bold">Product Name</label>
                      <input type="text" value="<?php echo $result['product_name']; ?>" name="product_name" class="form-control" id="product_name" readonly>
                      <input type="hidden" value="<?php echo $result['profit']; ?>" name="profit" class="form-control" id="profit">
                      <input type="hidden" value="<?php echo $result['product_price']; ?>" name="product_price" id="product_price">
                      <input type="hidden" value="<?php echo $result['product_id']; ?>" name="product_id" id="product_id">
                      <input type="hidden" value="<?php echo $result['sale_id']; ?>" name="sale_id" id="sale_id">
                    </div>

                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="selling_price" class="font-weight-bold">Selling Price</label>
                      <input type="text" readonly value="<?php echo $result['selling_price']; ?>" name="selling_price" class="form-control" id="selling_price">
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label for="selling_qty" class="font-weight-bold">Quantity</label>
                      <input type="text" readonly value="<?php echo $result['selling_qty']; ?>" name="selling_qty" class="form-control" id="selling_qty">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="total_amount" class="font-weight-bold">Total Amount</label>
                      <input type="text" value="<?php echo $result['total_amount']; ?>" readonly name="total_amount" class="form-control" id="total_amount">
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="payment" class="font-weight-bold">Payment</label>
                      <input type="text" readonly value="<?php echo $result['payment']; ?>" name="payment" class="form-control" id="payment">
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="return_qty" class="font-weight-bold">Return Quantity</label>
                      <input type="text" name="return_qty" class="form-control" id="return_qty">
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="due" class="font-weight-bold">Due</label>
                      <input type="text" value="<?php echo $result['due']; ?>" readonly name="due" class="form-control" id="due">
                    </div>
                  </div>
                </div>
            <?php }
            } ?>
            <button type="submit" id="returnSubmit" class="btn btn-accent float-right px-4 py-2 font-weight-bold">Return</button>
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