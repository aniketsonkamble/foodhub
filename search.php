<?php  include('config/constant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagle Resturant</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    
 
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css"> 
   
   
</head>
<body>
    
 <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
		<?php $search =$_POST['aaa']; ?>
		
		<h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search;?></a></h2>

        </div>
    </section>
		<?php
		
		$sql= "select * from food where title like '%$search%'"; 
        $res=mysqli_query($conn,$sql);
	
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	        {
		        while($row=mysqli_fetch_assoc($res))
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
				<span class="price">&#x20b9;<?php echo$price;?></span>
                <a href="order.php?food_id=<?php echo $id;?>" class="btn">order now</a>
                
            </div> </div>
			<?php
		   }
	   }
	
	}
	else 
	{
	{
		
		$sql= "select * from popular where title like '%$search%'"; 
        $res=mysqli_query($conn,$sql);
	
	$count=mysqli_num_rows($res);
	if($count>0)
	{
	        {
		        while($row=mysqli_fetch_assoc($res))
		        {
			      $id=$row['id'];
			      $title=$row['title'];
			       $image_name=$row['image_name'];
			      $price=$row['price'];
			     
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
                <span class="price">&#x20b9;<?php echo$price;?></span>
                <a href="order.php?food_id=<?php echo $id;?>" class="btn">order now</a>
                
            </div> </div>
			<?php
		   }
	   }
	
	}
	}
	} 
           ?> 
    <!-- fOOD sEARCH Section Ends Here -->
 

<?php  include('front-footer.php');  ?>
</body>
</html>