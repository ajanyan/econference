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
      <br>
          

   



<?php
if ($row2['plagiarism']!=NULL)
{
  echo "<div id='form2'>Plagiarism percentage : <b>$row2[plagiarism] %</b></div><br>";
}
if ($row2['plagiarism']==NULL)
{
  echo"<div>
        <form action='viewdoc.php' method='post' id='form2'>
        <div class='form-group'>
        <br>
        Enter plagiarism percentage <br><br>" ;
    
        echo "<input type='number' name='pl' class='form-control' min=0 max=100 step='any' >
        <br>
        <input type='submit'class='form-control btn btn-info'  value='Proceed'>
        </div>
        </form>
        </div>";

}
else if ($row2['sub1']==NULL)
 {


echo"<div>
<form action='viewdoc.php' method='post' id='form2'>
<div class='form-group'>
  <br>
  Select Reviewer 1 <br>
  <select class='form-control' name='assign1'>" ;
    
      while ($row=mysqli_fetch_assoc($res))
      {
        echo "<option>{$row['Name']}</option>";
      }
      
    
  echo"</select><br>
        <input type='submit'class='form-control btn btn-info'  value='Assign'>
        </div>
        </form>
        </div>";
}


else if ($row2['sub2']==NULL)
 {


echo"<div>
      <form action='viewdoc.php' method='post' id='form2'>
      <br>
      Select Reviewer 2 
      <br>
      <select name='assign2' class='form-control'>" ;
    
      while ($row=mysqli_fetch_assoc($res))
      { if($row2["sub1"]!=$row["Name"])
        {
          
          echo "<option>{$row['Name']}</option>";
        }
      }
      
    
  echo"</select><br>
  <input type='submit' class='form-control btn btn-info' value='Assign'>

</form>
</div>";
}




if ($row2['substatus1']==NULL && $row2['sub1']!=NULL) 
{

  echo "<div id='form2'>Assigned to <b>$row2[sub1]</b></div>";
}
if ($row2['substatus2']==NULL && $row2['sub2']!=NULL) 
{

  echo "<div id='form2'><br>Assigned to <b>$row2[sub2]</b></div>";
}
if ($row2['substatus1']!=NULL && $row2['sub1']!=NULL) 
{

  ?>  
  <div>

  
    <b><?php echo "<br>Reviewer 1:$row2[sub1]"; ?></b>
    <?php echo "<br>Status 1:$row2[substatus1]"; ?> 
      <div class="jumbotron">
        
  Originality:<?php echo $row2['r11']."   ";?>(In scale of 0-5)<br>
  Relevance to the conference topic:<?php echo $row2['r21'];?>(In scale of 0-5)<br>
  Significance of the article:<?php echo $row2['r31'];?>(In scale of 0-5)<br>
  Study of previous works in the domain of work:<?php echo $row2['r41'];?>(In scale of 0-5)<br>
  Chance of conversion of the method to product/software:<?php echo $row2['r51'];?>(In scale of 0-5)<br>
  Language  and expressiveness of the article:<?php echo $row2['r61'];?>(In scale of 0-5)<br>
  Overall Score:<?php echo $row2['Review1'];?>(In scale of 0-10)<br>
  Review Comments:<?php echo "       ".$row2['r71']."   ";?><br>
        
          
        </div>

  
  


<?php



  
}


if ($row2['substatus2']!=NULL && $row2['sub2']!=NULL) 
{

  ?>


  <form class="cf23" id="form23">
  
     <b><?php echo "<br>Reviewer 2:$row2[sub2]"; ?></b>
    <?php echo "<br>Status 2:$row2[substatus2]"; ?>
    <br>
      <div class="jumbotron">
  Originality:<?php echo $row2['r12']."   ";?>(In scale of 0-5)<br>
  Relevance to the conference topic:<?php echo $row2['r22']."   ";?>(In scale of 0-5)<br>
  Significance of the article:<?php echo $row2['r32']."   ";?>(In scale of 0-5)<br>
  Study of previous works in the domain of work:<?php echo $row2['r42']."   ";?>(In scale of 0-5)<br>
  Chance of conversion of the method to product/software:<?php echo $row2['r52']."   ";?>(In scale of 0-5)<br>
  Language  and expressiveness of the article:<?php echo $row2['r62']."   ";?>(In scale of 0-5)<br>
  Overall Score:<?php echo $row2['Review2']."   ";?>(In scale of 0-10)<br>
  Review Comments:<?php echo "      ".$row2['r72']."   ";?><br>
        
          
        </div>
  </form>
</div>



<?php
if($row2['subdecision']==NULL && $row2['substatus1']!=NULL && $row2['substatus2']!=NULL)
{
  if($row2['substatus1']=="Accept" && $row2['substatus2']=="Accept")
  {
    $decision="Accept";
  }
  elseif ($row2['substatus1']=="Reject" || $row2['substatus2']=="Reject") 
  {
    $decision="Reject";
  }
  else
  {
    $decision="Reject";
  }
  $sqlfinal="UPDATE user SET subdecision='$decision' WHERE id='$id' ";
  mysqli_query($db,$sqlfinal);
  header("Refresh:0");
}
else if($row2["Status"]==NULL)
{
  
  echo "<br>Final Decision:";
  ?>

<form  action="viewdoc.php" method="post">
<div class="form-group">
<input type="submit" class="btn bg-success" name="decision" value="Accept">
<input type="submit" class="btn bg-danger" name="decision" value="Reject">

</div>
  
</form>


    <?php
}
if($row2["decision"]!=NULL)
{
	echo "Final Decision:";
	echo "<b>".$row2["decision"]."</b>";

}
}




?>



















</div>  

    </div>
    



  </div>











<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
