<?php
session_start();

if (!isset($_SESSION['userData'])) {
header("Location:./Errors/404.html");
}
 else{   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./CSS/homestyle.css">
    <link rel="stylesheet" href="./CSS/style_sign.css">
    <title>Home</title>
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
    <p>Password Updated Successfully</p>
    <br><br>
    <button class="close-btn" onclick="closeModal()">OK</button>
    </div>
</div>
    <script>
        // Function to display the modal
        function showModal() {
            document.getElementById('errorModal').style.display = 'block';
        }
        
        // Function to close the modal
        function closeModal() {
            document.getElementById('errorModal').style.display = 'none';
        }
        
        // Check for the error parameter in the URL
        if (new URLSearchParams(window.location.search).get('update') == 1) {
            showModal();
        }
    </script>

    <!--free delivery-->

    <div class="offer-box">
        <div class="offer-box-content">
            <img src="IMG/deliver.svg" alt="Delivery truck icon" class="free-delivery-icon" />
            <div class="free-delivery-text">FREE DELIVERY</div>
        </div>
    </div>


    <!--header-->

    <header class="header">
        <div class="logo">3AM</div>
        <nav class="nav">
            <a href="#category" class="nav-item">Categories</a>
            <a href="./homepage_content/product.php" class="nav-item">Products</a>
            <a href="./homepage_content/aboutUs.html" class="nav-item">About us</a>
        </nav>
        <!-- <button type="button" class="login-button">Login</button> -->
        <div id="overlay" class="custom-overlay">
            <div id="dialog" class="custom-dialog"></div>
        </div>
       
        <form action="../backend/logout.php" method="post">
        <div class="user-profile">
                <img src="IMG/profile.jpg" alt="Profile Icon">
                <button class="Btn">
                    <div class="sign"><svg viewBox="0 0 512 512">
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                            </path>
                        </svg></div>
    
                    <div class="text">Logout</div>
                </button>
           
        </div>
    </form>
        <!--lanpage content-->
    </header>
    <div class="Top-page">
        <p class="luxurious-comfort">
            LUXURIOUS COMFORT AND <br /> REFRESHING INTERIOR FURNITURE
        </p>

        <p class="product-description">
            Find the best deals on furniture products, lighting and <br />
            home decoration Choose from our range of cozy living room furniture.
        </p>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b5252ea2040978e880923c3d474328090388ddf2d9310c17ad9854bfad33248d?apiKey=40de46fc06df41429ee19f81541162c6&"
            alt="design Image" class="design-image" loading="lazy" />
    </div>

    <!--category section-->
    <script src="./JS/swip.js"></script>
    <section id="category">
        <h1 id="category-section">SHOP BY CATEGORY</h1>
        <?php $source = 'homepage';
         include_once("./../backend/allcategories.php") ?>
        <div class="flex-home">
        <?php foreach ($categories as $category): ?>
            <div class="card-review">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAV1BMVEUAAAD///9hYWFYWFhjY2NeXl5bW1tVVVVUVFRycnLy8vLo6OhRUVGOjo68vLzv7++srKzOzs4vLy/4+PgoKCgaGhp9fX2YmJg5OTlDQ0OHh4ff399sbGyqlfrFAAADRklEQVR4nO3cCXqjMAyA0bpL2oQ06b7O/c85k2ZoQpCFIfLG978DWCZIloDOXFwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABg3pab7WrVPKwzbmH90KxW280yyuKLxv33+BQlwLCnx3YLzcJ+9Xt38Bxh/QCL56M93FuvvnQdOS5x0d2Ccaa+uBNXtusHuDrdwovp8pvT5d2l6frDLns72Fgu/7rqrZ/4EvsX6Favhuvf9Nd37tYwwJBbaQM3hgHepAAJj5uFGP/NMMK9GCFZogopumPZMJZyCNM88RNrxNn2iztPjCS1KNbgzp1llMYXJf5d9N1B15iGefeFiV6Lnhr859020NYbKO5005tkfm2NI314I0W9RP8Fug/rWHJL+hEvUf0pGqMZX/ujxTpuvIeMc9eJ45me27+8bSLab6oURYyIyi8arfSVsrCvxaTBfim1aF35yskWpQYD4toOcEoNRn6kUWrRMneUFI3+/kRJVLtLVC4waooORrf6eRMlypT4NiWiFHuiV3xKo7L4iZUkSfPEfRF5gEs9qo3exblNI/2oJos2wOUY1WSRZqo8o5osygCXa1STKYk6NZ8iLHkW86f+tE/0IYwHuLyj2ug9jW8aSptIfsgcGA5w+Uc1mdkAV8KoJjMa4MoY1WQmT/35nuhDGAxw5YxqsrMnrZJGNdmZA1xZo5rsrGmrtFFNdsYAV96oJps8wJU4qskmfrbx/oFA9kbfN6lplN4muiYMcOWOarLRA1zJo5pMOVGlWlRqsKhT9Niot/E5P75MN6Jp1NMmuoJvTO6PL9MFPvWX+kQfIqhp1NYmugKaRn1tomvws00pH1+mGxjg6hrVZOpDe/lP9CGUWvT8yfhOFTXYUhLVq5oU3Rt/iZVdoJqooqpSdE85UQQVHTIHYxK1uhTdUxrfiUoafV9oLVZYg62wu1jtHdwJqcVKa7A1fKJWeYoeG6rFimuwpSdq5Sm6p7yxKPe14Tj+RJ1Biu75mkbVbaJLrsVZ1GBLuoszuoM7/VqcTQ22Tk/UmZyix7q1OKsabH0e/kF485l7M5F8ff9c3/dX7o1E9LL+s7b9f2UAAAAAAAAAAAAAAAAAAAAAAAAAAADQ8xdyBRZB8XHgpgAAAABJRU5ErkJggg==" alt="<?= $category['name'] ?> category" class="image-category">
                <form action="./homepage_content/product.php" method="get">
                    <input type="hidden" name="category_name" value="<?= htmlspecialchars($category['name']) ?>">
                    <button class="btn" type="submit"><?= htmlspecialchars($category['name']) ?></button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    </section>


    <!--our services section-->
    <div class="col-home">
        <h2>OUR SERVICES</h2>
        <div class="card">
            <p> <label>01</label><span>RESTROOM SETUP</span></p>
            <p> <label>02</label><span>DINNING ROOM SETUP</span></p>
            <p> <label>03</label><span>LIVING ROOM SETUP</span></p>
            <p> <label>04</label><span>BEDROOM SETUP</span></p>
        </div>
    </div>
<br>
<br>
    <!--Reviews section-->

    <section>
        <div class="reviews">

            <div class="col-home">
                <h1 id="heading">WHAT OUR <br> CUSTOMERS SAY?</h1>
                <h3 id="subheading">Hey there, Thanks for being our customer! Please consider leaving us a review.</h3>
            </div>
            <div class="flex">


                <div id="review1">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <h1>Ahmed</h1>
                    <h3>"Well made furniture, promptly delivered"</h3>
                </div>


                <div id="review2">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <h1>Bassant</h1>
                    <h3>"Excellent Service Great piece of table furniture"</h3>
                </div>
            </div>
        </div>
    </section>


    <!--about us section-->

    <section class="aboutus">
        <div>
            <h1 class="about-title">WHO WE ARE?</h1>
            <p class="us">We are continuously solving for 'home' - 3am has the largest selection to design, style and
                brighten
                <br> your home all with a single click. Convenience, predictive-tech and customer centric approach
            </p>
            <hr id="arrow">

            <br>
            <p class="team">FRONT-END DEVELOPERS AHMED ABDELRAHMAN ELSEHT & AHMED BEKHIT.
                <br> BACK-END DEVELOPERS MARK MAGDY AND ARSANY OSAMA.
            </p>
        </div>
    </section>


    <!--footer section-->

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