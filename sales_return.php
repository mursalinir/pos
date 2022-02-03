<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
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

                        <i class="fa fa-dashboard"></i> Dashboard / Sales Return

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

                            <i class="fa fa-money fa-fw"></i> Sales Return

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

                                    <input name="date" type="date" class="form-control" value="<?php echo $today; ?>" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->


                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Invoice No. </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <select name="invoice" class="form-control">
                                        <!-- form-control Begin -->

                                        <option> Select Invoice </option>

                                        <?php

                                        $get_cat = "select * from sales";
                                        $run_cat = mysqli_query($con, $get_cat);

                                        while ($row_cat = mysqli_fetch_array($run_cat)) {

                                            $s_id = $row_cat['s_id'];
                                            $invoice = $row_cat['invoice'];

                                            echo "
                                  
                                  <option value='$invoice'> $invoice </option>
                                  
                                  ";
                                        }

                                        ?>

                                    </select><!-- form-control Finish -->

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <select name="product" class="form-control">
                                        <!-- form-control Begin -->

                                        <option> Select Product </option>

                                        <?php

                                        $get_cat = "select * from products";
                                        $run_cat = mysqli_query($con, $get_cat);

                                        while ($row_cat = mysqli_fetch_array($run_cat)) {

                                            $product_id = $row_cat['product_id'];
                                            $product_name = $row_cat['product_name'];

                                            echo "
                                  
                                  <option value='$product_id'> $product_name </option>
                                  
                                  ";
                                        }

                                        ?>

                                    </select><!-- form-control Finish -->

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Quantity </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="qty" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Remarks </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="remarks" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Submit" type="submit" class="btn btn-primary form-control">

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

        $invoice = $_POST['invoice'];
        $qty = $_POST['qty'];
        $product = $_POST['product'];
        $date = $_POST['date'];
        $remarks = $_POST['remarks'];

        $details = 'Replace for invoice: ' . $invoice;

        $get_quantity = "SELECT * from stock where product_id = '$product'";
        $run_quantity = mysqli_query($con, $get_quantity);
        $row_quantity = mysqli_fetch_array($run_quantity);
        $quantity = $row_quantity['quantity'] - $qty;
        if ($quantity < 0) {
            $quantity = 0;
        }
        $update_stock = "update stock set quantity='$quantity' where product_id = '$product'";
        $run__stock = mysqli_query($con, $update_stock);

        $insert = "INSERT into stock_report(date,pro_id,qty,details,total_qty,remarks) values ('$date','$product','$qty','$details','$quantity','$remarks')";
        $run_insert = mysqli_query($con, $insert);

        $insert_product = "insert into sales_return (date,invoice,product,qty) values ('$date','$invoice','$product','$qty')";
        $run_product = mysqli_query($con, $insert_product);

        if ($run_product) {

            echo "<script>alert('sucessfull')</script>";
            echo "<script>window.open('index.php?replace_history','_self')</script>";
        }
    }

    ?>


<?php } ?>
