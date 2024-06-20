<?php
// Ensure that the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('../../furniture/database/src/database.php');
    $database = new database();

    // Handle delete request
    if ($_POST['source'] === "delete") {
        $database->removeProduct($_POST['id']);
        header("Location: ../frontend/Admin_Dashboard/Products.php");
        exit();
    }

    // Handle edit request
    if ($_POST['source'] === "edit") {
        $prod_num = $_POST['number'];
        $email = $_COOKIE['Email'];
        $category_name = $_POST['cat_name1'] ?? '';
        $product_name = $_POST['prod_name1'] ?? '';
        $price = $_POST['price1'] ?? 0;
        $discount = $_POST['discount1'] ?? 0;
        $quantity = $_POST['quantity1'] ?? 0;
        $description = $_POST['description1'] ?? '';
        $new_image_path = $_POST['image_path1'] ?? '';

        if($quantity <=0){
            // Redirect to the desired page
            header("Location: ../frontend/Admin_Dashboard/Products.php?error=1");
            exit();
       }
   

        // Fetch the current product details to get the old image path
        $old_image_path = $database->getImageByProductId($prod_num);

        if (strpos($new_image_path, 'data:image') === 0) {
            // Decode the base64 image
            list($type, $data) = explode(';', $new_image_path);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            // Create a unique filename
            $image_name = uniqid() . '.jpg';
            $new_image_path = '../../furniture/frontend/IMG/uploads/' . $image_name;

            // Save the new image
            file_put_contents($new_image_path, $data);

            // Set relative path for the database
            $new_image_path = 'uploads/' . $image_name;

            // Delete the old image if it's not the default placeholder
            if ($old_image_path && file_exists('../../furniture/frontend/IMG/' . $old_image_path) && strpos($old_image_path, 'default_placeholder.jpg') === false) {
                unlink('../../furniture/frontend/IMG/' . $old_image_path);
            }
        } else {
            $new_image_path = $old_image_path;
        }

        include_once('../../furniture/database/src/product.php');

        // Get the category ID by name
        $cat_id = $database->getCategoryIdByName($category_name);
        $percent = ($discount / $price) * 100;

        // Create a product object
        $product = new product(
            $cat_id,         // Category ID
            $product_name,   // Product name
            $price,          // Price
            $discount,       // Discount amount
            $description,    // Description
            $new_image_path  // Image path
        );

        // Update the product
        $database->updateProduct($product, $quantity, $prod_num);

        // Redirect to the desired page
        header("Location: ../frontend/Admin_Dashboard/Products.php");
        exit();
    }

    // Handle add new product request
    $email = $_COOKIE['Email'];
    $category_name = $_POST['cat_name'] ?? '';
    $product_name = $_POST['prod_name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $discount = $_POST['discount'] ?? 0;
    $quantity = $_POST['quantity'] ?? 0;
    $description = $_POST['description'] ?? '';

    if($quantity <=0){
         // Redirect to the desired page
         header("Location: ../frontend/Admin_Dashboard/Products.php?error=1");
         exit();
    }

    // Handle image upload
    if (!empty($_FILES['image']['tmp_name'])) {
        $image_path = 'uploads/' . basename($_FILES['image']['name']);
        $upload_dir = '../../furniture/frontend/IMG/';
        $upload_path = $upload_dir . $image_path;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
            include_once('../../furniture/database/src/product.php');

            // Get the category ID by name
            $cat_id = $database->getCategoryIdByName($category_name);
            $percent = ($discount / $price) * 100;

            // Create a new product object
            $product = new product(
                $cat_id,         // Category ID
                $product_name,   // Product name
                $price,          // Price
                $discount,       // Discount amount
                $description,    // Description
                $image_path      // Image path
            );

            $Aid = $database->getAdminIdByEmail($email);
            // Add the product to inventory
            $database->addProductInventory($product, $quantity, $Aid);

            header("Location: ../frontend/Admin_Dashboard/Products.php");
            exit();
        } else {
            header("Location: ../frontend/Admin_Dashboard/Products.php?error=3");
            //echo "Failed to upload image.";
        }
    } else {
        header("Location: ../frontend/Admin_Dashboard/Products.php?error=2");
         exit();
    }
} else {
    include_once('../../../furniture/database/src/database.php');
    $database = new database();
    $products = $database->DisplayProducts($_COOKIE['Email']);
}
?>
