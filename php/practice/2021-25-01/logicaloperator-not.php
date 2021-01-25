 <?php
 	$number=100;
 	$upper=5;
 	$lower=2;

 	// not or
 	if(!($number==$lower)|| !($number ==$upper)){
 		echo 'ok!!!!';
 	}else{
 		echo 'not ok!!!!'; 
 	}


 	// not and
 	if(!($number==$lower) && !($number ==$upper)){
 		echo 'ok!!!!';
 	}else{
 		echo 'not ok!!!!'; 
 	}
 ?>