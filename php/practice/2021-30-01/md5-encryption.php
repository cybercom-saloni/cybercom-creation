<?php
/*MD5 is a form of encryption and a hash is generated from a given string.
md5('string') it is used for encryption*/
// $string="saloni";
$string="password";//5f4dcc3b5aa765d61d8327deb882cf99
$string_hash=md5($string);
echo $string_hash;
?>