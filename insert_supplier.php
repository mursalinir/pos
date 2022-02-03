<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row">
        <!-- row Begin -->

        <div class="col-lg-12">
            <!-- col-lg-12 Begin -->

            <ol class="breadcrumb">
                <!-- breadcrumb Begin -->

                <li class="active">
                    <!-- active Begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Add Supplier

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

                        <i class="fa fa-money fa-fw"></i> Add Supplier

                    </h3><!-- panel-title Finish -->

                </div> <!-- panel-heading Finish -->

                <div class="panel-body">
                    <!-- panel-body Begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <!-- form-horizontal Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Supplier Name </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_name" type="text" class="form-control" required>

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Supplier Mobile </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_contact" type="text" class="form-control" >

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->


                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Supplier Address </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_address" type="text" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="submit" value="Add Supplier" type="submit" class="btn btn-primary form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                    </form><!-- form-horizontal Finish -->

                </div><!-- panel-body Finish -->

            </div><!-- canel panel-default Finish -->

        </div><!-- col-lg-12 Finish -->

    </div><!-- row Finish -->


    <?php

    if (isset($_POST['submit'])) {

        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_address = $_POST['customer_address'];

        $insert_user = "insert into suppliers (supplier_name,supplier_contact,supplier_address) values ('$customer_name','$customer_contact','$customer_address')";

        $run_user = mysqli_query($con, $insert_user);

        if ($run_user) {

            echo "<script>alert('New Supplier has been added sucessfully')</script>";
            echo "<script>window.open('index.php?view_suppliers','_self')</script>";
        }
    }

    ?>


<?php } ?>