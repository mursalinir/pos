<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_order'])){
        
        $invoice_no = $_GET['edit_order'];
        
        $get_order = "select * from orders where invoice_no='$invoice_no'";
        
        $run_order = mysqli_query($con,$get_order);
        
        $row_order = mysqli_fetch_array($run_order);
        
        $order_date = $row_order['order_date'];
                                    
        $c_id = $row_order['customer_contact'];
        
        //$invoice_no = $row_order['invoice_no'];

        $shipping_addr = $row_order['shipping_addr'];
        
        $product_id = $row_order['product_id'];
        
        $qty = $row_order['qty'];                                    
                                           
        $status = $row_order['order_status'];

        $order_amount = $row_order['total_amount'];

        $due_amount = $row_order['due_amount'];
        
        $get_products = "select * from products where product_id='$product_id'";
        
       /* $get_customer = "select * from customers where customer_id='$c_id'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);*/
        
        $customer_contact = $row_order['customer_contact'];                                   
       
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit orders </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Orders
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Orders
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Invoice No </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="invoice_no" type="text" class="form-control" value="<?php echo $invoice_no; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->           

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Customer Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="customer_contact" type="text" class="form-control" value="<?php echo $c_id; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Product Qty </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="qty" type="text" class="form-control" value="<?php echo $qty; ?>">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Total Amount </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="total_amount" type="text" class="form-control" value="<?php echo $order_amount; ?>">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->


                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label"> Due Amount </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <input name="due_amount" type="text" class="form-control" value="<?php echo $due_amount; ?>">
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Shipping Address </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="shipping_addr" cols="19" rows="6" class="form-control">
                              
                              <?php echo $shipping_addr; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->


                      
                       
                   </div><!-- form-group Finish -->


                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label">  Status: </label> 
                       
                       <div class="col-md-6"><!-- col-md-6 Begin -->
                           
                           <select name="status" class="form-control"><!-- form-control Begin -->
                               
                               <option value="<?php echo $status; ?>"> <?php echo $status; ?> </option>

                                   <option value='Pending'> Pending </option>
                                   <option value='Processing'> Processing </option>
                                   <option value='Complete'> Complete </option>                                  
                              
                            </select><!-- form-control Finish -->
                           
                        </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
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
    
    $invoice_no = $_POST['invoice_no'];
    $customer_contact = $_POST['customer_contact'];
    $qty = $_POST['qty'];
    $total_amount = $_POST['total_amount'];    
    $due_amount = $_POST['due_amount']; 
    $shipping_addr = $_POST['shipping_addr'];
    $order_status = $_POST['status'];
   
    $update_order = "update orders set invoice_no='$invoice_no',customer_contact='$customer_contact',qty='$qty',total_amount='$total_amount',due_amount='$due_amount',shipping_addr='$shipping_addr',order_status='$order_status' where invoice_no='$invoice_no'";
    
    $run_order = mysqli_query($con,$update_order);
    
    if($run_order){
        
       echo "<script>alert('Your order has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?view_orders','_self')</script>"; 
        
    }
    
}

?>


<?php } ?>