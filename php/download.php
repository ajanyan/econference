<!DOCTYPE html>

<html>

<head>

	<title>Hii</title>

</head>

<body>



<?php

print_r($_POST);



$filename="../pdf/R".$_POST["id"].".pdf";

$contenttype="application/force-download";

header("Content-Type:".$contenttype);

header("Content-Disposition: attachment; filename=\"" .basename($filename) . "\";");



readfile($filename);

exit();  

?>

</body>

</html>