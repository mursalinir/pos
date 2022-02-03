<?php
require_once "db.php";
$product_id = $_POST["product_id"];
$result = mysqli_query($con,"SELECT * FROM products where product_id = $product_id");
while($row = mysqli_fetch_array($result)) {
?>
<img src="product_images/<?php echo $row["product_img"]?>" width="110" height="130">
<h4>In Stock: </h4>
<?php $result = mysqli_query($con,"SELECT * FROM stock where product_id = $product_id");
$row = mysqli_fetch_array($result); ?>

<h1><?php echo $row["quantity"]?></h1> Pcs
<?php
}
?>


