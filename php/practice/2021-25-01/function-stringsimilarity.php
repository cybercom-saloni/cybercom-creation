<?php
//compare two string for similarity.
// percentage similar of the string
$string1='this is my page';
$string2='this is my page for web design';
similar_text($string1, $string2,$result);
echo 'the similarity between is : '.$result;
?>