<?php
  interface productController{

    public function getProductId() : int;

    public function getCategoryId() : int;

    // The New Category Id Should Be Exist In Product Category Table
    public function setCategoryId(int $newId);

    public function getInventoryId() : int;

    // The New Inventory Id Should Be Exist In Product Inventory Table
    public function setInventoryId(int $newInventoryId);

    public function getName() : string;
    
    // The New Name Should Be Unique (It Is A Constraint In The Database) 
    // (Handling This Constraint Will Be In Admin_permissin Class (We Will Implemente It Soon))
    public function setName(string $newName);

    public function getPrice() : float;

    public function setPrice(float $newPrice);

    // Assuming The Discount Will Be Integer
    public function getDiscount() : int;

    public function setDiscount(int $newDiscount);

    public function getDiscountPercent() : float;

    public function setDiscountPercent(float $newDiscountPercentage);

    public function getDescription() : string;

    public function setDescription(string $newDescription);

    public function getImagePath() : string;

    public function setImagePath(string $newImageBath);

    public function getCreated_at() : string;

    public function getModified_at() : string;

    public function setModified_at(string $newModification);
    //for the new classes
    
  }
?>