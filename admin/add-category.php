<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php 

            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>

            <br><br>

        <!-- Add category form start -->
            <form action="" method="POST" enctype="multipart/form-data">

                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Category title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image" >
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes" >Yes
                            <input type="radio" name="featured" value="NO" >No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>

            </form>
        <!-- Add category form end -->

        <?php  
            if(isset($_POST['submit'])){
                //echo "cliked";

                //Get the value from category form
                $title = $_POST['title'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }else{
                    $featured = "No";
                }
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else{
                    $active = "No";
                }
                //check the image if selected
                 //print_r($_FILES['image']); //becouse we wont to check the file name and location

                //die();

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    //auto rename our image
                    
                    //upload the Image only if image is selected
                    if($image_name != ""){
                        
                    
                    $ext = end(explode('.', $image_name, )); // the end to get the last file name like .jpg/png/gif/etc

                    $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // new image name Food_Category_num between(000-999).jpg/png/gif/etc

                    
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/".$image_name;
                    //and now we upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check if the image upload
                    if($upload==false){
                        $_SESSION['upload'] = "<div class='error'> Failed to upload image. </div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }

                }
                }else{
                    $image_name="";
                }

                

                //insert to the sql table
                $sql = "INSERT INTO tbl_category SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                //check whether if the query executed or not in the data if added
                if($res==true){
                    $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }else{
                    $_SESSION['add'] = "<div class='error'>Failed to add Category </div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }


            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>