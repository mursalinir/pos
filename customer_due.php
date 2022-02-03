<?php

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

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

                    <i class="fa fa-dashboard"></i> Dashboard / Customer Due

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <table style="width:100%">
                            <tr>
                              
                                <td><input name="filter" value=" Show All " type="submit" class="btn btn-primary form-control"></td>
                                <td width = "5%"></td>
                                <td> <button name="reset" type="submit" class="btn btn-primary form-control" style="background-color: lightcoral;"> Reset
                                </td>
                            </tr>
                        </table>
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->
                        <div class="table-responsive">
                            <!-- table-responsive begin -->
                            <table class="table table-striped table-bordered table-hover" id="table">
                                <!-- table table-striped table-bordered table-hover begin -->

                                <thead>
                                    <!-- thead begin -->
                                    <tr> <td colspan="5"></td></tr>
                                    <tr> <td colspan="5"></td></tr>
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;"> Sl. no. </th>
                                        <th style="text-align: center;"> Name </th>
                                        <th style="text-align: center;"> Address </th>
                                        <th style="text-align: center;"> Contact </th>                                       
                                        <th style="text-align: center;"class="no"> Last Payment Date</th>
                                        <th style="text-align: center;"class="no"> Last Payment Amount </th>
                                        <th style="text-align: center;"> Total Due Amount </th> 
                                        <th style="text-align: center;"class="no"> Next Payment Date </th>
                                        <th style="text-align: center;"class="no"> Payment </th>
                                        <th style="text-align: center;"class="no"> Modify </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_due = 0;

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from customers where total_due>0";

                                        $run_report = mysqli_query($con, $view_report);
                                        $i=0;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $c_id = $row_order['customer_id'];

                                            $c_name = $row_order['customer_name'];

                                            $c_contact = $row_order['customer_contact'];

                                            $c_address = $row_order['customer_address'];

                                            $due_amount = $row_order['total_due'];

                                            $last_pay = $row_order['last_payment_date'];

                                            $last_amount = $row_order['last_payment_amount'];

                                            $next_pay = $row_order['next_payment_date'];

                                            $total_due = $total_due + $due_amount;
                                            $i++;

                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <a href="index.php?customer_due_history=<?php echo $c_id; ?>">
                                                        <?php echo $c_name; ?> </a>
                                                </td>
                                                <td> <?php echo $c_address; ?> </td>
                                                <td> <?php echo $c_contact; ?> </td>                                                                           
                                                <td class="no"> <?php echo $last_pay; ?> </td>
                                                <td class="no"> <?php echo $last_amount; ?> </td>
                                                <td> <?php echo $due_amount; ?> </td> 
                                                <td class="no"> <?php echo $next_pay; ?> </td>
                                                <td class="no">
                                                    <a href="index.php?customer_due_payment=<?php echo $c_id; ?>">

                                                        Payment

                                                    </a>
                                                </td class="no">
                                                <td class="no">
                                                    <a href="index.php?customer_due_edit=<?php echo $c_id; ?>">

                                                        <i class="fa fa-pencil"></i>

                                                    </a>
                                                </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $filter = $_POST['cat'];
                                        $view_report = "select * from customers";
                                        $run_report = mysqli_query($con, $view_report);
                                        $i = 0;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $c_id = $row_order['customer_id'];

                                            $c_name = $row_order['customer_name'];

                                            $c_contact = $row_order['customer_contact'];

                                            $c_address = $row_order['customer_address'];
                                            
                                            $due_amount = $row_order['total_due'];

                                            $last_pay = $row_order['last_payment_date'];

                                            $last_amount = $row_order['last_payment_amount'];

                                            $next_pay = $row_order['next_payment_date'];

                                            $total_due = $total_due + $due_amount;
                                            $i++;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->                                                
                                                <td> <?php echo $i; ?> </td>
                                                <td> <a href="index.php?customer_due_history=<?php echo $c_id; ?>">
                                                        <?php echo $c_name; ?> </a>
                                                </td>
                                                <td> <?php echo $c_address; ?> </td>
                                                <td> <?php echo $c_contact; ?> </td>                                                                                                                           <td class="no"> <?php echo $last_pay; ?> </td>                                                
                                                <td class="no"> <?php echo $last_amount; ?> </td>
                                                <td> <?php echo $due_amount; ?> </td> 
                                                <td class="no"> <?php echo $next_pay; ?> </td>
                                                <td class="no">
                                                    <a href="index.php?customer_due_payment=<?php echo $c_id; ?>">

                                                        Payment

                                                    </a>
                                                </td>
                                                <td class="no">
                                                    <a href="index.php?customer_due_history=<?php echo $c_id; ?>">

                                                         History

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
            <div class="col-md-2">
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <h3 class="panel-title">
                            <!-- panel-title begin -->

                            <i class="fa fa-tags"></i> Summery


                        </h3><!-- panel-title finish -->
                    </div><!-- panel-heading finish -->

                    <div class="panel-body">
                        <!-- panel-body begin -->

                        <h3 style="text-align: center; color:darkslategrey"> Total Due: </h3>
                        <h3 style="text-align: center; color:brown"> <?php echo $total_due; ?> </h3>
                        <input name="excel" value="Export to excel" type="submit" class="btn btn-primary form-control">

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-3 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }
if (isset($_POST['excel'])) { ?>
    <script>
        $(document).ready(function() {
            $("#table").table2excel({
                exclude: ".no",
                filename: "Customer Dues.xls"
            });
        });
    </script>
<?php
}
?>