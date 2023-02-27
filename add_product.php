<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        Products
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        Add product
      </li>
    </ol>
  </div>

  <div class="row mb-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card mb-4 px-1">
        <div class="card-body">
          <div style="display: none;" id="ap1" class="alert alert-danger" role="alert">
            <span class="pd_eror text-center" id="pd_eror" style="display: none;">Fields Must Not Empty</span>
          </div>
          <div style="display: none;" id="ap2" class="alert alert-success" role="alert">
            <span class="pd_msg text-center" id="pd_msg" style="display: none;">Product Insert Succesfully</span>
          </div>
          <form action="" method="POST">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="product_name" class="font-weight-bold">Product Name</label>
                  <input type="text" autocomplete="off" name="product_name" class="form-control" id="product_name">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="cat_id" class="font-weight-bold">Select Category</label>
                  <select class="form-control" name="cat_id" id="cat_id">

                    <?php
                    $cat = new Category();
                    $getcat = $cat->getAllcat();
                    if ($getcat) {
                      while ($result = $getcat->fetch_assoc()) {

                    ?>
                        <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['category']; ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="product_qty" class="font-weight-bold">Product Quantity</label>
                  <input type="text" name="product_qty" class="form-control" id="product_qty">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="product_price" class="font-weight-bold">Product Price</label>
                  <input type="text" autocomplete="off" name="product_price" class="form-control" id="product_price">
                </div>
              </div>
            </div>
            <button type="submit" id="productSubmit" class="btn btn-accent float-right px-4 py-2 font-weight-bold">Add Product</button>
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