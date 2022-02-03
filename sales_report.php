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

                    <i class="fa fa-dashboard"></i> Dashboard / Sales Report

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-10">
                <!-- col-lg-12 begin -->
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <table style="width:100%">
                            <tr>
                                <td>From <input type="date" name="from_date" value="<?php echo $today; ?>"></td>
                                <td>To <input type="date" name="to_date" value="<?php echo $today; ?>"></td>

                                <td>Product Category: <select name="section">
                                        <!-- form-control Begin -->

                                        <option value="0"> All </option>

                                        <?php

                                        $get_section = "select * from categories";
                                        $run_section = mysqli_query($con, $get_section);

                                        while ($row_section = mysqli_fetch_array($run_section)) {

                                            $section_id = $row_section['cat_id'];
                                            $section_name = $row_section['cat_title'];

                                            echo "

                                                    <option value='$section_id'> $section_name </option>

                                                ";
                                        }

                                        ?>

                                    </select><!-- form-control Finish -->
                                </td>

                                <td> <button name="filter" type="submit" class="btn btn-primary form-control">
                                        <i class="fa fa-filter" aria-hidden="true"> Filter</i>
                                </td>
                                <td style="width: 3%;"></td>
                                <td> <button name="reset" type="submit" class="btn btn-primary form-control" style="background-color: lightcoral;"> Reset
                                </td>

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
                                        <th style="text-align: center;"> Invoice </th>
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Customer </th>
                                        <th style="text-align: center;"> Product Details</th>
                                        <th style="text-align: center;"> Price </th>

                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_sales = 0;
                                    $total_profit = 0;

                                    if (isset($_POST['filter'])) {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $section = $_POST['section'];

                                        if ($section == 0) {
                                            $view_report = "select * from sales where order_date between '$from_date' and '$to_date' group by invoice order by 1 desc";
                                        } else {
                                            $view_report = "select * from sales where product_category='$section' and order_date between '$from_date' and '$to_date' group by invoice order by 1 desc";
                                        }

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $invoice = $row_order['invoice'];

                                            $date = $row_order['order_date'];

                                            $view_report_invoice = "select * from sales where invoice = '$invoice'";

                                            $run_report_invoice = mysqli_query($con, $view_report_invoice);

                                            $total_price = 0;
                                            $details = '';

                                            while ($row_order_invoice = mysqli_fetch_array($run_report_invoice)) {

                                                $order_id = $row_order_invoice['s_id'];

                                                $product_id = $row_order_invoice['product_id'];

                                                $product_qty = $row_order_invoice['product_qty'];

                                                $total_price = $row_order_invoice['sub_total'] + $total_price;

                                                $details = $details . ', ' . $row_order_invoice['details'];

                                                $customer_name = $row_order_invoice['customer_name'];

                                                $customer_contact = $row_order_invoice['customer_contact'];

                                                $order_date = $row_order_invoice['order_date'];

                                                $get_product = "select * from products where product_id='$product_id'";

                                                $run_product = mysqli_query($con, $get_product);

                                                $row_product = mysqli_fetch_array($run_product);

                                                $product_name = $row_product['product_name'];

                                                $total_sales = $total_sales + $total_price;

                                                $customer = $customer_name . ' (' . $customer_contact . ')';
                                            }
                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <a href="index.php?sale_details=<?php echo $invoice; ?>"><?php echo $invoice; ?></a> </td>
                                                <td> <?php echo $order_date; ?></td>
                                                <td> <?php echo $customer; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $total_price; ?> Tk</td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $view_report = "select * from sales group by invoice order by 1 desc";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $invoice = $row_order['invoice'];

                                            $date = $row_order['order_date'];

                                            $view_report_invoice = "select * from sales where invoice = '$invoice'";

                                            $run_report_invoice = mysqli_query($con, $view_report_invoice);

                                            $total_price = 0;
                                            $details = '';

                                            while ($row_order_invoice = mysqli_fetch_array($run_report_invoice)) {

                                                $order_id = $row_order_invoice['s_id'];

                                                $product_id = $row_order_invoice['product_id'];

                                                $product_qty = $row_order_invoice['product_qty'];

                                                $total_price = $row_order_invoice['sub_total'] + $total_price;

                                                $details = $details . ', ' . $row_order_invoice['details'];

                                                $customer_name = $row_order_invoice['customer_name'];

                                                $customer_contact = $row_order_invoice['customer_contact'];

                                                $order_date = $row_order_invoice['order_date'];

                                                $get_product = "select * from products where product_id='$product_id'";

                                                $run_product = mysqli_query($con, $get_product);

                                                $row_product = mysqli_fetch_array($run_product);

                                                $product_name = $row_product['product_name'];

                                                $total_sales = $total_sales + $total_price;

                                                $customer = $customer_name . ' (' . $customer_contact . ')';
                                            }
                                        ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <a href="index.php?sale_details=<?php echo $invoice; ?>"> <?php echo $invoice; ?> </a></td>
                                                <td> <?php echo $order_date; ?></td>
                                                <td> <?php echo $customer; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $total_price; ?> Tk</td>
                                            </tr><!-- tr finish -->
                                    <?php }
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

                        <h4 style="text-align: center; color:darkslategrey"> Total Sales: </h4>
                        <h4 style="text-align: center; color:brown"> <?php echo $total_sales; ?> Tk</h4>

                        <input name="excel" value="Export to excel" type="submit" class="btn btn-primary form-control">

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-2 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }
if (isset($_POST['reset'])) {
    echo "<script>window.open('index.php?sales_report','_self')</script>";
}

if (isset($_POST['excel'])) { ?>
    <script>
        $(document).ready(function() {
            $("#table").table2excel({
                exclude: ".no",
                filename: "Sales Report.xls"
            });
        });
    </script>
<?php
}
?>