<?php
// checking actual ip address rather than idividual computer
$http_client_ip=@$_SERVER['http_client_ip'];
// check user is using proxy or not
$http_x_forwarded_for=@$_SERVER['http_x_forwarded_for'];
// final decision
$remote_addr=$_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip)){
	$ip_address=$http_client_ip;
}elseif(!empty($http_x_forwarded_for)){
	$ip_address=$http_x_forwarded_for;
}else{
	$ip_address=$remote_addr;
}
echo $ip_address;
?>