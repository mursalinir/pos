<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Insert Products </title>
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

                        <i class="fa fa-dashboard"></i> Dashboard / Carried Over

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

                            <i class="fa fa-money fa-fw"></i> Carried Over

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Date </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="date" type="date" class="form-control" value="<?php echo $today; ?>" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="amount" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="add" value="Add Carried Over" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->

                    </div><!-- panel-body Finish -->

                </div><!-- canel panel-default Finish -->

            </div><!-- col-lg-12 Finish -->
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-12">
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
                                        <th style="text-align: center;"> Carried Over Amount</th>
                                        <th style="text-align: center;"> Delete</th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody id="carry">
                                    <!-- tbody begin -->

                                    <?php
                                    $total_income = 0;
                                    if (!isset($_POST['filter'])) {


                                        $view_report = "select * from balance where carried_over>0 order by date desc LIMIT 30";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $amount = $row_order['carried_over'];

                                            $id = $row_order['balance_id'];

                                            $total_income = $total_income + $amount;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                                <td><form action="?delete_carry=<?php echo $id; ?>" method="POST">
                                                <input name="delete" value="Delete" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">
                                                </form>
                                                </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from balance where carried_over>0 and date between '$from_date' and '$to_date' order by date desc LIMIT 30";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $id = $row_order['balance_id'];

                                            $amount = $row_order['carried_over'];

                                            $total_income = $total_income + $amount;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                                <td><form action="?delete_carry=<?php echo $id; ?>" method="POST">
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
        </form>
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

    if (isset($_POST['add'])) {

        $amount = $_POST['amount'];
        $date = $_POST['date'];

        /*$insert_product = "insert into income (amount,name,purpose,date) values ('$amount','$name','$purpose','$date')";
        $run_product = mysqli_query($con, $insert_product);*/

        $insert_balance = "insert into balance (carried_over,date) values ('$amount','$date')";
        $run_balance = mysqli_query($con, $insert_balance);

        if ($run_balance) {

            echo "<script>alert('Carry added sucessfully')</script>";
            echo "<script>window.open('index.php?insert_carry','_self')</script>";
        }
    }

    ?>

<?php } ?>

    <!-- script for dynamic carry load-->
    <script>
        $(document).ready(function() {
            var count = 30;
            $('#load').click(function() {
                count = count + 30;
                $("#carry").load("load_carry.php", {
                    newCount: count
                });
                return false;
            });
        });
    </script>