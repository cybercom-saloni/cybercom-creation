<?php
$user_ip=$_SERVER['REMOTE_ADDR'];
function echo_ip(){
	$user_ip=$_SERVER['REMOTE_ADDR'];
	$string='Your IP address is'.$user_ip;
	echo $string;
}
echo_ip();
?>