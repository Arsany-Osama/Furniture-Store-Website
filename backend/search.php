<?php
    include_once('../../furniture/database/src/database.php');

    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];
    
        $database = new database();

    $products = $database->getProductsByName($productName);
       // Serialize the array
$serialized_products = serialize($products);

// Set the cookie with a name of 'filtered_products', the serialized products, and an expiration time (e.g., 1 day)
setcookie('filtered_products', $serialized_products, time() + 86400, "/"); // 86400 = 1 day
header('Location: ../frontend/homepage_content/product.php'); 
    }
    

?>