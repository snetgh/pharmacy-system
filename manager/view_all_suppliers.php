<div id="global">
    
                <div class="container-fluid">
                <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Suppliers</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Number</th>
                                        <th>Products</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody id="add_category_table">
                                   <?php  
                                    $get_supplier_query = mysqli_query($connection,"SELECT * FROM tblsuppliers");
                                    while ($get_each_supplier = mysqli_fetch_array($get_supplier_query)) {    $supplier_id = $get_each_supplier['supplierid'];        ?>
                                        <tr>
                                            <td><?php echo $get_each_supplier["supplierid"]; ?></td>  
                                            <td><?php echo $get_each_supplier["orgname"]; ?></td>
                                            <td><?php echo $get_each_supplier["contact_person"]; ?></td>
                                            <td><?php echo $get_each_supplier["tel"]; ?></td>
                                            <td>
                                            <?php $get_products_query = mysqli_query($connection,"SELECT stock_product_table.stock_product_name FROM `suppliers_table` JOIN stock_product_table ON suppliers_table.supplier_product = stock_product_table.stock_product_id WHERE suppliers_table.supplier_name = '$supplier_id'");

                                             while ($get_each_product = mysqli_fetch_array($get_products_query)) {  

                                                echo "<span class='label label-primary'>".$get_each_product["stock_product_name"]."</span>&nbsp;&nbsp;";
                                             }?>
                                             </td>
                                             <td><?php echo $get_each_supplier["email"]; ?></td>
                                        </tr>
                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>