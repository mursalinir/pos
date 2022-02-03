<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<body>

    <?php
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;

    $total = 0;
    $get_cart = "select * from cart";
    $run_cart = mysqli_query($con, $get_cart);

    while ($row_cart = mysqli_fetch_array($run_cart)) {

        $total = $total + $row_cart['total_price'];
    }

    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";
    } else {

    ?>


        <div class="row">
            <!-- row Begin -->

            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <!-- form-horizontal Begin -->

                <div class="col-md-9">
                    <!-- col-md-9 Begin -->

                    <div class="panel panel-default">
                        <!-- panel panel-default Begin -->

                        <div class="panel-heading">
                            <!-- panel-heading Begin -->

                            <table style="width:100%">
                                <tr>
                                    <td>Sale By: <?php echo $admin_name; ?> <input type="hidden" id="author" value=" <?php echo $admin_name ?> "> </td>

                                    <td>Date: <input type="date" name="order_date" id="order_date" value="<?php echo $today; ?>"></td>
                                </tr>
                            </table>

                        </div> <!-- panel-heading Finish -->

                        <div class="panel-body">
                            <!-- panel-body Begin -->

                            <div id="cart" class="col-md-5">
                                <!-- col-md-5 Begin -->

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label"> Customer </label>

                                    <div class="col-md-8">
                                        <!-- col-md-8 Begin -->

                                        <select name="cat" class="form-control" id="customer-type">
                                            <!-- form-control Begin -->

                                            <option> Select Customer </option>

                                            <?php

                                            $get_cat = "select * from customers";
                                            $run_cat = mysqli_query($con, $get_cat);

                                            while ($row_cat = mysqli_fetch_array($run_cat)) {

                                                $cat_id = $row_cat['customer_id'];
                                                $cat_title = $row_cat['customer_name'];

                                                echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                            }

                                            ?>

                                        </select><!-- form-control Finish -->

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                                <div id="c_name">
                                    <!-- form-group Begin -->



                                </div><!-- form-group Finish -->

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label"> Product </label>

                                    <div class="col-md-8">
                                        <!-- col-md-6 Begin -->

                                        <select name="product_cat" class="form-control" id="product-cat" required>
                                            <!-- form-control Begin -->

                                            <option> Select Category </option>

                                            <?php

                                            $get_cat = "select * from categories";
                                            $run_cat = mysqli_query($con, $get_cat);

                                            while ($row_cat = mysqli_fetch_array($run_cat)) {

                                                $cat_id = $row_cat['cat_id'];
                                                $cat_title = $row_cat['cat_title'];

                                                echo "
                                     
                                     <option value='$cat_id'> $cat_title </option>
                                     
                                     ";
                                            }

                                            ?>

                                        </select><!-- form-control Finish -->

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                            </div><!-- col-md-6 Finish -->

                            <div id="cart" class="col-md-5">
                                <!-- col-md-5 Begin -->

                                <div id="product-name">

                                </div>

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label">SL. No.</label>

                                    <div class="col-md-8">
                                        <!-- col-md-6 Begin -->

                                        <input name="product_sl" id="product_sl" type="text" class="form-control">

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label">Quantity</label>

                                    <div class="col-md-8">
                                        <!-- col-md-6 Begin -->

                                        <input name="order_qty" id="order_qty" type="text" class="form-control">

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label">Rate/Unit</label>

                                    <div class="col-md-8" id="product-rate">
                                        <!-- col-md-6 Begin -->

                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <div class="col-md-5">
                                        <!-- col-md-3 Begin -->

                                        <input value="Reset" type="submit" name="reset" class="btn btn-primary form-control">

                                    </div><!-- col-md-3 Finish -->

                                    <div class="col-md-7">
                                        <!-- col-md-3 Begin -->

                                        <input id="add_cart" value="Add Cart" type="submit" class="btn btn-primary form-control">

                                    </div><!-- col-md-3 Finish -->

                                </div><!-- form-group Finish -->

                            </div><!-- col-md-5 Finish -->

                            <div class="col-md-2">
                                <!-- col-md-2 Begin -->

                                <box id="product-img"></box>

                            </div><!-- col-md-5 Finish -->

                        </div><!-- panel-body Finish -->

                    </div><!-- panel panel-default Finish -->

                </div><!-- col-md-9 Finish -->

            </form><!-- form-horizontal Finish -->

            <div class="col-md-3" id="order-amount">

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

                                <label class="col-md-4 control-label">Cash Paid</label>

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

                        </form><!-- form-horizontal Finish -->

                    </div><!-- panel-body Finish -->

                </div><!-- panel panel-default Finish -->

            </div><!-- col-md-4 Finish -->

        </div><!-- row Finish -->

        <div class="row">
            <!-- row Begin -->

            <div class="col-md-12" id="order-cart">
                <!-- col-md-12 Begin -->

                <div class="panel panel-default">
                    <!-- panel panel-default Begin -->

                    <div class="panel-heading">
                        <!-- panel-heading Begin -->

                        <h2 class="panel-title">Cart </h2>

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <div class="table-responsive">
                            <!-- table-responsive begin -->
                            <table class="table table-striped table-bordered table-hover">
                                <!-- table table-striped table-bordered table-hover begin -->

                                <thead>
                                    <!-- thead begin -->
                                    <tr>
                                        <!-- tr begin -->
                                        <th> S.N. </th>
                                        <th> Product Name </th>
                                        <th> Product Serial </th>
                                        <th> Quantity (Pcs) </th>
                                        <th> Rate/unit (Tk) </th>
                                        <th> Total Price</th>
                                        <th> Customer Name</th>
                                        <th> Modify </th>
                                        <th> Remove </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php

                                    $i = 0;

                                    $get_cart = "select * from cart";

                                    $run_cart = mysqli_query($con, $get_cart);

                                    while ($row_pro = mysqli_fetch_array($run_cart)) { ?>
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <?php

                                            $cart_id = $row_pro['cart_id'];

                                            $pro_id = $row_pro['product_id'];

                                            $pro_serial = $row_pro['product_serial'];

                                            $pro_price = $row_pro['total_price'];

                                            $pro_qty = $row_pro['product_qty'];

                                            $pro_rate = $row_pro['unit_price'];

                                            $customer = $row_pro['customer_name'];

                                            $customer_type = $row_pro['customer_type'];

                                            $get_pro = "select * from products where product_id= '$pro_id'";

                                            $run_pro = mysqli_query($con, $get_pro);

                                            while ($row_prod = mysqli_fetch_array($run_pro)) {

                                                $pro_title = $row_prod['product_name'];
                                            }

                                            $i++;


                                            ?>

                                            <tr>
                                                <!-- tr begin -->
                                                <td> <input name="cart" type="text" class="form-control" style="text-align:right" value="<?php echo $cart_id; ?>"></td>
                                                <td> <input name="product" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_title; ?>"></td>
                                                <td> <input name="serial" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_serial; ?>"></td>
                                                <td> <input name="qty" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_qty; ?>"></td>
                                                <td> <input name="rate" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_rate; ?>"></td>
                                                <td> <input name="price" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_price; ?>"></td>
                                                <td> <input name="customer" type="text" class="form-control" style="text-align:right" value="<?php echo $customer; ?>"></td>
                                                <td> <button name="change" type="submit" class="btn btn-primary form-control">Change</td>
                                                <td>

                                                    <a href="index.php?delete_cart=<?php echo $cart_id; ?>">

                                                        <i class="fa fa-trash-o"></i> Delete

                                                    </a>

                                                </td>
                                            </tr><!-- tr finish -->
                                        </form>

                                    <?php } ?>

                                </tbody><!-- tbody finish -->

                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                    </div><!-- panel-body Finish -->

                </div><!-- panel panel-default Finish -->

            </div><!-- col-md-12 Finish -->

        </div><!-- row Finish -->


        <?php

        if (isset($_POST['reset'])) {
            echo "<script>window.open('index.php?insert_order','_self')</script>";
        }

        if (isset($_POST['change'])) {
            $product = $_POST['product'];
            $serial = $_POST['serial'];
            $qty = $_POST['qty'];
            $rate = $_POST['rate'];
            $price = $_POST['price'];
            $customer = $_POST['customer'];
            $cart_id = $_POST['cart'];
            $get_purchase_rate = "select * from cart where cart_id='$cart_id'";
            $run_purchase_rate = mysqli_query($con, $get_purchase_rate);
            $row_purchase_rate = mysqli_fetch_array($run_purchase_rate);
            $purchase_rate = $row_purchase_rate['purchase_rate'];
            $update_profit = $price - ($purchase_rate * $qty);
            $update_cart = "update cart set product_serial='$serial',product_qty='$qty',unit_price='$rate',total_price='$price',customer_name='$customer',profit='$update_profit' where cart_id='$cart_id'";
            $run_update = mysqli_query($con, $update_cart);
            if ($run_update) {

                echo "<script>window.open('index.php?insert_order','_self')</script>";
            }
        }


        if (isset($_POST['sale'])) {

            $clean_cart = "delete from amount_details";
            $run = mysqli_query($con, $clean_cart);

            $clean_cart = "delete from print";
            $run = mysqli_query($con, $clean_cart);

            $cost = $_POST['cost'];
            $total = ($_POST['total'] + $_POST['cost']);
            $paid = $_POST['paid'];
            $old_bat_price = $_POST['old_bat_price'];
            $due = $total - ($paid + $old_bat_price);
            $exchange = $_POST['exchange'];
            $old_bat = $_POST['old_bat'];
            $qty = $_POST['old_bat_qty'];
            $insert_amount = "insert into amount_details (total,due,paid,exchange,old_bat,old_bat_price,qty) values ('$total','$due','$paid','$exchange','$old_bat','$old_bat_price','$qty')";
            $run_cart = mysqli_query($con, $insert_amount);

            $get_cart = "SELECT * FROM cart";
            $run_cart = mysqli_query($con, $get_cart);
            $row_cart = mysqli_fetch_array($run_cart);
            $cart_id = $row_cart['cart_id'];
            $category = $row_cart['product_category'];
            //$invoice = "INVC" . $cart_id;
            $customer_type = $row_cart['customer_type'];
            $customer_contact = $row_cart['customer_contact'];
            $customer_name = $row_cart['customer_name'];
            $customer_address = $row_cart['customer_address'];
            $order_date = $row_cart['order_date'];
            $purpose = "sale";
            $get_i = "select * from sales order by 1 desc";
            $run_i = mysqli_query($con, $get_i);
            $row_i = mysqli_fetch_array($run_i);
            $i = $row_i['i'];
            $in = $i + 1;
            $invoice = "INVC" . $in;
            if($exchange==2)
            {
                    $details = $qty . ' Pcs ' . $old_bat . ' Purchase';
                    $get_quantity = "SELECT * from stock where product_id = '$old_bat'";
                    $run_quantity = mysqli_query($con, $get_quantity);
                    $row_quantity = mysqli_fetch_array($run_quantity);
                    $quantity = $row_quantity['quantity'] + $qty;
                    if ($quantity < 0) {
                        $quantity = 0;
                    }
                    $update_stock = "update stock set quantity='$quantity' where product_id = '$old_bat'";
                    $run__stock = mysqli_query($con, $update_stock);
                $get = "select * from products where product_id = '$old_bat'";
                $run = mysqli_query($con, $get);
                $row = mysqli_fetch_array($run);
                $old_bat_name =  $row['product_name'];
                $purpose=$qty . ' Pcs ' . $old_bat_name . ' Purchase (' . $invoice . ' )';

                    $insert_i = "INSERT into expenditure (date,name,purpose,amount,details) values ('$order_date','$customer_name','$purpose','$old_bat_price','$details')";
                    $run_i = mysqli_query($con, $insert_i);

                    $insert_balance = "insert into balance (expenditure,date,e_name,e_purpose) values ('$old_bat_price','$order_date','$customer_name','$purpose')";
                    $run_balance = mysqli_query($con, $insert_balance);
                    
                    if($old_bat == '9')
                    {   
                        $remarks = $customer_name . ' (' . $customer_contact . ', ' . $customer_address ;
                        $details = 'Change with invoice (' . $invoice . ')';
                        $insert_old_bat_report = "insert into old_ev_report (date,details,qty,total_qty,amount,remarks) values ('$order_date','$details','$qty','$quantity','$old_bat_price','$remarks')";
                        $run_insert = mysqli_query($con, $insert_old_bat_report);
                    }
                    if($old_bat == '10')
                    {   
                        $remarks = $customer_name . ' (' . $customer_contact . ', ' . $customer_address ;
                        $details = 'Change with invoice (' . $invoice . ')';
                        $insert_old_bat_report = "insert into old_dry_report (date,details,qty,total_qty,amount,remarks) values ('$order_date','$details','$qty','$quantity','$old_bat_price','$remarks')";
                        $run_insert = mysqli_query($con, $insert_old_bat_report);
                    }                    
            }

            $old_bat_details = $qty . ' Pcs ' . $old_bat_name;
            $insert_a = "INSERT into amount (invoice,total,paid_by_cash,due,order_date,old_bat_name,old_bat_price) values ('$invoice','$total','$paid','$due','$order_date','$old_bat_details','$old_bat_price')";
            $run_a = mysqli_query($con, $insert_a);
            $paid = $paid + $old_bat_price;
            /*$purpose = $product_qty . ' Pcs ' . $product_name . ' Sale (' . $invoice . ')';
            $insert_i = "INSERT into income (date,name,purpose,amount) values ('$order_date','$customer_name','$purpose','$paid')";
            $run_i = mysqli_query($con, $insert_i);

            $insert_balance = "insert into balance (income,date,purpose) values ('$paid','$order_date','$invoice')";
            $run_balance = mysqli_query($con, $insert_balance);*/

            $count_cart = "SELECT * FROM cart";
            $run_count = mysqli_query($con, $get_cart);
            $count = mysqli_num_rows($run_count);

            $get_cart = "SELECT * FROM cart";
            $run_cart = mysqli_query($con, $get_cart);

            while ($row_cart = mysqli_fetch_array($run_cart)) {

                $product_id = $row_cart['product_id'];

                $product_serial = $row_cart['product_serial'];

                $purchase_rate = $row_cart['purchase_rate'];

                $product_qty = $row_cart['product_qty'];

                $unit_price = $row_cart['unit_price'];

                $total_price = $row_cart['total_price'];

                $profit = $row_cart['profit'];

                $customer_name = $row_cart['customer_name'];

                $author_id = $row_cart['author_id'];

                $order_date = $row_cart['order_date'];

                $customer_contact = $row_cart['customer_contact'];

                $customer_city = $row_cart['customer_city'];

                $customer_type = $row_cart['customer_type'];

                $customer_address = $row_cart['customer_address'];

                $product_category = $row_cart['product_category'];

                $easybike = $row_cart['easy_bike'];

                $battery = $row_cart['battery'];

                $get_product = "select * from products where product_id='$product_id'";

                $run_product = mysqli_query($con, $get_product);

                $row_product = mysqli_fetch_array($run_product);

                $product_name = $row_product['product_name'];

                if ($product_category == '5') {
                    $get_qu = "SELECT * from products where product_id = '$easybike'";
                    $run_qu = mysqli_query($con, $get_qu);
                    $row_qu = mysqli_fetch_array($run_qu);
                    $easybikename = $row_qu['product_name'];
                    $get_qu = "SELECT * from products where product_id = '$battery'";
                    $run_qu = mysqli_query($con, $get_qu);
                    $row_qu = mysqli_fetch_array($run_qu);
                    $batteryname = $row_qu['product_name'];
                    $details = '( ' . $easybikename . ' + ' . $batteryname . ' ) Set';
                    $get_quantity = "SELECT * from stock where product_id = '$battery'";
                    $run_quantity = mysqli_query($con, $get_quantity);
                    $row_quantity = mysqli_fetch_array($run_quantity);
                    $quantity = $row_quantity['quantity'] - 5;
                    if ($quantity < 0) {
                        $quantity = 0;
                    }
                    $update_stock = "update stock set quantity='$quantity' where product_id = '$battery'";
                    $run__stock = mysqli_query($con, $update_stock);
                    $details1 = 'Sales (' . $invoice . ')';
                    $remarks = $customer_name . ' (' . $customer_address . ')';
                    $insert_stock_report = "insert into stock_report(date, pro_id, details, qty, total_qty, remarks) values ('$order_date','$battery','$details1','5','$quantity','$remarks')";
                    $run_stock = mysqli_query($con, $insert_stock_report);
                    
                    $get_quantity = "SELECT * from stock where product_id = '$easybike'";
                    $run_quantity = mysqli_query($con, $get_quantity);
                    $row_quantity = mysqli_fetch_array($run_quantity);
                    $quantity = $row_quantity['quantity'] - 1;
                    if ($quantity < 0) {
                        $quantity = 0;
                    }
                    $update_stock = "update stock set quantity='$quantity' where product_id = '$easybike'";
                    $run__stock = mysqli_query($con, $update_stock);
                    $details1 = 'Sales (' . $invoice . ')';
                    $remarks = $customer_name . ' (' . $customer_address . ')';
                    $insert_stock_report = "insert into stock_report(date, pro_id, details, qty, total_qty, remarks) values ('$order_date','$easybike','$details1','1','$quantity','$remarks')";
                    $run_stock = mysqli_query($con, $insert_stock_report);
                } else {
                    $details = $product_qty . ' Pcs ' . $product_name;
                    $get_quantity = "SELECT * from stock where product_id = '$product_id'";
                    $run_quantity = mysqli_query($con, $get_quantity);
                    $row_quantity = mysqli_fetch_array($run_quantity);
                    $quantity = $row_quantity['quantity'] - $product_qty;
                    if ($quantity < 0) {
                        $quantity = 0;
                    }
                    $update_stock = "update stock set quantity='$quantity' where product_id = '$product_id'";
                    $run__stock = mysqli_query($con, $update_stock);
                    $details1 = 'Sales (' . $invoice . ')';
                    $remarks = $customer_name . ' (' . $customer_address . ')';
                    $insert_stock_report = "insert into stock_report(date, pro_id, details, qty, total_qty, remarks) values ('$order_date','$product_id','$details1','$product_qty','$quantity','$remarks')";
                    $run_stock = mysqli_query($con, $insert_stock_report);
                }

                $insert_sales = "INSERT INTO sales(i,invoice,product_id,product_serial,product_qty,purchase_rate,unit_price,customer_name,author_id,order_date,customer_contact,customer_city,customer_type,customer_address,product_category,sub_total,profit,easy_bike,battery,details,old_bat_price) VALUES('$in','$invoice','$product_id','$product_serial','$product_qty','$purchase_rate','$unit_price','$customer_name','$author_id','$order_date','$customer_contact','$customer_city','$customer_type','$customer_address','$product_category','$total_price','$profit','$easybike','$battery','$details','$old_bat_price')";

                $insert_print = "INSERT INTO print(invoice,product_id,product_serial,product_qty,customer_name,order_date,customer_contact,customer_city,customer_address,product_category,total_price,easy_bike,battery)
                VALUES('$invoice','$product_id','$product_serial','$product_qty','$customer_name','$order_date','$customer_contact','$customer_city','$customer_address','$product_category','$total_price','$easybike','$battery')";

                $activity = "Sale " . $pro_title . " - " . $total . " Tk";
                $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin_name')";
                $run_logs = mysqli_query($con, $insert_logs);
                $run_sales = mysqli_query($con, $insert_sales);                
                $run_print = mysqli_query($con, $insert_print);

            }

            if ($run_sales and $run_print) {
                $clean_cart = "delete from cart";
                $run = mysqli_query($con, $clean_cart); ?>

                <script>
                    window.open("print/memo.php", '_blank');
                </script> <?php


                            echo "<script>alert('Save Success!')</script>";
                            echo "<script>window.open('index.php?insert_order','_self')</script>";
                        } else {
                            echo "<script>alert('Coudn't Save!')</script>";
                        }
                    }

                    if (isset($_POST['print'])) {
                        $clean_cart = "delete from amount_details";
                        $run = mysqli_query($con, $clean_cart);

                        $clean_cart = "delete from print";
                        $run = mysqli_query($con, $clean_cart);

                        $cost = $_POST['cost'];
                        $total = ($_POST['total'] + $_POST['cost']);
                        $paid = $_POST['paid'];
                        $old_bat_price = $_POST['old_bat_price'];
                        $due = $total - ($paid + $old_bat_price);
                        $exchange = $_POST['exchange'];
                        $old_bat = $_POST['old_bat'];                        
                        $qty = $_POST['old_bat_qty'];
                        $insert_amount = "insert into amount_details (total,due,paid,exchange,old_bat,old_bat_price,qty) values ('$total','$due','$paid','$exchange','$old_bat','$old_bat_price','$qty')";
                        $run_cart = mysqli_query($con, $insert_amount);

                        


                        $get_cart = "SELECT * FROM cart";
                        $run_cart = mysqli_query($con, $get_cart);
                        $row_cart = mysqli_fetch_array($run_cart);
                        $cart_id = $row_cart['cart_id'];
                        $invoice = "INVC" . $cart_id;

                        $get_cart = "SELECT * FROM cart";
                        $run_cart = mysqli_query($con, $get_cart);

                        while ($row_cart = mysqli_fetch_array($run_cart)) {
                            $product_id = $row_cart['product_id'];

                            $product_serial = $row_cart['product_serial'];

                            $purchase_rate = $row_cart['purchase_rate'];

                            $product_qty = $row_cart['product_qty'];

                            $unit_price = $row_cart['unit_price'];

                            $total_price = $row_cart['total_price'];

                            $profit = $row_cart['profit'];

                            $customer_name = $row_cart['customer_name'];

                            $author_id = $row_cart['author_id'];

                            $order_date = $row_cart['order_date'];

                            $customer_contact = $row_cart['customer_contact'];

                            $customer_city = $row_cart['customer_city'];

                            $customer_type = $row_cart['customer_type'];

                            $customer_address = $row_cart['customer_address'];

                            $product_category = $row_cart['product_category'];

                            $easybike = $row_cart['easy_bike'];

                            $battery = $row_cart['battery'];

                            $insert_print = "INSERT INTO print(invoice,product_id,product_serial,product_qty,customer_name,order_date,customer_contact,customer_city,customer_address,product_category,total_price,easy_bike,battery)
                VALUES('$invoice','$product_id','$product_serial','$product_qty','$customer_name','$order_date','$customer_contact','$customer_city','$customer_address','$product_category','$total_price','$easybike','$battery')";

                            $activity = "print " . $pro_title . " - " . $total . " Tk";
                            $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin_name')";
                            $run_logs = mysqli_query($con, $insert_logs);

                            $run_print = mysqli_query($con, $insert_print);
                        }

                            ?>
            <script>
                window.open("print/memo.php", '_blank');
            </script> <?php

                    }
                }

                        ?>

    <!-- script for dynamic category and product selection -->
    <script>
        $(document).ready(function() {
            $('#product-cat').on('change', function() {
                var cat_id = this.value;
                $.ajax({
                    url: "fetch-subcategory-by-category.php",
                    type: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#product-name").html(result);
                    }
                });
            });
        });
    </script>

    <!-- script for dynamic customer selection -->
    <script>
        $(document).ready(function() {
            $('#customer-type').on('change', function() {
                var customer_id = this.value;
                $.ajax({
                    url: "fetch-customer.php",
                    type: "POST",
                    data: {
                        customer_id: customer_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#c_name").html(result);
                    }
                });
            });
        });
    </script>

    <!-- script for dynamic product image and stock-->
    <script>
        $(document).ready(function() {
            $('#product-name').on('change', function() {
                var product_id = $("#pro-id").val();
                $.ajax({
                    url: "fetch-image-by-product.php",
                    type: "POST",
                    data: {
                        product_id: product_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#product-img").html(result);

                    }
                });
            });
        });
    </script>

    <!-- script for dynamic product rate-->
    <script>
        $(document).ready(function() {
            $('#product-name').on('change', function() {
                var product_id = $("#pro-id").val();
                $.ajax({
                    url: "fetch-price-by-product.php",
                    type: "POST",
                    data: {
                        product_id: product_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#product-rate").html(result);

                    }
                });
            });
        });
    </script>

    <!-- script for dynamic cart insert-->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#add_cart").click(function() {
                alert("Cart added");
                var product_name = $("#pro-id").val();
                var product_name2 = $("#battery_name").val();
                var product_sl = $("#product_sl").val();
                var order_qty = $("#order_qty").val();
                var rate = $("#rate").val();
                var customer_name = $("#customer_name").val();
                var order_date = $("#order_date").val();
                var product_cat = $("#product-cat").val();
                var customer_city = $("#customer_city").val();
                var cat = $("#customer-type").val();
                var customer_address = $("#customer_address").val();
                var customer_contact = $("#customer_contact").val();
                var total_price = rate * order_qty;
                var author = $("#author").val();

                $.ajax({
                    url: "insert.php",
                    type: "POST",
                    async: false,
                    data: {
                        "done": 1,
                        "product_name": product_name,
                        "product_name2": product_name2,
                        "product_sl": product_sl,
                        "order_qty": order_qty,
                        "rate": rate,
                        "customer_name": customer_name,
                        "order_date": order_date,
                        "product_cat": product_cat,
                        "customer_city": customer_city,
                        "cat": cat,
                        "customer_address": customer_address,
                        "customer_contact": customer_contact,
                        "total_price": total_price,
                        "author": author,
                    },
                    success: function(data) {}
                });
                return false;

            });

        });
    </script>

    <!-- script for dynamic cart load-->
    <script>
        $(document).ready(function() {

            $('#add_cart').click(function() {
                $("#order-cart").load("fetch-cart.php");

                return false;
            });
        });
    </script>
    <!-- script for dynamic amount details load-->
    <script>
        $(document).ready(function() {

            $('#add_cart').click(function() {
                $("#order-amount").load("fetch-amount.php");
                return false;
            });
        });
    </script>

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

</body>

</html>