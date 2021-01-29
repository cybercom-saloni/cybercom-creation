<?php
// $readin=file('file.txt');
// foreach ($readin as $name) {
// 	echo $name." , ";
// }

$handle=fopen('file.txt','r');
echo fread($handle, 10);
echo fread($handle,filesize('file.txt'));
?>