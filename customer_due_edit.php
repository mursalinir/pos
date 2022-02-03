<?php
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

if(isset($_GET['customer_due_edit'])){
        
    $c_id = $_GET['customer_due_edit'];

    $get_c = "select * from customers where customer_id = '$c_id'";
    $run_c = mysqli_query($con, $get_c);
    $row_c = mysqli_fetch_array($run_c);
    $c_name = $row_c['customer_name'];
    $next_payment_date = $row_c['next_payment_date'];
  
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

                        <i class="fa fa-dashboard"></i> Dashboard / Change Customer Payment Date

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

                            <i class="fa fa-money fa-fw"></i> Change Customer Payment Date

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                           
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

                                <label class="col-md-3 control-label"> Next Payment Date </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="next_payment_date" type="text" class="form-control" value="<?php echo $next_payment_date ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Modify" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->

                    </div><!-- panel-body Finish -->

                </div><!-- canel panel-default Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

    </body>

    </html>


    <?php

    if (isset($_POST['submit'])) {

        $next_payment_date = $_POST['next_payment_date'];

        $update = "update customers set next_payment_date='$next_payment_date'where customer_id=$c_id";
        $run_update = mysqli_query($con, $update);

        if ($run_update) {

            echo "<script>alert('Sucessfull')</script>";
            echo "<script>window.open('index.php?customer_due','_self')</script>";
        }
    }

    ?>


<?php } ?>