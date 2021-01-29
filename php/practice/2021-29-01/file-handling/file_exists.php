<?php
$filename='files.txt';
if(file_exists($filename)){
	echo "File already exists";
}else{
	$handle=fopen($filename,'w');
	fwrite($handle,'Nothing');
	fclose($handle);	
}
?>