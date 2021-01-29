<?php
//to delete a file we use function unlink('filename').
$filename='files.txt';
if(@unlink($filename)){
	echo 'File <strong>'.$filename.'</strong> has been deleted';
}else{
	echo 'File cannot be deleted.';
}
?>