<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Products
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Products
                   
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->

            
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th style="text-align:center"> Sl. No: </th>
                                <th style="text-align:center"> Product ID: </th>
                                <th style="text-align:center"> Product Title: </th>
                                <th style="text-align:center"> Product Image: </th>
                                <th style="text-align:center"> Category: </th>
                                <th style="text-align:center"> unit Price: </th>    
                                <th style="text-align:center"> In Stock: </th>                                                    
                                <th style="text-align:center"> Delete: </th>
                                <th style="text-align:center"> Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from products";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_name'];
                                    
                                    $pro_img = $row_pro['product_img'];
                                    
                                    $pro_price = $row_pro['product_price'];

                                    $pro_qty = $row_pro['qty'];

                                    $pro_cat_id = $row_pro['product_cat'];
                                    
                                        $get_cat = "select * from categories where cat_id= '$pro_cat_id'";
                                
                                        $run_cat = mysqli_query($con,$get_cat);

                                        while($row_cat=mysqli_fetch_array($run_cat)){

                                            $pro_cat = $row_cat['cat_title'];
                                        }

                                    
                                    $i++;
                                        
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td style="text-align:center; font-size:17px"> <?php echo $i; ?> </td>
                                <td style="text-align:center; font-size:17px"> <?php echo $pro_id; ?> </td>
                                <td style="text-align:center; font-size:17px"> <?php echo $pro_title; ?> </td>
                                <td style="text-align:center; font-size:17px"> <img src="product_images/<?php echo $pro_img; ?>" width="100" height="60"></td>
                                <td style="text-align:center; font-size:17px"> <?php echo $pro_cat; ?></td>
                                <td style="text-align:center; font-size:17px"> <?php echo $pro_price; ?> Tk</td>
                                <td style="text-align:center; font-size:17px"> <?php echo $pro_qty; ?> Pcs</td>
                                <td style="text-align:center; font-size:17px"> 
                                     
                                     <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td style="text-align:center; font-size:17px"> 
                                     
                                     <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php }?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>