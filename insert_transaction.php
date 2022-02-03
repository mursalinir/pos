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

                        <i class="fa fa-dashboard"></i> Dashboard / New Transaction

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

                            <i class="fa fa-money fa-fw"></i> New Transaction

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

                                <label class="col-md-3 control-label"> Bank Name </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <select name="bank_name" class="form-control">
                                        <!-- form-control Begin -->

                                        <option> Select a Bank </option>

                                        <?php

                                        $get_cat = "select * from bank";
                                        $run_cat = mysqli_query($con, $get_cat);

                                        while ($row_cat = mysqli_fetch_array($run_cat)) {

                                            $bank_id = $row_cat['bank_id'];
                                            $bank_name = $row_cat['bank_name'];

                                            echo "
                                  
                                  <option value='$bank_id'> $bank_name </option>
                                  
                                  ";
                                        }

                                        ?>

                                    </select><!-- form-control Finish -->

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Branch </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="branch" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->
                                                        <div class="form-group">
                                <!-- form-group Begin -->
                            
                                                            <label class="col-md-3 control-label"> Method </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <select name="method" class="form-control" id="method">
                                        <!-- form-control Begin -->

                                        <option value="1"> Cash </option>
                                        <option value="2"> Check </option>

                                    </select><!-- form-control Finish -->

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->
                            
                            <div class="form-group" id="bank-name">
                                <!-- form-group Begin -->

                            </div><!-- form-group Finish -->

                            <div class="form-group" id="account-name">
                                <!-- form-group Begin -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Name </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="name" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Purpose </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="purpose" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Account No. </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="account_no" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->
                            
                                                        <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Amount </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="amount" type="text" class="form-control" >

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->
                            
                                               <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Description </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->


                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Add Transaction" type="submit" class="btn btn-primary form-control">

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

        $bank_name = $_POST['bank_name'];
        $branch = $_POST['branch'];
        $date = $_POST['date'];
        $name = $_POST['name'];
        $purpose = $_POST['purpose'];
        $account_no = $_POST['account_no'];
        $description = $_POST['desc'];
        $amount = $_POST['amount'];
        $method = $_POST['method'];
        $check_no = $_POST['account_name'];
        $check_bank = $_POST['bank'];

        $insert_product = "insert into transaction (bank_name,branch,method,check_no,check_bank,name,purpose,date,account_no,amount,description) values ('$bank_name','$branch','$method','$check_no','$check_bank','$name','$purpose','$date','$account_no','$amount','$description')";

        $run_product = mysqli_query($con, $insert_product);

        if ($run_product) {

            echo "<script>alert('new transaction added sucessfully')</script>";
            echo "<script>window.open('index.php?view_transaction','_self')</script>";
        }
    }

    ?>


<?php } ?>

    <!-- script for dynamic check selecton-->
    <script>
        $(document).ready(function() {
            $('#method').on('change', function() {
                var method = this.value;
                $.ajax({
                    url: "fetch-account-name.php",
                    type: "POST",
                    data: {
                        method: method
                    },
                    cache: false,
                    success: function(result) {
                        $("#account-name").html(result);

                    }
                });
            });
        });
    </script>
    
        <!-- script for dynamic check selecton-->
    <script>
        $(document).ready(function() {
            $('#method').on('change', function() {
                var method = this.value;
                $.ajax({
                    url: "fetch-bank-name.php",
                    type: "POST",
                    data: {
                        method: method
                    },
                    cache: false,
                    success: function(result) {
                        $("#bank-name").html(result);

                    }
                });
            });
        });
    </script>