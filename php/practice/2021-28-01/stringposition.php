<?php
$string="this is a string";
$find="is";
echo strpos($string,$find);
$len=strlen($find);
echo "<br>".strpos($string,$find,3);
?>