<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('../../furniture/database/src/database.php');
    $database=new database();
    $UserId=$database->getUserIdByEmail($_COOKIE['Email']);

    $newPassword = $_POST['newPassword'];

    $database->updateUserPassword($UserId, $newPassword);

    header("Location: ./../frontend/user.php?update=1");


    // Perform necessary operations with the passwords
    // ...
}
?>