<?php
session_start();
if($_SESSION['admin_login_status']!="logged in" and ! isset($_SESSION['user_id']) )
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out"){
$_SESSION['admin_login_status']="loged out";
unset($_SESSION['user_id']);
header("Location:../index.php");
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Pharmacy</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
      }
      
      * {
        box-sizing: border-box;
      }
      
      /* Add padding to containers */
      .container {
        padding: 16px;
        background-color: white;
      }
      
      /* Full-width input fields */
      input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
      }
      
      input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      
      /* Overwrite default styles of hr */
      hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
      }
      
      /* Set a style for the submit button */
      .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }
      
      .registerbtn:hover {
        opacity: 1;
      }
      
      /* Add a blue text color to links */
      a {
        color: dodgerblue;
      }
      
      /* Set a grey background color and center the text of the "sign in" section */
      .signin {
        background-color: black;
        text-align: center;
      }
      </style>
</head>
<body>
    <div class="topnav">
         <a class="active" href="home.php">Home</a>
        <a href="profile.php">Change Password</a>
        <a href="addfood.php">Add Product</a>
        <a href="viewfood.php">View Products</a>
        <a href="myorder.php">Customer Orders</a>
        <div class="topnav-right">
          <a href="?sign=out">Logout</a>
        </div>
      </div>
      <form action="profile.php" method="post">
        <div class="container">
          <h1>Changing Password</h1>
          <hr>
          <label for="psw"><b>Old Password</b></label>
          <input type="password" placeholder="Enter old Password" name="opsw" id="opsw" required>
      
          <label for="psw"><b>New Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="rpsw" id="rpsw" required>
          <hr>
          <button type="submit" class="registerbtn"name="submit">Save</button>
        </div>
      </form>
	   <script src="script.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	include("../connection.php");
	$opsw=$_POST['opsw'];
	$psw=$_POST['psw'];
	$rpsw=$_POST['rpsw'];
	if($psw==$rpsw)
	{
		$sql="select password from admin where password='$opsw'";
		$r=mysqli_query($con,$sql);
		if(mysqli_num_rows($r)>0)
		{
			$sql1="update admin set password='$psw'";
			if(mysqli_query($con,$sql1))
			{
				echo "password changed successfully!";
			}	
		}
		else{
			echo "old password does not match!";
		}
			
	}
	else{
		echo "New password does not match with repeat password!";
	}
}

?>