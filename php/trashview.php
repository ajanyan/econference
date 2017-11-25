<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #myiframe {width:100%; height:980px;} 
  </style>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
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
  elseif (!isset($_SESSION["tempid"]))
   {
      if (!isset($_POST['id']))
    {
          header("location:../index.php");

    }

   }
    if(isset($_POST['id']))
    {
      $id=$_POST['id'];
      $_SESSION['tempid']=$id;  
    }
    else
    {
      $id=$_SESSION['tempid'];
      
    }

    if (isset($_POST['decision'])) 
      {

      if ($_POST['decision']=='Accept' || $_POST['decision']=='Reject' || $_POST['decision']=='Unable to judge') 
        {
          $sql3="UPDATE user SET decision='$_POST[decision]' WHERE id='$id'";
          $sql5="UPDATE user SET Status='Yes' WHERE id='$id'";
          mysqli_query($db,$sql3);
          mysqli_query($db,$sql5);
          echo mysqli_error($db);
          header("Refresh:0");
          
        }

    }



  ?>

  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../php/viewpapers.php">Submitted Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/completedpapers.php">Completed Papers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/viewsubadmin.php">Manage Reviewer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/acceptedpapers.php">Accepted Papers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/rejectedpapers.php">Rejected Papers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/changepassword.php">Change Password</a>
      </li>
    
    </ul>
    <ul class="navbar-nav">
            <li class="nav-item">
        <?php

            echo"<form action='../php/fullview.php' method='post' target='_blank'>
           <input type='hidden' name='id' value='$id'> 
           <input type='submit' class='btn btn-danger ' value='View Full Size'>  
           </form>";
        ?>
     </li>
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>
  </nav>



  

<?php 
  require("../php/connect.php");
  $sql="SELECT Name FROM des WHERE Role='subadmin'";
  $res=mysqli_query($db,$sql);
?>

<?php
$sql2="SELECT * FROM user WHERE id='$id'";
$res2=mysqli_query($db,$sql2);
$row2=mysqli_fetch_assoc($res2);

?>

<?php
    
    


  if (isset($_POST['pl'])) 
  {
    $pl=$_POST['pl'];
    $sql1="UPDATE user SET plagiarism='$pl' WHERE id='$id' ";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
    header("Refresh:0");
  }
  if (isset($_POST['assign1'])) 
  {
    $assign1=$_POST['assign1'];
    $sql1="UPDATE user SET sub1='$assign1' WHERE id='$id' ";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
    header("Refresh:0");
  }

  if (isset($_POST['assign2'])) 
  {
    $assign2=$_POST['assign2'];
    $sqla1="UPDATE user SET sub2='$assign2' WHERE id='$id' ";
    mysqli_query($db,$sqla1);
    echo mysqli_error($db);
    header("Refresh:0");
  }


 ?>




<div class="container-float">
  <div class="row">
<!--     <div class="col-lg-6" >
 -->        <?php 
     $doc="../pdf/R".$id.".pdf" ;
     echo"<iframe class='col-lg-6' name='myiframe' type='application/pdf' id='myiframe' src=$doc></iframe>";
  ?>
      
    <div class="col-lg-6" >
      <br><br>
    
     
<?php 

echo "Restore the paper for further processing";

 ?>


    </div>  

  </div>
</div>











<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>