<?php
// output-buffering start
ob_start();
$redirect=false;
$location='https://www.google.com';
if($redirect==true){
	header('location:'.$location);
}
// ob_end_clean();
ob_end_flush();
?>