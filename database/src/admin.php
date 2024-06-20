<?php
  // include_once('../control/person.php');
  // include_once (__DIR__ . "\..\control\person.php");
  // echo __DIR__. "\..\control\person.php";
  class admin extends person{
    private array $addresses;
    public string $Type_ID;

    public function __construct(
                                string $email,
                                string $username,
                                string $password, 
                                string $fname, 
                                string $lname,                                  
                                string $telephone,
                                string $Type_ID
                                )
    {
      parent::__construct(
                          $email ,
                          $username , 
                          $fname , 
                          $lname , 
                          $password , 
                          $telephone
                        );
      $this->Type_ID = $Type_ID;
    }
  }
?>