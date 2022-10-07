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
    <?php 
        if(isset($_SESSION['order'])){
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        if(isset($_SESSION['user-login'])){
            echo $_SESSION['user-login'];
            unset($_SESSION['user-login']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Most <span style="color:#ff3838">Popular</span> Categories </h2>

            <?php 
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id ?>">
                            <div class="box-3 float-container">
                                <?php
                                //check if have image
                                    if($image_name==""){
                                        echo "<div class='error'>Image Not Available</div>";
                                    }else{
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        <?php
                    }
                }else{
                    echo "<div class='error'> Category not Added.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Most <span style="color:#ff3838">Popular</span> Foods </h2>
            <p class="text-center"><b> If you want to order <span style="color:#ff3838"> more than one food </span>you will need to go into foods Menu </b></p>

            <?php 
                // getting the food from database
                $sql2 = "SELECT * FROM tbl_food Where active='Yes' AND featured='Yes' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res);

                if($count2>0){
                    while($row=mysqli_fetch_assoc($res2)){
                        //get all the product details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                    if($image_name==""){
                                        echo "<div class='error'>Image not available.</div>";
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
                                    <?php echo $description ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }else{
                    echo "<div class='error'> Food not available.</div>";
                }


            ?>
            

            <div class="clearfix"></div>

            

        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- steps section starts  -->

<div class="step-container">

<h1 class="text-center" >how it <span style="color:#ff3838">works</span></h1>

<section class="steps">

    <div class="box">
        <img src="images/step-1.jpg" alt="">
        <h3>choose your favorite food</h3>
    </div>
    <div class="box">
        <img src="images/step-2.jpg" alt="">
        <h3>free and fast delivery</h3>
    </div>
    <div class="box">
        <img src="images/step-3.jpg" alt="">
        <h3>easy payments methods</h3>
    </div>
    <div class="box">
        <img src="images/step-4.jpg" alt="">
        <h3>and finally, enjoy your food</h3>
    </div>

</section>

</div>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="text-center" style="font-size:32px"> our customers <span style="color:#ff3838">reviews</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic1.png" alt="">
            <h3>johnny Taylor</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic2.png" alt="">
            <h3>Andro Miller</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic3.png" alt="">
            <h3>Emma Walker</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section>

<!-- review section ends -->

    <?php include('partials-front/footer.php'); ?>
    


<!-- loader part -->
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>







<script src="script.js"></script>