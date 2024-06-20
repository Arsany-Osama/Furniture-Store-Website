<?php
// Unset the cookie by setting its expiration time to a past time
setcookie('filtered_products', '', time() - 3600, "/");
//unset($_COOKIE['filtered_products']);
// Redirect back to the main page (or wherever you want to redirect)
header('Location: ../frontend/homepage_content/product.php'); // Change 'index.php' to your desired location
?>
