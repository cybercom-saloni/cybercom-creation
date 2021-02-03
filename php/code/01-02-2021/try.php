<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{ if(htmlentities($_POST['name']) || stripslashes($_POST['name'])){
	echo "post";
	echo stripslashes($_POST['name']);
	echo htmlentities($_POST['name']);
}
}else{
	echo "get";
	echo $_POST['name'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="try.php" method="post">
	<input type="text" name="name">
	<input type="submit" name="submit">
</form>
</body>
</html>