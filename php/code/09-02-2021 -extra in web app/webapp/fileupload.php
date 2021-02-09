<?php
// var_dump($_POST);
// var_dump($_FILES);

$target_dir="upload/";
$target_file=$target_dir.basename($_FILES["filetoupload"]["name"]);
// echo $target_file;
$uploadok=1;
$imagefiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//check if image file is actual or not 
if(isset($_POST["submit"]))
{
	if($_FILES["filetoupload"]["name"]=="")
	{
		echo "no file selected";
		exit();
	}
	$check=getimagesize($_FILES["filetoupload"]["tmp_name"]);
	if($check!==false)
	{
		// var_dump($check);
		echo "file is an image".$check["mime"].".";
		$uploadok=1;
	}
	else
	{
		echo "<script>alert('file is not image');</script>";
		$uploadok=0;
	}
}

//check if file already exit
if(file_exists($target_file))
{
	echo "<script>alert('sorry,file already exists');</script>";
	$uploadok=0;
	// header("location:TASK-1_User_Form.php");
}

//check file size
if($_FILES["filetoupload"]["size"]>500000)
{
	echo "your file is too large";
	$uploadok=0;
}

//allow file format
if($imagefiletype!="jpg" && $imagefiletype!="png" && $imagefiletype!="jpeg" && $imagefiletype!="gif")
{
	echo "<script>alert(sorry file formate doesn't preg_match(	, subject));</script>";
	$uploadok=0;
	exit();

}

//check if upload ok is set to 0 by an error
if($uploadok==0)
{
	echo "your file was not upload";
}
//if everything is ok try to upload file
else
{
	if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_file))
	{
	echo "the file".basename($_FILES["filetoupload"]["name"])."has been uploaded";
	// header("location:");
	// exit();
}
else
{
	echo "sorry there was an error fir uploading your file";
}


}
?>