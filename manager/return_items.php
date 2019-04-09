
<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Return Item(s)</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_return_request_product" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Item Name</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" id="select_request_item" name="select_request_item">
                                            <option value="" selected="selected" disabled="disabled">Select Item To Return</option>

                                                <?php  $get_products_query = mysqli_query($connection,"SELECT * FROM `product_names`");
                                                    while ($product_items = mysqli_fetch_array($get_products_query)) {  ?>

                                                <option value="<?php  echo $product_items['product_id']  ?>"><?php   echo $product_items['product_name']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                
                                    

                            
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary" name="btn_generate_list">Generate List</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php

                if(isset($_POST['btn_generate_list'])){ 

                    $get_item_selected = $_POST["select_request_item"];

                    $run_query_1 = mysqli_query($connection,"SELECT * FROM request_table JOIN receiver_name ON request_table.receiver_id = receiver_name.receiver_id join product_names on request_table.product_id = product_names.product_id WHERE request_table.product_id = '$get_item_selected'");

                   

                 ?>

                 <div class="row cm-fix-height">
                    <div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_save_return_product" method="post">

                                    <input type="hidden" name="" id="hidden_item_id" value="<?php  echo $get_item_selected; ?>">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Person</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" id="selected_person_name" name="selected_person_name">
                                            <option value="" selected="selected" disabled="disabled">Select Person Name</option>

                                                <?php
                                                    while ($person_name = mysqli_fetch_array($run_query_1)) {  ?>

                                                <option value="<?php  echo $person_name['receiver_id']  ?>"><?php   echo $person_name['receiver_name']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Selected</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Quantity To Transfer" class="form-control" id="txt_item_selected" placeholder="Transfer Quantity" required="required" disabled="disabled" name="txt_item_selected" value="<?php 
                                            $run_query_2 = mysqli_query($connection,"SELECT * FROM request_table JOIN product_names on request_table.product_id = product_names.product_id WHERE request_table.product_id = '$get_item_selected'");

                                             $get_item_name = mysqli_fetch_array($run_query_2);
                                             $item_name = $get_item_name["product_name"];
                                            echo $item_name;  ?>">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Given</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Quantity To Transfer" class="form-control" id="txt_quantity_given" placeholder="Transfer Quantity" required="required" disabled="disabled" name="txt_quantity_given">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity Returning</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Quantity Returning" class="form-control" id="txt_quantity_return" placeholder="Quantity Returning" required="required" name="txt_quantity_return">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                
                                    

                            
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Save Return</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


              <?php  }else{} ?>
               
                
            </div>


