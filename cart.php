
<?php  
session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/6fb7fa5142.js"></script>



<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="flipkart-navbar caret">
    <div class="center">
	<img src="images/logo2.png" width="15%">
	<a href="home.php" class="line">Home</a>
	<a href="categories.php" class="line">Categories</a>
	<a href="foods.php" class="line">Foods</a>
	<a class="line">User: <?php echo $_SESSION['username-user']; ?></a>
	<a href="foods.php"><button name="back_to_food" class="lineButton"> BACK TO  <i class="fa fa-cutlery" aria-hidden="true"></i> </button></a>
</div>
</div>

<div class="col-md-6">
<br>
	<h2 class="text-center2"> Item <span style="color:#ff3838">Selected</span> </h2>
<br>

<?php

$total = 0;

$output = "";

$output .= "
<div class='text_center'>
	<table class='table table-bordered table-striped '>
	<tr>
		<th>ID</th>
		<th>Image</th>
		<th>Item Title</th>
		<th>Item Price</th>
		<th>Item Quantity</th>
		<th>Total Price</th>
		<th>Action</th>
	</tr>
	";
	if (!empty($_SESSION['cart'])) {
		
		foreach($_SESSION['cart'] as $key => $value){
			$output .= "
			 <tr>
			 	<td>".$value['id']."</td>
				<td> <img src=images/food/".$value['image']." width='60%'> </td>
				<td class='textCenter'>".$value['title']."</td>
				<td class='textCenter'>$".$value['price']."</td>
				<td class='textCenter'>".$value['quantity']."</td>
				<td class='textCenter'>$".$value['price'] * $value['quantity']."</td>
				<td>
					<a class='center2' href='cart.php?action=remove&id=".$value['id']."'>
						<button class='btn btn-danger btn-block'>Remove</button>
					</a>
				</td>
			";

			$total = $total + $value['quantity'] * $value['price'];
		}
		$output .= "
			<tr>
				<td colspan='4'></td>
				<td><b>Total Price</b></td>
				<td>$".$total."</td>
				<td>
					<a href='cart.php?action=clearall'>
					<button class='btn btn-warning btn-block'>Clear All</button>
					</a>
				</td>
			</tr>
			</div>
			</table>
			<button type=button' name='paypal' onclick='openSmallWindows()' class='btn1 btn-primary'><img class='paypal_logo' src='https://www.paypalobjects.com/webstatic/icon/pp258.png'><i class='pay'>Pay</i><i class='pal'>Pal</i></button>
			";
			
			
			
	}
	echo $output;

?>

</div>
<script>
	function openSmallWindows(){
		window.open("https://www.paypal.com/checkoutnow?locale.x=en_GB&fundingSource=paypal&sessionID=uid_097b30131b_mtc6ntu6mdq&buttonSessionID=uid_db4fe3a744_mtc6ntu6mdq&env=production&fundingOffered=paypal&logLevel=warn&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWxvYmplY3RzLmNvbS9hcGkvY2hlY2tvdXQuanMifQ&uid=183d533aa7&version=4&token=EC-1W182891HN501363D&xcomponent=1", "", "width=500, height=650");
	}
</script>

<?php
if(isset($_GET['action'])){

	if($_GET['action'] == "clearall"){
		unset($_SESSION['cart']);
	}

	if($_GET['action'] == "remove"){

		foreach($_SESSION['cart'] as $key => $value){

			if($value['id'] == $_GET['id']){
				unset($_SESSION['cart'][$key]);
			}
		}
	}
}


?>
   



