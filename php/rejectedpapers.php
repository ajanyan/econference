<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #myiframe {width:700px; height:350%;} 
  </style>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
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
$sql="SELECT * FROM user WHERE Review1 IS NOT NULL AND Review2 IS NOT NULL AND decision='Reject' AND trash=0";
$res=mysqli_query($db,$sql);
echo mysqli_error($db);





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
      <li class="nav-item ">
        <a class="nav-link" href="../php/acceptedpapers.php">Accepted Papers</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../php/rejectedpapers.php">Rejected Papers</a>
      </li>
      <li class="nav-item">
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
      <th>Status</th>  
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $res )==0 )
      {
        echo '<tr><td colspan="5">No Papers Found</td></tr>';
      }
      else
      {
       
        while($row=mysqli_fetch_assoc($res))
        { 
                
          $id=$row['id'];
          echo "<tr>
          
          <td>
          <form action=viewcompleted.php method='post'>
          <input type='hidden' name ='id' value='$id'>
          <input type='submit' class='btn btn-link' value = '$row[Upload]' ></form>
          </td>
          
          <td>{$row['title']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td>
                <td>Completed</td>

        </tr>";
          
          
         
        }
      }
    ?>
  </tbody>
</table>










<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html> 