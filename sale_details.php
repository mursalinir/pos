<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['sale_details'])) {

        $detail_id = $_GET['sale_details'];

        $view_report = "select * from sales where invoice='$detail_id'";

        $run_report = mysqli_query($con, $view_report);

        $total_price = 0;
        $details = '';

        while ($row_order = mysqli_fetch_array($run_report)) {

            $invoice = $row_order['invoice'];

            $date = $row_order['order_date'];

            $order_id = $row_order['s_id'];

            $product_id = $row_order['product_id'];

            $product_qty = $row_order['product_qty'];

            $product_serial = $row_order['product_serial'];

            $sub_total = $row_order['sub_total'];

            $total_price = $sub_total + $total_price;

            $details = $details . ', ' . $row_order['details'] . ' ' . $product_serial . '(' . $sub_total . ' Tk)';

            $customer_name = $row_order['customer_name'];

            $customer_contact = $row_order['customer_contact'];

            $customer_city = $row_order['customer_city'];

            $customer_address = $row_order['customer_address'];

            $author_id = $row_order['author_id'];

            $order_date = $row_order['order_date'];

            $old_bat = $row_order['old_bat'];

            $get_product = "select * from products where product_id='$product_id'";

            $run_product = mysqli_query($con, $get_product);

            $row_product = mysqli_fetch_array($run_product);

            $product_name = $row_product['product_name'];
        }
        $get_amount = "select * from amount where invoice='$detail_id'";

        $run_amount = mysqli_query($con, $get_amount);

        $row_amount = mysqli_fetch_array($run_amount);

        $paid_by_cash = $row_amount['paid_by_cash'];
        $old_bat_name = $row_amount['old_bat_name'];
        $old_bat_price = $row_amount['old_bat_price'];
        $due = $row_amount['due'];

        $old_bat = $old_bat_name . ' ' . $old_bat_price . ' Tk';
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

                            <div class="col-md-12">
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
                                                <th style="text-align: center;">Product Details</th>
                                                <td><?php echo "$details"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Sales Amount</th>
                                                <td><?php echo "$total_price Tk"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Paid by Cash</th>
                                                <td><?php echo "$paid_by_cash Tk"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Old Battery Exchange</th>
                                                <td><?php echo "$old_bat"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Dues Amount</th>
                                                <td><?php echo "$due Tk"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Name</th>
                                                <td><?php echo "$customer_name"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Contact</th>
                                                <td><?php echo "$customer_contact"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer City</th>
                                                <td><?php echo "$customer_city"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Address</th>
                                                <td><?php echo "$customer_address"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:20px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Sale By</th>
                                                <td><?php echo "$author_id"; ?></td>
                                            </tr><!-- tr finish -->

                                        </tbody><!-- tbody finish -->
                                    </table><!-- table table-striped table-bordered table-hover finish -->
                                </div><!-- table-responsive finish -->

                                <form action="?delete_sale=<?php echo $invoice; ?>" method="POST">

                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="delete" value="Delete this sale record!" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </form>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!-- form-horizontal Begin -->
                                    <div class="form-group">
                                        <!-- form-group Begin -->

                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <input name="print" value="Print this invoice" type="submit" class="btn btn-primary form-control">

                                        </div><!-- col-md-6 Finish -->

                                    </div><!-- form-group Finish -->
                                </form>


                            </div>
                            <!-- col-md-8 Finish -->

                            <!-- <div class="col-md-4">
                                 col-md-4 Begin 

                                <img src="product_images/<?php echo $product_img; ?>" width="250" height="200" class="center" alt="Product Image">

                            </div>
                             col-md-4 Finish 

                        </div>
                         row Finish -->

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

    if (isset($_POST['print'])) {
        echo "<script>window.open('print/print.php?print=$invoice','_blank')</script>";
    }
} ?>