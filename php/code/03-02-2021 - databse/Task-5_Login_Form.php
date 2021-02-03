<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>TASK 5 LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="css/TASK-5_Login_Form.css">
</head>
<body>
<div class="main">
	
	<div class="box1">
		<div class="box2">
			<div class="row">
				<div class="box2-header">
					Sign In
				</div>
				<div class="box2-footer">
					<form action="TASK-5_Login_FormProcess.php" method="POST">
						<label>E-mail Address</label><br>
						<input type="text" name="email" placeholder="Email...."><br>
						<label>Password</label><br>
						<input type="text" name="password" placeholder="Password...."><br>
						<input type="submit" name="submit" value="Sign In">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>