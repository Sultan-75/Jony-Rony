<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/lib/Database.php');
include_once($filepath . '/lib/Query.php');
$db = new Database();
$qu = new Query();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['submit'])) {
        $fromdate = $_GET['fromdate'];
        $todate = $_GET['todate'];
        $query = "SELECT * FROM tbl_sale WHERE date BETWEEN '$fromdate' AND '$todate'";
        $datepic  = $qu->select($query);
    }
}

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-primary mx-2 px-4" data-toggle="modal" data-target="#today" data-whatever="@mdo">Today</button>
            <button type="button" class="btn btn-primary mx-2 px-4" data-toggle="modal" data-target="#week" data-whatever="@mdo">Weekly</button>
            <button type="button" class="btn btn-primary mx-2 px-4" data-toggle="modal" data-target="#month" data-whatever="@mdo">Montly</button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <form action="sell_reports.php" method="GET">
        <div class="row mt-3 mb-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex">
                <input type="date" name="fromdate" class="form-control" placeholder="From date..">
                <input type="date" name="todate" class="form-control ml-1" placeholder="To date..">
                <input type="submit" name="submit" class="btn btn-success py-2 font-weight-bold ml-2" value="Submit">
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($datepic)) {
                if ($datepic == true) { ?>
                    <div class="card mb-4">
                        <div class="table-responsive p-3 ">
                            <table class="table table-bordered  table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Action</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Product's Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>

                                        <th>Payment</th>
                                        <th>Due</th>

                                        <th>Date</th>
                                        <th>IMEI NO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($datepic)) {
                                        $i = 0;
                                        while ($result = $datepic->fetch_assoc()) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td style="white-space:nowrap;">
                                                    <a onclick="return confirm('Are You Sure To Return this Product!');" href="return.php?sell_return_id=<?php echo $result['sale_id']; ?>" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Return"><i class="fas fa-undo-alt"></i></a>
                                                    <a href="invoice.php?sell_invoice_id=<?php echo $result['sale_id']; ?>" class="btn btn-sm btn-outline-secondary mt-1" data-toggle="tooltip" data-placement="top" title="Invoice"><i class="fas fa-file-invoice"></i></a>
                                                </td>
                                                <td><?php echo $result['customer_name']; ?></td>
                                                <td><?php echo $result['customer_num']; ?></td>
                                                <td style="white-space:nowrap;"><?php echo $result['product_name']; ?></td>
                                                <td><?php echo $result['selling_price']; ?></td>
                                                <td><?php echo $result['selling_qty']; ?></td>

                                                <td><?php echo $result['payment']; ?></td>
                                                <td><?php echo $result['due']; ?></td>

                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                <td><?php echo $result['product_imei']; ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

    <!-- modal code Today Start-->
    <div class="modal fade" id="today" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>S.N</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>payment</th>
                                                <th>Due</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $today = $logic->datewisetodaysale();
                                            if ($today) {
                                                $i = 0;
                                                while ($result = $today->fetch_assoc()) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result['customer_name']; ?></td>
                                                        <td><?php echo $result['customer_num']; ?></td>
                                                        <td><?php echo $result['product_name']; ?></td>
                                                        <td><?php echo $result['selling_price']; ?></td>
                                                        <td><?php echo $result['selling_qty']; ?></td>
                                                        <td><?php echo $result['payment']; ?></td>

                                                        <td><?php echo $result['due']; ?></td>
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
                </div>

            </div>
        </div>
    </div>
    <!-- modal code Today End-->
    <!-- modal code week Start-->
    <div class="modal fade" id="week" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>S.N</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>payment</th>
                                                <th>Due</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $today = $logic->datewiseweeklysale();
                                            if ($today) {
                                                $i = 0;
                                                while ($result = $today->fetch_assoc()) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result['customer_name']; ?></td>
                                                        <td><?php echo $result['customer_num']; ?></td>
                                                        <td><?php echo $result['product_name']; ?></td>
                                                        <td><?php echo $result['selling_price']; ?></td>
                                                        <td><?php echo $result['selling_qty']; ?></td>
                                                        <td><?php echo $result['payment']; ?></td>

                                                        <td><?php echo $result['due']; ?></td>
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
                </div>

            </div>
        </div>
    </div>
    <!-- modal code week End-->
    <!-- modal code month Start-->
    <div class="modal fade" id="month" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>S.N</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>payment</th>
                                                <th>Due</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $today = $logic->datewisemonthlysale();
                                            if ($today) {
                                                $i = 0;
                                                while ($result = $today->fetch_assoc()) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result['customer_name']; ?></td>
                                                        <td><?php echo $result['customer_num']; ?></td>
                                                        <td><?php echo $result['product_name']; ?></td>
                                                        <td><?php echo $result['selling_price']; ?></td>
                                                        <td><?php echo $result['selling_qty']; ?></td>
                                                        <td><?php echo $result['payment']; ?></td>

                                                        <td><?php echo $result['due']; ?></td>
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
                </div>

            </div>
        </div>
    </div>
    <!-- modal code Today End-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>