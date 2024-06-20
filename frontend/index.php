<?php
session_start();
if (isset($_SESSION['userData'])) {
    header("Location: user.php");
    exit();
} elseif (isset($_SESSION['adminData'])) {
    header("Location: Admin_Dashboard/overview.php");
    exit();
} else {
    header("Location: homepage.php");
    exit();
}
?>