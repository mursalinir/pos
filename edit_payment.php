<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_payment'])){
        
        $payment_id = $_GET['edit_payment'];
        
        $get_payment = "select * from payments where payment_id='$payment_id'";
        
        $run_edit = mysqli_query($con,$get_payment);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $payment_id = $row_edit['payment_id'];

        $payment_status = $row_edit['status'];
        
        $trx_id = $row_edit['code'];

        $invoice_no = $row_edit['invoice_no'];

        $payment = $row_edit['amount'];

        $get_order = "select * from orders where invoice_no='$invoice_no'";
        
        $run_order = mysqli_query($con,$get_order);
        
        $row_order = mysqli_fetch_array($run_order);
        
        $order_date = $row_order['order_date'];
                                    
        $c_id = $row_order['customer_contact'];

        $shipping_addr = $row_order['shipping_addr'];
        
        $product_id = $row_order['product_id'];
        
        $qty = $row_order['qty'];                                    
                                           
        $status = $row_order['order_status'];

        $order_amount = $row_order['total_amount'];

        $due_amount = $row_order['due_amount'];

        $updated_due_amount = $due_amount - $payment;

        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit Payments </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Payments
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Payments
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> TrxID </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="trxid" type="text" class="form-control" value="<?php echo $trx_id; ?>">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Payment Status: </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="status" class="form-control"><!-- form-control Begin -->
                               
                               <option value="<?php echo $payment_status; ?>"> <?php echo $payment_status; ?> </option>

                                   <option value='Checked'> Checked </option>
                                   <option value='Unchecked'> Unchecked </option>                               
                              
                            </select><!-- form-control Finish -->
                           
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Payment" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $payment_status = $_POST['status'];

   // $amount 

    $update_payment = "update payments set status='$payment_status' where payment_id='$payment_id'";
    
    $run_payment = mysqli_query($con,$update_payment);

    $update_order = "update orders set due_amount='$updated_due_amount' where invoice_no='$invoice_no'";
    
    $run_order = mysqli_query($con,$update_order);

    if($updated_due_amount<=0)
    {
        $update_order = "update orders set order_status='Processing' where invoice_no='$invoice_no'";
    
        $run_order = mysqli_query($con,$update_order);
    }
    if($run_payment){
        
       echo "<script>alert('Your paymenst has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_payments','_self')</script>"; 
        
    }
    
}

?>


<?php } ?>