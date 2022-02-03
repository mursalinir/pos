<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

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

                    <i class="fa fa-dashboard"></i> Dashboard / Replace History

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <table style="width:100%">
                            <tr>
                                <td>From <input type="date" name="from_date" value="<?php echo $today; ?>"></td>
                                <td>To <input type="date" name="to_date" value="<?php echo $today; ?>"></td>
                                <td><input name="filter" value="Filter" type="submit" class="btn btn-primary form-control"></td>
                            </tr>
                        </table>
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->
                        <div class="table-responsive">
                            <!-- table-responsive begin -->
                            <table class="table table-striped table-bordered table-hover">
                                <!-- table table-striped table-bordered table-hover begin -->

                                <thead>

                                    <!-- thead begin -->
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;"> Sl. </th>
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Invoice </th>
                                        <th style="text-align: center;"> Product </th>
                                        <th style="text-align: center;"> Quantity </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_qty = 0;

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from sales_return order by 1 desc";

                                        $run_report = mysqli_query($con, $view_report);
                                        
                                        $i = 1;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $invoice = $row_order['invoice'];

                                            $product = $row_order['product'];

                                            $qty = $row_order['qty'];

                                            $total_qty = $total_qty + $qty;

                                            $get_product = "select * from products where product_id='$product'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $product_name = $row_product['product_name'];

                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $invoice; ?> </td>
                                                <td> <?php echo $product_name; ?> </td>
                                                <td> <?php echo $qty; ?> </td>
                                            </tr><!-- tr finish -->
                                        <?php $i = $i+1; }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $view_report = "select * from sales_return where order_date between '$from_date' and '$to_date' order by 1 desc";
                                        $run_report = mysqli_query($con, $view_report);

                                        $i = 1;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $invoice = $row_order['invoice'];

                                            $product = $row_order['product'];

                                            $qty = $row_order['qty'];

                                            $total_qty = $total_qty + $qty;

                                            $get_product = "select * from products where product_id='$product'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $product_name = $row_product['product_name'];
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $invoice; ?> </td>
                                                <td> <?php echo $product_name; ?> </td>
                                                <td> <?php echo $qty; ?> </td>
                                            </tr><!-- tr finish -->
                                    <?php $i = $i+1; }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-10 finish -->
            <div class="col-md-2">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <h3 class="panel-title">
                            <!-- panel-title begin -->

                            <i class="fa fa-tags"></i> Summery


                        </h3><!-- panel-title finish -->
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->

                        <h3 style="text-align: center; color:darkslategrey"> Total Replace: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_qty; ?> Pcs</h3>

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-3 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }

?>