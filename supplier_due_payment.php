<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if(isset($_GET['supplier_due_payment'])){
        
    $due_id = $_GET['supplier_due_payment'];
    
    $query = "select * from supplier_amount where id='$due_id'";
    
    $run = mysqli_query($con,$query);
    
    $row_order = mysqli_fetch_array($run);

    $due_amount = $row_order['due'];

    $paid = $row_order['paid'];

    $name = $row_order['s_name'];

    $total = $row_order['total'];

    $invoice = $row_order['invoice'];

    $section = $row_order['section'];   
}


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

                        <i class="fa fa-dashboard"></i> Dashboard / Supplier Due Payment

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

                            <i class="fa fa-money fa-fw"></i> Payment

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

                                    <input name="date" type="date" style="text-align:center" class="form-control" value="<?php echo $today; ?>" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Purpose </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:center"><?php echo $invoice ?></label>
                                    <input type="hidden" id="total" name="total" value="<?php echo $invoice ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->
                            
                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Name </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:center"><?php echo $name ?></label>
                                    <input type="hidden" id="total" name="total" value="<?php echo $name ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Total Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:center"><?php echo $total." Tk" ?></label>
                                    <input type="hidden" id="total" name="total" value="<?php echo $total. " Tk" ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Due Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:center"><?php echo $due_amount." Tk" ?></label>
                                    <input type="hidden" id="total" name="total" value="<?php echo $due_amount. " Tk" ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Pay Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="payment" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Add Payment" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->

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

    if (isset($_POST['submit'])) {

        $date = $_POST['date'];
        $payment_amount = $_POST['payment'];

        $due_amount = $due_amount - $payment_amount;
        $paid = $paid + $payment_amount;

        $activity = "Payment Give for ".$invoice." - ".$payment_amount." Tk";
        $admin = $admin_name;
        $purpose = "Due Pay";

        $update = "update supplier_amount set last_payment='$date',paid='$paid',due='$due_amount' where id=$due_id";
        $run_update = mysqli_query($con, $update);

        if ($run_update) {
            $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin')";
            $run_logs = mysqli_query($con,$insert_logs);

            $insert_i = "INSERT into expenditure (date,section_id,name,purpose,amount) values ('$date','$section','$admin_name','$purpose','$payment_amount')";
            $run_i = mysqli_query($con, $insert_i);

            $insert_balance = "insert into balance (section_id,expenditure,date) values ('$section','$payment_amount','$date')";
            $run_balance = mysqli_query($con, $insert_balance);

            echo "<script>alert('Payment sucessfull')</script>";
            echo "<script>window.open('index.php?supplier_due','_self')</script>";
        }
    }

    ?>


<?php } ?>