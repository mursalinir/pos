<?php
require_once "db.php";
$product_id = $_POST["product_id"];
$result = mysqli_query($con,"SELECT * FROM stock where product_id = $product_id");
while($row = mysqli_fetch_array($result)) {
$rate = $row["unit_price"];
?>
<input style="text-align:right" name="rate" id="rate" type="text" class="form-control" value="<?php echo $rate; ?>">
<?php
}
?>

