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

                    <i class="fa fa-dashboard"></i> Dashboard / Expenditure

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
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <!-- table table-striped table-bordered table-hover begin -->

                                <thead>

                                    <!-- thead begin -->
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Name </th>
                                        <th style="text-align: center;"> Purpose</th>
                                        <th style="text-align: center;"> Amount</th>
                                        <th style="text-align: center;"> Delete</th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody id="expenditure">
                                    <!-- tbody begin -->

                                    <?php
                                    $total_expenditure = 0;
                                    if (!isset($_POST['filter'])) {


                                        $view_report = "select * from balance where expenditure>0 order by date desc LIMIT 30";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $id = $row_order['balance_id'];

                                            $amount = $row_order['expenditure'];

                                            $name = $row_order['e_name'];

                                            $purpose = $row_order['e_purpose'];

                                            $total_expenditure = $total_expenditure + $amount;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                                <td><form action="?delete_expenditure=<?php echo $id; ?>" method="POST">
                                                <input name="delete" value="Delete" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">
                                                </form>
                                                </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from balance where expenditure>0 and date between '$from_date' and '$to_date' order by date desc LIMIT 30";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $id = $row_order['balance_id'];

                                            $amount = $row_order['expenditure'];

                                            $name = $row_order['e_name'];

                                            $purpose = $row_order['e_purpose'];

                                            $total_expenditure = $total_expenditure + $amount;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                                <td><form action="?delete_expenditure=<?php echo $id; ?>" method="POST">
                                                <input name="delete" value="Delete" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">
                                                </form>
                                                </td>
                                            </tr><!-- tr finish -->
                                    <?php }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                        <input name="load" id="load" value="View More" type="submit" class="btn btn-primary form-control">
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-lg-12 finish -->
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

                        <h4 style="text-align: center; color:darkslategrey"> Total Expenditure: </h3>
                        <h4 style="text-align: center; color:brown"> <?php echo $total_expenditure; ?> Tk</h3>
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

    <!-- script for dynamic expenditure load-->
    <script>
        $(document).ready(function() {
            var count = 30;
            $('#load').click(function() {
                count = count + 30;
                $("#expenditure").load("load_expenditure.php", {
                    newCount: count
                });
                return false;
            });
        });
    </script>