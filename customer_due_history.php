<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
if(isset($_GET['customer_due_history'])){
        
    $due = $_GET['customer_due_history'];
    $get_c = "select * from customers where customer_id = '$due'";
    $run_c = mysqli_query($con, $get_c);
    $row_c = mysqli_fetch_array($run_c);
    $c_name = $row_c['customer_name'];
    $c_contact = $row_c['customer_contact'];
    $c_address = $row_c['customer_address'];
    $t_due = $row_c['total_due'];
}
if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Dues Payment History

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <table style="width:100%">
                            <tr>
                                <td>From <input type="date" name="from_date" value="<?php echo $today; ?>"></td>
                                <td>To <input type="date" name="to_date" value="<?php echo $today; ?>"></td>
                                <td><input name="filter" value="Filter" type="submit" class="btn btn-primary form-control"></td>
                                <td width="3%"></td>
                                <th> Customer: <?php echo $c_name.' ('.$c_contact.')' ; ?> </th>
                                <th> Address: <?php echo $c_address; ?> </th>
                                <th> Total Due: <?php echo $t_due; ?> </th>

                            </tr>
                        </table>
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->
                        <div class="table-responsive">
                            <!-- table-responsive begin -->
                            <table class="table table-striped table-bordered table-hover">
                                <!-- table table-striped table-bordered table-hover begin -->

                                <thead>

                                    <!-- thead begin -->
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;"> Invoice </th>
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Details </th>
                                        <th style="text-align: center;"> Price </th> 
                                        <th style="text-align: center;"> Debit </th>                                       
                                        <th style="text-align: center;"> Due Amount </th>                                        
                                        <th style="text-align: center;"> Payment </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_due = 0;

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from dues where customer_id = '$due' order by 1 asc";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $id = $row_order['id'];

                                            $due_id = $row_order['due_id'];

                                            $date = $row_order['order_date'];

                                            $due_amount = $row_order['due'];

                                            $details = $row_order['details'];

                                            $total = $row_order['total'];

                                            $paid = $row_order['paid'];

                                            $c_id = $row_order['customer_id'];
                                            
                                            $invoice = $row_order['invoice'];

                                            $last_pay = $row_order['payment_date'];

                                            $last_amount = $row_order['payment_amount'];

                                            $total_due = $total_due + $due_amount;

                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $invoice; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $total; ?> Tk</td>
                                                <td> <?php echo $paid; ?> Tk</td>
                                                <td> <?php echo $due_amount; ?> Tk</td>                                              
                                                <td>
                                                    <a href="index.php?customer_due_payment=<?php echo $c_id; ?>">
                                                         Payment
                                                    </a>
                                                </td>

                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $view_report = "select * from amount where due>0 and order_date between '$from_date' and '$to_date' order by 1 desc";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {
                                            $due_id = $row_order['id'];

                                            $date = $row_order['order_date'];

                                            $due_amount = $row_order['due'];

                                            $details = $row_order['details'];

                                            $c_id = $row_order['customer_id'];
                                            
                                            $invoice = $row_order['invoice'];

                                            $total = $row_order['total'];

                                            $paid = $row_order['paid'];

                                            $last_amount = $row_order['payment_amount'];

                                            $total_due = $total_due + $due_amount;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $invoice; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $total; ?> Tk</td>
                                                <td> <?php echo $paid; ?> Tk</td>
                                                <td> <?php echo $t_due; ?> Tk</td>                                               
                                                <td>
                                                    <a href="index.php?customer_due_payment=<?php echo $c_id; ?>">
                                                         Payment
                                                    </a>
                                                </td>
                                            </tr><!-- tr finish -->
                                    <?php }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-10 finish -->

        </form>
    </div><!-- row 2 finish -->
<?php }

?>