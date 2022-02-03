<?php

require_once "db.php";
$customer_id = $_POST["customer_id"];
$result = mysqli_query($con, "SELECT * FROM customers where customer_id = $customer_id");

while ($row = mysqli_fetch_array($result)) {
?>
    <div class="form-group">
        <!-- form-group Begin -->
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="customer_name" id="customer_name" type="text" class="form-control" value="<?php echo $row["customer_name"] ?>">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->

    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Mobile</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="customer_contact" id="customer_contact" type="text" class="form-control" value="<?php echo $row["customer_contact"] ?>">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->

    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">City</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="customer_city" id="customer_city" type="text" class="form-control" value="<?php echo $row["customer_city"] ?>">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->

    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Address</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <textarea name="customer_address" id="customer_address" class="form-control" rows="2"> <?php echo $row["customer_address"] ?></textarea>

        </div><!-- col-md-6 Finish -->
    <?php
}
    ?>