<?php
// block ip address
require 'ip-address.php';
// echo $ip_address;
foreach ($ip_block as $ip) {
	// echo $ip;
	if($ip == $ip_address){
		// echo "yes";
		die("YOUR IP ADDRESS ".$ip_address." HAS BEEN BLOCKED!!!!");  
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>WELCOME!!!!</h1>
</body>
</html>