<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_income'])) {

        $delete_id = $_GET['delete_income'];

        $delete_balance = "delete from balance where balance_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_balance);

        if ($run_delete) {

            $activity = "Delete Income report";
            $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin_name')";
            $run_logs = mysqli_query($con, $insert_logs);

            echo "<script>alert('One of your income report has been Deleted')</script>";
            echo "<script>window.open('index.php?view_income','_self')</script>";
        }
    }

?>

<?php } ?>