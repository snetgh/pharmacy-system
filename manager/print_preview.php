<?php

    if(!isset($_GET["pid"])){
        echo "<script>window.location.href='index.php?dashboard'</script>";
    }else{
        $print_type = $_GET["t"];
        $my_pid = $_GET["pid"];
    }

    include_once "../db.php";

    $get_query_1 = mysqli_query($connection,"SELECT * FROM `sales_table` WHERE `invoice_id` = '$my_pid' LIMIT 1");
    $get_details_1 = mysqli_fetch_array($get_query_1);



?>

<?php  echo "<script>window.print();</script>" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perez Frozen Foods</title>
</head>
<body>

<?php  if($print_type == "r"){     ?>
<table class="table"  id="live_table">
                                   <thead>
                                    <tr>
                                    <th colspan="4" style="text-align: center;">Perez Frozen Foods</th>
                                </tr>
                                    <tr> <th colspan="4" style="text-align: center;">Official Receipt</th></tr>
                                    <tr> <th colspan="4" style="text-align: center;">Tel: 0247732082</th></tr>
                                   </thead>
                                   <tbody id="live_table_body">
                                       <tr>
                                           <td>Date</td>
                                           <td>Invoice No.</td>
                                           <td>Time:</td>
                                           <td>Cus. Name:</td>
                                       </tr>
                                       <tr>
                                           <td><?php echo date("Y-M-d",strtotime($get_details_1['timestamp'] )) ?></td>
                                           <td id="product_invoice"><?php  echo $my_pid;  ?></td>
                                           <td><?php date("H:m",strtotime($get_details_1['timestamp'] ))  ?></td>
                                           <td id="customer_name"><?php  echo $get_details_1['customer_name'];  ?></td>
                                       </tr>
                                       <tr>
                                           <td>Desciption</td>
                                           <td>Quantity</td>
                                           <td>U. Price</td>
                                           <td>Amount</td>

                                           
                                       </tr>
                                       <?php

                                       $inital_amount = 0;
                                       $inital_amount_payed = 0;
                                       $inital_discount = 0;

                                        $get_query = mysqli_query($connection,"SELECT * FROM `sales_table` WHERE `invoice_id` = '$my_pid'");
                                        while($get_details = mysqli_fetch_array($get_query)){
                                            
                                            $get_amount = $get_details['total_amount'];
                                            $get_amount_payed = $get_details['amount_payed'];
                                            $get_discount = $get_details['discount_given'];

                                            $inital_amount += $get_amount;
                                            $inital_amount_payed += $get_amount_payed;
                                            $inital_discount += $get_discount;
                                            
                                            ?>
                                            
                                            <tr>
                                            <td><?php  echo $get_details['item_description']; ?></td>
                                            <td><?php  echo $get_details['item_quantity']; ?></td>
                                            <td><?php  echo $get_details['item_price']; ?></td>
                                            <td><?php  echo $get_details['total_amount']; ?></td>
                                            
                                            
                                            </tr>


                                      <?php   }
                                            
                                        ?>
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Total</strong></td>
                                           <td class="txt_total_holder"><strong>GH &nbsp;<?php echo $inital_amount; ?></strong></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Discount</strong></td>
                                           <td class="txt_discount_holder"><strong>GH &nbsp;<?php echo $inital_discount;?></strong></td>
                                       </tr>
                                       <tr>
                                           <td>&nbsp;</td>
                                           <td>&nbsp;</td>
                                           <td><strong>Amount Paid</strong></td>
                                           <td class="txt_amount_paid_holder"><strong>GH &nbsp;<?php echo $inital_amount_payed;?></strong></td>
                                       </tr>
                                       <tr>
                                           <td colspan="5" style="text-align: center;font-weight: bold">Goods Sold Are Not Returnable</td>
                                          
                                       </tr>
                                       <tr>
                                           <td colspan="5" style="text-align: center;font-weight: bold">**** &nbsp; Served By <strong> <?php echo $_COOKIE['n'];  ?>  </strong> &nbsp;   ****</td>
                                          
                                       </tr>
                                   </tfoot>
                               </table>

  <?php   }else{   ?>
<style type="text/css">
  .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>
<header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
            <?php

                                       $inital_amount = 0;
                                       $inital_amount_payed = 0;
                                       $inital_discount = 0;

                                        $get_query = mysqli_query($connection,"SELECT * FROM `sales_table` WHERE `invoice_id` = '$my_pid'");
                                        while($get_details = mysqli_fetch_array($get_query)){
                                            
                                            $get_amount = $get_details['total_amount'];
                                            $get_amount_payed = $get_details['amount_payed'];
                                            $get_discount = $get_details['discount_given'];

                                            $inital_amount += $get_amount;
                                            $inital_amount_payed += $get_amount_payed;
                                            $inital_discount += $get_discount;
                                            
                                            ?>
                                            
                                            <tr>
                                            <td class="desc" ><?php  echo $get_details['item_description']; ?></td>
                                            <td class="unit">&nbsp;GH&nbsp;<?php  echo $get_details['item_price']; ?></td>
                                            <td class="qty">&nbsp;GH&nbsp;<?php  echo $get_details['item_quantity']; ?></td>
                                            
                                            <td class="total">&nbsp;GH&nbsp;<?php  echo $get_details['total_amount']; ?></td>
                                            
                                            
                                            </tr>


                                      <?php   }
                                            
                                        ?>
          <tr>
            <td colspan="3">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="3">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="3" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>


 <?php }       ?>


<script src="../js/lib/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
    
</body>
</html>