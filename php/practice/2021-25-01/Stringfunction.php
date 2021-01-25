<?php
$string='this is an example string & i like @u.';
// to count the variables
$string_word_count=str_word_count($string);
echo $string_word_count.'<br>';

$string_word_count=str_word_count($string,0);
echo $string_word_count.'<br>';
// return the array
$string_word_count=str_word_count($string,1);
print_r($string_word_count);
echo '<br>';
// assosiative array which gives us position:-str_word_count($string,2)
$string_word_count=str_word_count($string,2);
print_r($string_word_count);
echo '<br>';
// include specific character
$string_word_count=str_word_count($string,1,'&@.');
print_r($string_word_count);
echo '<br>';
?>