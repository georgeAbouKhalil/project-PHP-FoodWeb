<?php 
//Include constants.php file here
include('../config/constants.php');

//1. get the ID of the admin to be deleted
$id = $_GET['id'];

//2. create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

// check whether the query executed succesuffly or not
if($res==true){
    //querry executed succesully and admin deleted
    //echo "admin deleted";
    $_SESSION['delete'] = "<div class='success'> Admin Delete Succesfully </div>";
    //Redirect to Manage Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
}else{
    //failed to delete admin
    //echo "Failed to Delete Admin";
    $_SESSION['delete'] = "<div class='error'> Failed to delete admin try Again Later </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}


//3. redirect to manage admin page with message (success or not error)


?>