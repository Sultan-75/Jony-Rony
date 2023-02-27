<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');

if (isset($_GET['catID'])) {
    $catID = $_GET['catID'];
    $GetcatID = $pd->ProductbyFolder($catID);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Folder</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Product
            </li>
            <li class="breadcrumb-item text-danger" aria-current="page">
                Product Folder
            </li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <?php
            $getcat = $cat->getAllcat();
            if ($getcat) {
                while ($result = $getcat->fetch_assoc()) {
            ?>
                    <a href="?catID=<?php echo $result['cat_id']; ?>" class="btn btn-outline-primary btn-icon-split mb-2">
                        <span class="icon text-dark-600">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text"><?php echo $result['category']; ?></span>
                    </a>
            <?php }
            } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <?php
                if (isset($GetcatID)) {
                ?>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>S.N</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                if ($GetcatID) {
                                    $i = 0;
                                    while ($result2 = $GetcatID->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result2['product_name']; ?></td>
                                            <td><?php echo $result2['product_qty']; ?></td>
                                            <td><?php echo $result2['product_price']; ?></td>
                                            <td><?php echo $result2['product_total']; ?></td>
                                        </tr>
                                <?php

                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>