<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
<body>


<?php
		
	if(!isset($_POST["password"] ) && !isset($_POST["email"]))
	{
		header("location:../index.php");
	}


	require("connect.php");
	

	$user=$_POST["email"];
	$pass=$_POST["password"];

	$sql="SELECT Name,Password,Role FROM des WHERE 	Email='$user' AND Password='$pass' ";
	$res=mysqli_query($db,$sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$row = mysqli_fetch_assoc( $res );
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['name']=$row['Name'];
		$_SESSION['id']=$row['id'];
		$_SESSION['role']=$row['Role'];

		
		if( $row['Role']=="admin" )
		{
			header('Location:../php/viewpapers.php');
		}
		elseif ($row['Role']=="subadmin") 
		{
			header('Location:../php/subadminprofile.php');
		}
		else
		{
			header('Location:../php/userprofile.php');
		}

		
	}
	else
	{
		echo"<script>
		swal(
  			'Oops...',
  			'Usename and password does not match!',
  			'error'
			).then(function() {
			window.location.href ='../index.php';
			});
		</script>";

	}

	?>



	</body>
</html>