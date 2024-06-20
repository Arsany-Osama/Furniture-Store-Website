<?php
  include(__DIR__ . "\..\control\prodCon.php");

  class product implements productController{
    private int $id;
    private int $category_id; 
    private int $inventory_id; 
    private string $name;
    private float $price;
    private string $discount;
    private float $discount_percent;
    private string $discription;
    private string $imageBath;
    private string $created_at;
    private string $modified_at;
    
    public function __construct(
      int $category_id,
      string $name,
      float $price,
      string $discount,
      string $discription,
      string $imageBath
    ) 
    {
      $this->category_id = $category_id;
      $this->name = $name;
      $this->price = $price;
      $this->discount = $discount;
      $this->discription = $discription;
      $this->imageBath = $imageBath;
    }

    public function getProductId() : int{
      return $this->id;
    }


    public function getCategoryId() : int{
      return $this->category_id;
    }

    public function getInventoryId() : int{
      return $this->inventory_id;
    }

    public function getName(): string{
      return $this->name;
    }

    public function getPrice(): float{
      return $this->price;
    }

    public function getDiscount(): int{
      return $this->discount;
    }

    public function getDiscountPercent(): float{
      return (($this->getDiscount())/$this->getPrice())*100;
    }

    public function getDescription(): string{
      return $this->discription;
    }

    public function getImagePath(): string{
      return $this->imageBath; 
    }

    public function getCreated_at() : string{
      return $this->created_at;
    }

    public function getModified_at() : string{
      return $this->modified_at;
    }

    public function setCategoryId(int $category_id){
      $this->category_id = $category_id;
    }

    public function setInventoryId(int $inventory_id){
      $this->inventory_id = $inventory_id;
    }

    public function setName(string $name){
      $this->name = $name;
    }

    public function setPrice(float $price){
      $this->price = $price;
    }

    public function setDiscount(int $discount){
      $this->discount = $discount;
    }

    public function setDiscountPercent(float $discount_percent){
      $this->discount_percent = $discount_percent;
    }

    public function setDescription(string $description){
      $this->discription = $description;
    }

    public function setImagePath(string $image_path){
      $this->imageBath = $image_path;
    }

    public function setModified_at(string $newModification){
      $this->modified_at = $newModification;
    }
  }
?>