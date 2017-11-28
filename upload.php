<?php
header("Access-Control-Allow-Origin:http://www.racis18.com");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.3/sweetalert2.all.min.js"></script>
</head>
<body>


<?php
if(isset($_POST["email"]))
{
require("./php/connect.php");

$name=$_POST["name"];
$email=$_POST["email"];
$title=$_POST["title"];



 define ("filesplace","./pdf");

 if (is_uploaded_file($_FILES['paper_pdf']['tmp_name']))
{

    if ($_FILES['paper_pdf']['type'] != "application/pdf")
    {
        echo "<p>Paper must be uploaded in PDF format.</p>";
    } 
    else
    {
        $sql1="INSERT INTO user(Name,Email,title) VALUES('$name','$email','$title')";
        mysqli_query($db,$sql1);
        echo mysqli_error($db);
        $sql2="SELECT id FROM user WHERE Email='$email' ORDER BY id DESC LIMIT 1";
        $res=mysqli_query($db,$sql2);
        $row=mysqli_fetch_assoc($res);

        $name = "R".$row['id'];
        $result = move_uploaded_file($_FILES['paper_pdf']['tmp_name'], filesplace."/$name.pdf");
        ?>
        

        <?php
       
    }
} 



define("filesplacedoc","./doc");
if (is_uploaded_file($_FILES['paper_source']['tmp_name']))
{
    $path_parts = pathinfo($_FILES["paper_source"]["name"]);
    $ext = $path_parts['extension'];

    $namedoc = "R".$row['id'];
    $resultdoc = move_uploaded_file($_FILES['paper_source']['tmp_name'], filesplacedoc."/$namedoc"."."."$ext");


} 

$sql3="UPDATE user SET Upload='$name' WHERE id='$row[id]'";
$sql5="UPDATE user SET ext='$ext' WHERE id='$row[id]'";
 	mysqli_query($db,$sql3);
    if(mysqli_query($db,$sql5))
    {
        echo "<script>
                  swal(
                  'Success',
                  'Paper submitted successfully',
                  'success'
                    ).then(function() {
                    window.location.href ='php/up.php';
                    });
                </script>";
    
}
    echo mysqli_error($db);
}
else
{
    echo "Unauthorised access";
}
?>
</body>
</html>
