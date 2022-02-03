<?php
$total_qty = 0;
$total_price = 0;

$get_stock = "select * from stock";

$run_stock = mysqli_query($con, $get_stock);

while ($row_stock = mysqli_fetch_array($run_stock)) {

    $qty = $row_stock['quantity'];

    $total_price = $total_price + ($row_stock['purchase_rate'] * $qty);

    $total_qty = $total_qty + $qty;
}

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Stock

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <div class="panel panel-default">
                <!-- panel panel-default begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <table style="width:100%">
                        <tr>
                            <th>Total Goods: <?php echo $total_qty . " Pcs"; ?></th>

                            <th> Total Price: <?php echo $total_price . " Tk"; ?></th>
                            <th>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <input name="excel" value="Export to excel" type="submit" class="btn btn-primary form-control">
                                </form>
                            </th>

                        </tr>
                    </table>
                </div><!-- panel-heading finish -->



                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover" id="table">
                            <!-- table table-striped table-bordered table-hover begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr>
                                    <!-- tr begin -->
                                    <th style="text-align:center"> Product ID </th>
                                    <th style="text-align:center"> Product Name </th>
                                    <th style="text-align:center" class="no"> Product Image </th>
                                    <th style="text-align:center"> Category </th>
                                    <th style="text-align:center"> Purchase Rate </th>
                                    <th style="text-align:center"> Unit Price </th>
                                    <th style="text-align:center"> In Stock </th>
                                    <th style="text-align:center" class="no"> Edit </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php

                                $i = 0;

                                $get_pro = "select * from products";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['product_id'];

                                    $pro_title = $row_pro['product_name'];

                                    $pro_img = $row_pro['product_img'];

                                    $pro_cat_id = $row_pro['product_cat'];

                                    $get_cat = "select * from categories where cat_id= '$pro_cat_id'";

                                    $run_cat = mysqli_query($con, $get_cat);

                                    while ($row_cat = mysqli_fetch_array($run_cat)) {

                                        $pro_cat = $row_cat['cat_title'];
                                    }

                                    $get_stock = "select * from stock where product_id= '$pro_id'";

                                    $run_stock = mysqli_query($con, $get_stock);

                                    while ($row_stock = mysqli_fetch_array($run_stock)) {

                                        $stock_id = $row_stock['s_id'];

                                        $purchase_rate = $row_stock['purchase_rate'];

                                        $unit_price = $row_stock['unit_price'];

                                        $date = $row_stock['date'];

                                        $quantity = $row_stock['quantity'];
                                    }


                                    $i++;


                                ?>

                                    <tr>
                                        <!-- tr begin -->
                                        <td style="text-align:center; font-size:17px"> <?php echo $pro_id; ?> </td>
                                        <td style="text-align:center; font-size:17px"> <?php echo $pro_title; ?> </td>
                                        <td style="text-align:center; font-size:17px" class="no"> <img src="product_images/<?php echo $pro_img; ?>" width="100" height="60"></td>
                                        <td style="text-align:center; font-size:17px"> <?php echo $pro_cat; ?></td>
                                        <td style="text-align:center; font-size:17px"> <?php echo $purchase_rate; ?> Tk</td>
                                        <td style="text-align:center; font-size:17px"> <?php echo $unit_price; ?> Tk</td>
                                        <td style="text-align:center; font-size:17px"> <?php echo $quantity; ?> Pcs</td>
                                        <td style="text-align:center; font-size:17px" class="no">

                                            <a href="index.php?edit_stock=<?php echo $stock_id; ?>">

                                                <i class="fa fa-pencil"></i> Edit

                                            </a>

                                        </td>
                                    </tr><!-- tr finish -->

                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php }
if (isset($_POST['excel'])) { ?>
    <script>
        $(document).ready(function() {
            $("#table").table2excel({
                exclude: ".no",
                filename: "Stock.xls"
            });
        });
    </script>
<?php
}
?>