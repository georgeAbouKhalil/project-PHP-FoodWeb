<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
        <script src="https://kit.fontawesome.com/f97ce0bc87.js" crossorigin="anonymous"></script>
        <style>
            body{
                background-image: url("https://www.howitworksdaily.com/wp-content/uploads/2020/09/pizza-3007395_960_720.jpg");
                background-size: cover;
            }
            .login{
                border: 1px solid black;
                width: 20%;
                margin: 10% auto;
                padding: 2%;
                box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
                background: linear-gradient(165deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border-radius: 20px;
                border:1px solid rgba(255,255,0.18);
                font-weight: bolder;
                color:yellow;
            }
        </style>
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br>

            <!--login form start -->
            <form action="" method="POST" class="text-center">
                Username: <br><br>
                <input type="text" name="username" placeholder="Enter Username"> <br><br>
                Password: <br><br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="login" class="btn-primary">
                <br><br>
            </form>
            <!---form end--->
            <p class="text-center">made with <i class="far fa-heart"></i> by George ak & Sameh besan</p>
        </div>
    </body>
</html>

<?php   

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);
        //count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1){
            // login success
            $_SESSION['login'] = "<div class='success text-center'> Login Successful </div>";
            $_SESSION['user'] = $username; // to check the user if login or not and logout will unset it
            header('location:'.SITEURL.'admin/');
        }else{
            $_SESSION['login'] = "<div class='error text-center'> Username or Password did not match </div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>