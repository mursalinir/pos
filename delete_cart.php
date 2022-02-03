<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_cart'])){
        
        $delete_id = $_GET['delete_cart'];
        
        $delete_order = "delete from cart where cart_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_order);
        
        if($run_delete){
                       
            echo "<script>window.open('index.php?insert_order','_self')</script>";
            
        }
        
    }

?>

<?php } ?>