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

                    <i class="fa fa-dashboard"></i> Dashboard / Stock Report

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-12">
                <!-- col-lg-12 begin -->
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <table style="width:100%">
                            <tr>
                                <td>From <input type="date" name="from_date" value="<?php echo $today; ?>"></td>
                                <td>To <input type="date" name="to_date" value="<?php echo $today; ?>"></td>

                                <td>Product : <select name="pro">
                                        <!-- form-control Begin -->

                                        <option value="0"> All </option>

                                        <?php

                                        $get_section = "select * from products";
                                        $run_section = mysqli_query($con, $get_section);

                                        while ($row_section = mysqli_fetch_array($run_section)) {

                                            $pro_id = $row_section['product_id'];
                                            $pro_name = $row_section['product_name'];

                                            echo "

                                                    <option value='$pro_id'> $pro_name </option>

                                                ";
                                        }

                                        ?>

                                    </select><!-- form-control Finish -->
                                </td>

                                <td> <button name="filter" type="submit" class="btn btn-primary form-control">
                                <i class="fa fa-filter" aria-hidden="true">  Filter</i>
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
                                        <th style="text-align: center;"> Sl. </th>
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Product </th>
                                        <th style="text-align: center;"> Details </th>
                                        <th style="text-align: center;"> Qty</th>
                                        <th style="text-align: center;"> In stock</th>
                                        <th style="text-align: center;"> Remarks </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_sales = 0;
                                    $total_profit = 0;

                                     if(isset($_POST['filter'])) {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $pro = $_POST['pro'];

                                        if ($pro == 0) {
                                            $view_report = "select * from stock_report where date between '$from_date' and '$to_date'";
                                        } else {
                                            $view_report = "select * from stock_report where pro_id='$pro' and date between '$from_date' and '$to_date'";
                                        }

                                        $run_report = mysqli_query($con, $view_report);
                                        $i=0;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $id = $row_order['id'];

                                            $date = $row_order['date'];

                                            $product_id = $row_order['pro_id'];

                                            $qty = $row_order['qty'];

                                            $total_qty = $row_order['total_qty'];

                                            $details = $row_order['details'];

                                            $remarks = $row_order['remarks'];

                                            $get_product = "select * from products where product_id='$product_id'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $product_name = $row_product['product_name'];

                                            $total_sales = $total_sales + $total_price;

                                            $total_profit = $total_profit + $profit;

                                            $i = $i+1;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $product_name; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $qty; ?> </td>
                                                <td> <?php echo $total_qty; ?> </td>
                                                <td> <?php echo $remarks; ?> </td>
                                            </tr><!-- tr finish -->
                                    <?php }
                                    } 
                                    else {

                                        $view_report = "select * from stock_report";

                                        $run_report = mysqli_query($con, $view_report);
                                        $i = 0;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $id = $row_order['id'];

                                            $date = $row_order['date'];

                                            $product_id = $row_order['pro_id'];

                                            $qty = $row_order['qty'];

                                            $total_qty = $row_order['total_qty'];

                                            $details = $row_order['details'];

                                            $remarks = $row_order['remarks'];

                                            $get_product = "select * from products where product_id='$product_id'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $product_name = $row_product['product_name'];

                                            $total_sales = $total_sales + $total_price;

                                            $total_profit = $total_profit + $profit;

                                            $i = $i+1;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $product_name; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $qty; ?> </td>
                                                <td> <?php echo $total_qty; ?> </td>
                                                <td> <?php echo $remarks; ?> </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-10 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }
if (isset($_POST['reset'])) {
    echo "<script>window.open('index.php?stock_report','_self')</script>";
}

if(isset($_POST['excel']))
{ ?>
    <script>
    $(document).ready(function() {
        $("#table").table2excel({
            exclude: ".no",
            filename: "Stock Report.xls"
        });
    });
</script>
<?php
}
?>