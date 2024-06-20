<?php
if (isset($_POST['price']) && isset($_POST['category'])) {
    $price = intval($_POST['price']);
    $category = $_POST['category'];

    if(isset($_COOKIE['filtered_products'])){
        $serialized_products = $_COOKIE['filtered_products'];
        $products = unserialize($serialized_products);
    }else{
        include_once('../../furniture/database/src/database.php');
        $database = new database();
        $products = $database->getAllProducts();
    }

    function getProductsByCategoryAndPrice(array $products, string $category, int $maxPrice): array {
        $filteredProducts = [];
    
        foreach ($products as $product) {
            if ($product['category_name'] === $category && $product['DiscPrice'] <= $maxPrice) {
                $filteredProducts[] = $product;
            }
        }
    
        return $filteredProducts;
    }
    
    function getProductsByMaxPrice(array $products, int $maxPrice): array {
        $filteredProducts = [];
    
        foreach ($products as $product) {
            if ($product['DiscPrice'] <= $maxPrice) {
                $filteredProducts[] = $product;
            }
        }
    
        return $filteredProducts;
    }

    if (!empty($category)) {
        $products_filter = getProductsByCategoryAndPrice($products, $category, $price);
    } else {
        $products_filter = getProductsByMaxPrice($products, $price);
    }
    //$_SESSION['filtered_products'] = $products; // Store products in session
    // Serialize the array
$serialized_products = serialize($products_filter);

// Set the cookie with a name of 'filtered_products', the serialized products, and an expiration time (e.g., 1 day)
setcookie('filtered_products', $serialized_products, time() + 86400, "/"); // 86400 = 1 day

header("Location: ../frontend/homepage_content/product.php"); // Redirect to frontend
}

else{
    include_once('../../../furniture/database/src/database.php');

    if ($categoryNameSelected === "No category selected") {
        $database = new database();
        $products = $database->getAllProducts();
        $_SESSION['products']=$products;
    } else {
        $database = new database();
        $products = $database->getProductsByCategory($categoryNameSelected);
        $_SESSION['products']=$products;
    }
}
?>

