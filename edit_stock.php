<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if (isset($_GET['edit_stock'])) {

    $stock_id = $_GET['edit_stock'];

    $query = "select * from stock where s_id='$stock_id'";

    $run = mysqli_query($con, $query);

    $row_order = mysqli_fetch_array($run);

    $purchase_rate = $row_order['purchase_rate'];

    $unit_price = $row_order['unit_price'];

    $quantity = $row_order['quantity'];

    $product_id = $row_order['product_id'];

    $product_cat = $row_order['category_id'];

    $get_product = "select * from products where product_id = '$product_id'";
    $run = mysqli_query($con, $get_product);
    $row = mysqli_fetch_array($run);

    $product_name = $row['product_name'];
}


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (($admin_id != '1') && ($admin_id != '2')) {
        echo "<script>alert('You Do not have Permission!')</script>";
        echo "<script>window.open('index.php?stock','_self')</script>";
    } else {
        if ($product_cat == '2') { ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title> Insert Products </title>
            </head>

            <body>

                <div class="row">
                    <!-- row Begin -->

                    <div class="col-lg-12">
                        <!-- col-lg-12 Begin -->

                        <ol class="breadcrumb">
                            <!-- breadcrumb Begin -->

                            <li class="active">
                                <!-- active Begin -->

                                <i class="fa fa-dashboard"></i> Dashboard / Edit Stock

                            </li><!-- active Finish -->

                        </ol><!-- breadcrumb Finish -->

                    </div><!-- col-lg-12 Finish -->

                </div><!-- row Finish -->

                <div class="row">
                    <!-- row Begin -->

                    <div class="col-lg-12">
                        <!-- col-lg-12 Begin -->

                        <div class="panel panel-default">
                            <!-- panel panel-default Begin -->

                            <div class="panel-heading">
                                <!-- panel-heading Begin -->

                                <h3 class="panel-title">
                                    <!-- panel-title Begin -->

                                    <i class="fa fa-money fa-fw"></i> Stock

                                </h3><!-- panel-title Finish -->

                            </div> <!-- panel-heading Finish -->

                            <div class="panel-body">
                                <!-- panel-body Begin -->

                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!-- form-horizontal Begin -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Date </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="date" type="date" style="text-align:center" class="form-control" value="<?php echo $today; ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Product Name </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <label class="form-control" style="text-align:center"><?php echo $product_name ?></label>
                                            <input type="hidden" id="total" name="total" value="<?php echo $product_name ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Current Stock(Pcs) </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <label class="form-control" style="text-align:center"><?php echo $quantity ?></label>
                                            <input type="hidden" id="total" name="qty" value="<?php echo $quantity ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Dispose Quantity(Pcs) </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="dispose_qty" type="text" value="0" style="text-align:center" class="form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Remarks </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="remarks" type="text" style="text-align:center" class="form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="submit" value="Update Stock" type="submit" class="btn btn-primary form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                </form><!-- form-horizontal Finish -->

                            </div><!-- panel-body Finish -->

                        </div><!-- canel panel-default Finish -->

                    </div><!-- col-lg-12 Finish -->

                </div><!-- row Finish -->

                <script src="js/tinymce/tinymce.min.js"></script>
                <script>
                    tinymce.init({
                        selector: 'textarea'
                    });
                </script>
            </body>

            </html>


            <?php

            if (isset($_POST['submit'])) {
                $admin = $admin_name;
                $date = $_POST['date'];
                $dispose_qty = $_POST['dispose_qty'];
                $quantity = $_POST['qty'];
                $details = $_POST['remarks'];
                $remarks = 'Disposed by '. $admin;
                $total_qty = $quantity - $dispose_qty;
                $activity = "Update stock";                

                if($product_id==9)
                {                    
                    $insert = "INSERT into old_ev_report(date, details, qty, total_qty, remarks) values ('$date','$details','$dispose_qty','$total_qty','$remarks')";
                    $run_insert = mysqli_query($con, $insert);
                    $update = "update stock set date='$date',quantity='$total_qty' where s_id=$stock_id";
                    $run_update = mysqli_query($con, $update);
                }
                if($product_id==10)
                {
                    $insert = "INSERT into old_dry_report(date, details, qty, total_qty, remarks) values ('$date','$details','$dispose_qty','$total_qty','$remarks')";
                    $run_insert = mysqli_query($con, $insert);
                    $update = "update stock set date='$date',quantity='$total_qty' where s_id=$stock_id";
                    $run_update = mysqli_query($con, $update);
                }

                if ($run_update) {
                    $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin')";
                    $run_logs = mysqli_query($con, $insert_logs);

                    echo "<script>alert('Update sucessfull')</script>";
                    echo "<script>window.open('index.php?stock','_self')</script>";
                }
            }
        } else {
            ?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title> Insert Products </title>
            </head>

            <body>

                <div class="row">
                    <!-- row Begin -->

                    <div class="col-lg-12">
                        <!-- col-lg-12 Begin -->

                        <ol class="breadcrumb">
                            <!-- breadcrumb Begin -->

                            <li class="active">
                                <!-- active Begin -->

                                <i class="fa fa-dashboard"></i> Dashboard / Edit Stock

                            </li><!-- active Finish -->

                        </ol><!-- breadcrumb Finish -->

                    </div><!-- col-lg-12 Finish -->

                </div><!-- row Finish -->

                <div class="row">
                    <!-- row Begin -->

                    <div class="col-lg-12">
                        <!-- col-lg-12 Begin -->

                        <div class="panel panel-default">
                            <!-- panel panel-default Begin -->

                            <div class="panel-heading">
                                <!-- panel-heading Begin -->

                                <h3 class="panel-title">
                                    <!-- panel-title Begin -->

                                    <i class="fa fa-money fa-fw"></i> Stock

                                </h3><!-- panel-title Finish -->

                            </div> <!-- panel-heading Finish -->

                            <div class="panel-body">
                                <!-- panel-body Begin -->

                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!-- form-horizontal Begin -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Date </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="date" type="date" style="text-align:center" class="form-control" value="<?php echo $today; ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Product Name </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <label class="form-control" style="text-align:center"><?php echo $product_name ?></label>
                                            <input type="hidden" id="total" name="total" value="<?php echo $product_name ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Current Stock(Pcs) </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <label class="form-control" style="text-align:center"><?php echo $quantity ?></label>
                                            <input type="hidden" id="qty" name="qty" value="<?php echo $quantity ?>">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Reciepts Quantity(Pcs) </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="quantity" type="text" value="0" style="text-align:center" class="form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"> Remarks </label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="remarks" type="text" style="text-align:center" value="Stock Updated by <?php echo $admin_name; ?>" class="form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="submit" value="Update Stock" type="submit" class="btn btn-primary form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->

                                </form><!-- form-horizontal Finish -->

                            </div><!-- panel-body Finish -->

                        </div><!-- canel panel-default Finish -->

                    </div><!-- col-lg-12 Finish -->

                </div><!-- row Finish -->

                <script src="js/tinymce/tinymce.min.js"></script>
                <script>
                    tinymce.init({
                        selector: 'textarea'
                    });
                </script>
            </body>

            </html>


        <?php

            if (isset($_POST['submit'])) {

                $date = $_POST['date'];
                $reciept_quantity = $_POST['quantity'];
                $remarks = $_POST['remarks'];
                $stock_qty = $quantity + $reciept_quantity;
                $details = 'Reciept in Stock';

                $activity = "Update stock";
                $admin = $admin_name;

                $insert = "INSERT into stock_report(date,pro_id,qty,details,total_qty,remarks) values ('$date','$product_id','$reciept_quantity','$details','$stock_qty','$remarks')";
                $run_insert = mysqli_query($con, $insert);
                $update = "update stock set quantity='$stock_qty' where s_id=$stock_id";
                $run_update = mysqli_query($con, $update);

                if ($run_update) {
                    $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin')";
                    $run_logs = mysqli_query($con, $insert_logs);

                    echo "<script>alert('Update sucessfull')</script>";
                    echo "<script>window.open('index.php?stock','_self')</script>";
                }
            }
        }
        ?>


<?php }
} ?>