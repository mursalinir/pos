<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if(isset($_GET['customer_due_payment'])){
        
    $due_id = $_GET['customer_due_payment'];
    
    $query = "select * from dues where customer_id='$due_id' order by 1 desc";
    
    $run = mysqli_query($con,$query);
    
    $row_order = mysqli_fetch_array($run);

    $paid = $row_order['paid'];

    $c_id = $row_order['customer_id'];

    $order_date = $row_order['order_date'];

    $get_c = "select * from customers where customer_id = '$c_id'";
    $run_c = mysqli_query($con, $get_c);
    $row_c = mysqli_fetch_array($run_c);
    $c_name = $row_c['customer_name'];
    $due_amount = $row_c['total_due'];
    $next_payment_date = $row_c['next_payment_date'];

    $total = $row_order['total'];

    $invoice = $row_order['invoice'];
  
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

                        <i class="fa fa-dashboard"></i> Dashboard / Customer Due Payment

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

                                <label class="col-md-3 control-label"> Name </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:center"><?php echo $c_name ?></label>
                                    <input type="hidden" id="name" name="total" value="<?php echo $c_name ?>">

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

                                <label class="col-md-3 control-label"> Next Payment Date </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="next_payment_date" type="text" class="form-control" value="<?php echo $next_payment_date; ?> ">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Remarks </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="remarks" cols="19" rows="6" class="form-control"></textarea>
                          
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
        $next_payment_date = $_POST['next_payment_date'];
        $details = $_POST['remarks'];

        $due_amount = $due_amount - $payment_amount;
        //$paid = $paid + $payment_amount;

        $activity = "Payment Recieved for ".$invoice." - ".$payment_amount." Tk";
        $admin = $admin_name;
        $purpose = "Due Recieved";

        $update = "update customers set last_payment_date='$date',last_payment_amount='$payment_amount',next_payment_date='$next_payment_date',total_due='$due_amount' where customer_id=$due_id";
        $run_update = mysqli_query($con, $update);

        $insert_history = "INSERT into dues (customer_id,invoice,order_date,paid,due,details) values ('$c_id','$invoice','$date','$payment_amount','$due_amount','$details')";
        $run_history = mysqli_query($con, $insert_history);

        if ($run_update) {
            $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin')";
            $run_logs = mysqli_query($con,$insert_logs);

            $insert_i = "INSERT into income (date,name,purpose,amount) values ('$date','$c_name','$purpose','$payment_amount')";
            $run_i = mysqli_query($con, $insert_i);

            $insert_balance = "insert into balance (income,date,i_name,i_purpose) values ('$payment_amount','$date','$c_name','$purpose')";
            $run_balance = mysqli_query($con, $insert_balance);

            echo "<script>alert('Payment sucessfull')</script>";
            echo "<script>window.open('index.php?customer_due','_self')</script>";
        }
    }

    ?>


<?php } ?>