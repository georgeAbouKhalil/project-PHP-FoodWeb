<?php 
include('../config/constants.php');

    session_destroy(); //Unsets $_SESSION['user']
    header('location:'.SITEURL.'admin/login.php');
?>