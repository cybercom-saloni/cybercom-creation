<?php
require 'databaseconnection.php';
session_start();
$http_refer=$_SERVER['HTTP_REFERER'];
echo $http_refer;
session_destroy();
echo "logout sucessfully";
header("location:$http_refer");
?>