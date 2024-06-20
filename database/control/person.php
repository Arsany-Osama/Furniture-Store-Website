<?php
  abstract class person{
    protected int $id;
    protected string $email;
    protected string $username;
    protected string $fname;
    protected string $lname;
    protected string $password;
    protected string $telephone;


    public function __construct(
            string $email,
            string $username , 
            string $fname , 
            string $lname , 
            string $password , 
            string $telephone,
            )
    {
      $this->email = $email;
      $this->username = $username;
      $this->fname = $fname; 
      $this->lname = $lname;
      $this->password = $password; 
      $this->telephone = $telephone;
    }

    public function setEmail(string $email){
      $this->email = $email;
    }

    public function getEmail() : string{
      return $this->email;
    }

    public function setId(int $id){
      $this->id = id;
    }

    public function getId() : int{
      return $this->id;
    }

    public function setFname(string $fname){
      $this->$fname = $fname;
    }

    public function getFname() : string{
      return $this->fname;
    }

    public function setLname(string $lname){
      $this->$lname = $lname;
    }

    public function getLname() : string{
      return $this->lname;
    }

    public function setUsername(){
      $this->username = $username;
    }

    public function getUsername() : string{
      return $this->username;
    }

    public function setPassword(string $password){
      $this->$password = $password;
    }

    public function getPassword() : string{
      return $this->password;
    }

    public function setTelephone(string $telephone){
      $this->$telephone = $telephone;
    } 

    public function getTelephone() : string{
      return $this->telephone;
    }

    public function setType_ID(string $Type_ID){
      $this->$Type_ID = $Type_ID;
    } 

    public function getType_ID() : string{
      return $this->Type_ID;
    }

    public function setLast_Login(string $Last_Login){
      $this->$Last_Login = $Last_Login;
    } 

    public function getLast_Login() : string{
      return $this->Last_Login;
    }

    public function getData() : array{
      return array( 
                    "username" => $this->username ,
                    "fname"=> $this->fname ,
                    "lname" => $this->lname ,
                    "password" => $this->password,
                    "telephone" => $this->telephone
                    );
    }

    public function toString() : string{
      return  "Email: " . $this->email . "<br>" . 
              "First Name: " . $this->fname . "<br>" .
              "Last Name: " . $this->lname . "<br>" .
              "Username: " . $this->username . "<br>" .
              "Password: " . $this->password . "<br>" .
              "Telephone: " . $this->telephone . "<br>";
    }
  }
?>