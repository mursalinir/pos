<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_purchase'])){
        
        $delete_sale = $_GET['delete_purchase'];
        
        $delete_purchase = "delete from purchase where invoice='$delete_sale'";
        
        $delete_balance = "delete from balance where purpose='$delete_sale'";
        
        $delete_expenditure = "delete from expenditure where purpose='$delete_sale'";
        
        $delete_amount = "delete from supplier_amount where invoice='$delete_sale'";
        
        $run_delete = mysqli_query($con,$delete_purchase);
        
        if($run_delete){
            $run_balance = mysqli_query($con,$delete_balance);
            $run_expenditure = mysqli_query($con,$delete_expenditure);
            $run_amount = mysqli_query($con,$delete_amount);
            $activity = "Delete Purchase report";
            $insert_logs = "insert into logs (date,activity,user) values (CURRENT_TIMESTAMP(),'$activity','$admin_name')";
            $run_logs = mysqli_query($con, $insert_logs);
            
            echo "<script>alert('One of your Purchase report has been Deleted')</script>";
            
            echo "<script>window.open('index.php?purchase_report','_self')</script>";
            
        }
        
    }

?>

<?php } ?>