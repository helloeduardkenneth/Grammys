<?php

include 'components/config.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammy's Bakeshop - Shop</title>

    <link rel="stylesheet" href="./assets/Grammys.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <div class="wrapper">
        <nav class="all-products">
            <div class="wrapper-heading">
                <h1 class="text-center allproducts-heading">All Products</h1>
            </div>
            <div class="wrapper-nav">
                <input type="checkbox" id="toggle-nav">
                <label for="toggle-nav" class="nav-toggle">
                    <i class="material-icons">arrow_forward_ios</i>
                </label>
                <div class="product-menu">
                    <ul class="product-links">
                        <li class="product-link active"><a href="#">All Products</a></li>
                        <li class="product-link"><a href="#">Cinnamon Rolls</a></li>
                        <li class="product-link"><a href="#">Cream Puffs</a></li>
                        <li class="product-link"><a href="#" >Cupcakes</a></li>
                        <li class="product-link"><a href="#">Mini Pies</a></li>
                        <li class="product-link"><a href="#">Muffins</a></li>
                        <li class="product-link"><a href="#">Tartlets</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

    <div class="sort-by-price">
        <label for="sort-by-price-select">Sort: </label>
        <select id="sort-by-price-select">
            <option disabled selected class="low-to-high-price" value="low-to-high-price">Low to High Price</option>
            <option value="low-to-high">Low to High</option>
            <option value="high-to-low">High to Low</option>
        </select>
        <button id="sort-by-price-btn" class="go-btn">GO</button>
    </div>

<section>
    <div class="product-container">
        <?php
            $select_products = $link->prepare("SELECT * FROM products");
            $select_products->execute();
            $select_products->store_result();

            if($select_products->num_rows() > 0) {
                $select_products->bind_result($id, $name, $price, $fullsize, $thumbnail, $description, $category);
            while($select_products->fetch()) {
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="name" value="<?= $name; ?>">
            <input type="hidden" name="price" value="<?= $price; ?>">
            <input type="hidden" name="thumbnail" value="<?= $thumbnail; ?>">

            <ul class="product-items">
                <li class="product-item">
                    <div class="new">NEW</div>
                    <img src="uploaded_thumbnail/<?= $thumbnail; ?>" alt="">
                    <div class="product-title-price">
                        <h1 class="product-name"><?= $name; ?></h1>
                        <h2><span>$</span><?= $price; ?>.00</h2>
                    </div>
                    <a class="product-btn" href="ProductView.php?pid=<?= $id; ?>">View product</a>
                </li>
            </ul>
        </form>
    <?php 
    }
        } else {
            echo '<p class="text-center">No products added yet!</p>';
        }
            $select_products->close();
    ?>
    </div>
</section>

    <?php include 'components/footer.php'; ?>

    <script src="../Scripts/Search.js"></script>
    <script src="./Scripts/Filter.js"></script>
    <script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>
</body>
</html>