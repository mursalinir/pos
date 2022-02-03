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

                    <i class="fa fa-dashboard"></i> Dashboard / Purchase Report

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

                                <td> <input name="filter" value="Filter" type="submit" class="btn btn-primary form-control"> </td>
                                <td style="width: 3%;"></td>
                                <td> <input name="reset" value="Reset" type="submit" class="btn btn-primary form-control" style="background-color: lightcoral;"> </td>

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
                                        <th style="text-align: center;"> Supplier </th>
                                        <th style="text-align: center;"> Product</th>
                                        <th style="text-align: center;"> Quantity</th>
                                        <th style="text-align: center;"> Price </th>
                                        <th style="text-align: center;" class="no"> Details </th>

                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_sales = 0;

                                    if (!isset($_POST['filter'])) {


                                        $view_report = "select * from purchase order by 1 desc";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $order_id = $row_order['invoice'];

                                            $product_id = $row_order['product_id'];

                                            $product_qty = $row_order['product_qty'];

                                            $total_price = $row_order['total_price'];

                                            $customer_name = $row_order['seller_name'];

                                            $order_date = $row_order['purchase_date'];

                                            $get_product = "select * from products where product_id='$product_id'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $product_name = $row_product['product_name'];

                                            $total_sales = $total_sales + $total_price;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $order_id; ?> </td>
                                                <td> <?php echo $order_date; ?></td>
                                                <td> <?php echo $customer_name; ?> </td>
                                                <td> <?php echo $product_name; ?> </td>
                                                <td> <?php echo $product_qty; ?> </td>
                                                <td> <?php echo $total_price; ?> </td>
                                                <td class="no">

                                                    <a href="index.php?purchase_details=<?php echo $order_id; ?>">

                                                        <i class="fa fa-pencil"></i> Details

                                                    </a>

                                                </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $section = $_POST['section'];

                                        if ($section == 0) {
                                            $view_report = "select * from purchase where purchase_date between '$from_date' and '$to_date' order by 1 desc";
                                        } else {
                                            $view_report = "select * from purchase where product_category='$section' and purchase_date between '$from_date' and '$to_date' order by 1 desc";
                                        }

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $order_id = $row_order['order_id'];

                                            $product_id = $row_order['product_id'];

                                            $product_qty = $row_order['product_qty'];

                                            $total_price = $row_order['total_price'];

                                            $customer_name = $row_order['customer_name'];

                                            $order_date = $row_order['purchase_date'];

                                            $get_product = "select * from products where product_id='$product_id'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $product_name = $row_product['product_name'];

                                            $total_sales = $total_sales + $total_price;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $order_id; ?> </td>
                                                <td> <?php echo $order_date; ?></td>
                                                <td> <?php echo $customer_name; ?> </td>
                                                <td> <?php echo $product_name; ?> </td>
                                                <td> <?php echo $product_qty; ?> </td>
                                                <td> <?php echo $total_price; ?> </td>
                                                <td class="no">
                                                    <a href="index.php?sale_details=<?php echo $order_id; ?>">

                                                        <i class="fa fa-pencil"></i> Details

                                                    </a>
                                                </td>
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

                        <h4 style="text-align: center; color:darkslategrey"> Total Amount: </h4>
                        <h4 style="text-align: center; color:brown"> <?php echo $total_sales; ?> Tk</h4>
                        <input name="excel" value="Export to excel" type="submit" class="btn btn-primary form-control">

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-2 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }
if (isset($_POST['reset'])) {
    echo "<script>window.open('index.php?purchase_report','_self')</script>";
}

if(isset($_POST['excel']))
{ ?>
    <script>
    $(document).ready(function() {
        $("#table").table2excel({
            exclude: ".no",
            filename: "Purchase Report.xls"
        });
    });
</script>
<?php
}
?>