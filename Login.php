
<?php  include('config/constant.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
 <div class="container">
 	<div class="header">
 		<h1>login</h1>
 	</div>
	
	<?php 
		    if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}
	?>
 	<div class="main">
 		<form action="" method="POST">
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="text" placeholder="Username" name="username">
 			</span><br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password" name="password">
 			</span><br>
 				<input type="submit" name="submit" value="Login">

 		</form>
 	</div>
 </div>
</body>
</html>
<?php 
     if(isset($_POST['submit']))
	 { 
		 $username=$_POST['username'];
		 echo $username;
		 $password=md5($_POST['password']);
		 $sql="SELECT * FROM  admin_table WHERE username='$username' AND password='$password'";
		 
		 $res= mysqli_query($conn,$sql);
		
		 $count= mysqli_num_rows($res);
		 
		 if($count==1)
		 {
			 $_SESSION['login']="<div class='success'> Login Successfully .</div>"; 
				           header('location:'.SITEURL.'Admin/');
			 
		 }
		 else
		 {
			$_SESSION['login']="<div class='error'>Failed to Login .</div>"; 
				           header('location:'.SITEURL.'login.php');
			
		
		 }
	 }
	?>