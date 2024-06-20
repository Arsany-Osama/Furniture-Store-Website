<?php
    include_once('../../furniture/database/src/database.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];
        $database = new database();
        // Check if the user exists and the password is correct
        if($database->AdminLogin($email, $password)){
        $admin = $database->getAdminByEmail($email);
        $_SESSION['adminData'] = $admin;
            // header("Location: ../../../furniture/frontend/index.php");
        setcookie("fname" ,     $_SESSION['adminData']->getFname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("lname" ,     $_SESSION['adminData']->getLname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("username" ,  $_SESSION['adminData']->getUsername() ,  time() + 60 * 60 * 24 , "/");
        setcookie("Email" ,     $_SESSION['adminData']->getEmail() ,     time() + 60 * 60 * 24 , "/");
        setcookie("Telephone" , $_SESSION['adminData']->getTelephone() , time() + 60 * 60 * 24 , "/");
            header("Location: ../frontend/index.php");
            exit;
        }
        else if($database->UserLogin($email, $password)){
            $user = $database->getUserByEmail($email);
        $_SESSION['userData'] = $user;
            // header("Location: ../../../furniture/frontend/index.php");
        setcookie("fname" ,     $_SESSION['userData']->getFname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("lname" ,     $_SESSION['userData']->getLname() ,     time() + 60 * 60 * 24 , "/");
        setcookie("username" ,  $_SESSION['userData']->getUsername() ,  time() + 60 * 60 * 24 , "/");
        setcookie("Email" ,     $_SESSION['userData']->getEmail() ,     time() + 60 * 60 * 24 , "/");
        setcookie("Telephone" , $_SESSION['userData']->getTelephone() , time() + 60 * 60 * 24 , "/");
            header("Location: ../frontend/index.php");
            exit;
        }
        else{
            echo "Wrong Username or password";
            // header("Location: ../../../furniture/frontend/index.php");
            header("Location: ../frontend/homepage.php?error=1");
            exit;
        }
    }
?>
