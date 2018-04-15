<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  </style>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>


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
        <a class="nav-link" href="../design-team.html">Design Team</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>

  </nav>


    

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

if(isset($_POST["trashid"]))
{

  require("../php/connect.php");
  $sql1="UPDATE user SET trash=1 WHERE id='$_POST[trashid]'";
  if(mysqli_query($db,$sql1))
  {
      echo "<script>
        swal(
        'Moved to trash',
        'You can restore it from trash when required',
       'warning'
            )
        </script>";
  }

}





require("../php/connect.php");
$sql="SELECT * FROM user WHERE Upload IS NOT NULL AND trash=0 ";
$res=mysqli_query($db,$sql);
echo mysqli_error($db);





?>


<table class="table table-striped">
  <thead>
    <tr>
      <th>Script Id</th>
      <th>Title</th>
      <th>Author </th>
      <th>Email</th>  
      <th>Status</th>  
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $res )==0 )
      {
        echo '<tr><td colspan="4">No Papers Found</td></tr>';
      }
      else
      {
       
        while($row=mysqli_fetch_assoc($res))
        { 
          if ($row['sub1'] == NULL) 
          {
              $status="Reviewer not assigned";
          }
          elseif ($row['sub2']== NULL)
          {
              $status="Second Reviewer not assigned";
          }
          elseif ($row['substatus1'] ==  NULL || $row['substatus2']== NULL)
          {
            
            $status="Under Review";
          }
          else
          {
            $status="Review Completed";
          }         
          $id=$row['id'];
          echo "<tr><td>{$row['Upload']}</td><td>{$row['title']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td>
          <td>$status</td>


          <td>
          <form action=viewdoc.php method='post'>
          <input type='hidden' name ='id' value='$id'>
          <input type='submit' class='btn btn-default' value ='Manage' ></form>
          </td>

          <td>
          <form action=../php/download.php method='post'>
          <input type='hidden' name ='id' value='$id'>
          <input type='submit' class='btn btn-default' value ='Download' ></form>
          </td>
          <td>
          <form action=../php/viewpapers.php method='post'>
          <input type='hidden' name ='trashid' value='$id'>
          <input type='submit' class='btn btn-default' value ='Trash' ></form>
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