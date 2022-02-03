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

                    <i class="fa fa-dashboard"></i> Dashboard / Expenditure & Income Report

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-9">
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
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <!-- table table-striped table-bordered table-hover begin -->

                                <thead>

                                    <!-- thead begin -->
                                    <tr> <td colspan="7"></td> </tr>
                                    <tr> <td colspan="7"></td> </tr>
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;"> Sl No. </th>
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Carried Over </th>
                                        <th style="text-align: center;"> Today Sales Amount </th>
                                        <th style="text-align: center;"> Total Amount </th>
                                        <th style="text-align: center;"> Expenditure </th>
                                        <th style="text-align: center;"> Balance </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody  id="balance">
                                    <!-- tbody begin -->

                                    <?php
                                    $total_expenditure = 0;
                                    $total_income = 0;
                                    $total_balance = 0;
                                    $total_amount1 = 0;
                                    $total_carry = 0;

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from balance group by date order by date desc LIMIT 30";

                                        $run_report = mysqli_query($con, $view_report);
                                        $i = 1;

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $view_report_date = "select * from balance where date = '$date' ";

                                            $run_report_date = mysqli_query($con, $view_report_date);

                                            $expenditure = 0;
                                            $total_amount = 0;

                                            $income = 0;

                                            $balance = 0;

                                            $carried_over = 0;

                                            while ($row_order_date = mysqli_fetch_array($run_report_date)) {

                                                $income_amount = $row_order_date['income'];

                                                $expenditure_amount = $row_order_date['expenditure'];

                                                $carry = $row_order_date['carried_over'];

                                                $income = $income + $income_amount;

                                                $expenditure = $expenditure + $expenditure_amount;

                                                $carried_over = $carried_over + $carry;
                                                $total_amount = $income + $carried_over;

                                                $balance = ($income - $expenditure) + $carried_over;
                                            }
                                            $total_expenditure = $total_expenditure + $expenditure;
                                            $total_income = $total_income + $income;
                                            $total_carry = $total_carry + $carried_over;
                                            $total_amount1 = $total_amount1 + $total_amount;
                                            $total_balance = $total_income - $total_expenditure;
                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $carried_over; ?></td>
                                                <td> <?php echo $income; ?> </td>
                                                <td> <?php echo $total_amount; ?></td>
                                                <td> <?php echo $expenditure; ?></td>
                                                <td> <?php echo $balance; ?></td>
                                            </tr><!-- tr finish -->
                                        <?php $i++; }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $i=1;

                                        $view_report = "select * from balance where date between '$from_date' and '$to_date' group by date order by date desc LIMIT 30";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $view_report_date = "select * from balance where date = '$date'";

                                            $run_report_date = mysqli_query($con, $view_report_date);

                                            $expenditure = 0;

                                            $income = 0;
                                            $total_amount = 0;

                                            $balance = 0;

                                            $carried_over = 0;

                                            while ($row_order_date = mysqli_fetch_array($run_report_date)) {

                                                $income_amount = $row_order_date['income'];

                                                $expenditure_amount = $row_order_date['expenditure'];

                                                $carry = $row_order_date['carried_over'];

                                                $income = $income + $income_amount;

                                                $expenditure = $expenditure + $expenditure_amount;

                                                $carried_over = $carried_over + $carry;
                                                $total_amount = $income+$carried_over;

                                                $balance = ($income - $expenditure) + $carried_over;
                                            }
                                            $total_expenditure = $total_expenditure + $expenditure;
                                            $total_income = $total_income + $income;
                                            $total_carry = $total_carry + $carried_over;
                                            $total_amount1 = $total_amount1 + $total_amount;
                                            $total_balance = $total_income - $total_expenditure;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $carried_over; ?> </td>
                                                <td> <?php echo $income; ?> </td>
                                                <td> <?php echo $total_amount; ?></td>
                                                <td> <?php echo $expenditure; ?> </td>
                                                <td> <?php echo $balance; ?> </td>

                                            </tr><!-- tr finish -->
                                    <?php $i++; }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                        <input name="load" id="load" value="View More" type="submit" class="btn btn-primary form-control">
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-10 finish -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <h3 class="panel-title">
                            <!-- panel-title begin -->

                            <i class="fa fa-tags"></i> Balance Summery


                        </h3><!-- panel-title finish -->
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->

                        <h3 style="text-align: center; color:darkslategrey"> Total Carried Amount: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_carry; ?> Tk</h3>

                        <h3 style="text-align: center; color:darkslategrey"> Total Sales Amount: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_income; ?> Tk</h3>

                        <h3 style="text-align: center; color:darkslategrey"> Total Expenditure: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_expenditure; ?> Tk</h3>

                        <h3 style="text-align: center; color:darkslategrey"> Total Amount: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_amount1; ?> Tk</h3>

                        <h3 style="text-align: center; color:darkslategrey"> Total Balance: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $balance; ?> Tk</h3>

                        <input name="excel" value="Export to excel" type="submit" class="btn btn-primary form-control">

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-3 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }
if (isset($_POST['excel'])) { ?>
    <script>
        $(document).ready(function() {
            $("#table").table2excel({
                filename: "Balance Report.xls"
            });
        });
    </script>
<?php
}
?>
    <!-- script for dynamic balance load-->
    <script>
        $(document).ready(function() {
            var count = 30;
            $('#load').click(function() {
                count = count + 30;
                $("#balance").load("load_balance.php", {
                    newCount: count
                });
                return false;
            });
        });
    </script>