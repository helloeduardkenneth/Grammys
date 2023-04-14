<?php
<<<<<<< HEAD

include 'components/config.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = ($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
 
    $select_user = $link->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
 
    if($select_user->rowCount() > 0){
       $_SESSION['user_id'] = $row['id'];
       header('location:home.php');
    }else{
       $message[] = 'incorrect username or password!';
    }
 
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/Grammys.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<style>
     .register {
        background-color: var(--light-violet-color);
        width: 100%;
        padding: 75px 250px 25px 250px;
    }

    .register-heading {
        color: var(--dark-violet-color);
        font-size: 50px;
        font-weight: 500;
        margin-bottom: 60px;
    }
    .register-form {
        display: flex;
        gap: 45px;
        flex-direction: column;
        padding: 90px 285px 90px 285px;
        max-width: 1000px;
    }
    .box {
        display: flex;
        justify-content: space-between;
    }
    .btn {
        align-self: flex-start;
        padding: 12px 55px;
        background: #9112FF !important;
        border: none;
        border-radius: 8px;
        color: #FFFFFF;
        font-size: 25px;
        font-weight: 500;
    }
    .box label {
        font-size: 25px;
        font-weight: 500;
    }
    .register-form p {
        font-size: 16px;
        font-weight: 400;
    }
    @media (max-width: 767px) {
        .register {
            padding: 25px 0;
        }
        .register-heading {
            font-size: 25px;
            margin: 0;
        }
        .register-form {
            padding: 40px 20px;
        }
        .box {
            flex-direction: column;
            gap: 10px;
        }
        .box input[type="email"], .box input[type="password"] {
            height: 45px;
        }
        .btn {
            display: flex;
            align-self: center;
        }
        .register-form p {
            text-align: center;
        }
    }
</style>

<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container">

   <form action="" method="post">
   <div class="register">
        <h1 class="text-center register-heading">Login</h1>
    </div>

    <div class="register-form">
        <div class="box">
            <label for="email">Email</label>
            <input type="email" name="email" required maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        </div>
        <div class="box">
            <label for="pass">Password</label>
            <input type="password" name="pass" required maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        </div>
        <input type="submit" value="Login" name="submit" class="btn">
        <p>Don't have an account? <a href="register.php">Register.</a></p>
    </div>
   </form>

</section>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="./Scripts/Search.js"></script>

<script src="https://kit.fontawesome.com/80e0f4e3cb.js"></script>

=======
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
</body>
</html>