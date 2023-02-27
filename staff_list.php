<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
/* include_once($filepath . '/classes/staff.php');
$stf = new Satff(); */
/* if (isset($_GET['delcat'])) {
	$delcat = $_GET['delcat'];
	$DELcat = $cat->catDeleteById($delcat);
} */
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Staff List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                All Staff
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Staff List
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-1 mb-2"></div>
        <div class="col-lg-10 mb-2">
            <!-- Simple Tables -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>S.N</th>
                                <th>Staff Name</th>
                                <th>Staff Phone</th>
                                <th>Staff NID</th>
                                <th>Salary</th>
                                <th>Staff Adress</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getstf = $stf->getAllstf();
                            if ($getstf) {
                                $i = 0;
                                while ($result = $getstf->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['staff_name']; ?></td>
                                        <td><?php echo $result['staff_num']; ?></td>
                                        <td><?php echo $result['staff_nid']; ?></td>
                                        <td><?php echo $result['staff_salary']; ?></td>
                                        <td><?php echo $result['staff_address']; ?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are You Sure To Delete !');" href="?delstf=<?php echo $result['staff_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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