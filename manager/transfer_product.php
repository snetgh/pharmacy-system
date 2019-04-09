
<div id="global">
            
                <div class="container-fluid">
                    <div class="row cm-fix-height">
                    <div class="col-lg-7 col-lg-offset-2 col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Transfer Item(s)</div>
                            <div class="panel-body">
                                <form class="form-horizontal" data-toggle="validator" id="form_request_product" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" id="select_request_item">
                                            <option value="" selected="selected" disabled="disabled">Select Item To Transfer</option>

                                                <?php  $get_products_query = mysqli_query($connection,"SELECT * FROM `product_names`");
                                                    while ($product_items = mysqli_fetch_array($get_products_query)) {  ?>

                                                <option value="<?php  echo $product_items['product_id']  ?>"><?php   echo $product_items['product_name']; ?></option>                
                                                 <?php   }
                                                    ?>
                                               
                                            </select>
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Items Available</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Items Available" class="form-control" id="txt_item_available" placeholder="Qunatity Available" required="required" disabled="disabled">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" data-error="Enter Quantity To Transfer" class="form-control" id="txt_quantity" placeholder="Transfer Quantity" required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Receivers Name (Position)</label>
                                        <div class="col-sm-9">
                                            <input type="text" data-error="Enter Receivers Name" class="form-control" id="txt_receivers_name" placeholder="Enter Receivers Name " required="required">
                                        </div>
                                        <div class="help-block with-errors" style="text-align: center"></div>
                                    </div>

                            
                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-10 text-center">
                                            <button type="submit" class="btn btn-primary">Transfer Item</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>


