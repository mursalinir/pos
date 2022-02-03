<?php
require_once "db.php";
$total = 0;
$get_cart = "select * from cart";
$run_cart = mysqli_query($con, $get_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $total = $total + $row_cart['total_price'];
}
?>

<div class="panel panel-default">
                    <!-- panel panel-default Begin -->

                    <div class="panel-heading">
                        <!-- panel-heading Begin -->

                        <h3 class="panel-title">Amount Details </h3>

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-4 control-label">Cost</label>

                                <div class="col-md-8">
                                    <!-- col-md-6 Begin -->

                                    <input name="cost" type="text" style="text-align:right" class="form-control" value="0">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-4 control-label">Total</label>

                                <div class="col-md-8">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:right"><?php echo $total ?></label>
                                    <input type="hidden" id="total" name="total" value="<?php echo $total ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-4 control-label">Exchange?</label>

                                <div class="col-md-8">
                                    <!-- col-md-6 Begin -->
                                        <select name="exchange" class="form-control" id="exchange">
                                        <!-- form-control Begin -->

                                        <option value="1"> No </option>
                                        <option value="2"> Yes </option>

                                    </select><!-- form-control Finish -->

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div id="old_battery">
                                <!-- form-group Begin -->

                            </div><!-- form-group Finish -->


                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-4 control-label">Paid</label>

                                <div class="col-md-8">
                                    <!-- col-md-6 Begin -->

                                    <input name="paid" type="text" class="form-control" value="0" style="text-align:right">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-4 control-label">Due</label>

                                <div class="col-md-8">
                                    <!-- col-md-6 Begin -->

                                    <input name="due" type="text" class="form-control" value="0" style="text-align:right">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <div class="col-md-6">
                                    <!-- col-md-3 Begin -->

                                    <input name="sale" value="Sale" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-3 Finish -->

                                <div class="col-md-6">
                                    <!-- col-md-3 Begin -->

                                    <!-- <input name="print" value="Print" type="submit" class="btn btn-primary form-control"> -->
                                    <button class="btn btn-primary form-control" type="submit" name="print"> Print</button>

                                </div><!-- col-md-3 Finish -->

                            </div><!-- form-group Finish -->
    <!-- script for dynamic exchange selecton-->
<script>
    $(document).ready(function() {
        $('#exchange').on('change', function() {
            var exchange = this.value;
            $.ajax({
                url: "fetch-exchange.php",
                type: "POST",
                data: {
                    exchange: exchange
                },
                cache: false,
                success: function(result) {
                    $("#old_battery").html(result);

                }
            });
        });
    });
</script>