<?php

include 'components/config.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

<<<<<<< HEAD

if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
      header('location: login.php');
   } else {

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
      $fullsize = $_POST['fullsize'];
      $fullsize = filter_var($fullsize, FILTER_SANITIZE_STRING);

      $check_cart_numbers = $link->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'Already added to cart!';
      }else{
         $insert_cart = $link->prepare("INSERT INTO `cart`(user_id, name, price, fullsize) VALUES(?,?,?,?)");
         $insert_cart->execute([$user_id, $name, $price, $fullsize]);
         $message[] = 'Added to cart';
         
      }

   }

}
=======
include 'components/add_cart.php';
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammy's Bakeshop - Product View</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<<<<<<< HEAD
    <link rel="stylesheet" href="./assets/css/Grammys.css">
=======
    <link rel="stylesheet" href="./assets/Grammys.css">
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d

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
<<<<<<< HEAD
            background-color: #FFFFFF;
            cursor: pointer;
        }
        .add-to-cart:hover {
            background-color: #9112FF;
            color: #FFFFFF;
=======
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
        }
        .buy-now {
            background-color: #9112FF;
            border-radius: 8px;
            color: #FFFFFF;
            font-size: 25px;
            font-family: "Barlow", sans-serif;
            padding: 12px 45px;
<<<<<<< HEAD
            border: none;
        }
        .buy-now:hover {
            background-color: #FFFFFF;
            border: 2px solid #9112FF;
            color: #9112FF;
        }
        @media (max-width: 767px) {
            .productview {
                padding: 0;
            }
            .productview-container {
                padding: 25px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .productview-container img {
                width: 100%;
            }
            .productview-details {
                padding: 0;
            }
            .productview-btns {
                flex-direction: column;
                gap: 25px;
            }
            .page-indicator {
                display: none;
            }
            .all-products-empty {
                height: 15px;
            }
            .productview-name-price {
                padding-top: 15px;
            }
            .productview-name, .productview-price {
                font-size: 24px;
                font-weight: 500;
            }
        }
        

=======
        }
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
    </style>

<body>

    <?php include 'components/user_header.php'; ?>

    <div>
        <div class="all-products-empty"></div>
        <?php
<<<<<<< HEAD
            $pid = $_GET['pid'];
            $select_products = $link->prepare("SELECT * FROM products WHERE id = ?");
            $select_products->execute([$pid]);
            if($select_products->rowCount() > 0){
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
        ?>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $fetch_products['pid']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
            <input type="hidden" name="description" value="<?= $fetch_products['description']; ?>">
            <input type="hidden" name="fullsize" value="<?= $fetch_products['fullsize']; ?>">

            <div class="productview">
                <div class="page-indicator">
                    <p><a href="shop.php">Shop</a> / Products / <strong><?= $fetch_products['name']; ?></strong></p>
                </div>
                <div class="productview-container">
                    <div>
                        <img src="uploaded_fullsize/<?= $fetch_products['fullsize']; ?>" alt="">
                    </div>
                    <div class="productview-details">
                        <div class="productview-name-price">
                            <h1 class="productview-name"><?= $fetch_products['name']; ?></h1>
                            <h2 class="productview-price"><span>$</span><?= $fetch_products['price']; ?>.00</h2>
                        </div>
                        <div class="productview-btns">
                            <button name="add_to_cart" class="add-to-cart">Add to Cart</button>
                            <button name="add_to_cart" class="buy-now">Buy Now</button>
                        </div>
                        <p class="productview-description"><?= $fetch_products['description']; ?></p>
=======
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
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
                    </div>
                </div>
            </form>
        <?php }
        } else {
            echo '<p class="text-center">No products added yet!</p>';
        }
<<<<<<< HEAD
=======
            $select_products->close();
        } else {
            echo '<p class="text-center">Product ID not specified!</p>';
        }
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
        ?>

        </div>
    </div>

    <?php include 'components/footer.php'; ?>

<<<<<<< HEAD
<script src="./Scripts/Search.js"></script>

=======
<script src="../Scripts/Search.js"></script>
<script src="./Scripts/Filter.js"></script>
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
<script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>
</body>
</html>