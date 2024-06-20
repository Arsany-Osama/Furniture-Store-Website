<?php   
  session_start(); //to ensure you are using same session
  session_destroy(); //destroy the session

  // Get an array of all the cookies
$cookies = $_COOKIE;

// Loop through each cookie and set its expiration time to a past date
foreach ($cookies as $cookie_name => $cookie_value) {
    setcookie($cookie_name, '', time() - 3600, '/');
}

  header("location: ../frontend/index.php"); //to redirect back to "index.php" after logging out
  exit();
?>