<?php
//it do expression matching pattern inside the string.
/*it return 1 or 0

first parameter is the to be matched parameter and second parameter is the string.
*/
$string='this is a string';
if(preg_match('/ is /',$string)){
	echo 'match found';
}else{
	echo 'match not found';
}
?>