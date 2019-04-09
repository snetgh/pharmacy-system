<div id="global">          
<div class="container-fluid">
 <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Products With Less Than Three Months To Expire</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                       
                                        <th>Item Name</th>
                                        <th>Category</th>
                                        <th>Unit Price</th>
                                        <th>Items Available</th>
                                        <th>Expiry Date </th>
                                        <th>Days Remaining</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                    $get_all_products = mysqli_query($connection,"SELECT * FROM stock_product_table JOIN product_category on stock_product_table.stock_product_category = product_category.product_category_id");

                    while ($my_products = mysqli_fetch_array($get_all_products)) {
                      $get_product_name = $my_products["stock_product_name"];
                      $get_expiry_date = $my_products["stock_product_expiry_date"];

                      $get_current_date = date("d-M-Y");
                      $new_expiry_date =  date("d-M-Y",strtotime("-3 months", strtotime($get_expiry_date) ));

                      $remaining_days = ((strtotime($new_expiry_date) - strtotime($get_current_date))/86400); 
                      
                      ?>

                      <tr>
                      <td><?php echo $get_product_name;   ?></td>
                      <td><?php echo $my_products['product_category_name'];   ?></td>
                      <td><?php echo $my_products['stock_product_unit_price'];   ?></td>
                      <td><?php echo $my_products['stock_product_items_avail'];   ?></td>
                      <td><?php echo date('d-M-Y',strtotime($my_products['stock_product_expiry_date'])) ;   ?></td>
                      <td><?php 
                      if($remaining_days <= 0){ 
                          echo "<span class='label label-danger'>Less Than Three Months</span>";}
                          else
                          {echo "<span class='label label-success'>".$remaining_days."</span>";}   ?></td>



                    <?php } ?>

                 
                                   
                                </tbody>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                  