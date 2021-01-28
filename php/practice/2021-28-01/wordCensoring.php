<?php
if(isset($_POST['userinput']) && !empty($_POST['userinput'])){
	// echo "work";
	 $userinput=$_POST['userinput'];
	 echo $userinput;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
	<hr>	
<form action="wordCensoring.php" method="post">	
	<textarea cols="40" rows="10" name="userinput"><?php echo $userinput ;?>	</textarea>
	<br>	
	<input type="submit" name="submit" value="submit">

</form>
</body>
</html>