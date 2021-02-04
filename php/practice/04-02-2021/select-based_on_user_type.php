<?php
if(isset($_GET['msg'])){
	if($_GET['msg']=='undefinedfood'){
		echo "<script type='text/javascript'>alert('FOOD TYPE IS NOT SELECTED');</script>";
	}else{
		$_GET['msg']=='';
	}
	if($_GET['msg']=='submitnotclick'){
		echo "<script type='text/javascript'>alert('SUBMIT BUTTON NOT CLICKED');</script>";
	}else{
		$_GET['msg']=='';
	}
}else{
		isset($_GET['msg'])=='';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="get" action="select-based_on_user_type_process.php">
	<label>FOOD TYPE:</label>	
	<br>
	<select name="food">
		<option value="none" selected disabled hidden>SELECT</option>
		<option value="2">UNHEALTHY</option>
		<option value="1">HEALTHY</option>
	</select><br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>