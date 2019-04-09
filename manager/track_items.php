
<?php

if(isset($_GET["track_number"])){ 

$get_product_id = $_GET["track_number"];

 ?>

<div id="global">          
<div class="container-fluid">
 <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Track Products</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Person Name</th>
                                        <th>Quantity Given</th>
                                        <th>Date Given</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                                    $get_product_query = mysqli_query($connection,"SELECT * FROM `request_table` JOIN receiver_name  on request_table.receiver_id = receiver_name.receiver_id WHERE request_table.product_id = '$get_product_id'");
                                    while ($get_each_product = mysqli_fetch_array($get_product_query)) { $my_product_id = $get_each_product["product_id"] ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_product["request_id"]; ?></th>
                                            <td><?php echo $get_each_product["receiver_name"]; ?></td>
                                            <td><?php echo $get_each_product["quantity_given"]; ?></td>
                                            <td><?php echo date("Y-M-d",strtotime($get_each_product["receiver_timestamp"])); ?></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>


<?php }else{  ?>
    <div id="global">          
<div class="container-fluid">
 <div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Track Products</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Category</th>
                                        <th>Items Total</th>
                                        <th>Items Available</th>
                                        <th>Items Out<th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                   <?php  

                                    $get_product_query = mysqli_query($connection,"SELECT * FROM product_names join product_category on product_names.product_category = product_category.product_category_id");
                                    while ($get_each_product = mysqli_fetch_array($get_product_query)) { $my_product_id = $get_each_product["product_id"] ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $get_each_product["product_id"]; ?></th>
                                            <td><?php echo $get_each_product["product_name"]; ?></td>
                                            <td><?php echo $get_each_product["product_category_name"]; ?></td>
                                            <td><?php echo $get_each_product["product_total"]; ?></td>
                                            <td><?php echo $get_each_product["product_remain"]; ?></td>
                                            <td><a href="index.php?track_items&track_number=<?php echo $my_product_id; ?>" target="_blank" style="font-weight: bold"><?php
                                            $init_number = 0;
                                            $get_number_values = mysqli_query($connection,"SELECT * FROM `request_table` WHERE `product_id` = '$my_product_id'");

                                                while ($getting_values = mysqli_fetch_array($get_number_values)) {

                                                    $my_number = $getting_values['quantity_given'];
                                                    $init_number +=$my_number;

                                                }
                                                echo $init_number;


                                            ?></a></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>


<?php }

?>



                  
         


             

