<?php
$filename=$_FILES['file']['name'];
$filesize=$_FILES['file']['size'];
$filetype=$_FILES['file']['type'];
$tmp_name=$_FILES['file']['tmp_name'];
// echo $filetype;
// echo $filesize;
$file_extension=strtolower(substr($filename,strpos($filename,'.') + 1));
echo $file_extension;
$error=$_FILES['file']['error'];
$max_size=2097152;

if(isset($_FILES['file']['name'])){
	if(!empty($_FILES['file']['name'])){
		if($filesize<=$max_size){
			$location="uploads/";
			if(move_uploaded_file($tmp_name,$location.$filename)){
				echo "uploaded";
			}
			if(($file_extension=='jpg' || $file_extension=='jpeg') && $filetype=='image/jpeg'){
				echo 'size match';
			}

		}else{
			echo "file size must be 2mb or less";

		}
	}else{
		echo "please choose a file";
	}
}
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