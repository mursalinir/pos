<?php

require_once "db.php";
$customer_id = $_POST["customer_id"];
$result = mysqli_query($con, "SELECT * FROM suppliers where s_id = $customer_id");

while ($row = mysqli_fetch_array($result)) {
?>
    <div class="form-group">
        <!-- form-group Begin -->
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="customer_name" id="customer_name" type="text" class="form-control" value="<?php echo $row["supplier_name"] ?>">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->

    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Mobile</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="customer_contact" id="customer_contact" type="text" class="form-control" value="<?php echo $row["supplier_contact"] ?>">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->


    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Address</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <textarea name="customer_address" id="customer_address" class="form-control" rows="2"> <?php echo $row["supplier_address"] ?></textarea>

        </div><!-- col-md-6 Finish -->
    <?php
}
    ?>