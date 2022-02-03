<?php
require_once "db.php";
$cat_id = $_POST["cat_id"];
if ($cat_id == '5') {
    $result = mysqli_query($con, "SELECT * FROM products where product_cat = '4'");
?>
    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label"> Easy Bike </label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <select name="easybike_name" class="form-control" id="pro-id">
                <!-- form-control Begin -->
                <option value="">Select EasyBike</option>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row["product_id"]; ?>"><?php echo $row["product_name"]; ?></option>
                <?php } ?>
            </select><!-- form-control Finish -->


        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->


    <?php
    $result = mysqli_query($con, "SELECT * FROM products where product_cat = '1'");
    ?>
    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label"> Battery </label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <select name="battery_name" class="form-control" id="battery_name">
                <!-- form-control Begin -->
                <option value="">Select Battery</option>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row["product_id"]; ?>"><?php echo $row["product_name"]; ?></option>
                <?php } ?>
            </select><!-- form-control Finish -->


        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->


<?php } else { 
    $result = mysqli_query($con, "SELECT * FROM products where product_cat = '$cat_id'");
    ?>
    <div class="form-group">
    <!-- form-group Begin -->

    <label class="col-md-4 control-label">Product Name</label>

    <div class="col-md-8">
        <!-- col-md-6 Begin -->

        <select name="product_name" class="form-control" id="pro-id">
            <!-- form-control Begin -->
            <option value="">Select Product</option>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <option value="<?php echo $row["product_id"]; ?>"><?php echo $row["product_name"]; ?></option>
            <?php } ?>
        </select><!-- form-control Finish -->


    </div><!-- col-md-6 Finish -->

</div><!-- form-group Finish -->
<?php
}
?>