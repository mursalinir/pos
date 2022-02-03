<?php
    include 'db.php';
    $newCont = $_POST['newCount'];
    $total_income = 0;
                                    if (!isset($_POST['filter'])) {


                                        $view_report = "select * from balance where income>0 order by date desc LIMIT $newCont";

                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $amount = $row_order['income'];

                                            $name = $row_order['i_name'];

                                            $purpose = $row_order['i_purpose'];

                                            $id = $row_order['balance_id'];

                                            $total_income = $total_income + $amount;
                                    ?>

                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                                <td><form action="?delete_income=<?php echo $id; ?>" method="POST">
                                                <input name="delete" value="Delete" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">
                                                </form>
                                                </td>
                                            </tr><!-- tr finish -->
                                        <?php }
                                    } else {

                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        $view_report = "select * from balance where income>0 and date between '$from_date' and '$to_date' order by date desc LIMIT $newCont";
                                        $run_report = mysqli_query($con, $view_report);

                                        while ($row_order = mysqli_fetch_array($run_report)) {

                                            $date = $row_order['date'];

                                            $id = $row_order['balance_id'];

                                            $amount = $row_order['income'];

                                            $name = $row_order['i_name'];

                                            $purpose = $row_order['i_purpose'];

                                            $total_income = $total_income + $amount;
                                        ?>
                                            <tr style="text-align: center;">
                                                <!-- tr begin -->
                                                <td> <?php echo $date; ?></td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $purpose; ?> </td>
                                                <td> <?php echo $amount; ?> Tk </td>
                                                <td><form action="?delete_income=<?php echo $id; ?>" method="POST">
                                                <input name="delete" value="Delete" type="submit" class="btn btn-primary form-control" onClick="return confirm('Are you sure you want to delete?')">
                                                </form>
                                                </td>
                                            </tr><!-- tr finish -->
                                    <?php }
                                    } ?>