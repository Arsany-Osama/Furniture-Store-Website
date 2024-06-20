<?php
$email = $_COOKIE['Email'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

include_once('../../furniture/database/src/database.php');
$database = new database();

if ($_POST['source'] === "delete")
{
    $database->removeProductCategory($_POST['id']);
    header("Location: ../frontend/Admin_Dashboard/Categories.php");
}

if ($_POST['source'] === "edit")
{
    $database->updateProductCategory($_POST['edit_name'], $_POST['number']);
    header("Location: ../frontend/Admin_Dashboard/Categories.php");
}

$category_name = $_POST['name'];

$id = $database->getAdminIdByEmail($email);

$database->addProductCategory($category_name, $id);

header("Location: ../frontend/Admin_Dashboard/Categories.php");
}
else{
    include_once('../../../furniture/database/src/database.php');
    $database = new database();

    $categories = $database->DisplayCategories($email);
}
?>