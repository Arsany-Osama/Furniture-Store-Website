<?php
  // this file used just for testing the classes 
  // we will remove it after finshing the project
  include_once('./database.php');
  include_once('./admin.php');
  include_once('./user.php');
  include_once('./product.php');

  
   $obj = new database();
   //adding admin_type
   $admin_type1 = $obj->addAdmin_Types("666", "Junior", "Read");

   //adding admin
   $admin = new admin(
    "markgeforce4080@gmail.com",//email
     "asda",    // username
     "asdahgh", // password
     "asda",    // fname
     "asda",    // lname
     "asda",    // telephone
     666        // Type_ID
   );
   $admin1 = $obj->addPerson($admin);

   //adding user
   $user = new user(
    "markgeforce4080@gmail.com",//email
     "asdaa",   // username
     "asda",    // password
     "asda",    // fname
     "asda",    // lname
     "023423",  // telephone
   );
   $user1 = $obj->addPerson($user);

   //adding category
   $add_Product_Category = $obj->addProductCategory(333, "Tables", 1);
  
   //adding product in specific category
   $product = new product(
     333,    // cat_id
     "vika",    // name
     1200,    // price
     12,    // discount
     13,    //disc. percent
     "holly shit",    // discrip.
     "path" //image path
   );
   $add_product = $obj-> addProductInventory($product,70);

   //adding order (user order specific product)
   $user_id = $obj->getUserIdByUsername("asdaa");
   $product_id = $obj->getProductIdByName("vika");
   $order1 = $obj->addOrderItem($user_id, $product_id, 10);

    include_once('./mail.php');
    $mail = new mail();
   $admin_id = $obj->getAdminIdByEmail("markgeforce4080@gmail.com");
   $sendCode = $mail->sendCodeOnMail("markgeforce4080@gmail.com", "admin", $admin_id);
   echo $sendCode;
//markgeforce4080@gmail.com
  //To test more: 
  $modifyUser = $obj->updateModifiedAtUser($user_id);
  $adminaddress = $obj->setAddressToAdmin(1,"asdad" , "asdas" , "asdad");
  $useraddress = $obj->setAddressToUser(1,"asdad" , "asdas" , "asdad");
  
?>