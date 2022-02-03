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

                    <i class="fa fa-dashboard"></i> Dashboard / Add Customer

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

                        <i class="fa fa-money fa-fw"></i> Add Customer

                    </h3><!-- panel-title Finish -->

                </div> <!-- panel-heading Finish -->

                <div class="panel-body">
                    <!-- panel-body Begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <!-- form-horizontal Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer Name </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_name" type="text" class="form-control" required>

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                            <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer Detail Address </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_address" type="text" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                            <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer City </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_city" type="text" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer Mobile </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_contact" type="text" class="form-control" required>

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Customer Photo </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="customer_img" type="file" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Guarantor Name</label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="guarantor_name" type="text" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                            <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Guarantor Address </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="guarantor_address" type="text" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Guarantor Mobile </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="guarantor_contact" type="text" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> NID Front Side </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="nid_front" type="file" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> NID Back Side  </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="nid_back" type="file" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Copy of Check  </label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="chek" type="file" class="form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6">
                                <!-- col-md-6 Begin -->

                                <input name="submit" value="Add Customer" type="submit" class="btn btn-primary form-control">

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
        $customer_city = $_POST['customer_city'];
        $guarantor_name = $_POST['guarantor_name'];
        $guarantor_contact = $_POST['guarantor_contact'];
        $guarantor_address = $_POST['guarantor_address'];

        $customer_img = $_FILES['customer_img']['name'];
        $temp_name = $_FILES['customer_img']['tmp_name'];
        move_uploaded_file($temp_name, "customer_images/$customer_img");

        $nid_front = $_FILES['nid_front']['name'];
        $temp_name_front = $_FILES['nid_front']['tmp_name'];
        move_uploaded_file($temp_name_front, "customer_images/$nid_front");

        $nid_back = $_FILES['nid_back']['name'];
        $temp_name_back = $_FILES['nid_back']['tmp_name'];
        move_uploaded_file($temp_name_back, "customer_images/$nid_back");

        $chek = $_FILES['chek']['name'];
        $temp_name_chek = $_FILES['chek']['tmp_name'];
        move_uploaded_file($temp_name_chek, "customer_images/$chek");

        $insert_user = "insert into customers (customer_name,customer_contact,customer_city,customer_address,customer_img,guarantor_name,guarantor_contact,guarantor_address,nid_front,nid_back,chek) values ('$customer_name','$customer_contact','$customer_city','$customer_address','$customer_img','$guarantor_name','$guarantor_contact', '$guarantor_address', '$nid_front', '$nid_back', '$chek')";

        $run_user = mysqli_query($con, $insert_user);

        if ($run_user) {

            echo "<script>alert('New Customer has been added sucessfully')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";
        }
    }

    ?>


<?php } ?>