<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
//$duertn->delReturnlist();

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Return List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                All List
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Return List
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>S.N</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $getrtn = $duertn->getReturnlist();
                            if ($getrtn) {
                                $i = 0;
                                while ($result = $getrtn->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['customer_name']; ?></td>
                                        <td><?php echo $result['customer_num']; ?></td>
                                        <td><?php echo $result['product_name']; ?></td>
                                        <td><?php echo $result['return_selling_qty']; ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-1">
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>