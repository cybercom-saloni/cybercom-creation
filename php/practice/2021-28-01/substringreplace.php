<?php
$string='this is part of search.';
$string_new=substr_replace($string, 'replacement',0,4);
echo $string_new;
?>