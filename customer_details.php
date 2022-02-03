<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['customer_details'])) {

        $detail_id = $_GET['customer_details'];

        $get_detail = "select * from customers where customer_id='$detail_id'";

        $run_detail = mysqli_query($con, $get_detail);

        $row_detail = mysqli_fetch_array($run_detail);

        $customer_name = $row_detail['customer_name'];

        $customer_contact = $row_detail['customer_contact'];

        $customer_city = $row_detail['customer_city'];

        $customer_address = $row_detail['customer_address'];

        $customer_img = $row_detail['customer_img'];

        $guarantor_name = $row_detail['guarantor_name'];

        $guarantor_contact = $row_detail['guarantor_contact'];

        $guarantor_address = $row_detail['guarantor_address'];

        $nid_front = $row_detail['nid_front'];

        $nid_back = $row_detail['nid_back'];

        $check = $row_detail['chek'];
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Detail Report </title>
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

                        <i class="fa fa-dashboard"></i> Dashboard / Details Sale Report

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

                            <i class="fa fa-money fa-fw"></i> Details Sale Report

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <div class="row">
                            <!-- row Begin -->

                            <div class="col-md-8">
                                <!-- col-md-8 Begin -->

                                <div class="table-responsive">
                                    <!-- table-responsive begin -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- table table-striped table-bordered table-hover begin -->

                                        <tbody>
                                            <!-- tbody begin -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Id</th>
                                                <td><?php echo "$detail_id"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Name</th>
                                                <td><?php echo "$customer_name"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Contact</th>
                                                <td><?php echo "$customer_contact"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer City</th>
                                                <td><?php echo "$customer_city"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Customer Address</th>
                                                <td><?php echo "$customer_address"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Guarantor Name</th>
                                                <td><?php echo "$guarantor_name"; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Guarantor Contact</th>
                                                <td><?php echo "$guarantor_contact "; ?></td>
                                            </tr><!-- tr finish -->

                                            <tr style="text-align: center;font-size:18px">
                                                <!-- tr begin -->
                                                <th style="text-align: center;">Guarantor Address</th>
                                                <td><?php echo "$guarantor_address"; ?></td>
                                            </tr><!-- tr finish -->



                                        </tbody><!-- tbody finish -->
                                    </table><!-- table table-striped table-bordered table-hover finish -->
                                </div><!-- table-responsive finish -->
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <!-- form-group Begin -->
                                        <input name="edit" value="Edit Customer Profile" type="submit" class="btn btn-primary form-control">
                                    </div><!-- form-group Finish -->
                                </form>
                            </div>
                            <!-- col-md-8 Finish -->

                            <div class="col-md-4">
                                <!-- col-md-4 Begin -->

                                <img src="customer_images/<?php echo $customer_img; ?>" width="320" height="200" class="center" alt="Customer Image">
                                <img src="customer_images/<?php echo $nid_front; ?>" width="150" height="150" class="center" alt="Nid Front Image">
                                <img src="customer_images/<?php echo $nid_back; ?>" width="160" height="160" class="center" alt="Nid Back Image">
                                <img src="customer_images/<?php echo $check; ?>" width="160" height="160" class="center" alt="Check Image">

                            </div>
                            <!-- col-md-4 Finish -->

                        </div>
                        <!-- row Finish -->

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

    if (isset($_POST['edit'])) {

        echo "<script>window.open('index.php?edit_customer=$detail_id','_self')</script>";
    }

    ?>


<?php } ?>