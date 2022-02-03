<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_sale'])){
        
        $delete_sale = $_GET['delete_sale'];
        
        $delete_sell = "delete from sales where invoice='$delete_sale'";
        
        $delete_amount = "delete from amount where invoice='$delete_sale'";
        
        $delete_balance = "delete from balance where purpose='$delete_sale'";
        
        $delete_income = "delete from income where purpose='$delete_sale'";
        
        $run_delete = mysqli_query($con,$delete_sell);

        
        if($run_delete){
                    
        $run_balance = mysqli_query($con,$delete_balance);
        
        $run_amount = mysqli_query($con,$delete_amount);
        
        $run_income = mysqli_query($con,$delete_income);
            $activity = "Delete Sale report";
            $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin_name')";
            $run_logs = mysqli_query($con, $insert_logs);
            
            echo "<script>alert('One of your Sale has been Deleted')</script>";
            
            echo "<script>window.open('index.php?sales_report','_self')</script>";
            
        }
        
    }

?>

<?php } ?>