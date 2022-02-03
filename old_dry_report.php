<?php

$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;

$view_report = "select * from old_dry_report order by 1 desc";
$run_report = mysqli_query($con, $view_report);
$row_order = mysqli_fetch_array($run_report);
$total_quantity = $row_order['total_qty'];

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

                    <i class="fa fa-dashboard"></i> Dashboard / Old Dry Battery Stock Report

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
                                <td width="5%"></td>
                                <th> Current Stock: <?php echo $total_quantity.' Pcs' ; ?> </th>
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
                                        <th style="text-align: center;"> Sl. </th>
                                        <th style="text-align: center;"> Date </th>
                                        <th style="text-align: center;"> Details </th>
                                        <th style="text-align: center;"> Qty </th> 
                                        <th style="text-align: center;"> In Stock </th> 
                                        <th style="text-align: center;"> Amount </th>                                    
                                        <th style="text-align: center;"> Remarks </th>
                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from old_dry_report";

                                        $run_report = mysqli_query($con, $view_report);
                                        $i=0;
                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $id = $row_order['id'];

                                            $date = $row_order['date'];

                                            $details = $row_order['details'];

                                            $qty = $row_order['qty'];

                                            $total_qty = $row_order['total_qty'];

                                            $amount = $row_order['amount'];

                                            $remarks = $row_order['remarks'];

                                            $i=$i+1;

                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $qty; ?> Pcs</td>
                                                <td> <?php echo $total_qty; ?> Pcs</td>
                                                <td> <?php echo $amount; ?> Tk</td>
                                                <td> <?php echo $remarks; ?> </td>                                              
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                        $view_report = "select * from old_dry_report where date between '$from_date' and '$to_date'";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $id = $row_order['id'];

                                            $date = $row_order['date'];

                                            $details = $row_order['details'];

                                            $qty = $row_order['qty'];

                                            $total_qty = $row_order['total_qty'];

                                            $amount = $row_order['amount'];

                                            $remarks = $row_order['remarks'];

                                            $i=$i+1;

                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $details; ?> </td>
                                                <td> <?php echo $qty; ?> Pcs</td>
                                                <td> <?php echo $total_qty; ?> Pcs</td>
                                                <td> <?php echo $amount; ?> Tk</td>
                                                <td> <?php echo $remarks; ?> Tk</td>                                              
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