<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body>
<?php 
	session_start();
	if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
	{
		header("location:../index.php");
	}
	elseif ($_SESSION["role"]!="admin")
  	{
  		header("location:../php/logout.php");
  	}
require("../php/connect.php");
$sql="SELECT * FROM user WHERE id ='$_POST[id]'";
$res=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($res);
	$to =$row['Email'] ;
	
	$subject = "Review of Submitted Paper";
	
	$txt = "This is a demo mail
	to check whether mailing system is working";
	$headers = "From: econferencecon@gmail.com";
mail($to,$subject,$txt,$headers);
$sql1="UPDATE user SET Status='Yes' WHERE id='$_POST[id]'";
mysqli_query($db,$sql1);
echo "Mail Sent";
	
?>
		<script>
			window.setTimeout(function() 
			{
    			window.location = '../php/viewpapers.php';
  			}, 2000);
		</script>






</body>
</html>