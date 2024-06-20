<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include_once('./../../furniture/database/src/database.php');
    $database = new database();

   $Oid=$_POST['order_id'];
   $one=$database->checkQuantityEqualsOne($Oid);

   if($one){
   $database->deleteOrder($Oid);
   header('Location: ../frontend/homepage_content/Orders.php'); 
   exit();
   }else{
    $database->reduceOrderItemQuantity($Oid);
    header('Location: ../frontend/homepage_content/Orders.php'); 
    exit();
   }
}
include_once('../../../furniture/database/src/database.php');
$database = new database();
$orders = $database->getAllOrdersByEmail($_COOKIE['Email']);
?>