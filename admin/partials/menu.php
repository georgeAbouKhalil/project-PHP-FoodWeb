<?php 

	include('../config/constants.php'); 
	include('login-check.php'); 

?>


<html>
	<head>
		<title>Food Order Website - Home Page</title>
		<link rel="stylesheet" href="../css/admin.css">
		<script src="https://kit.fontawesome.com/f97ce0bc87.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- Menu Section Starts --->
		<div class="menu text-center">
			<div class="wrapper">
				<ul>
					<li><a href="index.php">Home</a></li> <!--change here to home.php -->
					<li><a href="manage-admin.php">Admin Manager</a></li>
					<li><a href="manage-category.php">Category</a></li>
					<li><a href="manage-food.php">Food</a></li>
					<li><a href="manage-order.php">Order</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<!-- Menu Section Ends --->