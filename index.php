<?php include('config/constants.php'); 
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <form action="" method="POST">
        <h2>LOGIN</h2>
        <img src="images/logo2.png" class="center-image">
        <?php 
        if(isset($_SESSION['user-login'])){
            echo $_SESSION['user-login'];
            unset($_SESSION['user-login']);
        }
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php
        }
        ?>
        <br>
        
        <?php
        if(isset($_SESSION['count'])==2){
        echo "<p class='error text-center'> In the third attempt the username will be blocked <br> NO: ".$_SESSION['count']." </p>";
        }
        ?>

        <label >User Name</label>
        <input type="text" name="username" placeholder="User name" value="<?php if(isset($_COOKIE['usernamecookie'])) { echo $_COOKIE['usernamecookie']; } ?>"><br>

        <label >Password</label>
        <input type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>" ><br>

        <button type="submit" name="submit">Login</button>
        <div class="checkbox"> 
            <input type="checkbox" name="rememberme" > <span>Remember Me</span> 
        </div>
        <br>
        <a href="forget_password.php">Forgot Password?</a><br><br>
        <a href="<?php echo SITEURL; ?>signUp.php">New user? Click to Sign Up!!</a>
        <br><br>
        
    </form>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    if(empty($username) || empty($password)){
        header('location: index.php?error=Username and Password is required');
        exit();
    }

    if(!isset($_SESSION['count'])){
		$_SESSION['count'] = 0;
	}

    $count = mysqli_num_rows($res);
    if($count==1){
        $row = mysqli_fetch_array($res);
        $_SESSION['email-loggin'] = $row['email'];
        $_SESSION['user-login'] = "<div class='success text-center'> Login Successful </div>";
        $_SESSION['username-user'] = $username; // to check the user if login or not and logout will unset it
        if(isset($_POST['rememberme'])){

            setcookie('usernamecookie',$username,time()+80000);
            setcookie('passwordcookie',$password,time()+80000);
            header('location:'.SITEURL.'home.php');
        }else{
            header('location:'.SITEURL.'home.php');
        }
        
    }else{
        $_SESSION['user-login'] = "<div class='error text-center'> Username or Password did not match </div>";

        if($_SESSION['count'] != 3){
            $_SESSION['count']++;
        }
        header('location:'.SITEURL.'index.php');
    }
    if($_SESSION['count']==3){
        $_SESSION['user-block'] = "<div class='error text-center'> user blocked after 3 attempts</div>";
        $_SESSION['user-failed'] = $username;
        header('location:'.SITEURL.'newPassword.php');
    }
}
?>