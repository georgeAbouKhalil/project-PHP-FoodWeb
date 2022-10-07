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
                  <h2 class="text-center">Change Password</h2>
                  <p>Change Password</p>

                  <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php
                    }
                    
                    ?>

                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                    <?php 
                          if(isset($_SESSION['password'])){
                              echo $_SESSION['password'];
                              unset($_SESSION['password']);
                          }
                          if(isset($_SESSION['emptypassword'])){
                              echo $_SESSION['emptypassword'];
                              unset($_SESSION['emptypassword']);
                          }
                          ?>
                          <br><br>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                          
                          <input id="password" name="password" placeholder="password" class="form-control"  type="password">
                        </div>
                        <br>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                          <input id="confirmPassword" name="confirmPassword" placeholder="confirmPassword" class="form-control"  type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="changePassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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
 
if(isset($_POST['changePassword'])){
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $username = $_SESSION['user-failed'];
    
    if(empty($password) && empty($confirmPassword)){
        $_SESSION['emptypassword'] = "<div class='error'>Password is required</div>";
    }else if($password != $confirmPassword){
        $_SESSION['password'] = "<div class='error'>Password not Matched</div>";
    }else{
        $password = $_POST['password'];
        $email = $_SESSION['email'];

        $updatePassword = "UPDATE users SET password = '$password' WHERE email='$email'";
        $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");

        $updatePassword2 = "UPDATE users SET password = '$password' WHERE username='$username'";
        $updatePass2 = mysqli_query($conn, $updatePassword2) or die("Query Failed");

        session_destroy();
        header('location: index.php');
    }
}

?>