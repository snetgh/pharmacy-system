  
 <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.php?dashboard" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                             <?php   if (isset($_GET["dashboard"])) {  ?>
                                        <li class="active"><a class="sf-dashboard" href="index.php?dashboard">Dashboard</a></li>
                                  <?php  }else{  ?>
                                  <li><a class="sf-dashboard" href="index.php?dashboard">Dashboard</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["expire_notice"])) {  ?>
                                        <li class="active"><a class="sf-heart" href="index.php?expire_notice">Product Expiration</a></li>
                                  <?php  }else{  ?>
                                  <li><a class="sf-heart" href="index.php?expire_notice">Product Expiration</a></li>
                                  <?php  }  ?>

                            <?php   if(isset($_GET["sales"]) || isset($_GET["re_print_r"]) || isset($_GET["re_print_i"]) || isset($_GET["daily_sales"])){  ?>
                             <li class="cm-submenu pre-open">
                                <a class="sf-money">Make Sales<span class="caret"></span></a>
                                <ul>
                                    <?php   if (isset($_GET["sales"])) {  ?>
                                        <li class="active"><a href="index.php?sales"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Sell Products</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?sales"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Sell Products</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["re_print_r"])) {  ?>
                                        <li class="active"><a href="index.php?re_print_r"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Receipt</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?re_print_r"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Receipt</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["re_print_i"])) {  ?>
                                        <li class="active"><a href="index.php?re_print_i"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Invoice</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?re_print_i"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Invoice</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["daily_sales"])) {  ?>
                                        <li class="active"><a href="index.php?daily_sales"><i class="fa fw fa-pie-chart"></i>&nbsp;&nbsp;Daily sales</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?daily_sales"><i class="fa fw fa-pie-chart"></i>&nbsp;&nbsp;Daily Sales</a></li>
                                  <?php  }  ?>

                                </ul>
                            </li>

                            <?php  }else{ ?>
                            <li class="cm-submenu">
                                <a class="sf-money">Make Sales<span class="caret"></span></a>
                                <ul>
                                    <?php   if (isset($_GET["sales"])) {  ?>
                                        <li class="active"><a href="index.php?sales"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Sell Products</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?sales"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Sell Products</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["re_print_r"])) {  ?>
                                        <li class="active"><a href="index.php?re_print_r"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Receipt</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?re_print_r"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Receipt</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["re_print_i"])) {  ?>
                                        <li class="active"><a href="index.php?re_print_i"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Invoice</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?re_print_i"><i class="fa fw fa-print"></i>&nbsp;&nbsp;Re-Print Invoice</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["daily_sales"])) {  ?>
                                        <li class="active"><a href="index.php?daily_sales"><i class="fa fw fa-pie-chart"></i>&nbsp;&nbsp;Daily sales</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?daily_sales"><i class="fa fw fa-pie-chart"></i>&nbsp;&nbsp;Daily Sales</a></li>
                                  <?php  }  ?>
                                    
                                </ul>
                            </li>
                           <?php  }    ?>

                            <?php   if(isset($_GET["add_category"]) || isset($_GET["manage_category"]) || isset($_GET["view_categories"])){  ?>
                             <li class="cm-submenu pre-open">
                                <a class="sf-brick">Categories<span class="caret"></span></a>
                                <ul>
                                  <?php   if (isset($_GET["view_categories"])) {  ?>
                                        <li class="active"><a href="index.php?view_categories"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Categories</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?view_categories"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Categories</a></li>
                                  <?php  }  ?>

                                    <?php   if (isset($_GET["add_category"])) {  ?>
                                        <li class="active"><a href="index.php?add_category"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Category</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?add_category"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Category</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["manage_category"])) {  ?>
                                        <li class="active"><a href="index.php?manage_category"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Category</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?manage_category"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Category</a></li>
                                  <?php  }  ?>
                                    
                                </ul>
                            </li>

                            <?php  }else{ ?>
                            <li class="cm-submenu">
                                <a class="sf-brick">Categories<span class="caret"></span></a>
                                <ul>

                                   <?php   if (isset($_GET["view_categories"])) {  ?>
                                        <li class="active"><a href="index.php?view_categories"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Categories</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?view_categories"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Categories</a></li>
                                  <?php  }  ?>

                                    <?php   if (isset($_GET["add_category"])) {  ?>
                                        <li class="active"><a href="index.php?add_category"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Category</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?add_category"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Category</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["manage_category"])) {  ?>
                                        <li class="active"><a href="index.php?manage_category"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Category</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?manage_category"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Category</a></li>
                                  <?php  }  ?>
                                    
                                </ul>
                            </li>
                           <?php  }    ?>

                             <?php   if(isset($_GET["add_product"]) || isset($_GET["manage_product"]) || isset($_GET["order_products"]) || isset($_GET["view_products"])){  ?>
                             <li class="cm-submenu pre-open">
                                <a class="sf-shop">Products<span class="caret"></span></a>
                                <ul>

                                  <?php   if (isset($_GET["view_products"])) {  ?>
                                        <li class="active"><a href="index.php?view_products"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Products</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?view_products"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Products</a></li>
                                  <?php  }  ?>

                                    <?php   if (isset($_GET["add_product"])) {  ?>
                                        <li class="active"><a href="index.php?add_product"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Product</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?add_product"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Product</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["manage_product"])) {  ?>
                                        <li class="active"><a href="index.php?manage_product"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Product</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?manage_product"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Product</a></li>
                                  <?php  }  ?>

                                  <?php   if (isset($_GET["order_products"])) {  ?>
                                        <li class="active"><a href="index.php?order_products"><i class="fa fw fa-truck"></i>&nbsp;&nbsp;Order Products</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?order_products"><i class="fa fw fa-truck"></i>&nbsp;&nbsp;Order Products</a></li>
                                  <?php  }  ?>

                                    
                                </ul>
                            </li>

                            <?php  }else{ ?>
                            <li class="cm-submenu">
                                <a class="sf-shop">Products<span class="caret"></span></a>
                                <ul>

                                  <?php   if (isset($_GET["view_products"])) {  ?>
                                        <li class="active"><a href="index.php?view_products"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Products</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?view_products"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Products</a></li>
                                  <?php  }  ?>

                                    <?php   if (isset($_GET["add_product"])) {  ?>
                                        <li class="active"><a href="index.php?add_product"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Product</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?add_product"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Product</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["manage_product"])) {  ?>
                                        <li class="active"><a href="index.php?manage_product"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Product</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?manage_product"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Product</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["order_products"])) {  ?>
                                        <li class="active"><a href="index.php?order_products"><i class="fa fw fa-truck"></i>&nbsp;&nbsp;Order Products</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?order_products"><i class="fa fw fa-truck"></i>&nbsp;&nbsp;Order Products</a></li>
                                  <?php  }  ?>
                                    
                                </ul>
                            </li>
                           <?php  }    ?>


                            <?php   if(isset($_GET["add_supplier"]) || isset($_GET["manage_supplier"]) || isset($_GET["view_suppliers"])){  ?>
                             <li class="cm-submenu pre-open">
                                <a class="sf-building">Suppliers<span class="caret"></span></a>
                                <ul>

                                  <?php   if (isset($_GET["view_suppliers"])) {  ?>
                                        <li class="active"><a href="index.php?view_suppliers"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Suppliers</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?view_suppliers"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Suppliers</a></li>
                                  <?php  }  ?>

                                    <?php   if (isset($_GET["add_supplier"])) {  ?>
                                        <li class="active"><a href="index.php?add_supplier"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Supplier</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?add_supplier"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Supplier</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["manage_supplier"])) {  ?>
                                        <li class="active"><a href="index.php?manage_supplier"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Supplier</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?manage_supplier"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Supplier</a></li>
                                  <?php  }  ?>

                                </ul>
                            </li>

                            <?php  }else{ ?>
                            <li class="cm-submenu">
                                <a class="sf-building">Suppliers<span class="caret"></span></a>
                                <ul>

                                   <?php   if (isset($_GET["view_suppliers"])) {  ?>
                                        <li class="active"><a href="index.php?view_suppliers"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Suppliers</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?view_suppliers"><i class="fa fw fa-eye"></i>&nbsp;&nbsp;View All Suppliers</a></li>
                                  <?php  }  ?>
                                  
                                    <?php   if (isset($_GET["add_supplier"])) {  ?>
                                        <li class="active"><a href="index.php?add_supplier"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Supplier</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?add_supplier"><i class="fa fw fa-plus-circle"></i>&nbsp;&nbsp;Add Supplier</a></li>
                                  <?php  }  ?>

                                   <?php   if (isset($_GET["manage_supplier"])) {  ?>
                                        <li class="active"><a href="index.php?manage_supplier"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Supplier</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?manage_supplier"><i class="fa fw fa-cogs"></i>&nbsp;&nbsp;Manage Supplier</a></li>
                                  <?php  }  ?>
                                    
                                </ul>
                            </li>
                           <?php  }    ?>

                            

                          

                            <?php   if(isset($_GET["pay_debt"])){  ?>
                             <li class="cm-submenu pre-open">
                                <a class="sf-calculator">Accounts<span class="caret"></span></a>
                                <ul>
                                    <?php   if (isset($_GET["pay_debt"])) {  ?>
                                        <li class="active"><a href="index.php?pay_debt"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Pay/View Debts</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?pay_debt"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Pay/View Debts</a></li>
                                  <?php  }  ?>

                                </ul>
                            </li>

                            <?php  }else{ ?>
                            <li class="cm-submenu">
                                <a class="sf-calculator">Accounts<span class="caret"></span></a>
                                <ul>
                                   <?php   if (isset($_GET["pay_debt"])) {  ?>
                                        <li class="active"><a href="index.php?pay_debt"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Pay/View Debts</a></li>
                                  <?php  }else{  ?>
                                  <li><a href="index.php?pay_debt"><i class="fa fw fa-money"></i>&nbsp;&nbsp;Pay/View Debts</a></li>
                                  <?php  }  ?>
                                    
                                </ul>
                            </li>
                           <?php  }    ?>
                           
                            <li><a href="../login.php" class="sf-lock">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

       <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                     
                    <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-notifications-white" data-toggle="dropdown"> <span class="label label-danger"><?php  

                    $get_all_products = mysqli_query($connection,"SELECT * FROM `stock_product_table`");

                    $my_count = 0;
                    $productNames = [];

                    while ($my_products = mysqli_fetch_array($get_all_products)) {
                      $get_product_name = $my_products["stock_product_name"];
                      $get_expiry_date = $my_products["stock_product_expiry_date"];

                      $get_current_date = date("d-M-Y");
                      $new_expiry_date =  date("d-M-Y",strtotime("-3 months", strtotime($get_expiry_date) ));

                      $remaining_days = ((strtotime($new_expiry_date) - strtotime($get_current_date))/86400);

                      if($remaining_days <= 0){
                        $my_count++;
                        array_push($productNames, $get_product_name);
                      }else{
                      }
                    }

                    echo $my_count;

                         ?></span> </button>
                    <div class="popover cm-popover bottom">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="list-group">
                                <?php

                                foreach ($productNames as $products) { ?>

                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-warning"></i> <?php echo $products;  ?>
                                    </h4>
                                    <p class="list-group-item-text">This product has less than three months to expire.</p>
                                </a>
                                  
                                <?php } ?>
                              
                            </div>
                            <div style="padding:10px"><a class="btn btn-success btn-block" href="index.php?expire_notice">Show me more...</a></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong><?php echo $_COOKIE['n']; ?></strong></a>
                        </li>
                        
                    </ul>
                </div>
            </nav>

        
        </header>

    <br><br> 







       