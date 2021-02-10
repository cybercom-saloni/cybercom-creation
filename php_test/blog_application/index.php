<!DOCTYPE html>
<html>
<head>
	<title>BLOG APPLICATION</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">

</head>
<body>
	<div class="box">
		
		<div class="col-xl-12 col-md-12 col-sm-12 col-12">
			<div class="row">
				<div class="col-xl-2 col-md-2 col-sm-2 col-2">
				</div>
				<div class="col-xl-8 col-md-8 col-sm-8 col-8">
					<form class="form-group" action="index-login-process.php" id="login" method="post" onsubmit="return validation()">
						<div class="row">
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<h1><center>LOGIN</center></h1>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<center><label>Email</label></center>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<center><label><input type="text" name="email" id="email" placeholder="JohnSmith14@gmail.com" class="form-control"  maxlength="50"></label>
		        			    <br><span id="span_email" class="red"></span></center>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<center><label>Password</label></center>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<center><label><input type="password" name="password" id="password" placeholder="******" class="form-control"   pattern="(?=.*[!@#$%^&*()_+]).{8,}" title="Must contain at least one special symbol and more than six characters" minlength="8"maxlength="12" class="red"></label>
		        			    <br><span id="span_password" class="red"></span></center>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<center><label><input type="checkbox" name="remember" value="1">remember</label>
		        			    <br><span id="span_password" class="red"></span></center>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
								<div class="row">
									
									<div class="col-xl-12 col-md-12 col-sm-12 col-12">
										<center><input type="submit" name="submit" id="submit" class="btn btn-lg btn-success" value="Login">
										 <a href="blog-register.php" class="btn btn-lg btn-success">REGISTER</a></center>
									</div>
								</div>
							</div>

						</div>	
					</form>
				</div>
				<div class="col-xl-2 col-md-2 col-sm-2 col-2">
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</html>

