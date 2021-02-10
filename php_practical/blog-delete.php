<?php
require 'connection/databaseconnection.php';
if($_POST['id'])
{
$id=mysqli_real_escape_string($connection,$_POST['id']);
$delete = "DELETE FROM `category` WHERE catid='$id'";
$rs=mysqli_query($connection,$delete);
if($rs){
     echo "success";
}else{
     echo "error";
}
}
?>