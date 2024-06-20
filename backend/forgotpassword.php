<?php
session_start();
include_once('../../furniture/database/src/mail.php');
include_once('../../furniture/database/src/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {

    $email = $_POST['email'];
    $_SESSION['email']=$email;
    $database=new database();

    if ($database->userExists($email)) {

        $mail = new Mail();
        
        $code = $mail::getRandNum();

        if ($mail->sendCodeOnMail($email, "Verification Code", $code)) {

            $_SESSION['code'] = $code;
            $_SESSION['source'] ="forgotpassword.php";
            header("Location: ./../frontend/verify.php");
            exit;
        }
  }else{
    header("Location: ../frontend/homepage.php?error=1");
    exit;
  }
}
?>
