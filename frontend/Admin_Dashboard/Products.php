<?php
session_start();

if (!isset($_SESSION['adminData'])) {
header('location:./../Errors/404.html');
}
 else{   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Furniture Admin Dashboard</title>
  <link rel="stylesheet" href="css/dashboardStyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            border-radius: 8px;
            text-align: center;
        }
        .close-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .close-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<div id="errorModal" class="modal">
    <div class="modal-content">
    <br>
    <p>Please Enter valid quantity of product</p>
    <br><br>
    <button class="close-btn" onclick="closeModall()">OK</button>
    </div>
</div>
<div id="errorModal2" class="modal">
    <div class="modal-content">
    <br>
    <p>Please Enter an image for the product</p>
    <br><br>
    <button class="close-btn" onclick="closeModall2()">OK</button>
    </div>
</div>
<div id="errorModal3" class="modal">
    <div class="modal-content">
    <br>
    <p>Failed to upload image</p>
    <br><br>
    <button class="close-btn" onclick="closeModall3()">OK</button>
    </div>
</div>
    <script>
        // Function to display the modal
        function showModal1() {
            document.getElementById('errorModal').style.display = 'block';
        }
        function showModal2() {
            document.getElementById('errorModal2').style.display = 'block';
        }
        function showModal3() {
            document.getElementById('errorModal3').style.display = 'block';
        }
        
        // Function to close the modal
        function closeModall() {
            document.getElementById('errorModal').style.display = 'none';
        }
        function closeModall2() {
            document.getElementById('errorModal2').style.display = 'none';
        }
        function closeModall3() {
            document.getElementById('errorModal3').style.display = 'none';
        }
        
        // Check for the error parameter in the URL
        if (new URLSearchParams(window.location.search).get('error') == 1) {
            showModal1();
        }
        if (new URLSearchParams(window.location.search).get('error') == 2) {
            showModal2();
        }
        if (new URLSearchParams(window.location.search).get('error') == 3) {
            showModal3();
        }
    </script>
    
    <!-- Sidebar (navigation drawer) -->
    <div id="sidebar" class="sidebar">
      <div class="logo">
        <div class="flex2">
          <img src="img/logooo.jpeg" alt="">
          <h2 class="name_banner">3AM</h2>
        </div>

      </div>
      <hr>
      <!-- Sidebar menu -->
      <ul>
        <!-- Overview -->
        <li><a href="overview.php"><i class="fa fa-home"></i> Overview</a></li>
        <!-- Categories -->
        <li><a href="Categories.php"><i class="fa fa-list"></i> Categories</a></li>
        <!-- Products -->
        <li class="checked-li"><a href="Products.html"><i class="fa fa-cube"></i>Products </a></li>
      </ul>

      <div class="card">
        <div class="card-content2">
         <h3>Need help?</h3>
         <p>Please Contact us</p>
         <a href="https://www.facebook.com/mark.magdy.71465572" class="button">Here</a>
         </div>
      </div>


    </div>

    <!-- Page content -->
    <div id="main" class="main">
      <!-- Top bar (header) -->
      <div id="topbar" class="topbar">
        <section class="flex">
          <span class="toggle-btn" onclick="toggleSidebar()">&#9776;</span>
          <div class="col">
            <h2><i class="fa fa-home"></i>/ Products</h2>
            <h5>Products</h5>
          </div>

        </section>

        <div class="user-profile">

          <img src="img/profile.jpg" alt="Profile Icon">
          <span class="username"><?php echo $_COOKIE['fname']." ".$_COOKIE['lname'];  ?></span>
          <form action="../../backend/logout.php" method="post">
          <button type="submit" class="Btn">

            <div class="sign"><svg viewBox="0 0 512 512">
                <path
                  d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                </path>
              </svg></div>

            <div class="text">-- Logout</div>
          </button>
        </form>
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

  <?php
      include_once '../../../furniture/backend/permissions.php';
      if($perm[2]=='A')
      {
      ?>
      <!-- Initial content -->
      <div id="content" class="content">
        <div class="action_button">
          <button onclick="openModal()">Add Product + </button>
        </div>
        <div class="overview">


          <div class="a_card_dialog" id="myModal">
            <div class="flex">
              
              <h3>New Product</h3>
              <span class="close" onclick="closeModal()">&times;</span>

          </div>
          <form action="../../backend/product.php" method="post" enctype="multipart/form-data" class="P_form">
            <div class="flex2">
                <div class="P_form-wrapper">
                    <div class="custom-file-upload">
                        <label for="file" class="icon">
                            <img src="https://via.placeholder.com/80" alt="Upload Icon" id="upload-icon">
                        </label>
                        <div class="text2"></div>
                        <input type="file" id="file" name="image" accept="image/*">
                        <!-- Hidden input field to store the image path -->
                        <input type="hidden" id="image-path" name="image_path">
                    </div>
                </div>
                <div class="col">
                    <div class="P_form-group">
                        <label class="P_label">Name:</label>
                        <input type="text" name="prod_name" required="" class="P_input" >
                    </div>
                    <br>
                    <div class="P_form-group">
                        <label class="P_label">Category:</label>
                        <select name="cat_name" required="" class="P_select">
                            <option value="" style="color: black;">Choose a category</option>
                            <?php
                            include '../../../furniture/backend/category.php';
                            if (count($categories) > 0) {
                                foreach ($categories as $category) {
                                    echo "<option value='" . $category["name"] . "'>" . $category["name"] . "</option>";
                                }
                            }
                            else{
                                echo "<option value=''>Store Catgory First</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex2">
                <div class="P_form-group">
                    <label class="P_label">Price:</label>
                    <input type="number" name="price" required="" class="P_input"><br><br>
                </div>
                <div class="P_form-group">
                    <label class="P_label">Discount Amount:</label>
                    <input type="number" name="discount" required="" class="P_input" ><br><br>
                </div>
                <div class="P_form-group">
                    <label class="P_label">Quantity:</label>
                    <input type="number" name="quantity" required="" class="P_input" ><br><br>
                </div>
            </div>
            <div class="P_form-group">
                <label class="P_label">Description:</label><br>
                <textarea name="description" rows="4" required="" class="P_textarea"></textarea><br><br>
            </div>
            <div class="P_form-group">
                <input type="submit" value="Add Product" class="P_submit">
            </div>
        </form>

          </div>
<?php }else{echo"<br><br><br><br><br>";} ?>
<!-- new(To edit) -->

<div class="overview">

<div class="a_card_dialog" id="myEdit">
  <div class="flex">
    
      <h3>Edit product no. <label for=""id="number"></label> <h3>
      
      <span class="close" onclick="closeEdit()">&times;</span>

  </div>
        <form id="editForm" action="../../backend/product.php" method="post" enctype="multipart/form-data" class="P_form">
            <div class="flex2">
                <div class="P_form-wrapper">
                    <div class="custom-file-upload">
                        <label for="file1" class="icon">
                            <img src="https://via.placeholder.com/80" alt="Upload Icon" id="upload-icon1">
                        </label>
                        <div class="text2"></div>
                        <input type="file" id="file1" name="image" accept="image/*">
                        <!-- Hidden input field to store the image path -->
                        <input type="hidden" id="image-path1" name="image_path1">
                    </div>
                </div>
                <div class="col">
                    <div class="P_form-group">
                        <label class="P_label">Name:</label>
                        <input type="text" name="prod_name1" required="" class="P_input" >
                    </div>
                    <br>
                    <div class="P_form-group">
                        <label class="P_label">Category:</label>
                        <select name="cat_name1" required="" class="P_select">
                            <option value="" style="color: black;">Choose a category</option>
                            <?php
                            include '../../../furniture/backend/category.php';
                            if (count($categories) > 0) {
                                foreach ($categories as $category) {
                                    echo "<option value='" . $category["name"] . "'>" . $category["name"] . "</option>";
                                }
                            }
                            else{
                                echo "<option value=''>Store Catgory First</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex2">
                <div class="P_form-group">
                    <label class="P_label">Price:</label>
                    <input type="number" name="price1" required="" class="P_input"><br><br>
                </div>
                <div class="P_form-group">
                    <label class="P_label">Discount Amount:</label>
                    <input type="number" name="discount1" required="" class="P_input" ><br><br>
                </div>
                <div class="P_form-group">
                    <label class="P_label">Quantity:</label>
                    <input type="number" name="quantity1" required="" class="P_input" ><br><br>
                </div>
            </div>
            <div class="P_form-group">
                <label class="P_label">Description:</label><br>
                <textarea name="description1" rows="4" required="" class="P_textarea"></textarea><br><br>
            </div>
            <input type="hidden" name="number" id="numberInput">
      <input type="hidden" name="source" value="edit">
            <div class="P_form-group">
                <input type="submit" value="Update Product" class="P_submit">
            </div>
        </form>
  
  
        <script>
function openEdit(id, name, category, price, discount, description, quantity, image) {
    document.getElementById('number').innerText = id;
    document.getElementById('numberInput').value = id;
    document.getElementById('myEdit').style.display = 'block';

    // Preload form fields with current values
    document.getElementsByName('prod_name1')[0].value = name;
    document.getElementsByName('cat_name1')[0].value = category;
    document.getElementsByName('price1')[0].value = price;
    document.getElementsByName('discount1')[0].value = discount;
    document.getElementsByName('quantity1')[0].value = quantity;
    document.getElementsByName('description1')[0].value = description;

    // Preload image if available
    const imageSrc = image ? "../../../furniture/frontend/img/" + image : 'https://via.placeholder.com/80';
    document.getElementById('upload-icon1').src = imageSrc;

    // Remove existing event listener if any
    const fileInput1 = document.getElementById('file1');
    fileInput1.removeEventListener('change', handleFileChangeEdit);

    // Add new event listener
    fileInput1.addEventListener('change', handleFileChangeEdit);
}

function handleFileChangeEdit(e) {
    const file = e.target.files[0];
    const reader = new FileReader();
    reader.onload = function (event) {
        document.getElementById('upload-icon1').src = event.target.result;
        document.getElementById('image-path1').value = event.target.result;
    };
    // Read the file as a data URL
    reader.readAsDataURL(file);
}

// Function to close modal
function closeEdit() {
    document.getElementById('myEdit').style.display = 'none';
}

function openModal() {
    document.getElementById('myModal').style.display = 'block';
    
    // Reset the image preview
    document.getElementById('upload-icon').src = 'https://via.placeholder.com/80';

    // Remove existing event listener if any
    const fileInput = document.getElementById('file');
    fileInput.removeEventListener('change', handleFileChangeAdd);

    // Add new event listener
    fileInput.addEventListener('change', handleFileChangeAdd);
}

function handleFileChangeAdd(e) {
    const file = e.target.files[0];
    const reader = new FileReader();
    reader.onload = function (event) {
        document.getElementById('upload-icon').src = event.target.result;
        document.getElementById('image-path').value = event.target.result;
    };
    // Read the file as a data URL
    reader.readAsDataURL(file);
}

// Function to close modal
function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}
</script>

</div>

      <?php
      include_once '../../../furniture/backend/permissions.php';
      if($perm[3]=='R')
      {
      ?>
          <div class="a_card">
            <div class="tttt">
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Amount</th>
                    <th>Discount Percent</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Last Modification</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
          <?php
          include '../../../furniture/backend/product.php';
          if (count($products) > 0) {
            foreach ($products as $product) {
                echo '<tr>';
                echo '<td>' . $product['id'] . '</td>';
                echo '<td>' . $product['name'] . '</td>';
                $image_src = '../../../furniture/frontend/img/' . $product['image']; // Construct the full image path
                echo '<td><img src="' . $image_src . '" class="imgTable" alt="' . $product['name'] . '"></td>';
                echo '<td>' . $product['category'] . '</td>';
                echo '<td>$' . $product['price'] . '</td>';
                echo '<td>$' . $product['discount'] . '</td>';
                echo '<td>' . $product['discount_percent'] . '%</td>';
                echo '<td>' . $product['description'] . '</td>';
                echo '<td>' . $product['quantity'] . '</td>';
                echo '<td>' . $product['modified_at'] . '</td>';
                echo '<td>';
                $id= $product["id"];
                //echo '<a href="#" class="Agree">Edit</a>';
                //echo "<button onclick='openEdit($id)' class='Agree'>Edit</button>";
                echo "<button onclick='openEdit($id, \"" . addslashes($product['name']) . "\", \"" . addslashes($product['category']) . "\", \"" . addslashes($product['price']) . "\", \"" . addslashes($product['discount']) . "\", \"" . addslashes($product['description']) . "\", \"" . addslashes($product['quantity']) . "\", \"" . addslashes($product['image']) . "\")' class='Agree'>Edit</button>";
                echo "
                <form action='../../../furniture/backend/product.php' method='post'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' class='Deny' name='source' value='delete'> Delete </button>
                </form>
                  ";
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo "<tr><td colspan='10'>No Products Stored to display</td></tr>";
        }        
          ?>
          </tbody>
            </table>
        </div>
    </div>
<?php } else{?>
  <div class="a_card">
            <div class="tttt">
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Amount</th>
                    <th>Discount Percent</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Last Modification</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
          <?php
          include '../../../furniture/backend/product.php';
          if (count($products) > 0) {
            foreach ($products as $product) {
                echo '<tr>';
                echo '<td>' . $product['id'] . '</td>';
                echo '<td>' . $product['name'] . '</td>';
                $image_src = '../../../furniture/frontend/img/' . $product['image']; // Construct the full image path
                echo '<td><img src="' . $image_src . '" class="imgTable" alt="' . $product['name'] . '"></td>';
                echo '<td>' . $product['category'] . '</td>';
                echo '<td>$' . $product['price'] . '</td>';
                echo '<td>$' . $product['discount'] . '</td>';
                echo '<td>' . $product['discount_percent'] . '%</td>';
                echo '<td>' . $product['description'] . '</td>';
                echo '<td>' . $product['quantity'] . '</td>';
                echo '<td>' . $product['modified_at'] . '</td>';
                echo '<td>';
                $id= $product["id"];
                echo "<button onclick='openEdit($id, \"" . addslashes($product['name']) . "\", \"" . addslashes($product['category']) . "\", \"" . addslashes($product['price']) . "\", \"" . addslashes($product['discount']) . "\", \"" . addslashes($product['description']) . "\", \"" . addslashes($product['quantity']) . "\", \"" . addslashes($product['image']) . "\")' class='Agree'>Edit</button>";
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo "<tr><td colspan='10'>No Products Stored to display</td></tr>";
        }        
          ?>
          </tbody>
            </table>
        </div>
    </div>
    <?php } ?>

          <footer>
            <div class="footer-flex">
              <h3>© 2024, made with by 3AM Team for a better web.</h3>
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
        </div>
      </div>
  </body>

</html>

<?php } ?>