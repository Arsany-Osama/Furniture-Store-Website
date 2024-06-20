<?php
  include(__DIR__ . "\..\control\invCon.php");

class productInventory implements InventoryController{
    private int $id; 
    private int $quantity;
    private string $created_at;
    private string $modified_at;
    
    public function __construct(
      int $id,
      int $quantity,
      string $created_at,
      string $modified_at
    ) 
    {
      $this->id = $id;
      $this->quantity = $quantity;
      $this->created_at = $created_at;
      $this->modified_at = $modified_at;
    }

    public function getProducInventorytId() : int{
      return $this->id;
    }

    public function getQuantity(): string{
      return $this->quantity;
    }

    public function getCreated_at() : string{
      return $this->created_at;
    }

    public function getModified_at() : string{
      return $this->modified_at;
    }


    public function setQuantity(string $name){
      $this->quantity = $quantity;
    }

    public function setModified_at(string $newModification){
      $this->modified_at = $newModification;
    }
  }
?>