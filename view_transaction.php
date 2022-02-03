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

                    <i class="fa fa-dashboard"></i> Dashboard / Sales Report

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="col-lg-12">
                <!-- col-lg-12 begin -->
                <div class="panel panel-default">
                    <!-- panel panel-default begin -->
                    <div class="panel-heading">
                        <!-- panel-heading begin -->
                        <table style="width:100%">
                            <tr>
                                <td>From <input type="date" name="from_date" value="<?php echo $today; ?>"></td>
                                <td>To <input type="date" name="to_date" value="<?php echo $today; ?>"></td>

                                <td><button name="filter" type="submit" class="btn btn-primary form-control">
                                <i class="fa fa-filter" aria-hidden="true">  Filter</i>
                                </td>

                                <td style="width: 3%;"></td>

                                <td><button name="excel" type="submit" class="btn btn-primary form-control">
                                <i class="fa fa-file-excel-o" aria-hidden="true"> Export to Excel</i>

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
                                    <tr>
                                        <!-- tr begin -->
                                        <th style="text-align: center;">SL.</th>
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;">Bank Name</th>
                                        <th style="text-align: center;">Branch</th>
                                        <th style="text-align: center;">Name</th>
                                        <th style="text-align: center;">Purpose</th>
                                        <th style="text-align: center;">Account No.</th>
                                        <th style="text-align: center;">Amount</th>
                                        <th style="text-align: center;">Method</th>
                                        <th style="text-align: center;">Check No.</th>
                                        <th style="text-align: center;">Check Bank</th>

                                    </tr><!-- tr finish -->
                                </thead><!-- thead finish -->

                                <tbody>
                                    <!-- tbody begin -->

                                    <?php
                                    if (!isset($_POST['filter'])) {


                                        $view_report = "select * from transaction order by 1 desc";

                                        $run_report = mysqli_query($con, $view_report);

                                        $i = 0;

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $bank_id = $row_order['bank_name'];

                                            $branch = $row_order['branch'];

                                            $date = $row_order['date'];

                                            $name = $row_order['name'];

                                            $purpose = $row_order['purpose'];

                                            $account_no = $row_order['account_no'];

                                            $amount = $row_order['amount'];

                                            $method1 = $row_order['method'];

                                            if($method1==1){
                                                $method = "Cash";
                                            }
                                            else
                                            {
                                                $method = "Check";
                                            }

                                            $check_no = $row_order['check_no'];

                                            $check_bank = $row_order['check_bank'];

                                            $get_product = "select * from bank where bank_id='$bank_id'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $bank_name = $row_product['bank_name'];

                                            $i = $i + 1;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $bank_name; ?></td>
                                                <td> <?php echo $branch; ?> </td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $account_no; ?> </td>
                                                <td> <?php echo $amount; ?> Tk</td>
                                                <td> <?php echo $method; ?> </td>
                                                <td> <?php echo $check_no; ?> </td>
                                                <td> <?php echo $check_bank; ?> </td>

                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from transaction where date between '$from_date' and '$to_date' order by 1 desc";

                                        $run_report = mysqli_query($con, $view_report);

                                        $i = 0;

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $bank_id = $row_order['bank_name'];

                                            $branch = $row_order['branch'];

                                            $date = $row_order['date'];

                                            $name = $row_order['name'];

                                            $purpose = $row_order['purpose'];

                                            $account_no = $row_order['account_no'];

                                            $amount = $row_order['amount'];

                                            $method1 = $row_order['method'];

                                            if($method1==1){
                                                $method = "Cash";
                                            }
                                            else
                                            {
                                                $method = "Check";
                                            }

                                            $check_no = $row_order['check_no'];

                                            $check_bank = $row_order['check_bank'];

                                            $get_product = "select * from bank where bank_id='$bank_id'";

                                            $run_product = mysqli_query($con, $get_product);

                                            $row_product = mysqli_fetch_array($run_product);

                                            $bank_name = $row_product['bank_name'];

                                            $i = $i + 1;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $i; ?> </td>
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $bank_name; ?></td>
                                                <td> <?php echo $branch; ?> </td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $account_no; ?> </td>
                                                <td> <?php echo $amount; ?> Tk</td>
                                                <td> <?php echo $method; ?> </td>
                                                <td> <?php echo $check_no; ?> </td>
                                                <td> <?php echo $check_bank; ?> </td>

                                            </tr><!-- tr finish -->
                                    <?php }
                                    } ?>
                                </tbody><!-- tbody finish -->
                            </table><!-- table table-striped table-bordered table-hover finish -->
                        </div><!-- table-responsive finish -->
                    </div><!-- panel-body finish -->
                </div><!-- panel panel-default finish -->
            </div><!-- col-lg-12 finish -->
        </form>
    </div><!-- row 2 finish -->
<?php } 
if(isset($_POST['excel']))
{ ?>
    <script>
    $(document).ready(function() {
        $("#table").table2excel({
            filename: "Transaction.xls"
        });
    });
</script>
<?php
}
?>


