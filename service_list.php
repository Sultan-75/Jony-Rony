<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

if (isset($_GET['delser'])) {
    $delser = $_GET['delser'];
    $sv->serDeleteById($delser);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                All Sells
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Service List
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-1 mb-2"></div>
        <div class="col-lg-10 mb-2">
            <!-- Simple Tables -->
            <div class="card">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>S.N</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Service Details</th>
                                <th>Service Amount</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getser = $sv->getAllser();
                            if ($getser) {
                                $i = 0;
                                while ($result = $getser->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['customer_name']; ?></td>
                                        <td><?php echo $result['customer_num']; ?></td>
                                        <td><?php echo $result['service_details']; ?></td>
                                        <td><?php echo $result['service_price']; ?></td>
                                        <td><?php echo $fm->formatDate($result['date']); ?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are You Sure To Delete !');" href="?delser=<?php echo $result['service_id']; ?>" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
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