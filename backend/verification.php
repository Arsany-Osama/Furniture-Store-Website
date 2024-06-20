<?php
  include('../database/src/database.php');
  // include('../src/database.php');
  session_start();
  if(isset($_SERVER["REQUEST_METHOD"]) == "POST"){
      $code = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'] . $_POST['digit5'];

      if($_SESSION['code'] == $code){

        if ($_SESSION['source'] === "admin.html") {
          $database=new database();
          
          //echo $_SESSION['typeid'];
           $database->addPerson($_SESSION['adminData']);
           $admin_id = $database->getAdminIdByEmail($_SESSION['adminData']->getEmail());
           $database->setAddressToAdmin($admin_id, $_SESSION['address'], $_SESSION['country'], $_SESSION['city']);

        setcookie("fname" ,     $_SESSION['adminData']->getFname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("lname" ,     $_SESSION['adminData']->getLname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("username" ,  $_SESSION['adminData']->getUsername() ,  time() + 60 * 60 * 24 , "/");
        setcookie("Email" ,     $_SESSION['adminData']->getEmail() ,     time() + 60 * 60 * 24 , "/");
        setcookie("Telephone" , $_SESSION['adminData']->getTelephone() , time() + 60 * 60 * 24 , "/");
        
        sleep(3);
        // header("Location: ../../../furniture/frontend/index.php");
        header("Location: ../frontend/Admin_Dashboard/overview.php");
        }
        else if ($_SESSION['source'] === "user.html") {
         $database=new database();// send user to the database
        $database->addPerson($_SESSION['userData']);

        
        $user_id = $database->getUserIdByEmail($_SESSION['userData']->getEmail());
        $useraddress = $database->setAddressToUser($user_id, $_SESSION['address'], $_SESSION['country'], $_SESSION['city']);
        // Cookies
        // setcookie(name , value , expire , path , domain , secure , http_only);
        // time() --> return the current time
        // time() * sec * min * hour ==> 1 Day


        setcookie("fname" ,     $_SESSION['userData']->getFname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("lname" ,     $_SESSION['userData']->getLname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("username" ,  $_SESSION['userData']->getUsername() ,  time() + 60 * 60 * 24 , "/");
        setcookie("Email" ,     $_SESSION['userData']->getEmail() ,     time() + 60 * 60 * 24 , "/");
        setcookie("Telephone" , $_SESSION['userData']->getTelephone() , time() + 60 * 60 * 24 , "/");

        /**
         * $_COOKIE['variable_name'] ===> return it's value
         * EX:
         * $_COOKIE['fname'] = arsany
         * 
         * In Login Page 
         * Don't Access To Database
         * Just Check Any Variable In The Cookies Exists Or Not
         *  If Exists --> go to home page
         *  else send message to user(You Have Not Registered Before (Register Now))
         * 
         * You Can See The Cookies In The Following Path In Chrome
         * inspect --> application --> cookies
         */

        sleep(3);
        // header("Location: ../../../furniture/frontend/index.php");
        header("Location: ../frontend/index.php");
        }
        else if ($_SESSION['source'] === "forgotpassword.php") {
          $database=new database();
          $_SESSION['userData']=$database->getUserByEmail($_SESSION['email']);
          setcookie("fname" ,     $_SESSION['userData']->getFname() ,     time() + 60 * 60 * 24 , "/");
          setcookie("lname" ,     $_SESSION['userData']->getLname() ,     time() + 60 * 60 * 24 , "/");
          setcookie("username" ,  $_SESSION['userData']->getUsername() ,  time() + 60 * 60 * 24 , "/");
          setcookie("Email" ,     $_SESSION['userData']->getEmail() ,     time() + 60 * 60 * 24 , "/");
          setcookie("Telephone" , $_SESSION['userData']->getTelephone() , time() + 60 * 60 * 24 , "/");
          header("Location: ./../frontend/changepassword.php");
        }
      }else{
        // i will send error flag to indicate the user write incorrect verification code
        header("Location: ./../frontend/verify.php?error=1"); 
        exit;
      }
    
  }
?>