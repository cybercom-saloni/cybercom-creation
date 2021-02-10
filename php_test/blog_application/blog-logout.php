<?php
session_start();
if(isset($_REQUEST['submit']))
{
	echo "<script type='text/javascript'>alert('Direct URL Called.');</script>";
	header("refresh:0; url=index.php");
}else{
session_destroy();
echo "<script type='text/javascript'>alert('Logout successfully!!!!.');</script>";
header("refresh:0; url=index.php");
}
?>