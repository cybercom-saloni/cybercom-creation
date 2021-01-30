<?php
if(!isset($_POST['agree'])){
	echo "please check the checkbox";
}else{
	if(isset($_POST['firstname']) && isset($_POST['lastname'])){
	if(!empty($_POST['firstname']) && !empty($_POST['lastname'])){
		echo "<h1>WELCOME!!!".$_POST['firstname']."</h1>";
		echo " <h3>".$_POST['firstname']." ".$_POST['lastname']."</h3>";
		echo "<br><a href='2021-30-01(form).php'>BACK TO REGISTRATION </a>";
	}else{
		echo "field is empty";
	}
 }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="2021-30-01(form).php" method="post">
	<label>FIRST NAME:</label><br>
	<input type="text" name="firstname"><br>
	<label>LAST NAME:</label><br>
	<input type="text" name="lastname"><br>
	Agree to Terms of Service:<input type="checkbox" name="agree">
    <br>
	<input type="submit" name="submit">
</form>
</body>
</html>