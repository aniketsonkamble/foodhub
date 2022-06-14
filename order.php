<?php include('config/constant.php');

?>

 <link rel="stylesheet" href="css/style.css">
<!-- order section starts  -->
<?php
if(isset($_GET['food_id']))
{
	$food_id=$_GET['food_id'];
	$sql="SELECT * FROM popular WHERE id=$food_id";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	if($count==1)
	{
		$row=mysqli_fetch_assoc($res);
		$title=$row['title'];
		$price=$row['price'];
		$image_name=$row['image_name'];
		
	}
	else
	{
		header('location'.SITEURL);
	}
}
 if(isset($_GET['food_id']))
{
	$food_id=$_GET['food_id'];
	$sql="SELECT * FROM food WHERE id=$food_id";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	if($count==1)
	{
		$row=mysqli_fetch_assoc($res);
		$title=$row['title'];
		$price=$row['price'];
		$image_name=$row['image_name'];
		
	}
	else
	{
		header('location'.SITEURL);
	}
}
else
   {
		header('location'.SITEURL);
	}

?>
   
<section class="order" id="order">

    <h3 class="sub-heading"> order now </h3>
    <h1 class="heading"> free and fast </h1>
	
	
	
  <?php
   $nameerr=$phoneerr=$quantityerr= "";
   $f1=$f2=$f3=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{$f1=$f2=$f3=0;
if (empty($_POST["name"])) 
{ $f1=1;
 $nameerr = "First Name is required"; 
 } 
else 
{ 
 $name = $_POST["name"]; 
$pattern="/^[a-zA-Z]*$/";
 // check if name only contains letters and whitespace 
 if (!preg_match($pattern,$name)) 
{ $f1=1;
 $nameerr = "Only alphabets and white space are allowed"; 
 } 
 }

  if (empty($_POST["quantity"])) 
{ $f2=1;
 $quantityerr = " Quantity is required"; 
 } 
else 
{ 
 $quantity = $_POST["quantity"]; 

 if ($quantity<0) 
{ $f2=1;
 $quantityerr = "Enter quantity properly."; 
 } 
 }
 
 if (empty($_POST["phone"])) 
{ $f3=1;
 $phoneerr = "phone number is required"; 
 } 
else 
{ 
 $phone = $_POST["phone"]; 
$pattern="/^\d{10}$/";
 // check if name only contains letters and whitespace 
 if (!preg_match($pattern,$phone)) 
{ $f3=1;
 $phoneerr = "10 digits are required"; 
 } 
 } 
 
}
?>
	
	
	
<form action="" method="POST"  name="order-form">       
			
			<div class="inputBox">
            <div class="input">
                <span></span>
				<?php 
				if($image_name=="")
				{
					echo "<div class='error'> Image not Available</div>";
				}
				else
				{?>
                <img src="<?php echo SITEURL;?>images/<?php echo $image_name;?>"width="100" height="100" >
                <?php
				}
				?>
			</div>
			
            <div class="input">
                <span >Title</span>
                    <input type="hidden" name="Title" value="<?php echo $title;?>">             
			        <?php echo $title;?><br>
			         <input type="hidden" name="Price" value="<?php echo $price;?>">
			         <?php echo "$".$price;?>
            </div>
        </div>
			
			<div class="inputBox">
            <div class="input">
                <span>your name</span>
                <input type="text" id="name" name="name" placeholder="enter your name" >
				<span class="error">* <?php echo $nameerr; ?>
          		 </div>
			
            <div class="input">
                <span>your number</span>
                <input type="number"  name="phone" placeholder="enter your number">
				<span class="error">* <?php echo $phoneerr; ?>
             </div>
		
			</div>
        </div>
        <div class="inputBox">  
              <div class="input">
                <span>how musch</span>
                <input type="number" name="quantity"  placeholder="how many orders">
				<span class="error">* <?php echo $quantityerr; ?>
               </div>
			   </div>
			    
        <div class="inputBox">
            <div class="input">
                <span>your address</span>
                <textarea name="Address" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                <span>your message</span>
                <textarea name="Message" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <input type="submit" name="submit" value="order now" class="btn">

    </form>

</section>
<?php 

   if(isset($_POST['submit']))
   {
		if($f1==0 && $f2==0 && $f3==0)
	{   
	   
	   $Title=$_POST['Title'];
	   $Price=$_POST['Price'];
	    $Quantity=$_POST['quantity'];
		$Total=$Price * $Quantity;
	   $Name=$_POST['name'];
	   $Mobile_number=$_POST['phone'];	   
	  date_default_timezone_set("Asia/Kolkata");
	   $Date_time=date("y-m-d h:i:sa");
	   $Address=$_POST['Address'];
	   $Message=$_POST['Message'];
	   $sql2="insert into order_table set Title='$Title',Price='$Price',Quantity='$Quantity',Total='$Total', Customer_name='$Name',Customer_number='$Mobile_number', Date_time='$Date_time',Address='$Address',Message='$Message'
	   ";
	   $res2=mysqli_query($conn,$sql2);
	   
	   header("location:index.php");
   }
    
   }
  
?>
    </body>
</html>