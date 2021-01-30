<?php
if(isset($_POST['roll'])){
	$rand=rand(1,6);
	echo "YOU ROLLED DICE ".$rand;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="random.php" method="post">
	<input type="submit" name="roll" value="ROLL DICE!!!">
</form>
</body>
</html>