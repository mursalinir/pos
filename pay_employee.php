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

                        <i class="fa fa-dashboard"></i> Dashboard / Pay to Employee

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

                            <i class="fa fa-money fa-fw"></i> Pay to Employee

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

                                <label class="col-md-3 control-label"> Employee Name </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="name" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Purpose </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="purpose" type="text" class="form-control" required>

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

        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $name = $_POST['name'];
        $purpose = $_POST['purpose'];

        $insert_product = "insert into expenditure (amount,name,purpose,date) values ('$amount','$name','$purpose','$date')";
        $run_product = mysqli_query($con, $insert_product);

        $insert_salary = "insert into salary (amount,employee,purpose,date) values ('$amount','$name','$purpose','$date')";
        $run_product = mysqli_query($con, $insert_salary);

        $insert_balance = "insert into balance (expenditure,date) values ('$amount','$date')";
        $run_balance = mysqli_query($con, $insert_balance);

        if ($run_product) {

            echo "<script>alert('Paid to Employee sucessfully')</script>";
            echo "<script>window.open('index.php?insert_expenditure','_self')</script>";
        }
    }

    ?>


<?php } ?>