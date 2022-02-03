<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Customers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr style="text-align: center;font-size:16px"><!-- tr begin -->
                                <th style="text-align: center;"> Customer Photo </th>
                                <th style="text-align: center;"> Customer Name </th>                                
                                <th style="text-align: center;"> Customer Contact </th>
                                <th style="text-align: center;"> Customer City </th>
                                <th style="text-align: center;"> Guarantor Name </th>                                
                                <th style="text-align: center;"> Details </th>
                                <th style="text-align: center;"> Delete </th>

                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from customers";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){ 

                                    $c_id = $row_c['customer_id'];                                   
                                  
                                    $c_name = $row_c['customer_name'];                                  

                                    $c_contact = $row_c['customer_contact'];                                    
                                  
                                    $c_city = $row_c['customer_city'];
                                    
                                    $c_address = $row_c['customer_address'];

                                    $c_img = $row_c['customer_img'];
                                    
                                    $g_name = $row_c['guarantor_name'];

                                    $g_contact = $row_c['guarantor_contact'];

                                    $g_address = $row_c['guarantor_address'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr style="text-align: center;font-size:16px"><!-- tr begin -->
                            <td> <img src="customer_images/<?php echo $c_img; ?>" width="80" height="70"></td>
                                <td> <?php echo $c_name; ?> </td>                               
                                <td> <?php echo $c_contact; ?> </td>
                                <td> <?php echo $c_city; ?></td>
                                <td> <?php echo $g_name ?> </td>
                                <td> 
                                     
                                     <a href="index.php?customer_details=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Details
                                    
                                     </a> 
                                     
                                </td>

                                <td> 
                                     
                                     <a href="index.php?delete_customer=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>