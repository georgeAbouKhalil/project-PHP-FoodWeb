<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center"> Food <span style="color:#ff3838">Menu</span> </h2>
            
            <?php  
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
                
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        <form action="foods.php?id=<?=$row['id'] ?>" method="POST">   <!-- start form -->
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        if($image_name==""){
                                            echo "<div class='error'>Image not found.</div>";
                                        }else{
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4> <?php echo $title; ?> </h4>
                                    <p class="food-price">$ <?php echo $price; ?> </p>
                                    <p class="food-detail">
                                        <?php echo $description; ?> 
                                    </p>
                                    <br>
                                    <input class="qty" type="number" name="quantity" value="1">
                                    <br><br>

                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

                                    <input type="hidden" name="title" value="<?= $row['title'] ?>">
                                    <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                    <input type="hidden" name="image_name" value="<?= $row['image_name']; ?>">
                                    
                                    <input type="submit" name="add_to_cart" value="Add To Cart" class="btn btn-primary">
                                </div>
                            </div>
                        </form> <!--  end form -->
                        <?php
                    }
                    
                }else{
                    echo "<div class='error'>Food not Found.</div>";
                }
            ?>
            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>


    <?php  
    
    if(isset($_POST['add_to_cart'])){
        
        
        if(isset($_SESSION['cart'])){
            $session_array_id = array_column($_SESSION['cart'], "id");

            if(!in_array($_GET['id'], $session_array_id)){
                $session_array = array(
                    'id' => $_GET['id'],
                    "title" => $_POST['title'],
                    "price" => $_POST['price'],
                    "quantity" => $_POST['quantity'],
                    "image" => $_POST['image_name']
                );
                $_SESSION['cart'][] = $session_array;
            }

        }else{
            $session_array = array(
                'id' => $_GET['id'],
                "title" => $_POST['title'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity'],
                "image" => $_POST['image_name']
            );
            $_SESSION['cart'][] = $session_array;
        }
        if(in_array($_GET['id'], $session_array_id)){
            ?>
            
            <script>alert("The product is already in the cart !!");</script>
        <?php
        }
    }
    ?>