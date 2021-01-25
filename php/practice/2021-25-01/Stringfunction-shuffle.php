<?php
$string='1234567890qwertyuiop';
$string_shuffled=str_shuffle($string);
echo $string_shuffled.'<br>';


// half of the length
$half=substr($string_shuffled,0,strlen($string)/2);
echo $half;
?>