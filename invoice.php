<?php
include_once('classes/invoice.php');
$ivn = new Invoice();
if (isset($_GET['sell_invoice_id'])) {
    $sell_invoice_id = $_GET['sell_invoice_id'];
}

$get = $ivn->itemforinvoice($sell_invoice_id);
if ($get) {
    $result = $get->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Container Fluid-->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 px-4  border border-dark">
                <div id="printableArea">
                    <h2 class="text-center font-weight-bold">Roni & Jony Mobile Shop</h2>
                    <h4 class="text-center font-italic">Kodomtali Point, Sylhet</h4>
                    <hr>
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <span>Propiter Name:</span><br>
                            <span>Md Rony mia.</span><br>
                            <span>phone: 01700000000</span><br>
                            <span>Email: email443@gmail.com</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <span>Customer Name:</span><br>
                            <span class=""><?php echo $result['customer_name']; ?>.</span><br>
                            <span>phone: <?php echo $result['customer_num']; ?></span><br>
                            <span>Date: <?php echo $result['date']; ?></span>
                        </div>
                    </div>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>price</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['selling_qty']; ?></td>
                                <td><?php echo $result['selling_price']; ?></td>
                                <td><?php echo $result['total_amount']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-7">
                            <span class="font-weight-bold h5">Due: 25000</span>
                            <span class="font-weight-bold ml-4 h5">Paid: 250000</span>
                        </div>
                         <div class="col-md-1"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>Seller Signature</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <input type="button" onclick="printDiv('printableArea')" value="Print" />
    </div>

    <!-- Bootstarp bundle & jquery files -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>