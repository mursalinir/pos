<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<body>

    <?php
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;

    $total = 0;
    $get_cart = "select * from purchase_cart";
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
                                    <td>Purchase By: <?php echo $admin_name; ?> <input type="hidden" id="author" value=" <?php echo $admin_name ?> "> </td>

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

                                    <label class="col-md-4 control-label"> Supplier </label>

                                    <div class="col-md-8">
                                        <!-- col-md-8 Begin -->

                                        <select name="cat" class="form-control" id="customer-type">
                                            <!-- form-control Begin -->

                                            <option> Select Supplier </option>

                                            <?php

                                            $get_cat = "select * from suppliers";
                                            $run_cat = mysqli_query($con, $get_cat);

                                            while ($row_cat = mysqli_fetch_array($run_cat)) {

                                                $cat_id = $row_cat['s_id'];
                                                $cat_title = $row_cat['supplier_name'];

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

                            </div><!-- col-md-6 Finish -->

                            <div id="cart" class="col-md-5">
                                <!-- col-md-6 Begin -->

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

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label" for="SUBCATEGORY"> Name </label>

                                    <div class="col-md-8">
                                        <!-- col-md-6 Begin -->

                                        <select name="product_name" class="form-control" id="product-name">
                                            <!-- form-control Begin -->

                                        </select><!-- form-control Finish -->


                                    </div><!-- col-md-6 Finish -->

                                </div><!-- form-group Finish -->

                                <div class="form-group">
                                    <!-- form-group Begin -->

                                    <label class="col-md-4 control-label">Purchase Rate/Unit</label>

                                    <div class="col-md-8">
                                        <!-- col-md-6 Begin -->

                                        <input name="pur_rate" id="purchase_rate" type="text" class="form-control">

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

            <div class="col-md-3" id="purchase-amount">

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

                                <label class="col-md-4 control-label">Total</label>

                                <div class="col-md-8">
                                    <!-- col-md-6 Begin -->

                                    <label class="form-control" style="text-align:right"><?php echo $total ?></label>
                                    <input type="hidden" id="total" name="total" value="<?php echo $total ?>">

                                </div><!-- col-md-6 Finish -->

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

                                    <input name="purchase" value="Purchase" type="submit" class="btn btn-primary form-control">

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

            <div class="col-md-12" id="purchase-cart">
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
                                        <th> Purchase Rate </th>
                                        <th> Quantity (Pcs) </th>
                                        <th> Total Price</th>
                                        <th> Rate/unit (Tk) </th>
                                        <th> Supplier Name</th>
                                        <th> Remove </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php

                                    $i = 0;

                                    $get_cart = "select * from purchase_cart";

                                    $run_cart = mysqli_query($con, $get_cart);

                                    while ($row_pro = mysqli_fetch_array($run_cart)) { ?>
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <?php

                                            $cart_id = $row_pro['cart_id'];

                                            $pro_id = $row_pro['product_id'];

                                            $purchase_rate = $row_pro['purchase_rate'];

                                            $pro_price = $row_pro['total_price'];

                                            $pro_qty = $row_pro['product_qty'];

                                            $pro_rate = $row_pro['unit_price'];

                                            $customer = $row_pro['customer_name'];

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
                                                <td> <input name="purchase" type="text" class="form-control" style="text-align:right" value="<?php echo $purchase_rate; ?>"></td>
                                                <td> <input name="qty" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_qty; ?>"></td>
                                                <td> <input name="price" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_price; ?>"></td>
                                                <td> <input name="rate" type="text" class="form-control" style="text-align:right" value="<?php echo $pro_rate; ?>"></td>
                                                <td> <input name="customer" type="text" class="form-control" style="text-align:right" value="<?php echo $customer; ?>"></td>

                                                <td>

                                                    <a href="index.php?delete_purchase_cart=<?php echo $cart_id; ?>">

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

        if (isset($_POST['add_cart'])) {

            $product_id = $_POST['product_name'];
            $purchase_rate = $_POST['pur_rate'];
            $product_qty = $_POST['order_qty'];
            $unit_price = $_POST['rate'];
            $total_price = $purchase_rate * $product_qty;
            $customer_name = $_POST['customer_name'];
            $order_date = $_POST['order_date'];
            $author_id = $admin_id;
            $product_category = $_POST['product_cat'];
            $customer_city = $_POST['customer_city'];
            $customer_address = $_POST['customer_address'];
            $customer_contact = $_POST['customer_contact'];
            $insert_cart = "insert into purchase_cart (product_id,product_qty,purchase_rate,unit_price,total_price,customer_name,author_id,order_date,customer_contact,customer_city,customer_address,product_category) values ('$product_id','$product_qty','$purchase_rate','$unit_price','$total_price','$customer_name','$author_id','$order_date','$customer_contact','$customer_city','$customer_address','$product_category')";

            $run_cart = mysqli_query($con, $insert_cart);

            if ($run_cart) {

                echo "<script>window.open('index.php?insert_purchase','_self')</script>";
            }
        }

        if (isset($_POST['reset'])) {
            echo "<script>window.open('index.php?insert_purchase','_self')</script>";
        }


        if (isset($_POST['purchase'])) {

            $clean_cart = "delete from amount_details";
            $run = mysqli_query($con, $clean_cart);

            $clean_cart = "delete from print";
            $run = mysqli_query($con, $clean_cart);

            $total = ($_POST['total']);
            $paid = $_POST['paid'];
            $due = $total - $paid;
            $insert_amount = "insert into amount_details (total,due,paid) values ('$total','$due','$paid')";
            $run_cart = mysqli_query($con, $insert_amount);

            $get_cart = "SELECT * FROM purchase_cart";
            $run_cart = mysqli_query($con, $get_cart);
            $row_cart = mysqli_fetch_array($run_cart);
            $cart_id = $row_cart['cart_id'];
            $invoice = "PRCS" . $cart_id;
            $customer_name = $row_cart['customer_name'];
            $customer_contact = $row_cart['customer_contact'];
            $order_date = $row_cart['order_date'];

            $insert_a = "INSERT into supplier_amount (invoice,s_name,s_contact,total,paid,due,date) values ('$invoice','$customer_name','$customer_contact','$total','$paid','$due','$order_date')";
            $run_a = mysqli_query($con, $insert_a);

            $insert_i = "INSERT into expenditure (date,name,purpose,amount) values ('$order_date','$admin_name','$invoice','$paid')";
            $run_i = mysqli_query($con, $insert_i);

            $insert_balance = "insert into balance (expenditure,date,purpose) values ('$paid','$order_date','$invoice')";
            $run_balance = mysqli_query($con, $insert_balance);

            $get_cart = "SELECT * FROM purchase_cart";
            $run_cart = mysqli_query($con, $get_cart);

            while ($row_cart = mysqli_fetch_array($run_cart)) {
                $cart_id = $row_cart['cart_id'];

                $product_id = $row_cart['product_id'];

                $purchase_rate = $row_cart['purchase_rate'];

                $product_qty = $row_cart['product_qty'];

                $unit_price = $row_cart['unit_price'];

                $total_price = $row_cart['total_price'];

                $customer_name = $row_cart['customer_name'];

                $author_id = $row_cart['author_id'];

                $order_date = $row_cart['order_date'];

                $customer_contact = $row_cart['customer_contact'];

                $customer_city = $row_cart['customer_city'];

                $customer_address = $row_cart['customer_address'];

                $product_category = $row_cart['product_category'];

                $insert_sales = "INSERT INTO purchase(invoice,product_id,product_qty,purchase_rate,unit_price,total_price,seller_name,author_id,purchase_date,seller_contact,seller_city,seller_address,product_category)
                VALUES('$invoice','$product_id','$product_qty','$purchase_rate','$unit_price','$total_price','$customer_name','$author_id','$order_date','$customer_contact','$customer_city','$customer_address','$product_category')";

                $get_quantity = "SELECT * from stock where product_id = '$product_id'";
                $run_quantity = mysqli_query($con, $get_quantity);
                $row_quantity = mysqli_fetch_array($run_quantity);
                $quantity = $row_quantity['quantity'] + $product_qty;

                $update_stock = "update stock set quantity='$quantity',purchase_rate='$purchase_rate',unit_price='$unit_price' where product_id = '$product_id'";

                $insert_print = "INSERT INTO print(invoice,product_id,product_qty,customer_name,order_date,customer_contact,customer_city,customer_address,product_category,total_price)
                VALUES('$invoice','$product_id','$product_qty','$customer_name','$order_date','$customer_contact','$customer_city','$customer_address','$product_category','$total_price')";

                $activity = "Purchase " . $pro_title . " - " . $total . " Tk";
                $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin_name')";
                $run_logs = mysqli_query($con, $insert_logs);

                $run_sales = mysqli_query($con, $insert_sales);
                $run__stock = mysqli_query($con, $update_stock);
                $run_print = mysqli_query($con, $insert_print);
            }

            if ($run_sales and $run_print) {
                $clean_cart = "delete from purchase_cart";
                $run = mysqli_query($con, $clean_cart);
        ?>
                <script>
                    window.open("print/memo.php", '_blank');
                </script> <?php


                            echo "<script>alert('Save Success!')</script>";
                            echo "<script>window.open('index.php?insert_purchase','_self')</script>";
                        } else {
                            echo "<script>alert('Coudn't Save!')</script>";
                        }
                    }

                    if (isset($_POST['print'])) {
                        $clean_cart = "delete from amount_details";
                        $run = mysqli_query($con, $clean_cart);

                        $clean_cart = "delete from print";
                        $run = mysqli_query($con, $clean_cart);

                        $total = $_POST['total'];
                        $paid = $_POST['paid'];
                        $due = $total - $paid;

                        $insert_amount = "insert into amount_details (total,due,paid) values ('$total','$due','$paid')";
                        $run_cart = mysqli_query($con, $insert_amount);

                        $get_cart = "SELECT * FROM purchase_cart";
                        $run_cart = mysqli_query($con, $get_cart);
                        $row_cart = mysqli_fetch_array($run_cart);
                        $cart_id = $row_cart['cart_id'];
                        $invoice = "PRCS" . $cart_id;

                        $get_cart = "SELECT * FROM purchase_cart";
                        $run_cart = mysqli_query($con, $get_cart);

                        while ($row_cart = mysqli_fetch_array($run_cart)) {
                            $cart_id = $row_cart['cart_id'];

                            $product_id = $row_cart['product_id'];

                            $purchase_rate = $row_cart['purchase_rate'];

                            $product_qty = $row_cart['product_qty'];

                            $unit_price = $row_cart['unit_price'];

                            $total_price = $row_cart['total_price'];

                            $customer_name = $row_cart['customer_name'];

                            $author_id = $row_cart['author_id'];

                            $order_date = $row_cart['order_date'];

                            $customer_contact = $row_cart['customer_contact'];

                            $customer_city = $row_cart['customer_city'];

                            $customer_address = $row_cart['customer_address'];

                            $product_category = $row_cart['product_category'];

                            $insert_print = "INSERT INTO print(invoice,product_id,product_qty,customer_name,order_date,customer_contact,customer_city,customer_address,product_category,total_price)
                VALUES('$invoice','$product_id','$product_qty','$customer_name','$order_date','$customer_contact','$customer_city','$customer_address','$product_category','$total_price')";

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
                    url: "fetch-supplier.php",
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
                var product_id = this.value;
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
                var product_id = this.value;
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
                var product_name = $("#product-name").val();
                var purchase_rate = $("#purchase_rate").val();
                var order_qty = $("#order_qty").val();
                var rate = $("#rate").val();
                var total_price = purchase_rate * order_qty;
                var customer_name = $("#customer_name").val();
                var order_date = $("#order_date").val();
                var author = $("#author").val();
                var product_cat = $("#product-cat").val();
                var customer_city = $("#customer_city").val();
                var customer_address = $("#customer_address").val();
                var customer_contact = $("#customer_contact").val();

                $.ajax({
                    url: "insert-p.php",
                    type: "POST",
                    async: false,
                    data: {
                        "done": 1,
                        "product_name": product_name,
                        "order_qty": order_qty,
                        "rate": rate,
                        "customer_name": customer_name,
                        "order_date": order_date,
                        "product_cat": product_cat,
                        "customer_city": customer_city,
                        "customer_address": customer_address,
                        "customer_contact": customer_contact,
                        "total_price": total_price,
                        "purchase_rate": purchase_rate,
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
                $("#purchase-cart").load("fetch-purchase-cart.php");

                return false;
            });
        });
    </script>
    <!-- script for dynamic amount details load-->
    <script>
        $(document).ready(function() {

            $('#add_cart').click(function() {
                $("#purchase-amount").load("fetch-purchase-amount.php");

                return false;
            });
        });
    </script>
</body>

</html>