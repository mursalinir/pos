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

                    <i class="fa fa-dashboard"></i> Dashboard / Salary Report

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
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Employee Name </th>
                                        <th style="text-align: center;"> Purpose</th>
                                        <th style="text-align: center;"> Amount</th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_expenditure = 0;
                                    if (!isset($_POST['filter'])) {


                                        $view_report = "select * from salary order by 1 desc";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $amount = $row_order['amount'];

                                            $name = $row_order['employee'];

                                            $purpose = $row_order['purpose'];

                                            $total_expenditure = $total_expenditure + $amount;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from salary where date between '$from_date' and '$to_date' order by 1 desc";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $amount = $row_order['amount'];

                                            $name = $row_order['employee'];

                                            $purpose = $row_order['purpose'];

                                            $total_expenditure = $total_expenditure + $amount;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                            </tr><!-- tr finish -->
                                    <?php }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-lg-12 finish -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <h3 class="panel-title">
                            <!-- panel-title begin -->

                            <i class="fa fa-tags"></i> Salary Report


                        </h3><!-- panel-title finish -->
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->

                        <h3 style="text-align: center; color:darkslategrey"> Total Pay: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_expenditure; ?> Tk</h3>
                        <input name="excel" value="Export to excel" type="submit" class="btn btn-primary form-control">

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-lg-12 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }
if (isset($_POST['excel'])) { ?>
    <script>
        $(document).ready(function() {
            $("#table").table2excel({
                filename: "Expenditure Report.xls"
            });
        });
    </script>
<?php
}
?>