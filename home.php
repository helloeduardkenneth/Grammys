



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammy's Bakeshop - Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="Grammys.css">
</head>
<body>

    <?php include 'components/user_header.php'; ?>

    <section id="hero-section">
        <div class="container">
            <div class="col-lg-8 hero-details">
                <h1 class="hero-heading">Indulge in our freshly baked goodies-straight from Grammy's oven!</h1>
                <a class="shop-button" href="#">Shop</a>
            </div>
        </div>
    </section>
    <div class="all-products-empty"></div>
    <section class="featured-section">
        <div class="featured-container">
            <h1 class="text-center">Featured Products</h1>
            <div class="featured-items">
                <div class="featured-item">
                    <div class="new">NEW</div>
                    <img src="./assets/FeaturedProducts/vanilla-cupcakes.png" alt="vanilla-cupcakes">
                    <div class="featured-title-price">
                        <h1>Vanilla Cupcakes</h1>
                        <h2>$12.00</h2>
                    </div>
                    <a class="featured-btn" href="">View product</a>
                </div>
                <div class="featured-item">
                    <div class="new">NEW</div>
                    <img src="./assets/FeaturedProducts/blueberry-mini-pie.png" alt="blueberry-mini-pie">
                    <div class="featured-title-price">
                        <h1>Blueberry Mini Pie</h1>
                        <h2>$5.00</h2>
                    </div>
                    <a class="featured-btn" href="">View product</a>
                </div>
                <div class="featured-item">
                    <div class="new">NEW</div>
                    <img src="./assets/FeaturedProducts/candy-muffin.png" alt="candy-muffin">
                    <div class="featured-title-price">
                        <h1>Candy Muffin</h1>
                        <h2>$4.00</h2>
                    </div>
                    <a class="featured-btn" href="">View product</a>
                </div>
                <div class="featured-item">
                    <div class="new">NEW</div>
                    <img src="./assets/FeaturedProducts/strawberry-cream-puffs.png" alt="strawberry-cream-puffs">
                    <div class="featured-title-price">
                        <h1>Strawberry Cream Puffs</h1>
                        <h2>$15.00</h2>
                    </div>
                    <a class="featured-btn" href="">View product</a>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-by-category-section">
        <div class="shop-by-category-container">
            <h1 class="text-center">Shop by category</h1>
            <div class="shop-by-categories">
                <a href="shop.php?category=Mini Pies">
                    <div class="category">
                        <img class="category-image"src="./assets/ShopByCategory/mini-pies.png" alt="mini-pies">
                        <h1 class="category-title">Mini Pies</h1>
                    </div>
                </a>
                <a href="shop.php?category=Cream Puffs">
                    <div class="category">
                        <img class="category-image" src="./assets/ShopByCategory/cream-puffs.png" alt="cream-puffs">
                        <h1 class="category-title">Cream Puffs</h1>
                    </div>
                </a>
                <a href="shop.php?category=Muffins">
                    <div class="category">
                        <img class="category-image" src="./assets/ShopByCategory/muffins.png" alt="muffins">
                        <h1 class="category-title">Muffins</h1>
                    </div>
                </a>
                <a href="shop.php?category=Cupcakes">
                    <div class="category">
                        <img class="category-image" src="./assets/ShopByCategory/cupcakes.png" alt="cupcakes">
                        <h1 class="category-title">Cupcakes</h1>
                    </div>
                </a>
                <a href="shop.php?category=Tartlets">
                    <div class="category">
                        <img class="category-image" src="./assets/ShopByCategory/tarlets.png" alt="tarlets">
                        <h1 class="category-title">Tartlets</h1>
                    </div>
                </a>
                <a href="shop.php?category=Cinnamon Rolls">
                    <div class="category">
                        <img class="category-image" src="./assets/ShopByCategory/cinnamon-rolls.png" alt="cinnamon-rolls">
                        <h1 class="category-title">Cinnamon Rolls</h1>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="./Scripts/Search.js"></script>
    <script src="./Scripts/Filter.js"></script>
    <script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>
    <script src="./Bootstrap/bootstrap.min.js"></script>
    <script src="./Bootstrap/jquery.min.js"></script>
</body>
</html>