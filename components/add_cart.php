<?php

if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
<<<<<<< HEAD
      header('location: login.php');
   } else {
=======
      header('location:login.php');
   }else{
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d

      $pid = $_POST['pid'];
      $pid = filter_var($pid, FILTER_SANITIZE_STRING);
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
<<<<<<< HEAD
      $fullsize = $_POST['fullsize'];
      $fullsize = filter_var($fullsize, FILTER_SANITIZE_STRING);
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $check_cart_numbers = $link->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = '<p class="text-center">Already added to cart!</p>';
      }else{
         $insert_cart = $link->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, fullsize) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $fullsize]);
         $message[] = 'Added to cart';
=======
      $image = $_POST['image'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to cart!';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = 'added to cart!';
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
         
      }

   }

}

?>