<?php
$string="this is my string";
$find=array('this','is','my','string');
$replace=array('THIS','IS','MY','STRING.');	
$newstring=str_replace($find, $replace, $string);
echo $newstring;
?>