<?php
function adddiv($num1,$num2){
	return (($num1+$num1)/($num2+$num2));
}
echo adddiv(10,5);
echo "<br>from another way:-<br>";

// another way
function add($num1,$num2){
	return $num1+$num2;
}
function divide($num1,$num2){
	return $num1/$num2;
}
echo divide(add(10,10),add(5,5));
?>