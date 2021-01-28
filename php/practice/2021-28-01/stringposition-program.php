<?php
$offset=0;
$find='is';
$findlen=strlen($find);
$string='this is a string';
while($strpos=strpos($string,$find,$offset)){
	echo $find.' found at '.$strpos.'<br>';
	$offset=$strpos+$findlen	;
}

?>