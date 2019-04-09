

<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add Supplier </div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_add_supplier" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Organization Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Organization Name" class="form-control" id="txt_company_name" placeholder="Organization Name" required="required" name="txt_company_name">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Contact Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Contact Name" class="form-control" id="txt_contact_name" placeholder="Contact Name" name="txt_contact_name">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Contact Number" class="form-control" id="txt_contact_number" placeholder="Contact Number" name="txt_contact_number">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Contact Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Contact Email" class="form-control" id="txt_contact_email" placeholder="Contact Email" name="txt_contact_email">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" placeholder=" Company Address" data-error="Enter Address" id="txt_contact_address" name="txt_contact_address"></textarea>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Company Website" class="form-control" id="txt_contact_website" placeholder="Company Website Address" required="required" name="txt_contact_website">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Items Supplied</label>
                                        <div class="col-sm-9">
                                           <select class="form-control select2"  multiple="multiple" name="products_select" id="my_selected" data-placeholder="Select Products From This Supplier">
                                                <?php  $get_product_query = mysqli_query($connection,"SELECT * FROM `stock_product_table` JOIN `product_category` ON stock_product_table.`stock_product_category` = product_category.`product_category_id`");
                                                    while ($product_names = mysqli_fetch_array($get_product_query)) {  ?>

                                                <option value="<?php  echo $product_names['stock_product_id']  ?>"><?php   echo $product_names['stock_product_name']."&nbsp;-&nbsp;".$product_names["product_category_name"]; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                           </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                   
                                   
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary" name="btn_add_supplier"><i class="fa fw fa-plus-circle"></i>&nbsp;Add Supplier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Suppliers</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier Name</th>
                                        <th>Products Supplied</th>
                                    </tr>
                                </thead>
                                <tbody id="add_category_table">
                                   <?php  
                                    $get_supplier_query = mysqli_query($connection,"SELECT * FROM tblsuppliers");
                                    while ($get_each_supplier = mysqli_fetch_array($get_supplier_query)) {    $supplier_id = $get_each_supplier['supplierid'];        ?>
                                        <tr>
                                            <td><?php echo $get_each_supplier["supplierid"]; ?></td>  
                                            <td><?php echo $get_each_supplier["orgname"]; ?></td>
                                            <td>
                                            <?php $get_products_query = mysqli_query($connection,"SELECT stock_product_table.stock_product_name FROM `suppliers_table` JOIN stock_product_table ON suppliers_table.supplier_product = stock_product_table.stock_product_id WHERE suppliers_table.supplier_name = '$supplier_id'");

                                             while ($get_each_product = mysqli_fetch_array($get_products_query)) {  

                                                echo "<span class='label label-primary'>".$get_each_product["stock_product_name"]."</span>&nbsp;&nbsp;";
                                             }?>
                                             </td>
                        
                                        </tr>
                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




