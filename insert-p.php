<?php
    include("includes/db.php");
    if(isset($_POST['done'])){
        $product_id = $_POST['product_name'];
        $purchase_rate = $_POST['purchase_rate'];
        $product_qty = $_POST['order_qty'];
        $unit_price = $_POST['rate'];
        $total_price = $_POST['total_price'];
        $customer_name = $_POST['customer_name'];
        $order_date = $_POST['order_date'];
        $author_id = $_POST['author'];
        $product_category = $_POST['product_cat'];
        $customer_city = $_POST['customer_city'];
        $customer_address = $_POST['customer_address'];
        $customer_contact = $_POST['customer_contact'];

        $insert_cart = "insert into purchase_cart (product_id,product_qty,purchase_rate,unit_price,total_price,customer_name,author_id,order_date,customer_contact,customer_city,customer_address,product_category) values ('$product_id','$product_qty','$purchase_rate','$unit_price','$total_price','$customer_name','$author_id','$order_date','$customer_contact','$customer_city','$customer_address','$product_category')";

        $run_cart = mysqli_query($con, $insert_cart);
    }
?>