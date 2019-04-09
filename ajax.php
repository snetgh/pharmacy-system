<?php
include_once 'db.php';
session_start();


/*    Start Of Code      */

if(isset($_POST['get_amount_due'])){

    $get_product_id = $_POST["product_selected"];
    $get_supplier_id = $_POST["supplier_id"];

    $run_query = mysqli_query($connection,"SELECT order_table.`order_amount_due`,order_table.`order_amount_payed` FROM `order_table` WHERE `order_supplier_name` = '$get_supplier_id' AND `order_product_name` = '$get_product_id'");
    if($run_query){ 

        $each_detail = mysqli_fetch_array($run_query);

        $response["amount_due"] = $each_detail["order_amount_due"];
        $response["amount_payed"] = $each_detail["order_amount_payed"];
       
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['make_payment'])){

    $get_product_id = $_POST["get_product_selected"];
    $get_supplier_id = $_POST["get_supplier"];
    $get_amount_due_to_pay = $_POST["get_amount_due_to_pay"];
    $get_amount_payed = $_POST["get_amount_payed"];
    $get_hidden_payed = $_POST["hidden_payed"];

    $new_amount_due = $get_amount_due_to_pay - $get_amount_payed;
    $new_amount_payed = $get_hidden_payed + $get_amount_payed;

    $run_query = mysqli_query($connection,"UPDATE `order_table` SET `order_amount_payed` = '$new_amount_payed', `order_amount_due` = '$new_amount_due' WHERE `order_table`.`order_supplier_name` = '$get_supplier_id' AND `order_product_name` = '$get_product_id'");

    if($run_query){  
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}






if(isset($_POST['make_order'])){

    $get_supplier_name = $_POST["get_supplier"];
    $get_product_name = $_POST["get_product_selected"];
    $get_unit_cost = $_POST["get_unit_cost"];
    $get_total_cost = $_POST["get_total_cost"];
    $get_product_description = $_POST["get_product_description"];
    $get_amount_payed = $_POST["get_amount_payed"];
    $get_quantity_buying = $_POST["get_quantity_buying"];

    $amount_remain = $get_total_cost - $get_amount_payed;

    $run_if_exists_query = mysqli_query($connection,"SELECT * FROM `order_table` WHERE `order_product_name` = '$get_product_name' AND `order_supplier_name` = '$get_supplier_name'");
    if(mysqli_num_rows($run_if_exists_query) >= 1){

        $fetch_items = mysqli_fetch_array($run_if_exists_query);

        $my_quantity = $fetch_items["order_quantity_buying"];
        $my_total_cost = $fetch_items["order_total_cost"];
        $my_amount_payed = $fetch_items["order_amount_payed"];
        $my_amount_due = $fetch_items["order_amount_due"];

        $my_new_quantity = $my_quantity + $get_quantity_buying;
        $my_new_total =  $get_total_cost + $my_total_cost;
        $my_new_amount_payed = $get_amount_payed + $my_amount_payed;
        $my_new_amount_due = $amount_remain + $my_amount_due;


        $run_query = mysqli_query($connection,"UPDATE `order_table` SET 
            `order_unit_cost` = '$get_unit_cost', 
            `order_quantity_buying` = '$my_new_quantity',
             `order_item_description` = '$get_product_description',
              `order_total_cost` = '$my_new_total',
               `order_amount_payed` = '$my_new_amount_payed', 
               `order_amount_due` = '$my_new_amount_due' WHERE 
               `order_table`.`order_product_name` = '$get_product_name' AND `order_table`.`order_supplier_name` = '$get_supplier_name'");

    }else{

         $run_query = mysqli_query($connection,"INSERT INTO `order_table` (`order_table_id`, `order_supplier_name`, `order_product_name`, `order_unit_cost`, `order_quantity_buying`, `order_item_description`, `order_total_cost`, `order_amount_payed`, `order_amount_due`, `order_timestamp`) VALUES (NULL, '$get_supplier_name', '$get_product_name', '$get_unit_cost', '$get_quantity_buying', '$get_product_description', '$get_total_cost', '$get_amount_payed', '$amount_remain', CURRENT_TIMESTAMP)");
    }

   
    if($run_query){ 
        $run_query_2 = mysqli_query($connection,"SELECT stock_product_table.stock_product_items_avail from stock_product_table where stock_product_id = '$get_product_name'");
        $get_detail = mysqli_fetch_array($run_query_2);
        $get_item_remain = $get_detail["stock_product_items_avail"];

        $new_remain = $get_item_remain+$get_quantity_buying;

        $run_query_3 = mysqli_query($connection,"UPDATE `stock_product_table` SET `stock_product_items_avail` = '$new_remain' WHERE `stock_product_table`.`stock_product_id` = '$get_product_name'");

        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['find_product_cost'])){

    $get_product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM `stock_product_table` WHERE stock_product_id = '$get_product_id'");
    if($run_query){ 
        $each_detail = mysqli_fetch_array($run_query);

        $response["unit_price"] = $each_detail["stock_product_unit_price"];
        $response["items_available"] = $each_detail["stock_product_items_avail"];
       
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['add_supplier'])){

    $supplier_name = $_POST["supplier_name"];
    $contact_name = $_POST["contact_name"];
    $contact_tel = $_POST["contact_tel"];
    $contact_address = $_POST["contact_address"];
    $contact_email = $_POST["contact_email"];
    $contact_website = $_POST["contact_website"];

    $selected_products = json_decode($_POST["selected_products"]);

    $run_query_1 = mysqli_query($connection,"INSERT INTO `tblsuppliers` (`supplierid`, `orgname`, `contact_person`, `tel`, `email`, `address`, `website`, `date_created`) VALUES (NULL, '$supplier_name', '$contact_name', '$contact_tel', '$contact_email', '$contact_address', '$contact_website', CURRENT_TIMESTAMP)");
    if($run_query_1){
        $run_query_2 = mysqli_query($connection,"SELECT * FROM `tblsuppliers` WHERE `orgname` LIKE '%$supplier_name%' LIMIT 1");
        $get_details = mysqli_fetch_array($run_query_2);
        $get_supplier_id  = $get_details['supplierid'];

        foreach ($selected_products as $products) {
       $run_query_3 = mysqli_query($connection,"INSERT INTO `suppliers_table` (`supplier_id`, `supplier_name`, `supplier_product`, `supplier_timestamp`) VALUES (NULL, '$get_supplier_id', '$products', CURRENT_TIMESTAMP)");
    }
    }

 if($run_query_3){ 
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
 echo json_encode($response);
}


if(isset($_POST['edit_supplier'])){

    $supplier_name_id = $_POST["supplier_name_id"];

    $run_query = mysqli_query($connection,"SELECT tblsuppliers.orgname,suppliers_table.supplier_name,stock_product_table.stock_product_name,stock_product_table.stock_product_id FROM suppliers_table JOIN stock_product_table ON suppliers_table.supplier_product = stock_product_table.stock_product_id JOIN tblsuppliers ON suppliers_table.supplier_name = tblsuppliers.supplierid WHERE suppliers_table.supplier_name = '$supplier_name_id'");

    $products_array = array();
    while ($get_details = mysqli_fetch_array($run_query)) {
        $get_array = array_push($products_array, $get_details['stock_product_id']);
    };

    $run_query_2 = mysqli_query($connection,"SELECT * FROM tblsuppliers WHERE `supplierid` = '$supplier_name_id' LIMIT 1");
    $get_query_2_details = mysqli_fetch_array($run_query_2);

    $response["orgname"] = $get_query_2_details["orgname"];
    $response["name"] = $get_query_2_details["contact_person"];
    $response["tel"] = $get_query_2_details["tel"];
    $response["email"] = $get_query_2_details["email"];
    $response["address"] = $get_query_2_details["address"];
    $response["website"] = $get_query_2_details["website"];


    $response["send_products"] = $products_array;
    $response["done"] = true;
  
 echo json_encode($response);
}


if(isset($_POST['update_supplier'])){

    $supplier_name = $_POST["supplier_name"];
    $contact_name = $_POST["contact_name"];
    $contact_tel = $_POST["contact_tel"];
    $contact_address = $_POST["contact_address"];
    $contact_email = $_POST["contact_email"];
    $contact_website = $_POST["contact_website"];
    $supplier_id = $_POST["supplier_id"];

    $selected_products = json_decode($_POST["corrected_products"]);

    $run_get_products_query = mysqli_query($connection,"SELECT `supplier_product` FROM `suppliers_table` WHERE `supplier_name` = '$supplier_id'");
    $products_id_array = array();
    while ($get_products_id = mysqli_fetch_array($run_get_products_query)) {
        $my_array = array_push($products_id_array,$get_products_id['supplier_product']);
    }

    $response["selected"] = count($selected_products);
    $response['products_table'] = count($products_id_array);

    if(count($selected_products) < count($products_id_array)){
        $response["less_than"] = "true";

        foreach ($products_id_array as $products_id) {
            if(in_array($products_id, $selected_products)){
                $response["in_array"] = "true";
            }else{
                $response["out_array"] = "true";
                $run_remove_query = mysqli_query($connection,"DELETE FROM `suppliers_table` WHERE `suppliers_table`.`supplier_name` = '$supplier_id' AND `supplier_product` = '$products_id'");
            }
        }

    }elseif(count($selected_products) == count($products_id_array)){

        foreach ($selected_products as $products) {
            if(in_array($products, $products_id_array)){
            }else{
                if($remove_excess = array_diff($products_id_array, $selected_products)){
                    foreach ($remove_excess as $excess_item_id) {
                         $run_excess_query = mysqli_query($connection,"DELETE FROM `suppliers_table` WHERE `suppliers_table`.`supplier_name` = '$supplier_id' AND `supplier_product` = '$excess_item_id'");
                        
                    }
                }
                
                $run_add_query = mysqli_query($connection,"INSERT INTO `suppliers_table` (`supplier_id`, `supplier_name`, `supplier_product`, `supplier_timestamp`) VALUES (NULL, '$supplier_id', '$products', CURRENT_TIMESTAMP)");
            }
        }

    }
    else{

        foreach ($selected_products as $products) {
            if(in_array($products, $products_id_array)){
            }else{
                $run_add_query = mysqli_query($connection,"INSERT INTO `suppliers_table` (`supplier_id`, `supplier_name`, `supplier_product`, `supplier_timestamp`) VALUES (NULL, '$supplier_id', '$products', CURRENT_TIMESTAMP)");
            }
        }


    }
    
        

    $run_update_query = mysqli_query($connection,"UPDATE `tblsuppliers` SET `orgname` = '$supplier_name', `contact_person` = '$contact_name', `tel` = '$contact_tel', `email` = '$contact_email', `address` = '$contact_address', `website` = '$contact_website' WHERE `tblsuppliers`.`supplierid` = '$supplier_id'");
    
 if($run_update_query){ 
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
 echo json_encode($response);
}







if(isset($_POST['add_transaction'])){

    $user_name = $_COOKIE['n'];
    $item_desc = $_POST["item_description"];
    $button_id = $_POST["button_id"];
    $item_quantity = $_POST["item_quantity"];
    $item_price = $_POST["item_price"];
    $total_amount = $_POST["total_amount"];
    $selected_id = $_POST["selected_id"];
    $discount_given = $_POST["discount_given"];
    $amount_paid    = $_POST["amount_paid"];
    $inv_id = $_POST["inv_id"];
    $custo_name = $_POST["custo_name"];

    $get_items_query = mysqli_query($connection,"SELECT * FROM `stock_product_table` WHERE `stock_product_id` = '$selected_id' LIMIT 1");
    $get_number = mysqli_fetch_array($get_items_query);
    if($get_number['stock_product_items_avail'] < $item_quantity){

        $response['data'] = "Item Less Than Specified Amount";
        $response['done'] = false;

    }else{

        $new_total =  $get_number['stock_product_items_avail']-$item_quantity;
        $update_query = mysqli_query($connection,"UPDATE `stock_product_table` SET `stock_product_items_avail` = '$new_total' WHERE `stock_product_table`.`stock_product_id` = '$selected_id'");
    
        if($discount_given == ""){
            $discount_given = "NULL";
        }
    
        $run_query = mysqli_query($connection,"INSERT INTO `sales_table` 
        (`sales_id`,`button_id`, `invoice_id`, `customer_name`, `item_description`,
         `item_quantity`, `item_price`, `total_amount`, `item_id`, 
         `discount_given`, `amount_payed`,`sales_person`, `timestamp`) 
         VALUES (NULL,'$button_id','$inv_id', '$custo_name', '$item_desc', 
        '$item_quantity', '$item_price', '$total_amount', '$selected_id', $discount_given, '$amount_paid','$user_name', CURRENT_TIMESTAMP)");
    
        if($run_query){
            $response['data'] = "success";
            $response['done'] = true;
        }else{
            $response['data'] = "failure";
            $response['done'] = false; 
        }

    }
   

    echo json_encode($response);

}



if(isset($_POST['del_transaction'])){

   $trans_id = $_POST["transaction_id"];

    $get_query = mysqli_query($connection,"SELECT * FROM `sales_table` WHERE `invoice_id` = '$trans_id'");
    while($get_details = mysqli_fetch_array($get_query)){
        
        $get_item_id = $get_details['item_id'];
        $get_item_quantity = $get_details['item_quantity'];
        $get_sales_id = $get_details['sales_id'];

        $get_query_2 = mysqli_query($connection,"SELECT * FROM `stock_product_table` WHERE `stock_product_id` = '$get_item_id' LIMIT 1");
        $get_number = mysqli_fetch_array($get_query_2);
        $new_total =  $get_item_quantity+ $get_number['stock_product_items_avail'];
        $update_query = mysqli_query($connection,"UPDATE `stock_product_table` SET `stock_product_items_avail` = '$new_total' WHERE `stock_product_table`.`stock_product_id` = '$get_item_id'");
          
        $run_query = mysqli_query($connection,"DELETE FROM `sales_table` WHERE `sales_table`.`invoice_id` = '$trans_id' ");
    
    }


    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "failure";
        $response['done'] = false; 
    }

    echo json_encode($response);

}


if(isset($_POST['del_transaction_item'])){

    $trans_id = $_POST["transaction_id"];
    $item_id_button = $_POST["item_id"];
 
    $get_query = mysqli_query($connection,"SELECT * FROM `sales_table` WHERE `invoice_id` = '$trans_id' AND `button_id`= '$item_id_button' ");
     $get_details = mysqli_fetch_array($get_query);
        
        $get_item_id = $get_details['item_id'];
        $get_item_quantity = $get_details['item_quantity'];
        $get_sales_id = $get_details['sales_id'];

        $get_query_2 = mysqli_query($connection,"SELECT * FROM `stock_product_table` WHERE `stock_product_id` = '$get_item_id' LIMIT 1");
        $get_number = mysqli_fetch_array($get_query_2);
        $new_total =  $get_item_quantity+ $get_number['stock_product_items_avail'];
        $update_query = mysqli_query($connection,"UPDATE `stock_product_table` SET `stock_product_items_avail` = '$new_total' WHERE `stock_product_table`.`stock_product_id` = '$get_item_id'");

    $run_query = mysqli_query($connection,"DELETE FROM `sales_table` WHERE `sales_table`.`invoice_id` = '$trans_id' AND `button_id`= '$item_id_button' ");

     if($run_query){
         $response['data'] = "success";
         $response['done'] = true;
     }else{
         $response['data'] = "failure";
         $response['done'] = false; 
     }
 
     echo json_encode($response);
 
 }





if(isset($_POST['edit_product'])){
    
    $product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM `stock_product_table` JOIN product_category ON stock_product_table.`stock_product_category` = product_category.`product_category_id` WHERE stock_product_id = $product_id ");
    $get_product_detail = mysqli_fetch_array($run_query);

    $response['product_name'] = $get_product_detail['stock_product_name'];
    $response['product_category'] = $get_product_detail['product_category_name'];
    $response['product_category_id'] = $get_product_detail['stock_product_category'];
    $response['product_unit_price'] = $get_product_detail['stock_product_unit_price'];
    $response['product_item_avail'] = $get_product_detail['stock_product_items_avail'];
    $response['product_expiry'] = $get_product_detail['stock_product_expiry_date'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['update_product'])){

    $get_item_name = $_POST["item_name"];
    $get_item_category = $_POST["item_category"];
    $get_item_unit_price = $_POST["item_unit_price"];
    $get_item_quantity = $_POST["item_quantity_avail"];
    $get_item_expiry = $_POST["item_expiry"];

    $get_product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"UPDATE `stock_product_table` SET 
    `stock_product_name` = '$get_item_name', 
    `stock_product_category` = '$get_item_category', 
    `stock_product_unit_price` = '$get_item_unit_price', 
    `stock_product_items_avail` = '$get_item_quantity', 
    `stock_product_expiry_date` = '$get_item_expiry' WHERE 
    stock_product_table.`stock_product_id` = $get_product_id");

    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['delete_product'])){
    
    $product_id = $_POST["product_id"];

    $run_query = mysqli_query($connection,"DELETE FROM `stock_product_table` WHERE `stock_product_table`.`stock_product_id` = '$product_id'");
   
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}






if(isset($_POST['edit_category_name'])){

    $category_id = $_POST['category_id'];

    $run_query = mysqli_query($connection,"SELECT * FROM product_category WHERE `product_category_id` = '$category_id' LIMIT 1 ");
    $get_category_detail = mysqli_fetch_array($run_query);
    $response['category_name'] = $get_category_detail['product_category_name'];
    
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['delete_category'])){
    
    $category_id = $_POST["category_id"];

    $response['id_sent'] = $category_id;

    $run_query = mysqli_query($connection,"DELETE FROM `product_category` WHERE `product_category`.`product_category_id` = '$category_id' ");
   
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['update_category'])){

    $get_category_name= $_POST["category_name"];
    $get_category_id = $_POST["category_id"];

    $run_query = mysqli_query($connection,"UPDATE `product_category` SET `product_category_name` = '$get_category_name' WHERE `product_category`.`product_category_id` = '$get_category_id'");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['add_new_category'])){

    $get_category_name= $_POST["category_name"];

    $run_query = mysqli_query($connection,"INSERT INTO `product_category` (`product_category_id`, `product_category_name`, `product_category_timestamp`) VALUES (NULL, '$get_category_name', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['add_new_product'])){

    $get_item_name = $_POST["item_name"];
    $get_item_category = $_POST["item_category"];
    $get_item_unit_price = $_POST["item_unit_price"];
    $get_item_quantity = $_POST["item_quantity_avail"];
    $get_item_expiry = $_POST["item_expiry"];

    $run_query = mysqli_query($connection,"INSERT INTO `stock_product_table` (`stock_product_id`, 
    `stock_product_name`, `stock_product_category`,
     `stock_product_unit_price`, `stock_product_items_avail`, 
     `stock_product_expiry_date`, `stock_product_timestamp`) 
     VALUES (NULL, '$get_item_name', '$get_item_category', '$get_item_unit_price', '$get_item_quantity', '$get_item_expiry', CURRENT_TIMESTAMP)");
    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}



if(isset($_POST['transfer_items'])){
    
    $item_name = $_POST["item_name"];
    $item_quantity = $_POST["quantity_sent"];
    $item_avail = $_POST["quantity_avail"];
    $item_receiver = $_POST["receivers_name"];

    $new_value = $item_avail - $item_quantity;

    if($item_quantity > $item_avail){

        $response['data'] = "Please Enter Number Below Quantity Available";
        $response['done'] = false;
    }else{

    $run_query = mysqli_query($connection,"INSERT INTO `receiver_name` (`receiver_id`, `receiver_name`, `receiver_timestamp`) VALUES (NULL, '$item_receiver', CURRENT_TIMESTAMP)");

    $get_user_id = mysqli_query($connection,"SELECT * FROM `receiver_name` WHERE `receiver_name` LIKE '%$item_receiver%' LIMIT 1 ");
    $get_user = mysqli_fetch_array($get_user_id);
    $user_id = $get_user['receiver_id'];


    $run_query_2 = mysqli_query($connection,"INSERT INTO `request_table` (`request_id`, `product_id`, `quantity_given`, `receiver_id`, `request_table_current_time`) VALUES (NULL, '$item_name', '$item_quantity', '$user_id', CURRENT_TIMESTAMP)");

    $run_query_3 = mysqli_query($connection,"UPDATE `product_names` SET 
        `product_remain` = '$new_value' 
        WHERE 
        `product_names`.`product_id` = '$item_name'");

    $save_report = mysqli_query($connection,"INSERT INTO `transfers_table` (`transfer_id`, `product_id`, `receiver_id`, `quantity_given`, `quantity_available`, `transfer_timestamp`) VALUES (NULL, '$item_name', '$user_id', '$item_quantity', '$new_value', CURRENT_TIMESTAMP)");
    
    if($run_query_3){
        $response['data'] = "success";
        $response['done'] = true;

    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }

    }
   
    echo json_encode($response);
}


if(isset($_POST['get_person_detail'])){

    $person_id = $_POST["get_person_id"];
    $item_id = $_POST["item_id"];

    $run_query = mysqli_query($connection,"SELECT * FROM `request_table` WHERE `receiver_id` = '$person_id' AND `product_id` = '$item_id' LIMIT 1");

    $get_details = mysqli_fetch_array($run_query);

    $response['get_quantity_given'] = $get_details['quantity_given'];

    if($run_query){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }
      
    echo json_encode($response);
}


if(isset($_POST['save_return'])){

     $get_person_id =  $_POST["person_id"];
     $get_item_id = $_POST["item_id"];
     $get_quantity_returned = $_POST["quantity_returned"];
     $get_quantity_due = $_POST["quantity_due"];

     if($get_quantity_returned > $get_quantity_due){
        $response['data'] = "Returned Items Cannot Be More Than Quantity Taken ";
        $response['done'] = false;
     }else{

        $run_query_1 = mysqli_query($connection,"SELECT `product_remain` FROM `product_names` where `product_id` = '$get_item_id' LIMIT 1");
        $get_remain = mysqli_fetch_array($run_query_1);
        $get_remain_number = $get_remain['product_remain'];

        $new_remain_value = $get_quantity_returned + $get_remain_number;

    if($get_quantity_returned == $get_quantity_due){

        $run_query_2 = mysqli_query($connection,"UPDATE `product_names` SET 
            `product_remain` = '$new_remain_value' 
             WHERE
             `product_names`.`product_id` = '$get_item_id'");

        $run_query_3 = mysqli_query($connection,"DELETE FROM `request_table` WHERE `request_table`.`product_id` = '$get_item_id' AND `receiver_id` = '$get_person_id'");
    }else{

        $run_query_2 = mysqli_query($connection,"UPDATE `product_names` SET 
            `product_remain` = '$new_remain_value' 
             WHERE
             `product_names`.`product_id` = '$get_item_id'");
    }

   $save_report = mysqli_query($connection,"INSERT INTO `returns_table` (`transfer_id`, `product_id`, `receiver_id`, `quantity_given`, `quantity_return`, `quantity_available`, `return_timestamp`) VALUES (NULL, '$get_item_id', '$get_person_id', '$get_quantity_due', '$get_quantity_returned', '$new_remain_value', CURRENT_TIMESTAMP)");

    if($run_query_2){
        $response['data'] = "success";
        $response['done'] = true;
    }else{
        $response['data'] = "false";
        $response['done'] = false;
    }

}
      
    echo json_encode($response);
}




/*    End Of Code      */

