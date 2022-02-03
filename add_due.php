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

                        <i class="fa fa-dashboard"></i> Dashboard / Add Due

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

                            <i class="fa fa-money fa-fw"></i> Add Due

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Due Date </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="date" type="date" class="form-control" value="<?php echo $today; ?>" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Invoice </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="invoice" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-3 control-label"> Customer </label>

                                    <div class="col-md-6">
                                        <!-- col-md-8 Begin -->

                                        <select name="customer" class="form-control">
                                            <!-- form-control Begin -->

                                            <option> Select Customer </option>

                                            <?php

                                            $get_cat = "select * from customers order by 1 desc";
                                            $run_cat = mysqli_query($con, $get_cat);

                                            while ($row_cat = mysqli_fetch_array($run_cat)) {

                                                $cat_id = $row_cat['customer_id'];
                                                $cat_title = $row_cat['customer_name'];
                                                $c_contact = $row_cat['customer_contact'];

                                                echo "
                                  
                                  <option value='$cat_id'> $cat_title ( $c_contact ) </option>
                                  
                                  ";
                                            }

                                            ?>

                                        </select><!-- form-control Finish -->

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                            <div class="form-group">                                
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Total Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="total" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">                                
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Paid Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="paid" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Due Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="due" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Next Payment Date </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="next_payment_date" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->
                            
                        <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Details </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="details" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Add Due" type="submit" class="btn btn-primary form-control">

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

        $invoice = $_POST['invoice'];
        $details = $_POST['details'];
        $date = $_POST['date'];
        $customer = $_POST['customer'];
        $total = $_POST['total'];
        $due = $_POST['due'];
        $paid = $_POST['paid'];
        $next_payment_date = $_POST['next_payment_date'];
        
        $get_due = "SELECT * from customers where customer_id='$customer'";
        $run_due = mysqli_query($con, $get_due);
        $count = mysqli_num_rows($run_due);        
        $row_due = mysqli_fetch_array($run_due);
        $total_due = $due + $row_due['total_due'];

        $get_c = "select * from customers where customer_id = '$customer'";
        $run_c = mysqli_query($con, $get_c);
        $row_c = mysqli_fetch_array($run_c);
        $customer_name = $row_c['customer_name'];
        $insert_due = "insert into dues (customer_id,invoice,total,paid,due,order_date,details) values ('$customer','$invoice','$total','$paid','$total_due','$date','$details')";
        $run_due = mysqli_query($con, $insert_due);
        
        $update_customer = "update customers set last_payment_date='$date',last_payment_amount='$paid',total_due='$total_due',next_payment_date='$next_payment_date' where customer_id='$customer'";
        $run_update = mysqli_query($con, $update_customer);

        if ($run_due) {
            $insert_income = "insert into balance(date, i_name, i_purpose, income) values ('$date','$customer_name','$details','$paid')";
            $run_income = mysqli_query($con, $insert_income);
            echo "<script>alert('new Dues added sucessfully')</script>";
            echo "<script>window.open('index.php?add_due','_self')</script>";
        }
    }

    ?>


<?php } ?>

