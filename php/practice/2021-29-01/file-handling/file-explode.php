<?php	
$handle=fopen('file.txt','r');
$datain=fread($handle,filesize('file.txt'));
$name_array=explode(',', $datain);
foreach ($name_array as $name) {
	echo $name.'<br>';
}

echo $name_array[0];
?>