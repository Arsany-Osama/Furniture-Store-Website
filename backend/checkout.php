<?php
// Retrieve product IDs and quantities from POST data
$productIds = $_POST['productId'] ?? [];
$quantities = $_POST['quantity'] ?? [];

// Example of processing the data
if (!empty($productIds) && !empty($quantities) && count($productIds) === count($quantities)) {

    include_once('../../furniture/database/src/database.php');

    // Process each product and quantity
    for ($i = 0; $i < count($productIds); $i++) {
        $productId = $productIds[$i];
        $quantity = $quantities[$i];
        $email = $_COOKIE['Email'];
        $database = new database();
        $user_id = $database->getUserIdByEmail($email);

        
        $exist = $database->checkOrderExists($user_id, $productId);
        if($exist){
            $database->updateOrderItemQuantity($user_id, $productId);
        }
        else{
            $database->addOrderItem($user_id, $productId, $quantity);
        }
    }

    // Send a success response
    echo "Checkout completed successfully";
} else {
    // Handle case where no data is received or mismatched data
    echo "Error: Invalid data received";
}
?>

