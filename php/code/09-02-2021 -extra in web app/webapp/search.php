<?php
var_dump($_GET);
require 'connection/databaseconnection.php';
$search1=$_GET['search'];
$search=mysqli_real_escape_string($connection,$search1);
$query="SELECT * FROM `webapp` WHERE name LIKE '"."%".$search."%"."' OR `email` LIKE '"."%".$search."%"."' OR mobileno LIKE  '"."%".$search."%"."' OR title LIKE  '"."%".$search."%"."' ";
echo $query;
$rs=mysqli_query($connection ,$query);
if($rs){
  if(mysqli_num_rows($rs)>0){
    while($row=mysqli_fetch_assoc($rs)){
        $id=$row['id'];
        $name=$row['name'];
        echo "<br>".$id ."   ".$name;
    }
  }
  echo "success";

}else{
  echo "error";
}
?>