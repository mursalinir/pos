<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['purchase_details'])) {

        $detail_id = $_GET['purchase_details'];

        $get_detail = "select * from purchase where invoice='$detail_id'";

        $run_detail = mysqli_query($con, $get_detail);

        $row_detail = mysqli_fetch_array($run_detail);

        $product_id = $row_detail['product_id'];

        $invoice = $row_detail['invoice'];

        $product_qty = $row_detail['product_qty'];

        $purchase_rate = $row_detail['purchase_rate'];

        $unit_price = $row_detail['unit_price'];

        $total_price = $row_detail['total_price'];

        $customer_name = $row_detail['seller_name'];

        $author_id = $row_detail['author_id'];

        $order_date = $row_detail['purchase_date'];

        $customer_contact = $row_detail['seller_contact'];

        $customer_city = $row_detail['seller_city'];

        $customer_address = $row_detail['seller_address'];

        $cat = $row_detail['product_category'];

        $get_product = "select * from products where product_id='$product_id'";

        $run_product = mysqli_query($con, $get_product);

        $row_product = mysqli_fetch_array($run_product);

        $product_name = $row_product['product_name'];

        $product_img = $row_product['product_img'];

        $get_cat = "select * from categories where cat_id='$cat'";

        $run_cat = mysqli_query($con, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $product_category = $row_cat['cat_title'];

        $get_author = "select * from admins where admin_id = '$author_id'";

        $run_author = mysqli_query($con, $get_author);

        $row_author = mysqli_fetch_array($run_author);

        $author = $row_author['admin_name'];
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Detail Report </title>
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

                        <i class="fa fa-dashboard"></i> Dashboard / Details Sale Report

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

                            <i class="fa fa-money fa-fw"></i> Details Sale Report

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <div class="row">
                            <!-- row Begin -->

                            <div class="col-md-8">
                                <!-- col-md-8 Begin -->

                                <div class="table-responsive">
                                    <!-- table-responsive begin -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- table table-striped table-bordered table-hover begin -->

                                        <tbody>
                                            <!-- tbody begin -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Invoice No.</th>
                                                <td><?php echo "$invoice"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Order Date</th>
                                                <td><?php echo "$order_date"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Product Name</th>
                                                <td><?php echo "$product_name"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Product Category</th>
                                                <td><?php echo "$product_category"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Quantity</th>
                                                <td><?php echo "$product_qty"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Unit Price</th>
                                                <td><?php echo "$unit_price "; ?>Tk</td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Total Price</th>
                                                <td><?php echo "$total_price Tk"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Supplier Name</th>
                                                <td><?php echo "$customer_name"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Supplier Contact</th>
                                                <td><?php echo "$customer_contact"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Supplier City</th>
                                                <td><?php echo "$customer_city"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Supplier Address</th>
                                                <td><?php echo "$customer_address"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Purchased By</th>
                                                <td><?php echo "$author"; ?></td>
                                            </tr><!-- tr finish -->

                                        </tbody><!-- tbody finish -->
                                    </table><!-- table table-striped table-bordered table-hover finish -->
                                </div><!-- table-responsive finish -->

                            <form action="?delete_purchase=<?php echo $invoice; ?>" method="POST">

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-6">
                                        <!-- col-md-6 Begin -->

                                        <input name="delete" value="Delete this purchase record!" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->
                            </form>

                            </div>
                            <!-- col-md-8 Finish -->

                            <div class="col-md-4">
                                <!-- col-md-4 Begin -->

                                <img src="product_images/<?php echo $product_img; ?>" width="250" height="200" class="center" alt="Product Image">

                            </div>
                            <!-- col-md-4 Finish -->

                        </div>
                        <!-- row Finish -->

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


<?php } ?>