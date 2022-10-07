<html>
<body>
<center>
<h1 style="color:Tomato;"> the user is block </h1>
</center>

<a href="reset.php"> <button> Reset </button> </a>

</body>
</html>


<html>
	<head>
		<center>
			<title>the user is block</title>
		</center>
	</head>
	
	<body>
	<?php
	function RandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	$randomPass = RandomString();
	$_SESSION['randomPass1'] = $randomPass;
	$to = "georgeak752@gmail.com";
	$subject = " hey ".$_SESSION['username2']." ur password is block";
	
	$message = "<b> Reset Password </b>";
	$message .= "<h1> please reset ur password </h1>";
	$message .= "<a href=http://localhost/labs/lab11/reset.php>click here </a>";
	$message .= "<br>the new password is : $randomPass";
	
	$header = "From:abc@somedomain.com \r\n";
	$header .= "Cc:afgh@somedomain.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type:text/html\r\n";
	
	$retval = mail($to,$subject,$message,$header);
	
	if($retval == true){
		echo "Message sent successfully...";
	}else{
		echo "Message could not be sent...";
	}
	?>
	
	</body>
</html>