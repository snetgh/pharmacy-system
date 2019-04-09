
        <div id="global">
            
                <div class="container-fluid">

                <div class="row cm-fix-height">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Transfers Report</div>
                            <div class="panel-body">
                               <form class="form-horizontal form-material" method="post">
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="example-email" class="col-md-12">From</label>
                                    <div class="col-md-12">
                                       <input type="date" class="form-control form-control-line" name="txt_from" id="txt_from" placeholder="From" required="required">
                                        </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="example-email" class="col-md-12">To</label>
                                    <div class="col-md-12">
                                       <input type="date" class="form-control form-control-line" name="txt_to" id="txt_to" placeholder="To" required="required">
                                        </div>
                                </div>

                                
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit" name="btn_submit">Generate List</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>


                 <?php

                if(isset($_POST['btn_submit'])){
                    $get_from = $_POST['txt_from'];
                    $get_to = $_POST['txt_to']; 

                     ?>

                     <div class="row cm-fix-height">
                    <div class="col-lg-12  col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Transfers From: &nbsp; <?php echo date("Y-M-d",strtotime($get_from)); ?> &nbsp; To &nbsp;<?php echo date("Y-M-d",strtotime($get_to));  ?></div>
                            <div class="panel-body">
                               <div class="table-responsive">
                                
                                <table class="table" id="my_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Receiver</th>
                                            <th>Quantity Given</th>
                                            <th>Quantity Available</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $run_get_query = mysqli_query($connection,"SELECT * FROM transfers_table JOIN receiver_name ON transfers_table.receiver_id = receiver_name.receiver_id join product_names ON transfers_table.product_id = product_names.product_id WHERE transfers_table.transfer_timestamp BETWEEN '$get_from' AND '$get_to'");
                                        while ($each_transfer = mysqli_fetch_array($run_get_query)) { ?>
                                           <tr>
                                       
                                        <td><?php echo $each_transfer["transfer_id"]; ?></td> 
                                        <td><?php echo $each_transfer["product_name"]; ?></td> 
                                        <td><?php echo $each_transfer["receiver_name"]; ?></td>
                                        <td><?php echo $each_transfer["quantity_given"]; ?></td> 
                                        <td><?php echo $each_transfer["quantity_available"]; ?></td> 
                                        
                                           </tr>
                                       <?php }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <?php }

                ?>
</body>


</html>