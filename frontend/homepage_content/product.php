<?php
session_start();

if (!isset($_SESSION['userData'])) {
header('location:./../Errors/404.html');
}
 else{   
$categoryNameSelected = isset($_GET['category_name']) ? htmlspecialchars($_GET['category_name']) : 'No category selected';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="stylesheet" href="./CSS/product.css">
    <style>
        /* Simple styles for the suggestions dropdown */
        .suggestions {
            max-height: 210px;
            overflow-y: auto;
            position: absolute;
            background-color: whitesmoke;
            width: calc(100% - 24px); /* Adjust width to fit the input field */
            z-index: 1000;
        }

        .suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion:hover {
            background-color: #f0f0f0;
        }

        .tooltip {
            position: absolute;
            background-color: #333;
            color: #fff;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s;
        }
    </style>
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

    <div class="Page">
        <div id="topbar" class="topbar">
            <section class="flex">
                <div class="col">
                    <h2><i class="fa fa-home"></i>/ Products</h2>
                    <h5>All Products</h5>
                </div>

            </section>

            <div class="user-profile">
                My Cart
                <svg onclick="showCart()"  xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 200 200" fill="#252525">
                    <path
                        d="M75 71.09v-10c0-14.28 11.15-25.93 25-25.93s25 11.65 25 25.93v10h17.28A3.13 3.13 0 0 1 145.4 74l5.94 87.5a3.14 3.14 0 0 1-2.91 3.33H51.78a3.12 3.12 0 0 1-3.12-3.12v-.21L54.6 74a3.13 3.13 0 0 1 3.12-2.92Zm9.38 0h31.25v-10c0-9.19-7-16.56-15.63-16.56S84.38 51.9 84.38 61.09Zm-25.91 84.38h83.06l-5.08-75H63.56Z">
                    </path>
                </svg>
                <img src="img/profile.jpg" alt="Profile Icon" onclick="toggleDropdown('Account-dropdown')">
                <div id="Account-dropdown" class="dropdown-content">
                    <div class="input">
                        <a href="./profile.php"><button class="value">
                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2">
                                    <path fill="#7D8590"
                                        d="m1.5 13v1a.5.5 0 0 0 .3379.4731 18.9718 18.9718 0 0 0 6.1621 1.0269 18.9629 18.9629 0 0 0 6.1621-1.0269.5.5 0 0 0 .3379-.4731v-1a6.5083 6.5083 0 0 0 -4.461-6.1676 3.5 3.5 0 1 0 -4.078 0 6.5083 6.5083 0 0 0 -4.461 6.1676zm4-9a2.5 2.5 0 1 1 2.5 2.5 2.5026 2.5026 0 0 1 -2.5-2.5zm2.5 3.5a5.5066 5.5066 0 0 1 5.5 5.5v.6392a18.08 18.08 0 0 1 -11 0v-.6392a5.5066 5.5066 0 0 1 5.5-5.5z">
                                    </path>
                                </svg>
                                Your Profile
                            </button></a>
                       
                        

                        <a href="#cart"><button class="value" href="#Setting">
                                <svg id="Line" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#7D8590" id="XMLID_1646_"
                                        d="m17.074 30h-2.148c-1.038 0-1.914-.811-1.994-1.846l-.125-1.635c-.687-.208-1.351-.484-1.985-.824l-1.246 1.067c-.788.677-1.98.631-2.715-.104l-1.52-1.52c-.734-.734-.78-1.927-.104-2.715l1.067-1.246c-.34-.635-.616-1.299-.824-1.985l-1.634-.125c-1.035-.079-1.846-.955-1.846-1.993v-2.148c0-1.038.811-1.914 1.846-1.994l1.635-.125c.208-.687.484-1.351.824-1.985l-1.068-1.247c-.676-.788-.631-1.98.104-2.715l1.52-1.52c.734-.734 1.927-.779 2.715-.104l1.246 1.067c.635-.34 1.299-.616 1.985-.824l.125-1.634c.08-1.034.956-1.845 1.994-1.845h2.148c1.038 0 1.914.811 1.994 1.846l.125 1.635c.687.208 1.351.484 1.985.824l1.246-1.067c.787-.676 1.98-.631 2.715.104l1.52 1.52c.734.734.78 1.927.104 2.715l-1.067 1.246c.34.635.616 1.299.824 1.985l1.634.125c1.035.079 1.846.955 1.846 1.993v2.148c0 1.038-.811 1.914-1.846 1.994l-1.635.125c-.208.687-.484 1.351-.824 1.985l1.067 1.246c.677.788.631 1.98-.104 2.715l-1.52 1.52c-.734.734-1.928.78-2.715.104l-1.246-1.067c-.635.34-1.299.616-1.985.824l-.125 1.634c-.079 1.035-.955 1.846-1.993 1.846zm-5.835-6.373c.848.53 1.768.912 2.734 1.135.426.099.739.462.772.898l.18 2.341 2.149-.001.18-2.34c.033-.437.347-.8.772-.898.967-.223 1.887-.604 2.734-1.135.371-.232.849-.197 1.181.089l1.784 1.529 1.52-1.52-1.529-1.784c-.285-.332-.321-.811-.089-1.181.53-.848.912-1.768 1.135-2.734.099-.426.462-.739.898-.772l2.341-.18h-.001v-2.148l-2.34-.18c-.437-.033-.8-.347-.898-.772-.223-.967-.604-1.887-1.135-2.734-.232-.37-.196-.849.089-1.181l1.529-1.784-1.52-1.52-1.784 1.529c-.332.286-.81.321-1.181.089-.848-.53-1.768-.912-2.734-1.135-.426-.099-.739-.462-.772-.898l-.18-2.341-2.148.001-.18 2.34c-.033.437-.347.8-.772.898-.967.223-1.887.604-2.734 1.135-.37.232-.849.197-1.181-.089l-1.785-1.529-1.52 1.52 1.529 1.784c.285.332.321.811.089 1.181-.53.848-.912 1.768-1.135 2.734-.099.426-.462.739-.898.772l-2.341.18.002 2.148 2.34.18c.437.033.8.347.898.772.223.967.604 1.887 1.135 2.734.232.37.196.849-.089 1.181l-1.529 1.784 1.52 1.52 1.784-1.529c.332-.287.813-.32 1.18-.089z">
                                    </path>
                                    <path id="XMLID_1645_" fill="#7D8590"
                                        d="m16 23c-3.859 0-7-3.141-7-7s3.141-7 7-7 7 3.141 7 7-3.141 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z">
                                    </path>
                                </svg>
                                Setting
                            </button></a>
                    </div>
                </div>

                <span class="username"><span class="username"><?php echo $_COOKIE['fname']." ".$_COOKIE['lname'];  ?></span></span>
                <div class="notification">
                    <div class="bell-container">
                        <div class="bell" onclick="toggleDropdown('navigation-dropdown')"></div>
                    </div>
                </div>

                <div id="navigation-dropdown" class="dropdown-content">
                    <div class="card">
                        <div class="header">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <p class="alert">New message!</p>
                            <button onclick="toggleDropdown('navigation-dropdown')" class="closeButton">x</button>
                        </div>

                        <p class="message">
                            Welcome to 3am!

                            Discover beautiful furniture that turns your house into a home. From modern to classic
                            designs, we have something for every style and need. Enjoy browsing our collections and find
                            the perfect pieces for your space.

                            Happy shopping!

                            Warm regards,
                            The 3am Team
                        </p>

                        <div class="actions">
                            <a href="" class="read"> Take a Look </a>

                            <a href="" class="mark-as-read"> Mark as Read </a>
                        </div>
                    </div>
                </div>
                <script>
                    function toggleDropdown(dropdownId) {
                        var dropdown = document.getElementById(dropdownId);
                        if (dropdown.style.display === "block") {
                            dropdown.style.display = "none";
                        } else {
                            dropdown.style.display = "block";
                        }
                    }
                </script>
            </div>
        </div>
        <div id="overlay" class="overlay">
            <div class="dialog-box">
                <span class="close-btn" onclick="document.getElementById('overlay').style.display = 'none'">✖</span>
                <h2>Your Cart</h2>
                <div id="cartItems">
                    <div class="cart-item"></div>
                </div>
                <div class="Total-Price" id="Total-Price"></div>
                <button class="checkout-btn" onclick="checkout()">Checkout</button>
            </div>
        </div>


        <script>
            function removeItem() {
    // Get the clicked remove button and its parent cart item container
    var removeButton = event.target;
    var cartItem = removeButton.parentNode;

    // Remove the cart item from the cartItems container
    var cartItems = document.getElementById("cartItems");
    cartItems.removeChild(cartItem);

    // Retrieve the stored product ID from the cookies
    var storedId = getCookie("id");

    // Check if the stored ID matches the ID of the removed item
    if (storedId && storedId === cartItem.dataset.id) {
        // Delete the corresponding cookies
        document.cookie = "productName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "productPrice=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "img=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
}

function checkout() {
    console.log('Checkout button clicked'); // Debug statement

    // Retrieve the cart from session storage
    var cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Create an array to store product IDs and quantities
    var checkoutData = [];

    // Populate the checkoutData array with product IDs and quantities
    cart.forEach(function(product) {
        checkoutData.push({
            id: product.id,
            quantity: product.quantity || 1 // Default to 1 if quantity is undefined
        });
    });

    console.log('Checkout data:', checkoutData); // Debug statement

    // Create a new FormData object
    var formData = new FormData();

    // Append each product ID and quantity to the FormData object
    checkoutData.forEach(function(item) {
        formData.append('productId[]', item.id);
        formData.append('quantity[]', item.quantity);
    });

    // Send the data via a POST request
    fetch('../../backend/checkout.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Success:', data); // Debug statement

        // Handle success (e.g., redirect to a success page, clear the cart, etc.)
        alert('Checkout completed successfully');
        sessionStorage.removeItem('cart'); // Clear the cart
        document.getElementById('overlay').style.display = 'none'; // Hide the overlay

        // Reload the page after the user clicks OK on the alert
        window.location.reload();
    })
    .catch(error => {
        console.error('Error:', error); // Debug statement
        alert('An error occurred during checkout. Please try again.');
    });
}




        </script>

        <script>document.addEventListener('DOMContentLoaded', function () {
                var header = document.getElementById('topbar');

                window.addEventListener('scroll', function () {
                    if (window.scrollY > 0) {
                        header.classList.add('topbar-Scroll');
                    } else {
                        header.classList.remove('topbar-Scroll');
                    }
                });
            });
        </script>
        <main>
            <div class="flex">
            <div class="Advanced-Filter">
                <h2>Advanced Filter</h2>
                <br>
                <hr>
                <br>
                <h4>Price Filteration</h4><br>
                <form id="filter-form" action="./../../backend/userproduct.php" method="post">
                    <input type="hidden" name="source" value="filter">
                    <input type="hidden" id="hidden-price" name="price" value="">
                    <input type="hidden" id="hidden-category" name="category" value="">
                    <div class="card-conteiner">
                        <div class="card-content">
                            <div class="card-title">Price <span>Range</span></div>
                            <div class="values">
                                <div>$<span id="first">0</span></div> -
                                <div>$<span id="second">10000</span></div>
                            </div>
                            <small class="current-range">
                              <i> <b>Current Range (Max. Price):</b> </i>
                                <div>$<span id="third">10000</span></div>
                            </small>
                            <div data-range="#third" data-value-1="#second" data-value-0="#first" class="slider">
                                <label class="label-min-value">0</label>
                                <label class="label-max-value">10,000</label>
                            </div>
                            <div class="rangeslider">
                                <input class="min input-ranges" name="range_1" type="range" min="0" max="10000" value="0">
                                <input class="max input-ranges" name="range_1" type="range" min="0" max="10000" value="10000">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="flex-line">
                        <hr class="line">
                        <span>Or</span>
                        <hr class="line">
                    </div>
                    <div class="price-box">
                        <h4>Max. Price </h4>
                        <div class="flex-price">
                            <button type="button" class="price-button" id="price-increase">+</button>
                            <input type="number" id="price-input" class="price-box" aria-valuemin="0" aria-valuemax="1000" value="10000">
                            <button type="button" class="price-button b2" id="price-decrease">-</button>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="Apply" onclick="applyFilter()">Apply Filter</button>
                    <br> <br>
                    <button type="button" class="Apply" onclick="window.location.href='./../../backend/unset_cookie.php';" <?php if (!isset($_COOKIE['filtered_products'])) echo 'hidden'; ?>>Reset</button>
                    <hr>
                    <br>
                    <!-- the sub-Categories has been added by Admins -->
                    <h4>Choose Category:</h4>
                    <?php 
                        $source='userproduct';
                        include_once("./../../backend/allcategories.php") ?>
                    <div class="Sub-Categories">
                        <?php foreach ($categories as $category): ?>
                            <label class="sub-category">
                                <input type="radio" name="category" value="<?= htmlspecialchars($category['name']) ?>">
                                <span><?= htmlspecialchars($category['name']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div class="card-your-plan-state">
                        <h4>Free Delivery</h4>
                        <p>Now you can enjoy with limited <br> <b>free delivery</b> </p>
                    </div>
                    <br>
                </form>
            </div>

            <script>
                // Function to apply the filter and send the form data
                function applyFilter() {
                    const price = document.getElementById('third').textContent.trim();
                    const categoryElement = document.querySelector('input[name="category"]:checked');
                    const hiddenPriceInput = document.getElementById('hidden-price');
                    const hiddenCategoryInput = document.getElementById('hidden-category');
                    const form = document.getElementById('filter-form');

                    // Set the hidden inputs' values
                    hiddenPriceInput.value = price;

                    if (categoryElement) {
                        hiddenCategoryInput.value = categoryElement.value;
                    } else {
                        hiddenCategoryInput.value = '';
                    }

                    // Submit the form
                    form.submit();
                }

                // Existing script for updating range and current price
                const rangeMin = document.querySelector('.min');
                const rangeMax = document.querySelector('.max');
                const firstSpan = document.getElementById('first');
                const secondSpan = document.getElementById('second');
                const thirdSpan = document.getElementById('third');

                rangeMin.addEventListener('input', updateRange);
                rangeMax.addEventListener('input', updateRange);

                function updateRange() {
                    const minVal = parseInt(rangeMin.value);
                    const maxVal = parseInt(rangeMax.value);

                    if (minVal > maxVal) {
                        rangeMin.value = maxVal;
                    }

                    firstSpan.textContent = rangeMin.value;
                    secondSpan.textContent = rangeMax.value;
                }

                rangeMin.addEventListener('input', updateCurrentPrice);
                rangeMax.addEventListener('input', updateCurrentPrice);

                function updateCurrentPrice() {
                    const minVal = parseInt(rangeMin.value);
                    const maxVal = parseInt(rangeMax.value);
                    //const currentPrice = Math.min(Math.max(parseInt(thirdSpan.textContent), minVal), maxVal);
                    const currentPrice = eval(maxVal-minVal);
                    thirdSpan.textContent = currentPrice;
                }

                // Price Input Box with Increment and Decrement
                const priceInput = document.getElementById('price-input');
                const priceIncreaseButton = document.getElementById('price-increase');
                const priceDecreaseButton = document.getElementById('price-decrease');

                priceIncreaseButton.addEventListener('click', () => {
                    priceInput.value = Math.min(parseInt(priceInput.value) + 1, 10000);
                    updateCurrentPriceWithInput();
                });

                priceDecreaseButton.addEventListener('click', () => {
                    priceInput.value = Math.max(parseInt(priceInput.value) - 1, 1);
                    updateCurrentPriceWithInput();
                });

                priceInput.addEventListener('input', () => {
                    const value = parseInt(priceInput.value);
                    priceInput.value = Math.min(Math.max(value, 1), 10000);
                    updateCurrentPriceWithInput();
                });

                function updateCurrentPriceWithInput() {
                    thirdSpan.textContent = priceInput.value;
                }
            </script>
                <div class="Search-bar-col">
                    <div class="search-flex">
                        <div class="search-col">
                            <form id="searchForm" method="POST" action="./../../backend/search.php">
                            <div class="search-box-bar">
                            <input type="search" class="search" placeholder="search for a product" id="searchInput" name="productName">
                            <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("searchInput");
            const tooltip = document.createElement("div");
            tooltip.className = "tooltip";
            tooltip.textContent = "While writing, when some suggestions appear, you can press Enter to see them all";
            document.body.appendChild(tooltip);

            searchInput.addEventListener("mouseover", function (event) {
                const rect = searchInput.getBoundingClientRect();
                tooltip.style.left = `${rect.left + window.scrollX}px`;
                tooltip.style.top = `${rect.bottom + window.scrollY - 45}px`;
                tooltip.style.visibility = "visible";
                tooltip.style.opacity = "1";
            });

            searchInput.addEventListener("mouseout", function () {
                tooltip.style.visibility = "hidden";
                tooltip.style.opacity = "0";
            });
        });
    </script>
                            <button class="Search-button" id="searchButton">Search</button>
                            </form>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div id="suggestions" class="suggestions"></div>
                            <!-- Display search results here -->
                    <div id="searchResults"></div>
                    <?php include './../../backend/userproduct.php'; ?>
                    <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const searchInput = document.getElementById('searchInput');
                        const suggestionsBox = document.getElementById('suggestions');

                        let products = <?php echo json_encode($products); ?>;

                        searchInput.addEventListener('input', function() {
                            const query = this.value.toLowerCase();
                            suggestionsBox.innerHTML = '';

                            if (query.length > 0) {
                                const filteredProducts = products.filter(product => product.name.toLowerCase().includes(query));
                                filteredProducts.forEach(product => {
                                    const suggestion = document.createElement('div');
                                    suggestion.classList.add('suggestion');
                                    suggestion.innerText = product.name;
                                    suggestion.addEventListener('click', () => {
                                        searchInput.value = product.name;
                                        suggestionsBox.innerHTML = '';
                                    });
                                    suggestionsBox.appendChild(suggestion);
                                });
                            }
                        });
                    });
                    </script>
                    
                    <div class="scrollable-container ">
                        <div class="product-container" id="productContainer">
                            <div class="custom-dialog-container" id="custom-dialog">
                                <div class="custom-card">
                                    <div class="custom-card-wrapper">
                                        <div class="custom-card-icon">
                                            <div class="custom-icon-cart-box">
                                                <svg viewBox="0 0 576 512" width="20" height="20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"
                                                        fill="#009688"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="custom-card-content">
                                            <div class="custom-card-title-wrapper">
                                                <span class="custom-card-title">Added to cart!</span>
                                                <span class="custom-card-action">
                                                    <svg viewBox="0 0 384 512" width="15" height="15"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="custom-product-name"></div>
                                            <div class="custom-product-price"></div>
                                            <button onclick="showCart()" class="custom-btn-view-cart" type="button">View Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <script>
                                function showCart() {
    // Retrieve the cart from session storage
    var cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    var cartItemsContainer = document.getElementById("cartItems");
    var totalPriceContainer = document.getElementById("Total-Price");

    // Clear any existing items and total price in the cart display
    cartItemsContainer.innerHTML = '';

    var totalPrice = 0;

    // Create a map to store product quantities
    var productMap = {};

    // Populate the product map with quantities
    cart.forEach(function(product) {
        if (productMap[product.id]) {
            productMap[product.id].quantity++;
        } else {
            productMap[product.id] = {
                ...product,
                quantity: 1
            };
        }
    });

    if (cart.length > 0) {
        for (var productId in productMap) {
            var product = productMap[productId];

            // Create a cart item element
            var cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");
            cartItem.innerHTML = `
                <img src="${product.img}" alt="${product.name}">
                <div class="item-details">
                    <p><strong>${product.name}</strong></p>
                    <p>Price: $${product.price}</p>
                    <p>Quantity: ${product.quantity}</p>
                </div>
                <button class="action-btn" onclick="removeItem('${product.id}')">Remove</button>
            `;

            // Append the cart item to the cartItems container
            cartItemsContainer.appendChild(cartItem);

            // Calculate the total price
            totalPrice += parseFloat(product.price) * product.quantity;
        }

        // Update the total price in the HTML
        totalPriceContainer.innerText = 'Total is $' + totalPrice.toFixed(2);
    } else {
        // If no products are stored, display "No products added to cart"
        cartItemsContainer.innerHTML = "No products added to cart";
        totalPriceContainer.innerText = '';
        cartItemsContainer.style.display = 'block';
    }

    // Display the overlay
    document.getElementById('overlay').style.display = 'flex';
}


                                // Sample removeItem function to remove an item from the cart
                                function removeItem(id) {
    // Retrieve the cart from session storage
    var cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Create a map to store product quantities
    var productMap = {};

    // Populate the product map with quantities
    cart.forEach(function(product) {
        if (productMap[product.id]) {
            productMap[product.id].quantity++;
        } else {
            productMap[product.id] = {
                ...product,
                quantity: 1
            };
        }
    });

    // Check the quantity of the product to be removed
    if (productMap[id]) {
        if (productMap[id].quantity > 1) {
            // Decrease quantity by 1
            productMap[id].quantity--;

            // Update the cart
            cart = cart.filter(function(product) {
                return product.id !== id;
            });

            // Add the product back with decreased quantity
            for (var i = 0; i < productMap[id].quantity; i++) {
                cart.push(productMap[id]);
            }
        } else {
            // Remove the product if quantity is 1
            cart = cart.filter(function(product) {
                return product.id !== id;
            });
        }
    }

    // Save the updated cart back to session storage
    sessionStorage.setItem('cart', JSON.stringify(cart));

    // Refresh the cart display
    showCart();
}

                            </script>
                            
                            <?php
                            include './../../backend/userproduct.php';
                            if(isset($_COOKIE['filtered_products']) && isset($_SESSION['products'])){
                                $products = [];
                                $serialized_products = $_COOKIE['filtered_products'];
                                $products = unserialize($serialized_products);
                                //unset($_COOKIE['filtered_products']);
                            }else{
                                $products = [];
                                $products = $_SESSION['products'];
                                //unset($_SESSION['products']); 
                            }

                                if (empty($products)) {
                                    echo "No products stored to display (Press Reset Button if it's visible)";
                                } else {
                                ?>
                                    <div class="product-container">
                                        <?php foreach ($products as $product) { ?>
                                            <div class="product-card" style="background-image: url('<?php echo "./../IMG/" . $product['image']; ?>');">
                                                <div class="product-info">
                                                    <h2 class="product-name"><?php echo $product['name']; ?></h2>
                                                    <p class="product-category">Category: <?php echo $product['category_name']; ?></p>
                                                    <?php
                                                    $discount = $product['discount'];
                                                    $price = $product['price'];
                                                    if ($discount > 0) {
                                                        $discountedPrice = $price - ($price * $discount / 100);
                                                        echo '<del>$' . number_format($price, 2) . '</del> $' . number_format($product['DiscPrice'], 2);
                                                    } else {
                                                        $discountedPrice = $price;
                                                    ?>
                                                        <p class="product-price">$<?php echo number_format($price, 2); ?></p>
                                                    <?php } $product['price']=$discountedPrice; ?>
                                                    <p class="product-price">Inventory: <?php echo $product['quantity']; ?></p>
                                                    <div class="flex-line">
                                                        <button class="details-button" onclick="show('<?php echo $product['name']; ?>', '<?php echo $product['category_name']; ?>', '<?php echo $product['DiscPrice']; ?>', '<?php echo $product['description']; ?>', '<?php echo $product['created_at']; ?>', '<?php echo $product['modified_at']; ?>')">Show Details</button>
                                                        <button class="details-button" onclick="showAndHideCustomDialog('<?php echo $product['name']; ?>', '<?php echo $product['DiscPrice']; ?>','<?php echo './../IMG/' . $product['image']; ?>','<?php echo $product['id']; ?>')">Add To Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <script>
                    // Function to show the dialog with a slide-in effect from the right
                    function showAndHideCustomDialog(name, price, img, id) {
                        var dialog = document.getElementById('custom-dialog');

                        // Ensure the dialog is visible before starting the slide-in effect
                        dialog.style.display = 'block';

                        // Show the dialog with a slide-in effect
                        setTimeout(function () {
                            dialog.style.right = '20px'; // Slide in to 20px from the right
                        }, 10); // Small delay to ensure the display change is registered

                        // Retrieve the cart from session storage or initialize it if it doesn't exist
                        var cart = JSON.parse(sessionStorage.getItem('cart')) || [];

                        // Check if the product ID is already in the cart
                        var productExists = cart.some(function(product) {
                            return product.id === id;
                        });

                        if (productExists) {
                            // Product with the same ID is already added
                            dialog.getElementsByClassName('custom-card-title')[0].textContent = name + ' +1';
                            dialog.getElementsByClassName('custom-product-name')[0].textContent = 'Quantity of ' + name + ' increased by 1';
                            dialog.getElementsByClassName('custom-product-price')[0].textContent = '$' + price;
                            // Add the new product to the cart array
                            cart.push({
                                name: name,
                                price: price,
                                img: img,
                                id: id
                            });

                            // Save the updated cart in session storage
                            sessionStorage.setItem('cart', JSON.stringify(cart));
                        } else {
                            // Set the product name and discounted price
                            dialog.getElementsByClassName('custom-card-title')[0].textContent = 'Added to cart!';
                            dialog.getElementsByClassName('custom-product-name')[0].textContent = name;
                            dialog.getElementsByClassName('custom-product-price')[0].textContent = '$' + price;

                            // Add the new product to the cart array
                            cart.push({
                                name: name,
                                price: price,
                                img: img,
                                id: id
                            });

                            // Save the updated cart in session storage
                            sessionStorage.setItem('cart', JSON.stringify(cart));
                        }

                        // Automatically hide the dialog after 3 seconds
                        setTimeout(function () {
                            dialog.style.right = '-100%'; // Slide out to the right again
                            setTimeout(function () {
                                dialog.style.display = 'none';
                            }, 300); // Hide the dialog after the slide-out animation
                        }, 3000); // Show the dialog for 3 seconds
                    }


                function show(name, category, price, descripe, create_at, modify_at) {
                 var details = "Product Name: " + name + 
                  "<br>Category: " + category + 
                  "<br>Price: " + price +
                  "<br>Description: " + descripe +
                  "<br>Created At: " + create_at +
                  "<br>Modified At: " + modify_at;
                 window.open("", "_blank", "width=400,height=300").document.write(details);
                }
                </script>
        </main>
    </div>
    <footer>
        <div class="rect">
            <p>Tables <br> Lamps <br> Chairs <br> For kids</p>
            <div class="col-footer">
                <div class="footer-content-1">
                    <h1>3am</h1>
                    <span>Support</span>
                </div>
                <div class="footer-content-1">
                    <h1>For designers </h1>
                    <span>Articles</span>
                    <span>Blog</span>
                </div>

            </div>
        </div>
        <div class="flex-footer">
            <h3>&copy;2024 Copyright</h3>
            <ul class="example-2">
                <li class="icon-content">
                    <a href="https://linkedin.com/" aria-label="LinkedIn" data-social="linkedin">
                        <div class="filled"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-linkedin" viewBox="0 0 16 16" xml:space="preserve">
                            <path
                                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                    <div class="tooltip">LinkedIn</div>
                </li>
                <li class="icon-content">
                    <a href="https://www.github.com/" aria-label="GitHub" data-social="github">
                        <div class="filled"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-github" viewBox="0 0 16 16" xml:space="preserve">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                    <div class="tooltip">GitHub</div>
                </li>
                <li class="icon-content">
                    <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram">
                        <div class="filled"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                    <div class="tooltip">Instagram</div>
                </li>
                <li class="icon-content">
                    <a href="https://youtube.com/" aria-label="Youtube" data-social="youtube">
                        <div class="filled"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-youtube" viewBox="0 0 16 16" xml:space="preserve">
                            <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                    <div class="tooltip">Youtube</div>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>
<?php } ?>