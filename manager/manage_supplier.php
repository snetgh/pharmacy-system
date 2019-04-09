
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
                                        <th>Action</th>
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
                                             <td><button class="edit_suppliers btn btn-success btn-md" id="<?php  echo $get_each_supplier["supplierid"];?>" ><i class="fa fw fa-pencil"></i>&nbsp;Edit</button>&nbsp;<button class="delete_suppliers btn btn-danger btn-md" id="<?php  echo $get_each_supplier["supplierid"];    ?>"><i class="fa fw fa-trash"></i>&nbsp;Delete</button></td>
                                        </tr>
                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div id="edit_suppliers_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit Supplier
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_edit_suppliers" method="post">
                            <input type="hidden" id="hidden_text">
                                    
                            <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Supplier Name" class="form-control" id="txt_supplier_name" placeholder="Supplier Name" required="required">
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
                                        <label for="inputEmail3" class="col-sm-3 control-label">Products Supplied</label>
                                        <div>
                                            <select class="form-control select2"  multiple="multiple" name="products_select" id="my_selected" data-placeholder="Select Products From This Supplier" style="width: 72% !important;margin-left: 10px !important;">
                                                <?php  $get_product_query = mysqli_query($connection,"SELECT * FROM `stock_product_table` JOIN `product_category` ON stock_product_table.`stock_product_category` = product_category.`product_category_id`");
                                                    while ($product_names = mysqli_fetch_array($get_product_query)) {  ?>

                                                <option value="<?php  echo $product_names['stock_product_id']  ?>">
                                                    <?php   echo $product_names['stock_product_name']."&nbsp;-&nbsp;".$product_names["product_category_name"]; ?></option>

                                                        
                                                 <?php   }
                                                    ?>
                                           </select>   
                                        </div>
                                    </div>
                                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_dismiss">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </div>

         <div id="delete_products_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                Delete Product
                                <a class="anchorjs-link" href="#myModalLabel"><span class="anchorjs-icon"></span></a>
                            </h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" data-toggle="validator" id="form_delete_product" method="post">
                                    <input type="hidden" id="hidden_text_del">
                                    
                                    <div class="form-group">
                                        <h4>Are You Sure You Want To Delete This Product</h4>
                                    </div>             
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                            <input type="submit" class="btn btn-primary btn-lg" value="Yes">
                        </div>
                    </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>






