<?php
include_once('../../../furniture/database/src/database.php');
$database=new database();
$perm=$database->getAdminPermissionsByEmail($_COOKIE['Email']);
?>