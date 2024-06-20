<?php
if($source == 'homepage'){
include_once('../database/src/database.php');
}else if($source == 'userproduct'){
    include_once('../../database/src/database.php');
}
$database = new database();
$categories = $database->getAllCategory();
?>