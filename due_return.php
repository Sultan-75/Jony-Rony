<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

$due_return_id = $_GET['due_return_id'];
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Due Payment Form</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Due List
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Due Payment Form
            </li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div style="display: none;" id="d1" class="alert alert-danger" role="alert">
                <span class="d_eorr text-center" id="d_eorr" style="display: none;">Field Must Not Empty</span>
            </div>
            <div style="display: none;" id="d2" class="alert alert-success" role="alert">
                <span class="d_msg text-center" id="d_msg" style="display: none;">Due payment successfull</span>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <?php
                                $getDueForSale = $duertn->getsaleidfor_due($due_return_id);
                                if ($getDueForSale) {

                                    while ($result = $getDueForSale->fetch_assoc()) {

                                ?>
                                        <div class="form-group">
                                            <label for="exsist_due" class="font-weight-bold">Due Amount</label>
                                            <input type="text" readonly value="<?php echo $result['due']; ?>" name="exsist_due" class="form-control" id="exsist_due">
                                            <input type="hidden" value="<?php echo $result['payment']; ?>" name="exsist_payment" class="form-control" id="exsist_payment">
                                            <input type="hidden" value="<?php echo $result['sale_id']; ?>" name="saleID" class="form-control" id="saleID">
                                            <input type="hidden" value="<?php echo $result['customer_name']; ?>" name="customer_name" class="form-control" id="customer_name">
                                            <input type="hidden" value="<?php echo $result['customer_num']; ?>" name="customer_num" class="form-control" id="customer_num">
                                            <input type="hidden" value="<?php echo $result['product_name']; ?>" name="product_name" class="form-control" id="product_name">
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="due_pay" class="font-weight-bold">Due Payment</label>
                                    <input type="text" name="due_pay" class="form-control" id="due_pay">
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="dueSubmit" class="btn btn-accent float-right btn-lg">Payment</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>