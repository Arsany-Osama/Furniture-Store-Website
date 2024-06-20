<?php
    include_once('./../../furniture/database/src/database.php');
    $database = new database();
    $UserId=$database->getUserIdByEmail($_COOKIE['Email']);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'username' => $_POST['username'],
            'telephone' => $_POST['phone'],
            'city' => $_POST['city'],
            'country' => $_POST['country'],
            'address' => $_POST['address']
        ];
    
        $database->updateUserDetails($UserId, $_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['phone'], $_POST['city'], $_POST['country'], $_POST['address']);
    
        header('location: ./../frontend/homepage_content/profile.php');
        exit();
    }

?>