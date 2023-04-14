<<<<<<< HEAD
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

=======
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammy's Bakeshop - Shop</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="./assets/css/Grammys.css">
=======

    <link rel="stylesheet" href="Grammys.css">
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <?php include 'components/user_header.php'; ?>

    <div class="contact">
        <h1 class="text-center contact-heading">Contact</h1>
    </div>
    <section>
        <div>
            <div class="contact-description">
                <div class="contact-message">
                    <p class="contact-subtitle">Please feel free to call 857-225-5555 for any questions or concerns or reach out to us via email at inquire@grammys.com.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <script src="./Scripts/Search.js"></script>
<<<<<<< HEAD
    
=======
    <script src="./Scripts/Filter.js"></script>
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
    <script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>

</body>
</html>