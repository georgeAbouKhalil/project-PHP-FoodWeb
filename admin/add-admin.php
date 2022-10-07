<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //display session message if set
                unset($_SESSION['add']); // remove session message
            }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
                
            </tr>
            
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" placeholder="Enter Your username">
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Enter Your password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="add admin" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php   
    //Process the value from and save it in DataBase
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit'])){
        //Button clicked
        
        //get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //SQL QUERY to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        //echo $sql; check for the pass
        
        
        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Exceuted) data is inserted or not and display appropriate message
        if($res==TRUE){
            //echo "Data Inserted";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin added Successfully</div>";
            //Redirect page to Manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }else{
            //echo "Failed to Insert DATA";
            $_SESSION['add'] = "<div class='success'>Failed to Insert Admin</div>";
            //Redirect page to add admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
?>
