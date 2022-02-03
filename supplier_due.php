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

                    <i class="fa fa-dashboard"></i> Dashboard / Supplier Due

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
                                <td>From <input type="date" name="from_date" value="<?php echo $today; ?>"></td>
                                <td>To <input type="date" name="to_date" value="<?php echo $today; ?>"></td>
                                <td><input name="filter" value="Filter" type="submit" class="btn btn-primary form-control"></td>
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
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Name </th>
                                        <th style="text-align: center;"> Contact </th>
                                        <th style="text-align: center;"> Due Amount </th>
                                        <th style="text-align: center;"> Purpose </th>
                                        <th style="text-align: center;"> Last Pay </th>
                                        <th style="text-align: center;"> Last Amount </th>
                                        <th style="text-align: center;"> Payment </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    $total_due = 0;

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from supplier_amount where due>0";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $due_id = $row_order['id'];

                                            $date = $row_order['date'];

                                            $due_amount = $row_order['due'];

                                            $name = $row_order['s_name'];

                                            $contact = $row_order['s_contact'];

                                            $purpose = $row_order['invoice'];

                                            $last_pay = $row_order['last_payment'];

                                            $last_amount = $row_order['last_amount'];

                                            $total_due = $total_due + $due_amount;
                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $contact; ?> </td>
                                                <td> <?php echo $due_amount; ?> Tk</td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $last_pay; ?> </td>
                                                <td> <?php echo $last_amount; ?> Tk</td>
                                                <td>
                                                    <a href="index.php?supplier_due_payment=<?php echo $due_id; ?>">

                                                        <i class="fa fa-pencil"></i> Payment

                                                    </a>
                                                </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from supplier_amount where due>0 and order_date between '$from_date' and '$to_date'";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $due_id = $row_order['id'];

                                            $date = $row_order['date'];

                                            $due_amount = $row_order['due'];

                                            $name = $row_order['s_name'];

                                            $contact = $row_order['s_contact'];

                                            $purpose = $row_order['invoice'];

                                            $last_pay = $row_order['last_payment'];

                                            $last_amount = $row_order['last_amount'];

                                            $total_due = $total_due + $due_amount;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $contact; ?> </td>
                                                <td> <?php echo $due_amount; ?> Tk</td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $last_pay; ?> </td>
                                                <td> <?php echo $last_amount; ?> Tk</td>
                                                <td>
                                                    <a href="index.php?supplier_due_payment=<?php echo $due_id; ?>">

                                                        <i class="fa fa-pencil"></i> Payment

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
                        <h3 style="text-align: center; color:brown"> <?php echo $total_due; ?> Tk</h3>

                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-md-3 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php }

?>