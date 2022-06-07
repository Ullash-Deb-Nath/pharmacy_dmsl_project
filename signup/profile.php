<?php
session_start();
if($_SESSION['signup_login_status']!="logged in" and ! isset($_SESSION['user_id']) )
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out"){
$_SESSION['signup_login_status']="loged out";
unset($_SESSION['user_id']);
header("Location:../index.php");
}	
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <title>Customer Profile | Pharmacy</title>
        <link rel="stylesheet" href="styleuu.css">
        <script type="text/javascript" lang="javascript" src="./responsiveRegistaration.js"></script>
		<link rel="stylesheet" href="style.css"> 
    </head>
       
    <body>
	<header class="header">

        <div class="flex">
     
           <a href="#" class="logo">Pharmacy</a>
     
           <nav class="navbar">
              <a href="home.php">Home</a>
              <a href="profile.php">Customer Profile</a>
			  <a href="cpassword.php">Change Password</a>
			  <a href="allproduct.php">Shop</a>
           </nav>
         
           <a href="cart.php" class="cart">Cart</a>
     
           <div id="menu-btn" class="fas fa-bars"></div>
           <nav class="navbar">
            <a href="?sign=out">Logout</a>
            
         </nav>
     
        </div>
     
     </header>
        <h1 align="center">Profile</h1>
		<br><br>
		
    
</div>

<?php
include("../connection.php");
$username=$_SESSION['user_id'];
$sql="select username,email,password,mobile,dob,gender,picture,address from registration where username='$username'";
$r=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($r);
$name=$row['username'];
$email=$row['email'];
$password=$row['password'];
$mobile=$row['mobile'];
$dob=$row['dob'];
$gender=$row['gender'];
$picture=$row['picture'];
$address=$row['address'];

echo "<h1 align='center'>Hello, I'm $username</h1>";
echo "<div align='center' class='fakeimg' style='height:100px;'><img src='../uploadedimage/$picture' height='80px' width='100px'></div>";
echo "<h1 align='center'><p><b>Email: </b>$email</br><b>Mobile: </b>$mobile</br><b>DOB: </b>$dob</br><b>Gender: </b>$gender</br><b>Address: </b>$address</br></p></h1>";
?>
     
</body>
</html>