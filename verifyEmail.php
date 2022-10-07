<?php include('config/constants.php'); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://kit.fontawesome.com/f97ce0bc87.js" crossorigin="anonymous"></script>
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
.success{
    background: #F2DEDE;
    color: #A94442;
    padding: 10px 10px;
    width: 95%;
    border-radius: 5px;
}
.fas{
    font-size: 60px;
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
                  <h3><i class="fas fa-envelope-open-text"></i></h3>
                  <h2 class="text-center">Verify Email</h2>
                  <p><?php echo $_SESSION['message'] ?></p>

                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-shield-alt"></i></span>
                          <input id="OTPverifycation" name="OTPverify" placeholder="verify Code" class="form-control"  type="number">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="verifyEmail" class="btn btn-lg btn-primary btn-block" value="verify Email" type="submit">
                      </div>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

<?php

if(isset($_POST['verifyEmail'])){
    $_SESSION['message'] = "";
    $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
    $verifyQuery = "SELECT * FROM users WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);

    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            //$newQuery = "UPDATE users SET code = 0";
            header('location: newPassword.php');
        }else{
            $errors['verifycation_error'] = "Invalid Verification Code";
        }
    }else{
        $errors['db_error'] = "Failed while checking Verification Code from database!";
    }
}


?>