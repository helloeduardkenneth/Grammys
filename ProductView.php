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
    <title>Grammy's Bakeshop - Product View</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./assets/Grammys.css">

</head>

    <style>
        .productview {
            padding: 95px 285px;
            flex-direction: row;
        }
        .productview-container {
            display: flex;
            flex-direction: row;
            padding-top: 35px;
        }
        .productview-details {
            display: flex;
            flex-direction: column;
            padding-left: 40px;
        }
        .productview-btns {
            display: flex;
            padding: 35px 0;
            gap: 50px;
        }
        .productview-name-price {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .add-to-cart {
            border: 2px solid #9112FF;
            border-radius: 8px;
            color: #9112FF;
            font-size: 25px;
            font-family: "Barlow", sans-serif;
            padding: 12px 30px;
        }
        .buy-now {
            background-color: #9112FF;
            border-radius: 8px;
            color: #FFFFFF;
            font-size: 25px;
            font-family: "Barlow", sans-serif;
            padding: 12px 45px;
        }
    </style>

<body>

    <?php include 'components/user_header.php'; ?>

    <div>
        <div class="all-products-empty"></div>
        <?php
            if(isset($_GET['pid'])) {
                $pid = $_GET['pid'];
                $select_products = $link->prepare("SELECT * FROM products WHERE id = ?");
                $select_products->bind_param("i", $pid);
                $select_products->execute();
                $select_products->store_result();
                if($select_products->num_rows() > 0) {
                    $select_products->bind_result($id, $name, $price, $fullsize, $thumbnail, $description, $category);
                    while($select_products->fetch()) {
        ?>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $pid; ?>">
            <input type="hidden" name="name" value="<?= $name; ?>">
            <input type="hidden" name="price" value="<?= $price; ?>">
            <input type="hidden" name="description" value="<?= $description; ?>">
            <input type="hidden" name="fullsize" value="<?= $fullsize; ?>">

            <div class="productview">
                <div class="page-indicator">
                    <p><a href="shop.php">Shop</a> / Products / <strong><?= $name; ?></strong></p>
                </div>
                <div class="productview-container">
                    <div>
                        <img src="uploaded_fullsize/<?= $fullsize; ?>" alt="">
                    </div>
                    <div class="productview-details">
                        <div class="productview-name-price">
                            <h1 class="productview-name"><?= $name; ?></h1>
                            <h2 class="productview-price"><span>$</span><?= $price; ?>.00</h2>
                        </div>
                        <div class="productview-btns">
                            <a href="" class="add-to-cart">Add to Cart</a>
                            <a href="" class="buy-now">Buy Now</a>
                        </div>
                        <p class="productview-description"><?= $description; ?></p>
                    </div>
                </div>
            </form>
        <?php }
        } else {
            echo '<p class="text-center">No products added yet!</p>';
        }
            $select_products->close();
        } else {
            echo '<p class="text-center">Product ID not specified!</p>';
        }
        ?>

        </div>
    </div>

    <?php include 'components/footer.php'; ?>

<script src="../Scripts/Search.js"></script>
<script src="./Scripts/Filter.js"></script>
<script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>
</body>
</html>