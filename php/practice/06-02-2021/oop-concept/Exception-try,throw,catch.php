<?php
$age=16;
try{
	if($age>18){
		echo "Adult";
	}else{
		throw new Exception('Not old enough.');
	}
}catch(Exception $e){
	echo 'Error: '.$e->getMessage();
}
?>