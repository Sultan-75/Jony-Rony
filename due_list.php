<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Due List</h1>
        <a href="due_details.php" class="btn btn-primary text-decoration-none">All Due Details</a>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                All List
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Due List
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
                                <th>Due Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $getdue = $duertn->getDuelist();
                            if ($getdue) {
                                $i = 0;
                                while ($result = $getdue->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['customer_name']; ?></td>
                                        <td><?php echo $result['customer_num']; ?></td>
                                        <td><?php echo $result['product_name']; ?></td>
                                        <td><?php echo $result['due']; ?></td>
                                        <td><?php echo $fm->formatDate($result['date']); ?></td>
                                        <td>
                                            <a href="due_return.php?due_return_id=<?php echo $result['sale_id']; ?>" class="btn btn-sm btn-success">Payment</a>
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