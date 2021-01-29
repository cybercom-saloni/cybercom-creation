<?php
$filename=$_FILES['file']['name'];
$filesize=$_FILES['file']['size'];
$filetype=$_FILES['file']['type'];
$tmp_name=$_FILES['file']['tmp_name'];
$error=$_FILES['file']['error'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="file-upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file"><br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>