<?php
  include (__DIR__ . "\..\control\person.php");

  class user extends person{
    private array $addresses;
    private string $created_at;
    private string $modified_at;

    public function __construct(
                                string $email,
                                string $username,
                                string $password,  
                                string $fname, 
                                string $lname, 
                                string $telephone
                              )
    {
      parent::__construct(
                          $email,
                          $username,
                          $password, 
                          $fname, 
                          $lname,  
                          $telephone
                        );
    }

    public function getCreated_at(){
      return $this->created_at;
    }

    // setCreated_at() is not allowed

    public function getModified_at(){
      return $this->modified_at;
    }

    // This Function Will Be Usefull When We Want To Change Any Attribute Value In The Database
    public function setModified_at(int $newModification){
      $this->modified_at = newModification;
    }
  }
?>