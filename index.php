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
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);

        $get_sale = "select * from sales where order_date = CURRENT_DATE()";
        
        $run_sale = mysqli_query($con,$get_sale);
        
        $count_sale = mysqli_num_rows($run_sale);

        $count_profit = 0;

        while ($row_sale = mysqli_fetch_array($run_sale)) {

                $count_profit = $count_profit + $row_sale['profit'];
        }
       
        $get_stock = "select * from stock";
        
        $run_stock = mysqli_query($con,$get_stock);
        
        $count_stock = 0;

        while ($row_stock = mysqli_fetch_array($run_stock)) {

                $count_stock = $count_stock + $row_stock['quantity'];
        }
        $get_due = "select * from customers";
        
        $run_due = mysqli_query($con,$get_due);
        
        $count_due = 0;

        while ($row_due = mysqli_fetch_array($run_due)) {

                $count_due = $count_due + $row_due['total_due'];
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nion Enterprise Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_order'])){
                        
                        include("insert_order.php");
                        
                }   if(isset($_GET['sales_return'])){
                        
                        include("sales_return.php");

                }   if(isset($_GET['sales_report'])){
                        
                        include("sales_report.php");

                }   if(isset($_GET['replace_history'])){
                        
                        include("replace_history.php");

                }   if(isset($_GET['sale_details'])){
                        
                        include("sale_details.php");

                }   if(isset($_GET['delete_sale'])){
                        
                        include("delete_sale.php");

                }   if(isset($_GET['insert_purchase'])){
                        
                        include("insert_purchase.php");
                        
                }   if(isset($_GET['purchase_return'])){
                        
                        include("purchase_return.php");

                }   if(isset($_GET['purchase_report'])){
                        
                        include("purchase_report.php");

                }   if(isset($_GET['purchase_details'])){
                        
                        include("purchase_details.php");

                }   if(isset($_GET['delete_purchase'])){
                        
                        include("delete_purchase.php");

                }   if(isset($_GET['delete_purchase_cart'])){
                        
                        include("delete_purchase_cart.php");

                }   if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                        
                }   if(isset($_GET['view_products'])){
                        
                        include("view_products.php");
                        
                }   if(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                       
                }   if(isset($_GET['insert_cat'])){
                        
                        include("insert_cat.php");
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("view_cats.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("delete_cat.php");
                        
                }   if(isset($_GET['stock'])){
                        
                        include("stock.php");
                        
                }   if(isset($_GET['stock_report'])){
                        
                        include("stock_report.php");
                        
                }   if(isset($_GET['old_ev_report'])){
                        
                        include("old_ev_report.php");
                        
                }   if(isset($_GET['old_dry_report'])){
                        
                        include("old_dry_report.php");
                        
                }   if(isset($_GET['edit_stock'])){
                        
                        include("edit_stock.php");
                        
                }   if(isset($_GET['insert_transaction'])){
                        
                        include("insert_transaction.php");
                        
                }   if(isset($_GET['view_transaction'])){
                        
                        include("view_transaction.php");
                        
                }   if(isset($_GET['insert_bank'])){
                        
                        include("insert_bank.php");
                        
                }   if(isset($_GET['insert_income'])){
                        
                        include("insert_income.php");
                        
                }   if(isset($_GET['view_income'])){
                        
                        include("view_income.php");
                        
                }  if(isset($_GET['delete_income'])){
                        
                        include("delete_income.php");
                        
                }  if(isset($_GET['delete_carry'])){
                        
                        include("delete_carry.php");
                        
                }    if(isset($_GET['view_balance'])){
                        
                        include("view_balance.php");
                        
                }   if(isset($_GET['insert_expenditure'])){
                        
                        include("insert_expenditure.php");
                        
                }   if(isset($_GET['view_expenditure'])){
                        
                        include("view_expenditure.php");
                        
                }   if(isset($_GET['delete_expenditure'])){
                        
                        include("delete_expenditure.php");
                        
                }   if(isset($_GET['insert_carry'])){
                        
                        include("insert_carry.php");
                        
                }   if(isset($_GET['view_bank'])){
                        
                        include("view_bank.php");
                        
                }   if(isset($_GET['customer_due'])){
                        
                        include("customer_due.php");
                        
                }   if(isset($_GET['add_due'])){
                        
                        include("add_due.php");
                        
                }   if(isset($_GET['customer_due_payment'])){
                        
                        include("customer_due_payment.php");
                        
                }   if(isset($_GET['customer_due_edit'])){
                        
                        include("customer_due_edit.php");
                        
                }   if(isset($_GET['customer_due_history'])){
                        
                        include("customer_due_history.php");
                        
                }   if(isset($_GET['supplier_due'])){
                        
                        include("supplier_due.php");
                        
                }   if(isset($_GET['supplier_due_payment'])){
                        
                        include("supplier_due_payment.php");
                        
                }   if(isset($_GET['delete_cart'])){
                        
                        include("delete_cart.php"); 

                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");

                }   if(isset($_GET['view_users'])){
                        
                        include("view_users.php");  

                }   if(isset($_GET['insert_customer'])){
                        
                        include("insert_customer.php");
                
                }   if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                
                }   if(isset($_GET['customer_details'])){
                        
                        include("customer_details.php");
                
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        
                }   if(isset($_GET['edit_customer'])){
                        
                        include("edit_customer.php");
                        
                }   if(isset($_GET['insert_supplier'])){
                        
                        include("insert_supplier.php");
                
                }   if(isset($_GET['view_suppliers'])){
                        
                        include("view_suppliers.php");
                
                }   if(isset($_GET['delete_supplier'])){
                        
                        include("delete_supplier.php");
                
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                
                }   if(isset($_GET['my_profile'])){
                        
                        include("my_profile.php");
                
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                
                }   if(isset($_GET['pay_employee'])){
                        
                        include("pay_employee.php");
                
                }   if(isset($_GET['salary_report'])){
                        
                        include("salary_report.php");
                
                }   if(isset($_GET['price'])){
                        
                        include("price.php");
                
                }   if(isset($_GET['logs'])){
                        
                        include("logs.php");
                
                }
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script> 
<script src="js/jquery.table2excel.js"></script>          
</body>
</html>


<?php } ?>