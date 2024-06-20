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
  <title>Furniture Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Abel&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./../Admin_Dashboard/css/dashboardStyle.css">
  <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="stylesheet" href="./CSS/product.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <!-- Page content -->
    <div id="page" class="page">
      <!-- Top bar (header) -->
      <div id="topbar" class="topbar">
            <section class="flex">
                <div class="col">
                    <h2><i class="fa fa-home"></i>/ Orders</h2>
                    <h5>All Orders</h5>
                </div>

            </section>

            <div class="user-profile">
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
      <!-- Initial content -->
      <div id="content" class="content">
        <div class="overview">
          <div class="a_card">
            <div class="tttt">
              <table>
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price paid</th>
                    <th>Order Quantity</th>
                    <th>Created at</th>
                    <th>Last Modification</th>
                    <th>Remove Product</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include './../../backend/allOrders.php';

                  foreach ($orders as $order) {

                    $orderId = $order['order_id'];
                    $user = $_COOKIE['fname'] . " " . $_COOKIE['lname'];
                    $productName = $order['product_name'];
                    $productImage = "./../IMG/".$order['product_image'];
                    $pricePaid = $order['price_paid'];
                    $orderQuantity = $order['quantity'];
                    $createdAt = $order['created_at'];
                    $lastModification = $order['modified_at'];
                  ?>
                    <tr>
                      <td><?php echo $orderId; ?></td>
                      <td>
                        <div class="a_profile-container">
                          <img src="img/profile.jpg" alt="Profile Icon">
                          <span class="a_user-name"><?php echo $user; ?></span>
                        </div>
                      </td>
                      <td><?php echo $productName; ?></td>
                      <td><img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" class="imgTable"></td>
                      <td><?php echo $pricePaid; ?></td>
                      <td><?php echo $orderQuantity; ?></td>
                      <td><?php echo $createdAt; ?></td>
                      <td><?php echo $lastModification; ?></td>
                      <form action="./../../backend/allOrders.php" method="POST">
                      <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
                      <td class="flex">
                      <button type="submit" class="Deny">Delete</button>
                      </td>
                      </form>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <footer>
            <div class="footer-flex">
              <h3>&copy; 2024, made with by 3AM Team for a better web.</h3>
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
        </div>
  </body>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('main');
      const topbar = document.getElementById('topbar');

      if (sidebar.style.width === '250px') {
        sidebar.style.width = '0px';

        topbar.style.left = '0px';
        topbar.style.width = 'calc(100% - 0px)';
      } else {
        sidebar.style.width = '250px';

        topbar.style.left = '250px';

      }
    }

  </script>
</body>

</html>
<?php } ?>