


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .page-indicator {
  font-size: 14px;
  color: #333;
  margin-bottom: 20px;
}

.page-indicator a {
  color: #333;
  text-decoration: none;
}

.page-indicator a:hover {
  text-decoration: underline;
}

.page-indicator span {
  margin: 0 10px;
}

</style>
<body>
    <section class="header-section">
        <div class="header">
            <div class="grammys-logo">
                <img class="logo" src="./assets/grammys-logo.png" alt="grammys-logo">
            </div>
            <div class="right">
                <div class="search-container">
                    <form action="#">
                        <input class="search-bar" id="search-input" type="text" placeholder="Search...">
                    </form>
                    <i class="fa fa-search" id="search-icon"></i>
                </div>
                <div class="login-or-cart">
                    <a href="./login.php">
                        <div class="login">
                            <i class="fa fa-user"></i>
                            <h1 class="login-text">Login</h1>
                        </div>
                    </a>
                    <div class="cart">
                        <i class="fa fa-cart-shopping"></i>
                        <h1 class="cart-text">Cart</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <nav class="navbar">
                <input type="checkbox" id="toggle" onclick="toggleChecker()">
                <label for="toggle">
                    <i class="material-icons">menu</i>
                </label>
                <div class="menu">
                    <ul class="nav-item">
                        <li><a href="./HomePage.html">Home</a></li>
                        <li><a class="active" href="./ShopPage.html">Shop</a></li>
                        <li><a href="./AboutPage.html">About</a></li>
                        <li><a href="./ContactPage.html">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>          
    </section>
    <section>
        <div class="product-details">
            <div class="page-indicator">
                <?php foreach ($page_titles as $title => $link) { ?>
                  <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                  <?php if ($title != end(array_keys($page_titles))) { ?>
                    <span>/</span>
                  <?php } ?>
                <?php } ?>
              </div>
        </div>
    </section>

    <script src="./Scripts/Search.js"></script>
    <script src="./Scripts/Filter.js"></script>
    <script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>
</body>
</html>