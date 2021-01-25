<?php
// trim:-trim the whitspace
$string=' this is my example ';
$str_trim=trim($string);
echo $str_trim;


// trim the whitespace from left side
$string=' this is my example ';
$str_trim=ltrim($string);
echo $str_trim;

// trim the whitespace from right side
$string=' this is my example ';
$str_trim=rtrim($string);
echo $str_trim;
?>