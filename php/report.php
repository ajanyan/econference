<?php 


	session_start();
	require("../php/connect.php");

	if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
	{
    	header("location:../index.php");
  	}
  	elseif ($_SESSION["role"]!="admin")
  	{
    	header("location:../php/logout.php");
  	}
	elseif (!isset($_SESSION["reportid"]))
	{
    	if (!isset($_POST['id']))
    	{
          header("location:../index.php");
    	}

   	}
    if(isset($_POST['id']))
    {
      $id=$_POST['id'];
      $_SESSION['reportid']=$id;  
    }
    else
    {
      $id=$_SESSION['reportid'];
      
    }

	$filename="../report/Report_R".$id.".doc";
    if(file_exists($filename))
	{
		header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename='.basename($filename));
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($filename));
	    readfile($filename);
	    exit;
	}

	$sql="SELECT * FROM user WHERE id=$id";
	$res=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($res);
	if($row["decision"]!=NULL)
	{
	if(!file_exists($filename))
	{ 

		$myfile = fopen($filename, "w");
$data="Script id:$row[Upload]\n\n
*** Review1 ***\n
Originality: $row[r11]  (In scale of 0-5)\n
Relevance to the conference topic:$row[r21](In scale of 0-5) \n
Significance of the article:$row[r31](In scale of 0-5) \n
Study of previous works in the domain of work:  $row[r41]  (In scale of 0-5) \n
Chance of conversion of the method to product/software:  $row[r51]  (In scale of 0-5) \n
Language  and expressiveness of the article:  $row[r61]  (In scale of 0-5) \n
Overall Score:$row[Review1]  (In scale of 0-10) \n
Review comment :$row[r71] \n\n

*** Review2 ***\n
Originality: $row[r12]  (In scale of 0-5) \n
Relevance to the conference topic:$row[r22](In scale of 0-5) \n
Significance of the article:$row[r32](In scale of 0-5) \n
Study of previous works in the domain of work:  $row[r42]  (In scale of 0-5) \n
Chance of conversion of the method to product/software:  $row[r52]  (In scale of 0-5) \n
Language  and expressiveness of the article:  $row[r62]  (In scale of 0-5) \n
Overall Score:$row[Review2]  (In scale of 0-10) \n
Review comment :$row[r72] \n\n

Status:$row[decision]";

		echo $data;
		fwrite($myfile, $data);
		fclose($myfile);
		header("Location:report.php");


	}


	}


	
 ?>



<html>
<head>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
	<title></title>
</head>
<body>

	<?php 

	if($row["decision"]==NULL)
	{
		          echo "<script>
                  swal(
                  'Reviw not completed',
                  'Please complete the review and generate report again',
                  'warning'
                    ).then(function() {
      				window.location.href ='../index.php';
 
					});
                </script>";
	}
 ?>






</body>
</html>
