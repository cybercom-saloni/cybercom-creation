<?php
$servername="localhost";
$username="root";
$password="";
$dbname="blog_application";

//create connection
$connection=mysqli_connect($servername,$username,$password);

//check connection
if(!$connection)
{
	die("connection failed: ".mysql_connect_error());
}
// echo "connected sucessfully  ";

$db=mysqli_select_db($connection,$dbname);

if($db)
{
	// echo "database selected"."<br>";
}
else
{
	echo "database not selected";
}

?>