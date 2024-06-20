<?php
  // echo __DIR__ . "\..\control\catCon.php";
  include(__DIR__ . "\..\control\catCon.php");

  class productCategory implements CategoryController{
    private int $id; 
    private string $name;
    private int $added_by;
    private string $created_at;
    private string $modified_at;
    
    public function __construct(
      int $id,
      string $name,
      int $added_by,
      string $created_at,
     string $modified_at
    ) 
    {
      $this->id = $id;
      $this->name = $name;
      $this->added_ny = $added_by;
      $this->created_at = $created_at;
      $this->modified_at = $modified_at;
    }

    public function getProducCategorytId() : int{
      return $this->id;
    }

    public function getName(): string{
      return $this->name;
    }

    public function getCreated_at() : string{
      return $this->created_at;
    }

    public function getModified_at() : string{
      return $this->modified_at;
    }


    public function setName(string $name){
      $this->name = $name;
    }

    public function setModified_at(string $newModification){
      $this->modified_at = $newModification;
    }
  }
  ?>