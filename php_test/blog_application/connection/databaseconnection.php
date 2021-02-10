<?php
$servername="localhost";
$username="root";
$password="";
$dbname="blog_application";

//create connection
$conn=mysqli_connect($servername,$username,$password);

//check connection
if(!$conn)
{
	die("connection failed: ".mysql_connect_error());
}
// echo "connected sucessfully  ";

$db=mysqli_select_db($conn,$dbname);

if($db)
{
	// echo "database selected"."<br>";
}
else
{
	echo "database not selected";
}

?>