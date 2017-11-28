<!DOCTYPE html>
<html>
<head>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
  <?php
    session_start();
    if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]) )
    {
      header("location:../index.php");
    }
    elseif ($_SESSION["role"]!="admin")
    {
      header("location:../php/logout.php");
    }
  
    require("../php/connect.php");
    
   
  
  
  
  
  
    if(isset($_POST["restoreid"]))
    {
  
  
      $sql1="UPDATE user SET trash=0 WHERE id='$_POST[restoreid]'";
      if(mysqli_query($db,$sql1))
      {
          echo "<script>
                  swal(
                  'Restore success',
                  'Paper restored',
                  'success'
                    )
                </script>";
      }
    }
    if(isset($_POST["deleteid"]))
    {
      $sql2="SELECT ext FROM user WHERE id='$_POST[deleteid]'";
      $res2=mysqli_query($db,$sql2);
      $row2=mysqli_fetch_assoc($res2);

      $sql1="DELETE FROM user WHERE id='$_POST[deleteid]'";
      if(mysqli_query($db,$sql1))
      {
         $sql3="ALTER TABLE user AUTO_INCREMENT = 1";
          mysqli_query($db,$sql3);
        
        $filename1 = "../pdf/R".$_POST["deleteid"].".pdf" ;
        if(file_exists($filename1))
        {
          unlink($filename1);
        }
        $filename2 = "../doc/R".$_POST["deleteid"].".".$row2["ext"] ;

        if(file_exists($filename2))
        {
          unlink($filename2);
        }
        
        
          echo "<script>
                  swal(
                  'Warning',
                  'Paper Deleted',
                  'warning'
                    )
                </script>";
        
      }


}



?>

  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
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
     <li class="nav-item active">
        <a class="nav-link" href="../php/trashedpapers.php">Trash</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/up.php">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/changepassword.php">Change Password</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>
  </nav>




<table class="table table-striped">
  <thead>
    <tr>
      <th>Script Id</th>
      <th>Title</th>
      <th>Name of Author</th>
      <th>Email</th>   
    </tr>
  </thead>
  <tbody>
    <?php
      $sql="SELECT * FROM user WHERE trash=1";
      $res=mysqli_query($db,$sql);
  

      if( mysqli_num_rows( $res )==0 )
      {
        echo '<tr><td colspan="4">No Papers Found</td></tr>';
      }
      else
      {
       
        while($row=mysqli_fetch_assoc($res))
        { 
                
          $id=$row['id'];
          echo "<tr>
          <td>
          <form action=trashview.php method='post'>
          <input type='hidden' name ='id' value='$id'>
          <input type='submit' class='btn btn-link' value = '$row[Upload]' ></form>
          </td>
          
          <td>{$row['title']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td>
          <td>
          <form action=../php/trashedpapers.php method='post'>
          <input type='hidden' name ='restoreid' value='$id'>
          <input type='submit' class='btn btn-default' value ='Restore' ></form>
          </td>
          <td>
          <form action=../php/trashedpapers.php method='post'>
          <input type='hidden' name ='deleteid' value='$id'>
          <input type='submit' class='btn btn-default' value ='Delete' ></form>
          </td>
        </tr>";
         
        }
      }
    ?>
  </tbody>
</table>



<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html> 
