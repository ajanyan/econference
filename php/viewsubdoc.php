<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #myiframe {width:100%; height:800px;} 
  </style>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>


<?php
  session_start();
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
  {
    header("location:../index.php");
  }
    elseif ($_SESSION["role"]!="subadmin")
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
      $task=$_POST['task'];
      $_SESSION['task']=$task;  
    }
    else
    {
      $id=$_SESSION['tempid'];
      $task=$_SESSION['task'];
      
    }

    if($task=="sub1")
    {
      $review="Review1";
      $substatus="substatus1";
      $r="1";
      
    }
    elseif ($task=="sub2")
    {
      $review="Review2";
      $substatus="substatus2";
      $r="2";
    }



  require("../php/connect.php");
  $sql="SELECT * FROM user WHERE id='$id'";
  $res=mysqli_query($db,$sql);
  $row=mysqli_fetch_assoc($res);


  if($r==1)
  {
    $co_rev=$row['sub2'];
  }
  else if($r==2)
  {
    $co_rev=$row['sub1'];
  }

?>
  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo "Welcome ".$_SESSION["name"]; ?></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../php/subadminprofile.php">Assigned Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/changesubpassword.php">Change Password</a>
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



<div class="container-float">
  <div class="row">
    <div class="col-lg-6">

      <?php 
    $doc="../pdf/R".$id.".pdf" ;
     echo"<iframe name='myiframe' class='' id='myiframe' src=$doc></iframe>";


   

  ?>
      
    </div>
    <div class="col-lg-6">
      <table class="table">
        <th><?php echo "Other reviewer :".$co_rev ?></th>
        <th><?php echo"Plagiarism :".$row['plagiarism']."%" ; ?></th>
      </table>
   


<div class="col-lg-12">
<?php
      
//View full screen
    // echo"<br><form action='../php/fullview.php' method='post' target='_blank'>
    // <input type='hidden' name='id' value='$id'></input>
    // <input type='submit' class='btn btn-primary form-control' value='View full Size'></input>  
    // </form>";

/*
    function edit($id,$review,$r)
    {
      require("../php/connect.php");
      $sql2="SELECT $review,r1$r,r2$r,r3$r,r4$r,r5$r,r6$r FROM user WHERE id ='$id'";
      $res2=mysqli_query($db,$sql2);
      $row2=mysqli_fetch_assoc($res2);
      echo mysqli_error($db);

      ?>
      
      <form id="form3" action='../php/viewsubdoc.php' method='post'>
      <div class="form-group">
        Originality
        <input type="number" class="form-control" name="m1" value="<?php echo '$row2[r1$r]'?>" required="" placeholder="In scale of 0-5"><br>
        Relevance to the conference topic
        <input type="number" class="form-control" name="m2" required="" placeholder="In scale of 0-5"><br>
        Significance of the article
        <input type="number" class="form-control" name="m3" required="" placeholder="In scale of 0-5"><br>
        Study of previous works in the domain of work
        <input type="number" class="form-control" name="m4" required="" placeholder="In scale of 0-5"><br>
        Chance of conversion of the method to product/software
        <input type="number" class="form-control" name="m5" required="" placeholder="In scale of 0-5"><br>
        Language  and expressiveness of the article
        <input type="number" class="form-control" name="m6" required="" placeholder="In scale of 0-5"><br>
        Overall Score
        <input type="number" class="form-control" name='message'  placeholder='In scale of 0-10' required=''>
          <br>
        <input type='submit' class="form-control btn btn-danger"  <link rel="stylesheet" type="text/css"  value='Proceed' rows="5" id='input-submit'></input>
       
 
     </div>
      </form>
      

  <?php
    

}*/

    function des($id,$substatus)
    {
      require("../php/connect.php");
      $sql3="UPDATE user SET $substatus='$_POST[decision]' WHERE id='$id'";
      mysqli_query($db,$sql3);
      echo mysqli_error($db);
      header("Refresh:0");
    }





  ?>
  <br>


<?php 


if ($row[$review]== NULL)
 {
?>
</div>

<form  action='../php/viewsubdoc.php' method='post' id="form1">
  <div class="form-group">
  Originality
  <input type="number" step="any" min="0" max="5" class="form-control" name="m1" required="" placeholder="In scale of 0-5"><br>
  Relevance to the conference topic
  <input type="number" step="any" min="0" max="5" class="form-control" name="m2" required="" placeholder="In scale of 0-5"><br>
  Significance of the article
  <input type="number" step="any" min="0" max="5" class="form-control" name="m3" required="" placeholder="In scale of 0-5"><br>
  Study of previous works in the domain of work
  <input type="number" step="any" min="0" max="5" class="form-control" name="m4" required="" placeholder="In scale of 0-5"><br>
  Chance of conversion of the method to product/software
  <input type="number" step="any" min="0" max="5" class="form-control" name="m5" required="" placeholder="In scale of 0-5"><br>
  Language  and expressiveness of the article
  <input type="number" step="any" min="0" max="5" class="form-control" name="m6" required="" placeholder="In scale of 0-5"><br>
  Overall Score
  <input type="number" step="any" min="0" max="10" class="form-control" name='message'  placeholder='In scale of 0-10' required=''>
    <br>
  Review Comments
  <textarea class="form-control" name='m7'cols="6"  ></textarea>
    <br>
  <input type='submit' class="form-control btn btn-danger"  <link rel="stylesheet" type="text/css"  value='Proceed' rows="5" id='input-submit'></input>
</div>
</form>

<?php

}
else if ($row[$substatus]==NULL) 
{

?>

<form  action="viewsubdoc.php" method="post">
<div class="form-group">
<!-- <input type="submit" class="form-control" name="decision" value="Edit"><br><br> -->
<input type="submit" class="btn bg-success" name="decision" value="Accept">
<input type="submit" class="btn bg-danger" name="decision" value="Reject">
<input type="submit" class="btn bg-warning" name="decision" value="Unable to judge">
</div>
  
</form>
<?php

}
else
{
  ?>
  <div class='jumbotron'>
  <h5><?php echo "Status:". $row['substatus'.$r];?></h5> <br>
  Originality:<?php echo $row['r1'.$r]."   ";?>(In scale of 0-5)<br>
  Relevance to the conference topic:<?php echo $row['r2'.$r];?>(In scale of 0-5)<br>
  Significance of the article:<?php echo $row['r3'.$r];?>(In scale of 0-5)<br>
  Study of previous works in the domain of work:<?php echo $row['r4'.$r];?>(In scale of 0-5)<br>
  Chance of conversion of the method to product/software:<?php echo $row['r5'.$r];?>(In scale of 0-5)<br>
  Language  and expressiveness of the article:<?php echo $row['r6'.$r];?>(In scale of 0-5)<br>
  Overall Score:<?php echo $row['Review'.$r];?>(In scale of 0-10)<br>
  Review Comments:<?php echo "       ".$row['r7'.$r]."   ";?><br>

  Review completed</div>";

  <?php
}
?>
















<?php 
  if (isset($_POST['assign'])) 
  {
    $assign=$_POST['assign'];
    $sql1="UPDATE user SET $task='$assign' WHERE id='$id' ";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
  }
  if(isset($_POST['message']))
  {
    $sql1="UPDATE user SET $review='$_POST[message]',r1$r='$_POST[m1]',r2$r='$_POST[m2]',r3$r='$_POST[m3]',r4$r='$_POST[m4]',r5$r='$_POST[m5]',r6$r='$_POST[m6]',r7$r='$_POST[m7]' WHERE id='$id'";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
    header("Refresh:0");

  }
  if(isset($_POST['decision']))
  {
    if($_POST['decision']=='Edit')
    {
      edit($id,$review,$r);
    }
    elseif ($_POST['decision']=='Accept' || $_POST['decision']=='Reject' || $_POST['decision']=='Unable to judge') 
    {
      des($id,$substatus);
    }
    
  }

 ?>






    </div>
  </div>
</div>



</div>
















<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>