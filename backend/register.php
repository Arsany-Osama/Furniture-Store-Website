<?php
  include_once('../../furniture/database/src/database.php');
  include_once('../../furniture/database/src/mail.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $_SESSION['source']= $_POST['source'];

    if ($_SESSION['source'] === "admin.html") {
      $_SESSION['fname'] = $_POST['fname'];
      $_SESSION['lname'] = $_POST['lname'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['ps'];
      $_SESSION['telephone'] = $_POST['telephone'];

      $database=new database();
      if ($database->adminExists($_SESSION['email'])) {
        header("Location:./../frontend/Admin_Dashboard/adminregister.html?error=1");
        exit;
    }
      $_SESSION['address'] = $_POST['address'];
      $_SESSION['country'] = $_POST['country'];
      $_SESSION['city'] = $_POST['city'];
       // Retrieve the values of the checkboxes
    $checkbox1 = isset($_POST['checkbox1']) ? $_POST['checkbox1'] : '';
    $checkbox2 = isset($_POST['checkbox2']) ? $_POST['checkbox2'] : '';
    $checkbox3 = isset($_POST['checkbox3']) ? $_POST['checkbox3'] : '';
    $checkbox4 = isset($_POST['checkbox4']) ? $_POST['checkbox4'] : '';
  
    // Store the checkbox values in the session or perform any other desired actions
    $_SESSION['checkbox1'] = $checkbox1;
    $_SESSION['checkbox2'] = $checkbox2;
    $_SESSION['checkbox3'] = $checkbox3;
    $_SESSION['checkbox4'] = $checkbox4;
    echo $_SESSION['checkbox1'];
    $perm="";
    if($_SESSION['checkbox1'] === "AC"){$perm = $perm . "A";}
    else{$perm = $perm . "x";}
    if($_SESSION['checkbox2'] === "RC"){$perm = $perm . "R";}
    else{$perm = $perm . "x";}
    if($_SESSION['checkbox3'] === "AP"){$perm = $perm . "A";}
    else{$perm = $perm . "x";}
    if($_SESSION['checkbox4'] === "RP"){$perm = $perm . "R";}
    else{$perm = $perm . "x";}

    $_SESSION['typeid'] = $database->getAdmin_Type($perm);
      echo $_SESSION['typeid'];
    $admin = new admin(
      $_SESSION['email'],//email
      $_SESSION['username'],    // username
      $_SESSION['password'], // password
       $_SESSION['fname'],    // fname
       $_SESSION['lname'],    // lname
       $_SESSION['telephone'],    // telephone
       $_SESSION['typeid']    // Type_ID
     );
     $_SESSION['adminData'] = $admin;

    $mail = new mail();  
      $code = mail::getRandNum(); 
      $mail->sendCodeOnMail($_POST['email'] , "Verification Code" , $code);
  
  
      $_SESSION['code'] = $code;
  
      // Redirect to verification page 
      sleep(5); // Waiting 5 Sec To Ensure That The msg Was Sent 
      header("Location: ./../frontend/verify.php");
  
      exit;
      
  
  
    } elseif ($_SESSION['source'] === "user.html") {
      $_SESSION['fname'] = $_POST['fname'];
      $_SESSION['lname'] = $_POST['lname'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['ps'];
      $_SESSION['telephone'] = $_POST['telephone'];

      $database=new database();
      if ($database->userExists($_SESSION['email'])) {
        header("Location:./../frontend/homepage.php?error=2");
        exit;
    }

      $_SESSION['address'] = $_POST['address'];
      $_SESSION['country'] = $_POST['country'];
      $_SESSION['city'] = $_POST['city'];
      
      // [1] Create User Object 
      $user = new user(
        $_SESSION['email'] , 
        $_SESSION['username'] , 
        $_SESSION['fname'],
        $_SESSION['lname'] , 
        $_SESSION['password'] ,
        $_SESSION['telephone']
      );
      
      // save the user
      $_SESSION['userData'] = $user;
  
  
      // [2] Create Email MSG
      $mail = new mail();  
      $code = mail::getRandNum(); 
      $mail->sendCodeOnMail($_POST['email'] , "Verification Code" , $code);
  
  
      $_SESSION['code'] = $code;
  
      // Redirect to verification page 
      sleep(5); // Waiting 5 Sec To Ensure That The msg Was Sent 
      header("Location: ./../frontend/verify.php");
  
      exit;
    } else {
      // Invalid source value
      echo "Invalid source";
    }
  
  } else {
    // No form submission
    echo "No submitting";
  }
?>
