<?php
require 'databaseconnection.php';
if($_POST['id'])
{
$id=mysqli_real_escape_string($connection,$_POST['id']);
$delete = "DELETE FROM `webapp` WHERE id='$id'";
$rs=mysqli_query($connection,$delete);
if($rs){
     echo "success";
}else{
     echo "error";
}
}
?>