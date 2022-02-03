<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Logs Report
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Logs
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th style="text-align:center" width="7%"> ID </th>
                                <th style="text-align:center" width="25%"> Date </th>
                                <th style="text-align:center" width="52%"> Activity Details </th>
                                <th style="text-align:center" width="16%"> Author </th>                                
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_logs = "select * from logs order by 1 desc";
                                
                                $run_logs = mysqli_query($con,$get_logs);
          
                                while($row_logs=mysqli_fetch_array($run_logs)){
                                    
                                    $log_id = $row_logs['log_id'];
                                    
                                    $activity = $row_logs['activity'];
                                    
                                    $date = $row_logs['date'];

                                    $author = $row_logs['user'];                                 
                                                                 
                                    $i++;
                            
                            ?>
                            
                            <tr style="text-align:center"><!-- tr begin -->
                                <td> <?php echo $log_id; ?> </td>
                                <td> <?php echo $date; ?></td>
                                <td> <?php echo $activity; ?> </td>
                                <td> <?php echo $author; ?></td>                            

                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>