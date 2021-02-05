<?Php
require 'login-currentfilename.php';
echo $current_file;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="login-formprocess.php" method="POST">
	NAME:<input type="text" name="username" maxlength="40"><br>
	PASSWORD:<input type="text" name="password"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>