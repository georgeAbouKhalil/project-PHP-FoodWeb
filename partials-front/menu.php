<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f97ce0bc87.js" crossorigin="anonymous"></script>
    
    <style>
        .far{
            color:red;
        }
        .white{
            color:white;
        }
    </style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>home.php" title="Logo">
                    <img src="images/logo2.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>home.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>cart.php"><i class="fa fa-shopping-cart cart-size" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#" style='color:black;'>User:  <?php echo $_SESSION['username-user']; ?></a>
                    </li>
                    <li>
                        <li><a href="logoutUser.php"><button name="back_to_food" class="lineButton"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </button></a></li>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->