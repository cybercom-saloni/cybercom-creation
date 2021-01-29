<?php
if(isset($_GET['day']) && isset($_GET['date']) && isset($_GET['year'])){
	$day=$_GET['day'];
	$date=$_GET['date'];
	$year=$_GET['year'];
	if(!empty($_GET['day']) && !empty($_GET['date']) && !empty($_GET['year'])){
		echo 'It is '.$day.' '.$date.' '.$year;
	}else{
		echo '<strong>Please fill all the details*****</strong>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="formdata.php" method="get">
	Day:<br><input type="text" name="day"><br>
	Date:<br><input type="text" name="date"><br>
	Year:<br><input type="text" name="year"><br>
	<br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>