<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <form action="" method="POST">
        <h2>SIGN UP</h2>
        <?php 
        if(isset($_SESSION['usernameExists'])){
            echo $_SESSION['usernameExists'];
            unset($_SESSION['usernameExists']);
        }
        ?> <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php
            
        }
        
        ?>
        <label >User Name</label>
        <input type="text" name="username" placeholder="User name"><br>

        <label >Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <label >Email</label>
        <input type="text" name="email" placeholder="Email"><br>

        <label >Name</label>
        <input type="text" name="name" placeholder="Name"><br>

        <button type="submit" name="submit">SignUp</button>

        <a href="<?php echo SITEURL; ?>index.php">Already registered? Click to login!!</a>
    </form>
</body>
</html>

<?php 





if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name=$_POST['name'];

    if(empty($username)){
        header('location: signUp.php?error=User Name is required');
        exit();
    }else if(empty($password)){
        header('location: signUp.php?error=Password is required');
        exit();
    }else if(empty($email)){
        header('location: signUp.php?error=Email is required');
        exit();
    }else if(empty($name)){
        header('location: signUp.php?error=name is required');
        exit();
    }

    $sql_u = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $res_u = mysqli_query($conn, $sql_u);


    if (mysqli_num_rows($res_u) > 0) {
  	  $_SESSION['usernameExists'] = "<div class='error'>Sorry... username or email already taken</div>";
        header('location:'.SITEURL.'signUp.php');
  	}else{
        $sql = "INSERT INTO users SET 
        username='$username',
        password='$password',
        email='$email',
        name='$name'
        ";
        $res = mysqli_query($conn, $sql);
        $_SESSION['add'] = "<div class='success'>user added successfully </div>";
        header('location:'.SITEURL.'index.php');
        exit();
      }

        
    

    
}


?>

