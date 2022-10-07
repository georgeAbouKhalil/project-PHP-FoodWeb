<?php include('config/constants.php'); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .form-gap {
    padding-top: 70px;
}
body{
    background: #0097e6;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.error{
    background: #F2DEDE;
    color: #A94442;
    padding: 10px 10px;
    width: 95%;
    border-radius: 5px;
}
.panel{
  border: 2px solid black;
}
</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>

                  <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php
                    }
                    if(isset($_SESSION['message'])){
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                    }
                    if(isset($errors['invalidEmail'])){
                      echo $errors['invalidEmail'];
                      unset($errors['invalidEmail']);
                    }
                    ?>

                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

<?php  

if(isset($_POST['submit'])){
$email=$_POST['email'];

    if(empty($email)){
        header('location: forget_password.php?error=Email is required');
        exit();
    }
    $emailCheckQuery = "SELECT * FROM users WHERE email='$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

    if($emailCheckResult){
      if(mysqli_num_rows($emailCheckResult) > 0){
        $_SESSION['email'] = $_POST['email'];
        $code = rand(999999,111111);
        $updateQuery = "UPDATE users SET code = $code WHERE email ='$email'";
        $updateResult = mysqli_query($conn, $updateQuery);
        if($updateQuery){
          $subject = 'Email Verification Code';
          $message = "Our Verification code is $code";
          $sender = 'FROM: ma382793@gmail.com';

          if(mail($email, $subject, $message, $sender)){
            $message = "<div class='success'>We've sent a verification code to your Email <br> $email </div>";

            $_SESSION['message'] = $message;
            header('location: verifyEmail.php'); //verifyEmail
          }
        }
      }
    }

}

?>
