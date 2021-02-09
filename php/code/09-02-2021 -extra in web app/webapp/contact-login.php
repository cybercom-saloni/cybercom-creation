<!DOCTYPE html>
<html>
<head>
	<title>WEBAPP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/contact-add.css">
</head>
<body>
	<!-- header file -->
<?php require'navbar/header.php';?>
  <!-- body -->

<div class="main">
	
	<div class="box1">
		<div class="box2">
			
				<div class="box2-header">
					Sign In
				</div>
				<div class="box2-footer">
					<form action="contact-login-process.php" method="POST">
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