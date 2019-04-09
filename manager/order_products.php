
<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Purchase Item(s)</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_return_request_product" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Supplier Name</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" id="select_request_item" name="select_request_item">
                                            <option value="" disabled="disabled" selected="selected">Select Supplier Name</option>

                                                <?php  $get_suppliers_query = mysqli_query($connection,"SELECT * FROM `tblsuppliers`");
                                                    while ($supplier_names = mysqli_fetch_array($get_suppliers_query)) {  ?>

                                                <option value="<?php  echo $supplier_names['supplierid']  ?>"><?php   echo $supplier_names['orgname']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                
                                    

                            
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary" name="btn_generate_list"><i class="fa fw fa-download"></i>&nbsp;Get Products</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php

                if(isset($_POST['btn_generate_list'])){ 

                    $get_selected_item = $_POST["select_request_item"];   

                 ?>

                 <div class="row cm-fix-height">
                    <div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_order_product" method="post">

                                    <input type="hidden" name="" id="hidden_supplier" value="<?php  echo $get_selected_item; ?>">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Product</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" id="selected_product_name" name="selected_product_name">
                                            <option value="" selected="selected" disabled="disabled">Select Product</option>

                                                <?php
                                                $get_products_query = mysqli_query($connection,"SELECT * FROM suppliers_table JOIN stock_product_table ON suppliers_table.supplier_product = stock_product_table.stock_product_id WHERE supplier_name = '$get_selected_item'");

                                                    while ($product_name = mysqli_fetch_array($get_products_query)) {  ?>

                                                <option value="<?php  echo $product_name['supplier_product']  ?>"><?php   echo $product_name['stock_product_name']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Supplier Selected</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Quantity To Transfer" class="form-control" id="txt_item_selected" placeholder="Transfer Quantity" required="required" disabled="disabled" name="txt_item_selected" value="<?php 
                                            $run_query_2 = mysqli_query($connection,"SELECT * FROM suppliers_table JOIN tblsuppliers ON suppliers_table.supplier_name = tblsuppliers.supplierid WHERE supplier_name = '$get_selected_item'");

                                             $get_supplier_name = mysqli_fetch_array($run_query_2);
                                             $supplier_name = $get_supplier_name["orgname"];
                                            echo $supplier_name;  ?>">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Unit Cost</label>
                                        <div class="col-sm-9">
                                            <input type="decimal" data-error="Enter Unit Cost" class="form-control" id="txt_unit_cost" placeholder="Unit Cost" required="required"  name="txt_unit_cost">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Buying</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Quantity Buying" class="form-control" id="txt_quantity_buying" placeholder="Quantity Buying" required="required" name="txt_quantity_buying">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" placeholder="Enter Item Description" id="txt_item_description"></textarea>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Total Cost &nbsp;(GH)</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Total Cost" class="form-control" id="txt_total_cost" placeholder="Total Cost" disabled="disabled" name="txt_total_cost">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Amount Payed</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Amount Paying" class="form-control" id="txt_amount_payed" placeholder="Amount Paying" required="required" name="txt_amount_payed">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                
                                    

                            
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Purchase Item</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


              <?php  }else{} ?>
               
                
            </div>


