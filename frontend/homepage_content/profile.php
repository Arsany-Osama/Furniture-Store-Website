<?php 
session_start();

if (!isset($_SESSION['userData'])) {
header('location:./../Errors/404.html');
}
 else{   
include_once('../../backend/userprofile.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/product.css">
    <link rel="stylesheet" href="../CSS/profile.css">
</head>

<body>


   <!--Menu Sidebar-->

   <div class="menu">
    <div class="logo-content">
        <div class="logo">TripleAM</div>
        <i class='bx bx-menu' id="btn"></i>

    </div>
    <ul class="nav">

        <li>
            <a href="./../index.php">
                <i class='bx bx-home-alt'></i>
                <span class="links">Home</span>
            </a>
        </li>
        <li>
            <a href="./product.php">
                <i class='bx bx-grid'></i>
                <span class="links">Products</span>
            </a>
        </li>
        <li>
            <a href="./../user.php#category">
                <i class='bx bx-grid-alt'></i>
                <span class="links">Categories</span>
            </a>
        </li>
        <li>
            <a href="./Orders.php">
                <i class='fa fa-shopping-cart'></i>
                <span class="links">Orders</span>
            </a>
        </li>
        <li>
            <a href="./aboutUs.html">
                <i class='bx bx-smile'></i>
                <span class="links">About</span>
            </a>
        </li>
        <li>
            <a href="./../../backend/logout.php">
                <i class='bx bx-log-out-circle'></i>
                <span class="links">Logout</span>
            </a>
        </li>
    </ul>
</div>

<!--Menu slider using JS-->

<script>
    let btn = document.querySelector("#btn")
    let menu = document.querySelector(".menu")

    btn.onclick = function () {
        menu.classList.toggle("active");
    }

    document.addEventListener("click", function (event) {
        if (!menu.contains(event.target) && !btn.contains(event.target)) {
            menu.classList.remove("active");
        }
    });
</script>



    <!--Page contents-->

    <div class="content">

<div class="greeting">
    <h1 class="name"><span>Hello,</span>  <br><?php echo $_COOKIE['fname']; ?></h1>
    <p>Track your account here</p>
    <i class='bx bxs-sun' style='color:#ffe800' ></i>    <div class="bg"></div>
</div>


        <div class="user-info">
        <p id="country-info"><span>Username:</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_COOKIE['username']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p id="email-info"><span>Address:</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $addresses['address']; ?></p>
            <p id="email-info"><span>City:</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $addresses['city']; ?></p>
            <p id="email-info"><span>Country:</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $addresses['country']; ?></p>
            <p id="phone-info"><span>Phone:</span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_COOKIE['Telephone']; ?></p>
            <button type="button" class="user-btn" id="edit-btn">Edit info</button>
           
            <script>
                // Get the button element
var editBtn = document.getElementById("edit-btn");

// Add a click event listener to the button
editBtn.addEventListener("click", function() {
  // Redirect the user to another page
  window.location.href = "info.html";
});
            </script>
        </div>

        
        <div class="spendings">
            <h1>Highest Product price Purchased</h1>
            <p class="spent"><?php echo $HighestProduct['product_name']; ?></p>
            <br>
            <p class="desc">Purchased price is <?php echo "$".$HighestProduct['price']; ?></p>
            <i class='bx bx-wallet-alt' style='color:#6f3908'  ></i>
        </div>

<div class="last-purchased">
    <h1>Last Purchased</h1>
    <p class="item"><?php echo $LastProduct['product_name']; ?></p>
    <p class="desc">bought <?php echo $LastProduct['total_boughts']; ?> times of people who <br> visited this product </p>
    <i class='bx bx-purchase-tag-alt' style='color:#220044'  ></i>
</div>

<div class="hours">
    <h1>Total spendings</h1>
    <p class="hrs"><?php echo $TotalSpendings; ?></p>
    <i class='bx bx-hourglass' style='color:#220044' ></i>
</div>

<div class="head">
    <h1>Account information</h1>
</div>

</div>

</body>

</html>

<?php } ?>