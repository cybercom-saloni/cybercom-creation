<?php
//htmlentities:-display the command rather than process
if(isset($_GET['day']) && isset($_GET['date']) && isset($_GET['year'])){
	$day=htmlentities($_GET['day']);
	$date=htmlentities($_GET['date']);
	$year=htmlentities($_GET['year']);
	if(!empty($_GET['day']) && !empty($_GET['date']) && !empty($_GET['year'])){
		echo 'It is '.$day.' '.$date.' '.$year;

		ECHO "<BR> nice DAY";
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
<form action="htmlentitiesforSecurity.php" method="get">
	Day:<br><input type="text" name="day"><br>
	Date:<br><input type="text" name="date"><br>
	Year:<br><input type="text" name="year"><br>
	<br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>