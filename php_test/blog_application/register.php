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
				<div class="col-xl-8 col-md-8 col-sm-8 col-8 container">
					<h3><center>REGISTER</center></h3>
   			 		<form class="form-group" action="register-process.php" id="register" method="post" onsubmit="return validation()">
		   			 	<div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Prefix</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label>
		        			    	<select name="prefix" id="prefix" class="form-control">
		        			    		<option name="select" selected hidden disabled value="none">Select Prefix</option>
		        			    		<option name="Mr" value="Mr.">Mr.</option>
		        			    		<option name="Miss" value="Miss.">Miss.</option>
		        			    		<option name="Mrs" value="Mrs.">Mrs.</option>
		        			    	</select>
		        			    	 <br><span id="span_prefix" class="red"> </span>
		        			    </label>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>First Name</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="firstname" id="firstname" placeholder="John" class="form-control" onchange="validatename(this.id)"  maxlength="20"></label>
		        			    <br><span id="span_name" class="red"></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Last Name</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="lastname" id="lastname" placeholder="Smith" class="form-control" onchange="validatelastname(this.id)"  maxlength="20"></label>
		        			    <br><span id="span_lastname" class="red"></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Email</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="email" id="email" placeholder="JohnSmith14@gmail.com" class="form-control" onchange="validateemail(this.id)"  maxlength="50"></label>
		        			    <br><span id="span_lastname" class="red"></label>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Mobile Number</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="mobileno" id="mobileno" placeholder="9413123321" class="form-control" onchange="validateemail(this.id)"  maxlength="50"></label></label>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Password</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="password" name="password" id="password" placeholder="******" class="form-control" onchange="validatepassword(this.id)"  minlength="8"maxlength="12"></label>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Confirm Password</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label></label>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Information</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label></label>
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
</html>