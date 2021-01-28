<?php
function has_match($string){
	if(preg_match('/this /', $string)){
		return true;
	}
	else{
		return	false;
	}
}

$string='This doesn\'t have a space';
if(has_match($string)){
	echo 'has at least one space';
}else{
	echo 'has no space';
}
?>