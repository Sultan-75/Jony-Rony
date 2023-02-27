<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

if (isset($_GET['delproduct'])) {
	$delproduct = $_GET['delproduct'];
	$DELproduct = $pd->ProductDeleteById($delproduct);
}

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product List & Each Product Sale</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        Products
      </li>
      <li class="breadcrumb-item text-danger" aria-current="page">
        Product List
      </li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
      <?php
			if (isset($DELproduct)) {?>
				<div style="display: <?php if($DELproduct){ echo "block"; }else{echo "none";} ?>;"class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<span class="text-center"><?php echo $DELproduct; ?></span>
				</div>
			<?php } ?>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>S.N</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <!-- <tfoot>
              <tr>
                <th>S.N</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Action</th>
              </tr>
            </tfoot> -->
            <tbody>
              <?php
              $getpd = $pd->GetAllPdById();
              if ($getpd) {
                $i = 0;
                while ($result = $getpd->fetch_assoc()) {
                  $i++;
              ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['product_name']; ?></td>
                    <td><?php echo $result['category']; ?></td>
                    <td><?php echo $result['product_qty']; ?></td>
                    <td><?php echo $result['product_price']; ?></td>
                    <td><?php echo $result['product_total']; ?></td>
                    <td>
                      <a onclick="return confirm('READY TO SALE !');" href="new_sale.php?sale_id=<?php echo $result['product_id']; ?>" class="btn btn-sm btn-outline-success"data-toggle="tooltip" data-placement="top" title="Sale"><i class="fas fa-clipboard-check"></i></a>
                      <a onclick="return confirm('Are You Sure To Delete !');" href="?delproduct=<?php echo $result['product_id']; ?>" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
                    </td>
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