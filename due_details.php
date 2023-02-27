<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Due Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                All Due
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Due Details
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>S.N</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $getalldue = $duertn->AllDueEnties();
                            if ($getalldue) {
                                $i = 0;
                                while ($result = $getalldue->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['customer_name']; ?></td>
                                        <td><?php echo $result['customer_num']; ?></td>
                                        <td><?php echo $result['product_name']; ?></td>
                                        <td><?php echo $result['due_paid']; ?></td>
                                        <td><?php echo $fm->formatDate($result['date']); ?></td>
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