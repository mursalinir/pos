<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row">
        <!-- row no: 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <h1 class="page-header"> Dashboard </h1>

            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->

        </div><!-- col-lg-12 finish -->
    </div><!-- row no: 1 finish -->

    <div class="row">
        <!-- row no: 2 begin -->

        <div class="col-lg-3 col-md-6">
            <!-- col-lg-3 col-md-6 begin -->
            <div class="panel panel-primary">
                <!-- panel panel-primary begin -->

                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <div class="row">
                        <!-- panel-heading row begin -->
                        <div class="col-xs-3">
                            <!-- col-xs-3 begin -->

                            <i class="fa fa-tasks fa-5x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right">
                            <!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_products; ?> </div>

                            <div> Products </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?view_products">
                    <!-- a href begin -->
                    <div class="panel-footer">
                        <!-- panel-footer begin -->

                        <span class="pull-left">
                            <!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right">
                            <!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-primary finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

        <div class="col-lg-3 col-md-6">
            <!-- col-lg-3 col-md-6 begin -->
            <div class="panel panel-green">
                <!-- panel panel-green begin -->

                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <div class="row">
                        <!-- panel-heading row begin -->
                        <div class="col-xs-3">
                            <!-- col-xs-3 begin -->

                            <i class="fa fa-dollar fa-5x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right">
                            <!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_due . ' '; ?> </div>
                            Tk
                            <div> Current Dues </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?customer_due">
                    <!-- a href begin -->
                    <div class="panel-footer">
                        <!-- panel-footer begin -->

                        <span class="pull-left">
                            <!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right">
                            <!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-green finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

        <div class="col-lg-3 col-md-6">
            <!-- col-lg-3 col-md-6 begin -->
            <div class="panel panel-orange">
                <!-- panel panel-yellow begin -->

                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <div class="row">
                        <!-- panel-heading row begin -->
                        <div class="col-xs-3">
                            <!-- col-xs-3 begin -->

                            <i class="fa fa-tags fa-5x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right">
                            <!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_sale; ?> </div>

                            <div> Sales Today </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?sales_report">
                    <!-- a href begin -->
                    <div class="panel-footer">
                        <!-- panel-footer begin -->

                        <span class="pull-left">
                            <!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right">
                            <!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-yellow finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

        <div class="col-lg-3 col-md-6">
            <!-- col-lg-3 col-md-6 begin -->
            <div class="panel panel-red">
                <!-- panel panel-red begin -->

                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <div class="row">
                        <!-- panel-heading row begin -->
                        <div class="col-xs-3">
                            <!-- col-xs-3 begin -->

                            <i class="fa fa-shopping-cart fa-5x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right">
                            <!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_stock; ?> </div>

                            <div> Items in Stock </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?stock">
                    <!-- a href begin -->
                    <div class="panel-footer">
                        <!-- panel-footer begin -->

                        <span class="pull-left">
                            <!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right">
                            <!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-red finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

    </div><!-- row no: 2 finish -->

    <div class="row">
        <!-- row no: 3 begin -->
        <div class="col-lg-12">
            <!-- col-lg-8 begin -->
            <div class="panel panel-primary">
                <!-- panel panel-primary begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <h3 class="panel-title">
                        <!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> New Sales Report

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-hover table-striped table-bordered">
                            <!-- table table-hover table-striped table-bordered begin -->

                            <thead>
                                <!-- thead begin -->

                                <tr>
                                    <!-- tr begin -->
                                    <th style="text-align: center;"> Invoice </th>
                                    <th style="text-align: center;"> Date </th>
                                    <th style="text-align: center;"> Customer Name </th>
                                    <th style="text-align: center;"> Product</th>
                                    <th style="text-align: center;"> Quantity</th>
                                    <th style="text-align: center;"> Price </th>
                                    <th style="text-align: center;"> Profit </th>
                                    <th style="text-align: center;"> Details </th>

                                </tr><!-- tr finish -->

                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->
                                <?php
                                $view_report = "select * from sales where order_date = CURRENT_DATE() order by 1 desc";

                                $run_report = mysqli_query($con, $view_report);

                                while ($row_order = mysqli_fetch_array($run_report)) {

                                    $order_id = $row_order['s_id'];

                                    $invoice = $row_order['invoice'];

                                    $product_id = $row_order['product_id'];

                                    $product_qty = $row_order['product_qty'];

                                    $total_price = $row_order['sub_total'];

                                    $profit = $row_order['profit'];

                                    $customer_name = $row_order['customer_name'];

                                    $order_date = $row_order['order_date'];

                                    $section_id = $row_order['section'];

                                    $get_product = "select * from products where product_id='$product_id'";

                                    $run_product = mysqli_query($con, $get_product);

                                    $row_product = mysqli_fetch_array($run_product);

                                    $product_name = $row_product['product_name'];

                                    $get_section = "select * from section where section_id='$section_id'";

                                    $run_section = mysqli_query($con, $get_section);

                                    $row_section = mysqli_fetch_array($run_section);

                                    $section_name = $row_section['section_name'];
                                ?>

                                    <tr style="text-align: center;">
                                        <!-- tr begin -->
                                        <td> <?php echo $invoice; ?> </td>
                                        <td> <?php echo $order_date; ?></td>
                                        <td> <?php echo $customer_name; ?> </td>
                                        <td> <?php echo $product_name; ?> </td>
                                        <td> <?php echo $product_qty; ?> </td>
                                        <td> <?php echo $total_price; ?> </td>
                                        <td> <?php echo $profit; ?> </td>
                                        <td>

                                            <a href="index.php?sale_details=<?php echo $order_id; ?>">

                                                <i class="fa fa-pencil"></i> Details

                                            </a>

                                        </td>
                                    </tr><!-- tr finish -->
                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-hover table-striped table-bordered finish -->
                    </div><!-- table-responsive finish -->

                    <div class="text-right">
                        <!-- text-right begin -->

                        <a href="index.php?sales_report">
                            <!-- a href begin -->

                            View All Orders <i class="fa fa-arrow-circle-right"></i>

                        </a><!-- a href finish -->

                    </div><!-- text-right finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-primary finish -->
        </div><!-- col-lg-8 finish -->



    </div><!-- row no: 3 finish -->


<?php } ?>