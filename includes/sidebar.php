<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nion Enterprise</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
   
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="index.php?dashboard" class="navbar-brand">Nion Enterprise</a>
        
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>                
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?my_profile=<?php echo $admin_id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="index.php?view_products"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-envelope"></i> Products
                        
                        <span class="badge"><?php echo $count_products; ?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="index.php?view_customers"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Customeres
                        
                        <span class="badge"><?php echo $count_customers; ?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="index.php?view_cats"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#sales"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-money"></i> Sales
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="sales" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_order"> New Order </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?sales_report"> Sales Report </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?sales_return"> Sales Replace </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?replace_history"> Replace History </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#purchase"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-money"></i> Purchase
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="purchase" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_purchase"> New Purchase </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?purchase_return"> Purchase Return </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?purchase_report"> Purchase Report </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Products
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="products" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_product"> Insert Product </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_products"> View Products </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
                                    
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-book"></i> Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_cat"> Insert Category </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_cats"> View Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#stock"><!-- a href begin -->                        
                    <i class="fa fa-fw fa-money"></i> Stock
                    <i class="fa fa-fw fa-caret-down"></i>                        
                </a><!-- a href finish -->
                    <ul id="stock" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?stock"> Current Stock </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?stock_report"> Stock Report</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?old_ev_report">Old Ev Battery Report</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?old_dry_report">Old Dry Battery Report</a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
            </li><!-- li finish -->    
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#transaction"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-money"></i> Transaction
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="transaction" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_transaction"> New Transaction </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_transaction"> View Statement</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_bank"> Bank List</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_bank"> Add Bank</a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#cashbook"><!-- a href begin -->
                        
                        <i class="fa fa-book"></i> Cashbook
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="cashbook" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_income"> Add Income </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_expenditure"> Add Expenditure</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_carry"> Carried Over</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_expenditure"> View Expenditure</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_income"> View Income</a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_balance"> Balance Report</a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#due"><!-- a href begin -->
                        
                        <i class="fa fa-book"></i> Due
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="due" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?customer_due"> Customer Due </a>
                    </li><!-- li finish -->
                        <li><!-- li begin -->
                        <a href="index.php?add_due"> Add Due </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?supplier_due"> Supplier Due</a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
            
                <a href="#" data-toggle="collapse" data-target="#suppliers"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Suppliers
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="suppliers" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_supplier"> Add Supplier </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_suppliers"> View Supplier </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish --> 
            
            <li><!-- li begin -->
            
                            <a href="#" data-toggle="collapse" data-target="#customers"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Customers
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="customers" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_customer"> Add Customer </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_customers"> View Customers </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->  
           
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Employees
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="users" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_user"> Add Employee </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_users"> View Employees </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?pay_employee"> Pay to Employee </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?salary_report"> Salary Report </a>
                    </li><!-- li finish -->

                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="index.php?logs"><!-- a href begin -->
                    <i class="fa fa-cog fa-spin fa-fw"></i> Activity Logs
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->
<?php } ?>