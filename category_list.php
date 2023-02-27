<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

if (isset($_GET['delcat'])) {
	$delcat = $_GET['delcat'];
	$DELcat = $cat->catDeleteById($delcat);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                All Category
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Category List
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-1 mb-2"></div>
        <div class="col-lg-10 mb-2">
            <!-- Simple Tables -->
            <div class="card">
            <?php
			if (isset($DELcat)) {?>
				<div style="display: <?php if($DELcat){ echo "block"; }else{echo "none";} ?>;"class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<span class="text-center"><?php echo $DELcat; ?></span>
					
				</div>
			<?php } ?>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Serial No</th>
                                <th>Category</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getcat = $cat->getAllcat();
                            if ($getcat) {
                                $i = 0;
                                while ($result = $getcat->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['category']; ?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are You Sure To Delete !');" href="?delcat=<?php echo $result['cat_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-1 mb-2"></div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>