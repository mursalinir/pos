<?php
    include("includes/db.php");
    if(isset($_POST['done'])){
        $product_id = ($_POST['product_name']);
        $battery_name = ($_POST['product_name2']);
        $product_serial = $_POST['product_sl'];
        $product_qty = $_POST['order_qty'];
        $unit_price = $_POST['rate'];
        $total_price = $_POST['total_price'];
        $customer_name = $_POST['customer_name'];
        $order_date = $_POST['order_date'];
        $author_id = $_POST['author'];
        $product_category = $_POST['product_cat'];
        $customer_city = $_POST['customer_city'];
        $customer_category = $_POST['cat'];
        $customer_address = $_POST['customer_address'];
        $customer_contact = $_POST['customer_contact'];

        $get_rate = "select * from stock where product_id = '$product_id'";
        $run_rate = mysqli_query($con, $get_rate);
        $row_rate = mysqli_fetch_array($run_rate);
        $purchase_rate = $row_rate['purchase_rate'];
        $profit = $total_price - ($purchase_rate * $product_qty);

        $insert_cart = "insert into cart (product_id,product_serial,product_qty,purchase_rate,unit_price,total_price,profit,customer_name,author_id,order_date,customer_contact,customer_city,customer_type,customer_address,product_category,easy_bike,battery)
         values ('$product_id','$product_serial','$product_qty','$purchase_rate','$unit_price','$total_price','$profit','$customer_name','$author_id','$order_date','$customer_contact','$customer_city','$customer_category','$customer_address','$product_category','$product_id','$battery_name')";

        $run_cart = mysqli_query($con, $insert_cart);
    }
?>