<?php  include('config/constant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yamifood Resturant</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    
 
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css"> 
   
   
</head>
<body>
    <!-- header section starts      -->

<header>

    <a class="navbar-brand" ><img src="images/logo.png" alt="" /></a>

    <nav class="navbar">
        <a class="active" href="#home">home</a>
        <a href="#dishes">dishes</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#review">review</a>
        
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
    
        <a href="#" class="fas fa-shopping-cart"></a>
		<a href="Login.php" class="fas fa-user"></a>
    </div>

</header>
<!-- search form  -->

<form action="<?php SITEURL;?>search.php" id="search-form" method="POST">
    <input type="search" placeholder="search here..." name="aaa" id="search-box">
   <label for="search-box" class="fas fa-search"name="search"></label>
    <i class="fas fa-times" id="close"></i>
	
</form>


<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>spicy noodles</h3>
                    <p>Though instant ramen noodles provide iron, B vitamins and manganese, they lack fiber, 
					protein and other crucial vitamins and minerals</p>
                    <a href="#" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home-img-1.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>chocolate  cake</h3>
                    <p>It is said that chocolate cake is good for reducing cholesterol levels. 
					It is good for making a good and healthy heart. The chocolate inside cake lowers the LDL level which leads to 
					protection from coronary heart disease. A moderate amount of sugar and chocolate helps in regulating the cholesterol 
					level in the body.</p>
                    <a href="#" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home-img-2.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>hot pizza</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>
                    <a href="#" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home-img-3.png" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="dishes">

    <h3 class="sub-heading"> our dishes </h3>
    <h1 class="heading"> popular dishes </h1>
       <div class="box-container">
    <?php 
	   $sql="SELECT * FROM popular ";
	   $res=mysqli_query($conn,$sql);
	   $count=mysqli_num_rows($res);
	   if($count>0)
	   {
		   while($row=mysqli_fetch_assoc($res))
		   {
			   $id=$row['id'];
			   $title=$row['title'];
			   $image_name=$row['image_name'];
			   $price=$row['price'];
			   ?>
			   
			    <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
			<?php 
			if($image_name=="")
			{
				  echo"<div calss='error'> Image is not available.</div>";
			}
			else
			{
				?>
				 <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" alt="">   
				<?php
			}
			?>
               
            <h3><?php echo $title;?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span>&#x20b9;<?php echo $price;?></span>
            <a href="order.php?food_id=<?php echo $id;?>" class="btn">Order now</a>
        </div>
			   <?php
		   }
		 }
		   else
		   {
			   echo"<div calss='error'> Popular Food Not Added.</div>";
		   }
	?>
        
        </div>

    </div>

</section>

<!-- dishes section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>best food in the country</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->
 
<!-- menu section starts  -->

<section class="menu" id="menu">

    <h3 class="sub-heading"> our menu </h3>
    <h1 class="heading"> today's speciality </h1>
	
<div class="box-container">
        
      <?php 
       	    $sql="SELECT * FROM food ";
	        $res1=mysqli_query($conn,$sql);
	        $count=mysqli_num_rows($res1);
	        if($count>0)
	        {
		        while($row=mysqli_fetch_assoc($res1))
		        {
			      $id=$row['id'];
			      $title=$row['title'];
			       $image_name=$row['image_name'];
			      $price=$row['price'];
			      $description=$row['description'];
			   ?>  
				   
				   <div class="box">
				   <div class="image">
				   <?php
				   if($image_name=="")
			        {
			      	  echo"<div calss='error'> Image is not available.</div>";
			          }
	            		else
			          {
				       ?>
				       <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>" alt="">   
				       <?php
			}
			?>
			            <a href="#" class="fas fa-heart"></a>
                         </div>
                          <div class="content">
                            <div class="stars">
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                   <i class="fas fa-star-half-alt"></i>
                               </div>
							   
                <h3><?php echo$title;?></h3>
                <p><?php echo$description;?></p>
                <a href="order.php?food_id=<?php echo $id;?>" class="btn">order now</a>
                <span class="price">&#x20b9;<?php echo$price;?></span>
            </div> </div><?php
		   }
	   }else
		   {
			   echo"<div calss='error'>  Food Not Added.</div>";
		   }
	?>                     
       

</section>

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/a.jpeg" alt="">
                    <div class="user-info">
                        <h3>Aniket Sonkamble</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/manmath.jpeg" alt="">
                    <div class="user-info">
                        <h3>Manmath Ashiture</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/Dipak.jpeg" alt="">
                    <div class="user-info">
                        <h3>Dipak Ligade</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/Shreyash.jpeg" alt="">
                    <div class="user-info">
                        <h3> Shreyash Pawar</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit fugiat consequuntur repellendus aperiam deserunt nihil, corporis fugit voluptatibus voluptate totam neque illo placeat eius quis laborum aspernatur quibusdam. Ipsum, magni.</p>
            </div>

        </div>

    </div>
    
</section>

<!-- review section ends -->


<?php  include('front-footer.php');  ?>

<!-- loader part  -->
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
	   