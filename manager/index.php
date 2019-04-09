<?php
include_once "../db.php";
session_start();
//if (isset($_SESSION['user_id'])){
  //  $user_id = $_SESSION['user_id'];
  //  $userQuery = "SELECT * FROM user_login_details WHERE id = '$user_id'";
   // $result = mysqli_query($connection, $userQuery);
   // $user = mysqli_fetch_assoc($result);
 //   $get_user_name = $user['user_username'];
//}else{
   // header('Location:../login.php');


//}

$get_name = $_COOKIE["n"];
$get_id = $_COOKIE["i"];





include_once "header.php";
include_once "sidebar.php";



if (isset($_GET['dashboard'])){
    include_once "dashboard.php";
}
elseif (isset($_GET['sales'])) {
  include_once 'make_sales.php';
}
elseif (isset($_GET['expire_notice'])) {
  include_once 'expire_notice.php';
}
elseif (isset($_GET['re_print_r'])) {
  include_once 're_print_receipt.php';
}
elseif (isset($_GET['re_print_i'])) {
  include_once 're_print_invoice.php';
}
elseif (isset($_GET['view_products'])) {
  include_once 'view_all_products.php';
}
elseif (isset($_GET['view_categories'])) {
  include_once 'view_all_categories.php';
}
elseif (isset($_GET['view_suppliers'])) {
  include_once 'view_all_suppliers.php';
}
elseif(isset($_GET['pay_debt'])){
  include_once 'pay_debt.php';
}
elseif(isset($_GET['daily_sales'])){
  include_once 'daily_sales.php';
}
elseif (isset($_GET['order_products'])) {
  include_once 'order_products.php';
}
elseif (isset($_GET['add_supplier'])) {
  include_once 'add_supplier.php';
}
elseif (isset($_GET['manage_supplier'])) {
  include_once 'manage_supplier.php';
}
elseif (isset($_GET['add_credit_customer'])){
    include_once "add_credit_customer.php";
}
elseif (isset($_GET['add_user'])){
    include_once "add_user.php";
}
elseif (isset($_GET['add_product'])){
    include_once "add_product.php";
}
elseif (isset($_GET['add_category'])){
    include_once "add_category.php";
}
elseif (isset($_GET['manage_category'])){
    include_once "manage_category.php";
}
elseif (isset($_GET['manage_product'])){
    include_once "manage_product.php";
}
elseif (isset($_GET['manage_user'])){
    include_once "manage_user.php";
}
elseif (isset($_GET['transfer_items'])){
    include_once "transfer_product.php";
}
elseif (isset($_GET['product_requests'])){
    include_once "product_requests.php";
}
elseif (isset($_GET['transfer_report'])){
    include_once "transfer_report.php";
}
elseif (isset($_GET['track_items'])){
    include_once "track_items.php";
}
elseif (isset($_GET['mke_ord'])){
    include_once "make_order.php";
}
elseif (isset($_GET['all_products'])){
    include_once "all_products.php";
}
elseif (isset($_GET['return_items'])){
    include_once "return_items.php";
}
elseif (isset($_GET['return_report'])){
    include_once "returns_report.php";
}

else{
    include_once "dashboard.php";
}

include_once "footer.php";