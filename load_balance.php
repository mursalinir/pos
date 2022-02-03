<?php
    include 'db.php';
    $newCont = $_POST['newCount'];
                                    $total_expenditure = 0;
                                    $total_income = 0;
                                    $total_balance = 0;

                                    if (!isset($_POST['filter'])) {

                                        $view_report = "select * from balance group by date order by date desc LIMIT $newCont";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $view_report_date = "select * from balance where date = '$date' ";

                                            $run_report_date = mysqli_query($con, $view_report_date);

                                            $expenditure = 0;

                                            $income = 0;

                                            $balance = 0;

                                            $carried_over = 0;

                                            while ($row_order_date = mysqli_fetch_array($run_report_date)) {

                                                $income_amount = $row_order_date['income'];

                                                $expenditure_amount = $row_order_date['expenditure'];

                                                $carry = $row_order_date['carried_over'];

                                                $income = $income + $income_amount;

                                                $expenditure = $expenditure + $expenditure_amount;

                                                $carried_over = $carried_over + $carry;

                                                $balance = ($income - $expenditure) + $carried_over;
                                            }
                                            $total_expenditure = $total_expenditure + $expenditure;
                                            $total_income = $total_income + $income;
                                            $total_balance = $total_income - $total_expenditure;
                                    ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $income; ?> Tk</td>
                                                <td> <?php echo $expenditure; ?> Tk</td>
                                                <td> <?php echo $carried_over; ?> Tk</td>
                                                <td> <?php echo $balance; ?> Tk</td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from balance where date between '$from_date' and '$to_date' group by date order by date desc LIMIT $newCont";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $view_report_date = "select * from balance where date = '$date'";

                                            $run_report_date = mysqli_query($con, $view_report_date);

                                            $expenditure = 0;

                                            $income = 0;

                                            $balance = 0;

                                            $carried_over = 0;

                                            while ($row_order_date = mysqli_fetch_array($run_report_date)) {

                                                $income_amount = $row_order_date['income'];

                                                $expenditure_amount = $row_order_date['expenditure'];

                                                $carry = $row_order_date['carried_over'];

                                                $income = $income + $income_amount;

                                                $expenditure = $expenditure + $expenditure_amount;

                                                $carried_over = $carried_over + $carry;

                                                $balance = ($income - $expenditure) + $carried_over;
                                            }
                                            $total_expenditure = $total_expenditure + $expenditure;
                                            $total_income = $total_income + $income;
                                            $total_balance = $total_income - $total_expenditure;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?> </td>
                                                <td> <?php echo $income; ?> Tk</td>
                                                <td> <?php echo $expenditure; ?> Tk</td>
                                                <td> <?php echo $carried_over; ?> Tk</td>
                                                <td> <?php echo $balance; ?> Tk</td>

                                            </tr><!-- tr finish -->
                                    <?php }
                                    } ?>