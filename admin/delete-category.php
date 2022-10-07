<?php 
include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != ""){
        $path = "../images/category/".$image_name;
        $remove = unlink($path); // this func removing the image from the file and return false or true

        //if failed to remove
        if($remove==false){
            $_SESSION['remove'] = "<div class='error'> Faile to Remove Category Image </div>";

            header('location:'.SITEURL.'admin/manage-category.php');
            
            die();
        }
    }
    //delete from the database
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    $res = mysqli_query($conn,$sql);

    if($res==true){
        //set success
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }else{
        //failed to set success
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category .</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }

}else{
    header('location:'.SITEURL.'admin/manage-category.php');
}

?>