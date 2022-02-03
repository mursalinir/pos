<?php   

    session_start();

    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from admins where admin_email='$admin_session'";
        
    $run_admin = mysqli_query($con,$get_admin);
        
    $row_admin = mysqli_fetch_array($run_admin);

    $admin = $row_admin['admin_name'];

    $activity = 'Log out from system';

    $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin')";

    $run_logs = mysqli_query($con,$insert_logs);

    session_destroy();

    echo "<script>window.open('login.php','_self')</script>";
    
    }
?>