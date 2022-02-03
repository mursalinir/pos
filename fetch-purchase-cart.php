<?php
require_once "db.php";
?>

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