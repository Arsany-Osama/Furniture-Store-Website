<?php
  include(__DIR__ . "/user.php");
  include(__DIR__ . "/admin.php");
  include(__DIR__ . "/product.php");
  include(__DIR__ . "/category.php");
  include(__DIR__ . "/inventory.php");
  // include_once('../../../furniture/database/src/admin.php');
  // include_once('../../../furniture/database/src/product.php');
  // include_once('../../../furniture/database/src/category.php');
  // include_once('../../../furniture/database/src/inventory.php');
  
  

  class database{
    // Best Practise To Make Constant Variables In Uppercase
    private const SERVERNAME = "localhost";
    private const USERNAME = "root";
    private const PASSWORD = "";//2278928667mma
    private const DATABASE = "furniture";
    private $myDatabase = null;

    public function __construct(){
      $this->myDatabase = new mysqli(database::SERVERNAME , database::USERNAME , database::PASSWORD , database::DATABASE);

      if($this->myDatabase->connect_error)
        die("Connection Failed: " . $myDatabase->connect_error);
    }

    function __destruct(){
      $this->myDatabase->close();
    }

    public function addPerson(person $person) {
      if ($person instanceof user) {
          $sql = "INSERT INTO user (email, username, password, fname, lname, telephone) VALUES 
          (\"".$person->getemail() ."\" , \"".$person->getUsername() ."\" , \"". $person->getPassword() ."\" , \"" . $person->getFname() ."\" , \"". $person->getLname() ."\" , \"". $person->getTelephone() ."\")";
          try {
              if ($this->myDatabase->query($sql))
                  echo "Record added successfully @user" . "<br>";
              else
                  echo "Error: " . $sql . "<br>" . $this->myDatabase->error;
          } catch (mysqli_sql_exception $e) {
            echo "Error11: " . $e->getMessage();
          }
      } else if ($person instanceof admin) {
          $sql = "INSERT INTO admin (email, username, password, fname, lname, telephone, type_id) VALUES 
          (\"".$person->getemail() ."\" , \"".$person->getUsername() ."\" , \"". $person->getPassword() ."\" , \"" . $person->getFname() ."\" , \"". $person->getLname() ."\" , \"". $person->getTelephone() ."\" , \"". $person->getType_ID() ."\")";
          try {
              if ($this->myDatabase->query($sql))
                  echo "Record added successfully @admin" . "<br>";
              else
                  echo "Error: " . $sql . "<br>" . $this->myDatabase->error;
          } catch (mysqli_sql_exception $e) {
            echo "Error11: " . $e->getMessage();
            return false;
          }
      } else {
          echo "Error: Invalid person type";
      }
  }

    /**
     * We Will Setcookies In The Website 
     * The Value Of User's ID Will Be In The Cookies
     */
  //User
  public function setAddressToUser(int $user_id, string $address,string $country,string $city){
    $sql = "INSERT INTO user_address (user_id , address , city , country) VALUES 
            ($user_id , \"$address\" , \"$city\" , \"$country\")";
    echo $sql . "<br>";
    try{
    if($this->myDatabase->query($sql)){
    echo "Record added successfully @user_address" . "<br>";
      return true;
    }
    else
      return false;
    }catch (mysqli_sql_exception $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }

  public function getUserByEmail(String $email): ?user {
    $sql = "SELECT * FROM `user` WHERE email = '$email'";
    $result = $this->myDatabase->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return new user(
        $row['email'],
        $row['username'],
        $row['fname'],
        $row['lname'],
        $row['password'],
        $row['telephone']
      );
    } else {
      return null;
    }
  }

    public function getUserById(int $id): ?User {
      $sql = "SELECT * FROM `user` WHERE id = $id";
      $result = $this->myDatabase->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new User(
          $row['id'],
          $row['username'],
          $row['fname'],
          $row['lname'],
          $row['telephone'],
          $row['created_at'],
          $row['modified_at']
        );
      } else {
        return null;
      }
    }

    public function getUserIdByUsername(string $username) {
    $sql = "SELECT id FROM `user` WHERE username = '$username'";
    $result = $this->myDatabase->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return null;
    }
  }
  

  public function getUserIdByEmail(string $email) {
    $sql = "SELECT id FROM `user` WHERE email = '$email'";
    $result = $this->myDatabase->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return null;
    }
  }

  public function getUserCodeByID(int $user_id) {
      $sql = "SELECT code FROM `user` WHERE id = '$id'";
      $result = $this->myDatabase->query($sql);
      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['code'];
      } else {
          return null;
      }
  }

    public function getUserAddresses(int $user_id) : ?array{
      $sql = "SELECT * FROM user_address WHERE id = $user_id";
      $result = $this->myDatabase->query($sql);
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return array(
          "address" => $row['address'],
          "city" => $row['city'],
          "country" => $row['country']
        );
      }else{
        return null;
      }
    }
  

//Admin
  public function setAddressToAdmin(int $admin_id, string $address, string $country, string $city){
    $sql = "INSERT INTO admin_address (admin_id , address , city , country) VALUES 
            ($admin_id , \"$address\" , \"$city\" , \"$country\")";
    try{
    if($this->myDatabase->query($sql)){
      echo "Record added successfully @admin_address" . "<br>";
      return true;
    }else
      return false;
    }catch (mysqli_sql_exception $e) {
      echo "Error: " . $e->getMessage();
      return false;
      }
  }

  public function addAdmin_Types(string $admin_type, string $permissions) {
      // Build the SQL query with properly quoted string values
      $sql = "INSERT INTO admin_type (admin_type, permissions) VALUES 
              ('$admin_type', '$permissions')";
      try{
      // Execute the query
      if ($this->myDatabase->query($sql)) {
        echo "Record added successfully @admin_type" . "<br>";
          return true;
      } else {
          return false;
      }
    } catch (mysqli_sql_exception $e) {
      echo "Error: " . $e->getMessage();
        return false;
    }
  }

  public function getAdmin_Type(string $permissions) {
    // Build the SQL query with properly quoted string values
    try{
    $sql = "SELECT * FROM admin_type WHERE permissions = '$permissions'";
    $result = $this->myDatabase->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['id'];
      
    } else {
      return null;
    }}
    catch (mysqli_sql_exception $e) {
      echo "Error111: " . $e->getMessage();
      return false;
    }
}

public function getAdminPermissionsByEmail(string $email) {
  try {
      // Build the SQL query with properly quoted string values
      $sql = "SELECT at.permissions FROM admin a 
              JOIN admin_type at ON a.type_id = at.id
              WHERE a.email = ?";
      // Prepare the SQL statement
      $stmt = $this->myDatabase->prepare($sql);
      // Bind the parameter
      $stmt->bind_param("s", $email);
      // Execute the statement
      $stmt->execute();
      // Get the result
      $result = $stmt->get_result();
      
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['permissions'];
      } else {
          return null;
      }
  } catch (mysqli_sql_exception $e) {
      echo "Error: " . $e->getMessage();
      return false;
  }
}


    public function getAdminByEmail(String $email): ?admin {
      $sql = "SELECT * FROM admin WHERE email = '$email'";
      $result = $this->myDatabase->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new admin(
          $row['email'],
          $row['username'],
          $row['password'],
          $row['fname'],
          $row['lname'],
          $row['telephone'],
          $row['type_id']
        );
      } else {
        return null;
      }
    }

    public function getAdminIdByUsername(string $username) {
      $sql = "SELECT id FROM admin WHERE username = '$username'";
      $result = $this->myDatabase->query($sql);
      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['id'];
      } else {
          return null;
      }
  }

  public function getAdminIdByEmail(string $email) {
      $sql = "SELECT id FROM admin WHERE email = '$email'";
      $result = $this->myDatabase->query($sql);
      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['id'];
      } else {
          return null;
      }
  }

  public function getAdminCodeByID(int $admin_id) {
      $sql = "SELECT code FROM admin WHERE id = '$id'";
      $result = $this->myDatabase->query($sql);
      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['code'];
      } else {
          return null;
      }
  }

    public function getAddressFromAddmin(int $admin_id){
      $sql = "SELECT * FROM admin_address WHERE id = $admin_id";
      $result = $this->myDatabase->query($sql);
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return array(
          "address" => $row['id'],
          "city" => $row['username'],
          "country" => $row['fname']
        );
      }else{
        return null;
      }
    }

//product

    public function addProductCategory(string $cat_name, int $admin_id){
      $sql = "INSERT INTO product_category (name, added_by) VALUES 
              (\"$cat_name\", \"$admin_id\")";
      try{
      if($this->myDatabase->query($sql)){
        echo "Record added successfully @product_category" . "<br>";
        return true;
      }else
        return false;
      } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
      }
    }

    public function removeProductCategory(int $id){
      $sql = "DELETE FROM `product_category` WHERE id = $id";
      try{
      if($this->myDatabase->query($sql)){
        echo "Deleted successfully @product_category" . "<br>";
        return true;
      }else
        return false;
      } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
      }
    }

    public function removeProduct(int $id){
      try {
          // Retrieve the inventory ID of the product to be deleted
          $inventorySql = "SELECT inventory_id FROM product WHERE id = $id";
          $inventoryResult = $this->myDatabase->query($inventorySql);
          if ($inventoryResult && $inventoryResult->num_rows > 0) {
              $inventoryRow = $inventoryResult->fetch_assoc();
              $inventoryId = $inventoryRow['inventory_id'];
              // Delete product from product table
              $productSql = "DELETE FROM product WHERE id = $id";
              if ($this->myDatabase->query($productSql)) {
                  // Delete corresponding inventory record from product_inventory table
                  $deleteInventorySql = "DELETE FROM product_inventory WHERE id = $inventoryId";
                  if ($this->myDatabase->query($deleteInventorySql)) {
                      echo "Deleted product and related inventory successfully." . "<br>";
                      return true;
                  } else {
                      echo "Error deleting related inventory: " . $this->myDatabase->error;
                      return false;
                  }
              } else {
                  echo "Error deleting product: " . $this->myDatabase->error;
                  return false;
              }
          } else {
              echo "Error retrieving inventory ID for product.";
              return false;
          }
      } catch (mysqli_sql_exception $e) {
          echo "Error: " . $e->getMessage();
          return false;
      }
  }
  
  

  public function addProductInventory(Product $product, int $quantity, int $adminId){
    $sql = "INSERT INTO product_inventory (quantity) VALUES ($quantity)";
    try {
        // Start a transaction
        $this->myDatabase->begin_transaction();
        if ($this->myDatabase->query($sql)) {
            $inventoryId = $this->myDatabase->insert_id;

            $productSql = "INSERT INTO product (category_id, inventory_id, name, price, discount, discount_percent, description, image, added_by) VALUES
            ({$product->getCategoryId()}, $inventoryId, '{$product->getName()}', {$product->getPrice()}, {$product->getDiscount()}, 
            {$product->getDiscountPercent()}, '{$product->getDescription()}', '{$product->getImagePath()}', $adminId)";

            if ($this->myDatabase->query($productSql)) {
                echo "Record added successfully @product & @product_inventory" . "<br>";
                // Commit the transaction if both inserts are successful
                $this->myDatabase->commit();
                return true;
            } else {
                echo "Error: " . $productSql . "<br>" . $this->myDatabase->error;
                // Rollback the transaction if there's an error in inserting the product
                $this->myDatabase->rollback();
                return false;
            }
        } else {
            return false;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        // Rollback the transaction if there's any exception
        $this->myDatabase->rollback();
        return false;
    }
}

  

    public function getProductById(int $product_id) : product{
      $sql = "SELECT * FROM product WHERE id = $product_id";
      $result = $this->myDatabase->query($sql);
      if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return new product(
          $row['id'],
          $row['category_id'],
          $row['inventory_id'],
          $row['name'],
          $row['price'],
          $row['discount'],
          $row['discount_percent'],
          $row['description'],
          $row['image'],
          $row['created_at'],
          $row['modified_at'],
        );
      }else{
        return null;
      }
    }

    public function getImageByProductId(int $product_id): ?string {
      $sql = "SELECT image FROM product WHERE id = ?";
      $stmt = $this->myDatabase->prepare($sql);
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
      $stmt->bind_result($image);
      if ($stmt->fetch()) {
        return $image;
      } else {
        return null;
      }
    }

    public function getAllProducts(): array {
      $sql = "SELECT p.id, p.name, p.price, p.discount, p.description, p.image, p.created_at, p.modified_at, pc.name AS category_name, pi.quantity AS quantity
              FROM product p
              INNER JOIN product_category pc ON p.category_id = pc.id
              INNER JOIN product_inventory pi ON p.inventory_id = pi.id";
      $result = $this->myDatabase->query($sql);
      $products = [];
  
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $price = $row['price'];
            $discount = $row['discount'];
              $discountedPrice = $price -$discount;
              $product = [
                  'id' => $row['id'],
                  'name' => $row['name'],
                  'price' => $row['price'],
                  'discount' => $row['discount'],
                  'description' => $row['description'],
                  'image' => $row['image'],
                  'created_at' => $row['created_at'],
                  'modified_at' => $row['modified_at'],
                  'category_name' => $row['category_name'],
                  'quantity' => $row['quantity'],
                  'DiscPrice'=>$discountedPrice
              ];
              $products[] = $product;
          }
      }
  
      return $products;
  }

  public function getProductsByCategory(string $categoryName): array {
    $sql = "SELECT p.id, p.name, p.price, p.discount, p.description, p.image, p.created_at, p.modified_at, pc.name AS category_name, pi.quantity AS quantity
            FROM product p
            INNER JOIN product_category pc ON p.category_id = pc.id
            INNER JOIN product_inventory pi ON p.inventory_id = pi.id
            WHERE pc.name = ?";
    $stmt = $this->myDatabase->prepare($sql);
    $stmt->bind_param("s", $categoryName);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $price = $row['price'];
          $discount = $row['discount'];
              $discountedPrice = $price -$discount;
            $product = [
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'discount' => $row['discount'],
                'description' => $row['description'],
                'image' => $row['image'],
                'created_at' => $row['created_at'],
                'modified_at' => $row['modified_at'],
                'category_name' => $row['category_name'],
                'quantity' => $row['quantity'],
                'DiscPrice'=>$discountedPrice
            ];
            $products[] = $product;
        }
    }

    $stmt->close();
    return $products;
}

public function getProductsByMaxPrice(int $maxPrice): array {
  $sql = "SELECT p.id, p.name, p.price, p.discount, p.description, p.image, p.created_at, p.modified_at, pc.name AS category_name, pi.quantity AS quantity
          FROM product p
          INNER JOIN product_category pc ON p.category_id = pc.id
          INNER JOIN product_inventory pi ON p.inventory_id = pi.id
          WHERE p.price <= ?";
  $stmt = $this->myDatabase->prepare($sql);
  $stmt->bind_param("i", $maxPrice);
  $stmt->execute();
  $result = $stmt->get_result();
  $products = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
        $discount = $row['discount'];
              $discountedPrice = $price -$discount;
          $product = [
              'id' => $row['id'],
              'name' => $row['name'],
              'price' => $row['price'],
              'discount' => $row['discount'],
              'description' => $row['description'],
              'image' => $row['image'],
              'created_at' => $row['created_at'],
              'modified_at' => $row['modified_at'],
              'category_name' => $row['category_name'],
              'quantity' => $row['quantity'],
              'DiscPrice'=>$discountedPrice
          ];
          $products[] = $product;
      }
  }

  $stmt->close();
  return $products;
}

public function getProductsByName(string $productName): array {
  $sql = "SELECT p.id, p.name, p.price, p.discount, p.description, p.image, p.created_at, p.modified_at, pc.name AS category_name, pi.quantity AS quantity
          FROM product p
          INNER JOIN product_category pc ON p.category_id = pc.id
          INNER JOIN product_inventory pi ON p.inventory_id = pi.id
          WHERE p.name LIKE ?";
  $stmt = $this->myDatabase->prepare($sql);
  $productName = '%' . $productName . '%'; // Add wildcards to enable partial name matching
  $stmt->bind_param("s", $productName);
  $stmt->execute();
  $result = $stmt->get_result();
  $products = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
              $discount = $row['discount'];
              $discountedPrice = $price -$discount;
          $product = [
              'id' => $row['id'],
              'name' => $row['name'],
              'price' => $row['price'],
              'discount' => $row['discount'],
              'description' => $row['description'],
              'image' => $row['image'],
              'created_at' => $row['created_at'],
              'modified_at' => $row['modified_at'],
              'category_name' => $row['category_name'],
              'quantity' => $row['quantity'],
              'DiscPrice'=>$discountedPrice
          ];
          $products[] = $product;
      }
  }

  $stmt->close();
  return $products;
}


public function getProductsByCategoryAndPrice(string $categoryName, int $maxPrice): array {
  $sql = "SELECT p.id, p.name, p.price, p.discount, p.description, p.image, p.created_at, p.modified_at, pc.name AS category_name, pi.quantity AS quantity
          FROM product p
          INNER JOIN product_category pc ON p.category_id = pc.id
          INNER JOIN product_inventory pi ON p.inventory_id = pi.id
          WHERE pc.name = ? AND p.price <= ?";
  $stmt = $this->myDatabase->prepare($sql);
  $stmt->bind_param("si", $categoryName, $maxPrice);
  $stmt->execute();
  $result = $stmt->get_result();
  $products = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $price = $row['price'];
        $discount = $row['discount'];
              $discountedPrice = $price -$discount;
          $product = [
              'id' => $row['id'],
              'name' => $row['name'],
              'price' => $row['price'],
              'discount' => $row['discount'],
              'description' => $row['description'],
              'image' => $row['image'],
              'created_at' => $row['created_at'],
              'modified_at' => $row['modified_at'],
              'category_name' => $row['category_name'],
              'quantity' => $row['quantity'],
              'DiscPrice'=>$discountedPrice
          ];
          $products[] = $product;
      }
  }
  $stmt->close();
  return $products;
}


    public function getProductIdByName(string $productName) {
      $sql = "SELECT id FROM product WHERE name = '$productName'";
      $result = $this->myDatabase->query($sql);
      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row['id'];
      } else {
          return null;
      }
  }

  public function getCategoryIdByName(string $CategoryName) {
    $sql = "SELECT id FROM product_category  WHERE name = '$CategoryName'";
    $result = $this->myDatabase->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return null;
    }
}

public function getCategoryIdById(int $CategoryId) {
  $sql = "SELECT `name` FROM product_category  WHERE id = '$CategoryId'";
  $result = $this->myDatabase->query($sql);
  if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['name'];
  } else {
      return null;
  }
}

public function getAllCategory() {
  $sql = "SELECT `name` FROM product_category";
  $result = $this->myDatabase->query($sql);
  $categories = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $category = [
              'name' => $row['name']
          ];
          $categories[] = $category;
      }
  }

  return $categories;
}
    
    public function getProductCategoryById(int $id): productCategory {
      $sql = "SELECT * FROM product_category WHERE id = $id";
      $result = $this->myDatabase->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new productCategory(
          $row['id'],
          $row['name'],
          $row['added_by'],
          $row['created_at'],
          $row['modified_at']
        );
      } else {
        return null;
      }
    }
    
    public function getProductInventoryById(int $id): productInventory {
      $sql = "SELECT * FROM product_inventory WHERE id = $id";
      $result = $this->myDatabase->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return new productInventory(
          $row['id'],
          $row['quantity'],
          $row['created_at'],
          $row['modified_at']
        );
      } else {
        return null;
      }
    }
  
  //order
  public function addOrderItem(int $user_id, int $product_id, int $quantity) : bool{
    // Start a transaction to ensure atomicity
    $this->myDatabase->begin_transaction();

    // Get the current quantity from the product_inventory table
    $getCurrentQuantity = "SELECT quantity FROM product_inventory WHERE id = (SELECT inventory_id FROM product WHERE id = $product_id)";
    $currentQuantityResult = $this->myDatabase->query($getCurrentQuantity);
    $currentQuantity = $currentQuantityResult->fetch_assoc()['quantity'];

    // Check if there is enough quantity in the product_inventory
    if ($currentQuantity >= $quantity) {
        // Subtract the quantity from the current inventory
        $newQuantity = $currentQuantity - $quantity;

        // Update the quantity in the product_inventory table
        $updateInventory = "UPDATE product_inventory SET quantity = $newQuantity WHERE id = (SELECT inventory_id FROM product WHERE id = $product_id)";
        if ($this->myDatabase->query($updateInventory)) {
            // Insert the order item into the order_item table
            $insertOrderItem = "INSERT INTO order_item (user_id, product_id, quantity) VALUES 
                                ($user_id , $product_id , $quantity)";
            try {
                if ($this->myDatabase->query($insertOrderItem)) {
                    // Commit the transaction if all queries are successful
                    $this->myDatabase->commit();
                    echo "Record added successfully @order_item" . "<br>";
                    return true;
                } else {
                    // Rollback the transaction if the insert fails
                    $this->myDatabase->rollback();
                    return false;
                }
            } catch (mysqli_sql_exception $e) {
                // Rollback the transaction on any exception
                $this->myDatabase->rollback();
                echo "Error: " . $e->getMessage();
                return false;
            }
        } else {
            // Rollback the transaction if the update fails
            $this->myDatabase->rollback();
            return false;
        }
    } else {
        echo "Not enough quantity in inventory.";
        return false;
    }
  }

  public function checkOrderExists($user_id, $product_id){
    // Start a transaction to ensure atomicity
    $this->myDatabase->begin_transaction();

    try {
        // Check if the order exists in the order table
        $checkOrderQuery = "SELECT COUNT(*) AS order_count FROM order_item WHERE user_id = '$user_id' AND product_id = '$product_id'";
        $orderResult = $this->myDatabase->query($checkOrderQuery);

        if ($orderResult) {
            $orderCount = $orderResult->fetch_assoc()['order_count'];

            // Check if the order exists
            if ($orderCount > 0) {
                // Commit the transaction as the order exists
                $this->myDatabase->commit();
                return true;
            } else {
                // Rollback the transaction as the order does not exist
                $this->myDatabase->rollback();
                return false;
            }
        } else {
            // Rollback the transaction if the query fails
            $this->myDatabase->rollback();
            return false;
        }
    } catch (mysqli_sql_exception $e) {
        // Rollback the transaction on any exception
        $this->myDatabase->rollback();
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function updateOrderItemQuantity(int $user_id, int $product_id): bool {
  // Start a transaction to ensure atomicity
  $this->myDatabase->begin_transaction();

  try {
      // Update the quantity in the order_item table by +1
      $updateOrderItem = "UPDATE order_item SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $product_id";
      $resultOrderItem = $this->myDatabase->query($updateOrderItem);

      // Update the quantity in the product_inventory table by -1
      $updateInventory = "UPDATE product_inventory SET quantity = quantity - 1 WHERE id = (SELECT inventory_id FROM product WHERE id = $product_id)";
      $resultInventory = $this->myDatabase->query($updateInventory);

      if ($resultOrderItem && $resultInventory) {
          // Both updates successful, commit the transaction
          $this->myDatabase->commit();
          return true;
      } else {
          // One or both updates failed, rollback the transaction
          $this->myDatabase->rollback();
          return false;
      }
  } catch (mysqli_sql_exception $e) {
      // Rollback the transaction on any exception
      $this->myDatabase->rollback();
      echo "Error: " . $e->getMessage();
      return false;
  }
}

public function getAllOrdersByEmail($email): array {
  $sql = "SELECT oi.id AS order_id, oi.quantity, p.name AS product_name, p.image AS product_image, (p.price - p.discount) AS price_paid, oi.created_at, oi.modified_at
          FROM `order_item` oi
          INNER JOIN `user` u ON oi.user_id = u.id
          INNER JOIN `product` p ON oi.product_id = p.id
          WHERE u.email = '$email'";
  $result = $this->myDatabase->query($sql);
  $orders = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $order = [
              'order_id' => $row['order_id'],
              'quantity' => $row['quantity'],
              'product_name' => $row['product_name'],
              'product_image' => $row['product_image'],
              'price_paid' => $row['price_paid'],
              'created_at' => $row['created_at'],
              'modified_at' => $row['modified_at']
          ];
          $orders[] = $order;
      }
  }

  return $orders;
}

public function deleteOrder($orderId)
{
    $sql = "SELECT product_id, quantity FROM order_item WHERE id = '$orderId'";
    $result = $this->myDatabase->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productId = $row['product_id'];
        $orderQuantity = $row['quantity'];

        $this->updateModifiedAtProductInventorybyorderid($orderId);

        // Start the transaction
        mysqli_begin_transaction($this->myDatabase);

        $deleteSql = "DELETE FROM order_item WHERE id = '$orderId'";
        mysqli_query($this->myDatabase, $deleteSql);

        $updateSql = "UPDATE product_inventory SET quantity = quantity + '$orderQuantity' WHERE id = '$productId'";
        mysqli_query($this->myDatabase, $updateSql);

        // Commit the transaction
        mysqli_commit($this->myDatabase);

        echo "Order deleted successfully!";
    } else {
        echo "Order not found.";
    }
}

public function checkQuantityEqualsOne($orderId){
    $sql = "SELECT quantity FROM order_item WHERE id = '$orderId'";
    $result = $this->myDatabase->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantity = $row['quantity'];

        if ($quantity == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

public function reduceOrderItemQuantity($orderId)
{
    // Start a transaction to ensure atomicity
    $this->myDatabase->begin_transaction();

    try {
        // Update the order_item table to reduce the quantity
        $updateOrderItemSql = "UPDATE order_item SET quantity = quantity - 1 WHERE id = '$orderId'";
        $this->myDatabase->query($updateOrderItemSql);

        if ($this->myDatabase->affected_rows > 0) {
            // Get the product_id associated with the order_item
            $getProductIdSql = "SELECT product_id FROM order_item WHERE id = '$orderId'";
            $productIdResult = $this->myDatabase->query($getProductIdSql);

            if ($productIdResult && $productIdResult->num_rows > 0) {
                $productId = $productIdResult->fetch_assoc()['product_id'];

                // Update the product_inventory table to increase the quantity
                $updateProductInventorySql = "UPDATE product_inventory SET quantity = quantity + 1 WHERE id = (SELECT inventory_id FROM product WHERE id = '$productId')";
                $this->myDatabase->query($updateProductInventorySql);

                // Commit the transaction
                $this->myDatabase->commit();

                $this->updateModifiedAtOrderItem($orderId);
                $this->updateModifiedAtProductInventorybyorderid($orderId);

                return true; // Quantity reduced and inventory updated successfully
            }
        }

        // Rollback the transaction if any step fails
        $this->myDatabase->rollback();
        return false;
    } catch (mysqli_sql_exception $e) {
        // Rollback the transaction on any exception
        $this->myDatabase->rollback();
        echo "Error: " . $e->getMessage();
        return false;
    }
}


  //update modified_at / last_login
  //update user
  public function updateModifiedAtUser(int $userId){
    $updateQuery = "UPDATE `user` SET modified_at = CURRENT_TIMESTAMP WHERE id = $userId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateModifiedAtUserAddress(int $userId) {
    $updateQuery = "UPDATE user_address SET modified_at = CURRENT_TIMESTAMP WHERE user_id = $userId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateUserPassword(int $userId, string $password){
    $updateQuery = "UPDATE `user` SET password = '$password' WHERE id = $userId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateUserDetails(int $userId, ?string $fname, ?string $lname, ?string $username, ?string $phone, ?string $city, ?string $country, ?string $address): bool {
    $result = true;

    // Update user details
    $query = "UPDATE `user` SET ";
    $updates = [];
    $params = [];
    $types = "";

    if ($fname !== null && $fname !== '') {
        $updates[] = "fname = ?";
        $params[] = $fname;
        $types .= "s";
        setcookie("fname", $fname, time() + 60 * 60 * 24, "/");
    }
    if ($lname !== null && $lname !== '') {
        $updates[] = "lname = ?";
        $params[] = $lname;
        $types .= "s";
        setcookie("lname", $lname, time() + 60 * 60 * 24, "/");
    }
    if ($username !== null && $username !== '') {
        $updates[] = "username = ?";
        $params[] = $username;
        $types .= "s";
        setcookie("username", $username, time() + 60 * 60 * 24, "/");
    }
    if ($phone !== null && $phone !== '') {
        $updates[] = "telephone = ?";
        $params[] = $phone;
        $types .= "s";
        setcookie("telephone", $phone, time() + 60 * 60 * 24, "/");
    }

    if (!empty($updates)) {
        $query .= implode(", ", $updates) . " WHERE id = ?";
        $params[] = $userId;
        $types .= "i";

        $stmt = $this->myDatabase->prepare($query);
        if ($stmt) {
            $stmt->bind_param($types, ...$params);
            $result = $stmt->execute() && $result;
            $stmt->close();
        } else {
            $result = false;
        }
    }

    // Update address details
    $addressQuery = "UPDATE `user_address` SET ";
    $addressUpdates = [];
    $addressParams = [];
    $addressTypes = "";

    if ($city !== null && $city !== '') {
        $addressUpdates[] = "city = ?";
        $addressParams[] = $city;
        $addressTypes .= "s";
    }
    if ($country !== null && $country !== '') {
        $addressUpdates[] = "country = ?";
        $addressParams[] = $country;
        $addressTypes .= "s";
    }
    if ($address !== null && $address !== '') {
        $addressUpdates[] = "address = ?";
        $addressParams[] = $address;
        $addressTypes .= "s";
    }

    if (!empty($addressUpdates)) {
        $addressQuery .= implode(", ", $addressUpdates) . " WHERE user_id = ?";
        $addressParams[] = $userId;
        $addressTypes .= "i";

        $stmt = $this->myDatabase->prepare($addressQuery);
        if ($stmt) {
            $stmt->bind_param($addressTypes, ...$addressParams);
            $result = $stmt->execute() && $result;
            $stmt->close();
        } else {
            $result = false;
        }
    }

    return $result;
}




    //update admin
  public function updateModifiedAtAdmin(int $adminId) {
    $updateQuery = "UPDATE admin SET modified_at = CURRENT_TIMESTAMP WHERE id = $userId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateLastLoginAdmin(int $adminId) {
    $updateQuery = "UPDATE admin SET last_login = CURRENT_TIMESTAMP WHERE id = $adminId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateModifiedAtAdminAddress(int $adminId) {
    $updateQuery = "UPDATE admin_address SET modified_at = CURRENT_TIMESTAMP WHERE admin_id = $adminId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateModifiedAtAdminType(int $adminTypeId) {
    $updateQuery = "UPDATE admin_type SET modified_at = CURRENT_TIMESTAMP WHERE id = $adminTypeId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateAdminPassword(int $adminId, int $password){
    $updateQuery = "UPDATE admin SET password = $password WHERE id = $adminId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateAdminCode(int $adminId, int $code){
    $updateQuery = "UPDATE admin SET code = $code WHERE id = $adminId";
    return $this->myDatabase->query($updateQuery);
  }

    //update product
    public function updateProductCategory($name, $categoryId) {
      $updateQuery = "UPDATE product_category SET name = '$name', modified_at = CURRENT_TIMESTAMP WHERE id = $categoryId";
      return $this->myDatabase->query($updateQuery);
    }

    public function updateProduct(Product $product, int $quantity, int $productId)
    {
        try {
            // Get the current timestamp
            $currentTimestamp = date('Y-m-d H:i:s');

            // Start a transaction
            $this->myDatabase->begin_transaction();

            $getInventoryIdQuery = "SELECT inventory_id FROM product WHERE id = $productId";
            $inventoryIdResult = $this->myDatabase->query($getInventoryIdQuery);
            if ($inventoryIdResult && $inventoryIdRow = $inventoryIdResult->fetch_assoc()) {
                $inventoryId = $inventoryIdRow['inventory_id'];

                // Update the product inventory quantity and modified_at timestamp
                $updateInventorySql = "UPDATE product_inventory SET quantity = $quantity, modified_at = '$currentTimestamp' WHERE id = $inventoryId";
                if ($this->myDatabase->query($updateInventorySql)) {
                    // Update the product information and modified_at timestamp
                    $updateProductSql = "UPDATE product SET
                        category_id = {$product->getCategoryId()},
                        name = '{$product->getName()}',
                        price = {$product->getPrice()},
                        discount = {$product->getDiscount()},
                        discount_percent = {$product->getDiscountPercent()},
                        description = '{$product->getDescription()}',
                        image = '{$product->getImagePath()}',
                        modified_at = '$currentTimestamp'
                        WHERE id = $productId";
                    if ($this->myDatabase->query($updateProductSql)) {
                        echo "Product and inventory updated successfully." . "<br>";
                        // Commit the transaction if both updates are successful
                        $this->myDatabase->commit();
                        return true;
                    } else {
                        echo "Error updating product: " . $this->myDatabase->error;
                        // Rollback the transaction if there's an error in updating the product
                        $this->myDatabase->rollback();
                        return false;
                    }
                } else {
                    echo "Error updating inventory: " . $this->myDatabase->error;
                    // Rollback the transaction if there's an error in updating the inventory
                    $this->myDatabase->rollback();
                    return false;
                }
            } else {
                echo "Error retrieving inventory ID: " . $this->myDatabase->error;
                // Rollback the transaction if there's an error in retrieving the inventory ID
                $this->myDatabase->rollback();
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
            // Rollback the transaction if there's any exception
            $this->myDatabase->rollback();
            return false;
        }
    }
  


  public function updateModifiedAtProduct(int $productId) {
    $updateQuery = "UPDATE product SET modified_at = CURRENT_TIMESTAMP WHERE id = $productId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateModifiedAtProductInventory(int $inventoryId) {
    $updateQuery = "UPDATE product_inventory SET modified_at = CURRENT_TIMESTAMP WHERE id = $inventoryId";
    return $this->myDatabase->query($updateQuery);
  }

  public function updateModifiedAtProductInventoryByOrderId(int $orderId): bool {
    // Get the product_id from the order_item table
    $query = "SELECT product_id FROM order_item WHERE id = ?";
    $stmt = $this->myDatabase->prepare($query);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // No such order_id found
        return false;
    }

    $row = $result->fetch_assoc();
    $productId = $row['product_id'];

    // Update the modified_at attribute in the product_inventory table
    $updateQuery = "UPDATE product_inventory SET modified_at = CURRENT_TIMESTAMP WHERE id = (
                    SELECT inventory_id FROM product WHERE id = ?)";
    $updateStmt = $this->myDatabase->prepare($updateQuery);
    $updateStmt->bind_param("i", $productId);

    return $updateStmt->execute();
}


  public function updateModifiedAtOrderItem(int $orderItemId) {
    $updateQuery = "UPDATE order_item SET modified_at = CURRENT_TIMESTAMP WHERE id = $orderItemId";
    return $this->myDatabase->query($updateQuery);
  }

  //sum checks
  // Check in login
  function UserLogin($email, $password){
    try{
     $sql ="SELECT password FROM `user` WHERE email = '$email'";
     $result = $this->myDatabase->query($sql);
     if($result->num_rows > 0){
       $row = $result->fetch_assoc();
       if($password == $row['password']){
         return true;
       }
     }else{
       return false;
     }}
     catch (mysqli_sql_exception $e) {
       echo "Error: " . $e->getMessage();
       return true;
     }
   }

   function AdminLogin($email, $password){
    try{
     $sql ="SELECT password FROM admin WHERE email = '$email'";
     $result = $this->myDatabase->query($sql);
     if($result->num_rows > 0){
       $row = $result->fetch_assoc();
       if($password == $row['password']){
         return true;
       }
     }else{
       return false;
     }}
     catch (mysqli_sql_exception $e) {
       echo "Error: " . $e->getMessage();
       return true;
     }
   }

   function userExists($email) {
    try {
        $sql = "SELECT COUNT(*) FROM `user` WHERE email = '$email'";
        $result = $this->myDatabase->query($sql);
        $count = $result->fetch_row()[0];

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function adminExists($email) {
    try {
        $sql = "SELECT COUNT(*) FROM admin WHERE email = '$email'";
        $result = $this->myDatabase->query($sql);
        $count = $result->fetch_row()[0];

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


public function DisplayCategories($email) {
  try {
      $sqlAdminExists = "SELECT COUNT(*) FROM admin WHERE email = '$email'";
      $resultAdminExists = $this->myDatabase->query($sqlAdminExists);
      $adminCount = $resultAdminExists->fetch_row()[0];

      if ($adminCount > 0) {
          $sqlCategories = "SELECT * FROM product_category WHERE added_by = (
                              SELECT id FROM admin WHERE email = '$email'
                          )";
          $resultCategories = $this->myDatabase->query($sqlCategories);

          $categories = array();
          // Fetching categories
          if ($resultCategories->num_rows > 0) {
              while($row = $resultCategories->fetch_assoc()) {
                  $categories[] = $row;
              }
          }
          return $categories;
      } else {
          return "Admin with email $email does not exist";
      }
  } catch (mysqli_sql_exception $e) {
      return "Error: " . $e->getMessage();
  }
}

public function DisplayProducts($email) {
  try {
      $sqlAdminExists = "SELECT COUNT(*) FROM admin WHERE email = '$email'";
      $resultAdminExists = $this->myDatabase->query($sqlAdminExists);
      $adminCount = $resultAdminExists->fetch_row()[0];

      if ($adminCount > 0) {
          $sqlProducts = "SELECT p.id, p.name, p.image, pc.name AS category, p.price, p.discount, p.discount_percent, p.description, pi.quantity, p.modified_at 
                          FROM product p
                          INNER JOIN product_category pc ON p.category_id = pc.id
                          INNER JOIN admin a ON pc.added_by = a.id
                          INNER JOIN product_inventory pi ON p.inventory_id = pi.id
                          WHERE a.email = '$email'";
          $resultProducts = $this->myDatabase->query($sqlProducts);

          $products = array();

          // Fetching product details and adding them to the array
          if ($resultProducts->num_rows > 0) {
              while($row = $resultProducts->fetch_assoc()) {
                  $products[] = $row;
              }
          }

          // Return the array of products
          return $products;
      } else {
          return "Admin with email $email does not exist";
      }
  } catch (mysqli_sql_exception $e) {
      return "Error: " . $e->getMessage();
  }
}

//Admin Analysis (In overview)
// 1. Total number of products added by admin
public function getTotalProductsByAdmin(int $adminId): int {
  $query = "SELECT COUNT(*) as total_products FROM product WHERE added_by = $adminId";
  $result = $this->myDatabase->query($query);
  if ($result) {
      return (int)$result->fetch_assoc()['total_products'];
  } else {
      return false;
  }
}

// 2. Total number of inventories managed by admin
public function getTotalunsoldInventoriesByAdmin(int $adminId): int {
  $query = "SELECT SUM(pi.quantity) as total_inventory FROM product p JOIN product_inventory pi ON p.inventory_id = pi.id WHERE p.added_by = $adminId";
  $result = $this->myDatabase->query($query);
  if ($result) {
      return (int)$result->fetch_assoc()['total_inventory'];
  } else {
      return false;
  }
}

public function getTotalsoldInventoriesByAdmin(int $adminId): int {
  // SQL query to count total inventories added by the specified admin
  $query = "
      SELECT SUM(oi.quantity) as total_inventory 
      FROM order_item oi 
      JOIN product p ON oi.product_id = p.id 
      WHERE p.added_by = $adminId
  ";

  // Execute the query
  $result = $this->myDatabase->query($query);

  // Check if the result is valid
  if ($result) {
      // Fetch the result and return the total inventory
      return (int)$result->fetch_assoc()['total_inventory'];
  } else {
      // Return false if the query fails
      return false;
  }
}


// 3. Total number of users who bought any product added by this admin
public function getTotalUsersBoughtFromAdmin(int $adminId): int {
  $query = "SELECT COUNT(DISTINCT oi.user_id) as total_users FROM order_item oi JOIN product p ON oi.product_id = p.id WHERE p.added_by = $adminId";
  $result = $this->myDatabase->query($query);
  if ($result) {
      return (int)$result->fetch_assoc()['total_users'];
  } else {
      return false;
  }
}

// 4. Top bought products, their image paths, and quantities bought
public function getTopBoughtProducts(int $adminId): array {
  $query = "SELECT p.name, p.image, SUM(oi.quantity) as quantity_bought 
            FROM order_item oi 
            JOIN product p ON oi.product_id = p.id 
            WHERE p.added_by = $adminId 
            GROUP BY oi.product_id 
            ORDER BY quantity_bought DESC 
            LIMIT 3";
  $result = $this->myDatabase->query($query);
  if ($result) {
      return $result->fetch_all(MYSQLI_ASSOC);
  } else {
      return false;
  }
}

// 5. Array of products bought and their (quantity bought * (price - discount)) value
public function getProductsBoughtAndValues(int $adminId): array {
  $query = "SELECT p.name, SUM(oi.quantity) as quantity_bought, SUM(oi.quantity * (p.price - p.discount)) as total_value 
            FROM order_item oi 
            JOIN product p ON oi.product_id = p.id 
            WHERE p.added_by = $adminId 
            GROUP BY oi.product_id";
  $result = $this->myDatabase->query($query);
  if ($result) {
      $products = [];
      $values = [];
      while ($row = $result->fetch_assoc()) {
          $products[] = $row['name'];
          $values[] = $row['total_value'];
      }
      return ['products' => $products, 'values' => $values];
  } else {
      return false;
  }
}

 // 6. Total sales (sum of (quantity bought * (price - discount))) in order_item
 public function getTotalSalesByAdmin(int $adminId): float {
  $query = "SELECT SUM(oi.quantity * (p.price - p.discount)) as total_sales 
            FROM order_item oi 
            JOIN product p ON oi.product_id = p.id 
            WHERE p.added_by = $adminId";
  $result = $this->myDatabase->query($query);
  if ($result) {
      $row = $result->fetch_assoc();
      return $row['total_sales'] ? (float)$row['total_sales'] : 0;
  } else {
      return 0;
  }
}

//User Analysis
//1.Last purchased product and number of total boughts for this product
public function getLastPurchasedProduct(int $userId): array {
  $query = "SELECT p.id AS product_id, p.name AS product_name, SUM(oi.quantity) AS total_boughts
            FROM order_item oi
            JOIN product p ON oi.product_id = p.id
            WHERE oi.user_id = ?
            GROUP BY p.id, p.name
            ORDER BY oi.created_at DESC
            LIMIT 1";
  $stmt = $this->myDatabase->prepare($query);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result) {
      $data = $result->fetch_assoc();
      return $data ? $data : []; // Return an empty array if $data is null
  } else {
      return []; // Return an empty array if $result is null
  }
}

//2.Total spending for this user
public function getTotalSpending(int $userId): float {
  $query = "SELECT SUM(oi.quantity * (p.price - p.discount)) AS total_spent
            FROM order_item oi
            JOIN product p ON oi.product_id = p.id
            WHERE oi.user_id = ?";
  $stmt = $this->myDatabase->prepare($query);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result) {
      $row = $result->fetch_assoc();
      return floatval($row['total_spent']);
  } else {
      return 0.0;
  }
}

//3.The product of the highest price the user purchased
public function getHighestPricedProduct(int $userId): array {
  $query = "SELECT p.id AS product_id, p.name AS product_name, p.price
            FROM order_item oi
            JOIN product p ON oi.product_id = p.id
            WHERE oi.user_id = ?
            ORDER BY p.price DESC
            LIMIT 1";
  $stmt = $this->myDatabase->prepare($query);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result) {
    $data = $result->fetch_assoc();
    return $data ? $data : []; // Return an empty array if $data is null
} else {
    return []; // Return an empty array if $result is null
}
}


}

?>