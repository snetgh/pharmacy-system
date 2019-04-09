
<div id="global">

<div class="container-fluid">
<div class="row cm-fix-height">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">List Of Categories</div>
                            <div class="panel-body">
                               <table class="table" id="my_selected_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody id="add_category_table">
                  
                                   <?php  

                                    $get_category_query = mysqli_query($connection,"SELECT * FROM product_category ");
                                    while ($get_each_category = mysqli_fetch_array($get_category_query)) { ?>
                                        
                                        <tr>
                                            
                                            <td><?php echo $get_each_category["product_category_id"]; ?></td>
                                            <td><?php echo $get_each_category["product_category_name"]; ?></td>
                                            <td><?php echo date("d-M-Y",strtotime($get_each_category["product_category_timestamp"])); ?></td>
                                        </tr>


                                  <?php  }  ?>
                                   
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>