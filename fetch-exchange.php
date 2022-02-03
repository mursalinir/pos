<?php
require_once "db.php";
$exchange = $_POST["exchange"];
if ($exchange == 2) {

    $result = mysqli_query($con, "SELECT * FROM products where product_cat = '2'"); ?>

    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Old Battery</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <select name="old_bat" class="form-control" id="old_bat">
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

        <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Qty</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="old_bat_qty" id="old_bat_qty" type="text" style="text-align:right" class="form-control">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->

    <div class="form-group">
        <!-- form-group Begin -->

        <label class="col-md-4 control-label">Old Battery Price</label>

        <div class="col-md-8">
            <!-- col-md-6 Begin -->

            <input name="old_bat_price" id="old_bat_price" type="text" style="text-align:right" class="form-control" value="0">

        </div><!-- col-md-6 Finish -->

    </div><!-- form-group Finish -->

<?php
}
?>