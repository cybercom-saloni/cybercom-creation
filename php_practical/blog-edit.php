<?php
session_start();
require 'connection/databaseconnection.php';
if(!isset($_GET['msg']))
{
	echo "<script type='text/javascript'>alert('Direct URL Called.');</script>";
	header("refresh:0; url=index.php");
}else{
	$id=$_SESSION['id'];
	// echo $id;
	$query="SELECT * FROM `register` WHERE id='".mysqli_real_escape_string($connection,$id)."' AND status=1";
	$rs=mysqli_query($connection,$query);
	if(mysqli_num_rows($rs)>0){
		while($row=mysqli_fetch_assoc($rs)){
			$firstname=$row['firstname'];
			$prefix=$row['prefix'];
			$lastname=$row['lastname'];
			$email=$row['email'];
			$mobileno=$row['mobile'];
			$information=$row['information'];
		
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLOG APPLICATION</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">


</head>
<body onload="disablebtn()">
	<div class="box">
		
		<div class="col-xl-12 col-md-12 col-sm-12 col-12">
			<div class="row">
				<div class="col-xl-2 col-md-2 col-sm-2 col-2">
				</div>
				<div class="col-xl-8 col-md-8 col-sm-8 col-8 container">
					<h3><center>REGISTER</center></h3>
   			 		<form class="form-group" action="blog-edit-process.php?id=<?php echo $id; ?>" id="register" method="post" onsubmit="return validation()">
		   			 	<div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Prefix</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label>
		        			    	<select name="prefix" id="prefix" class="form-control" onchange="validateprefix(this.id)" >
		        			    		<option name="select" selected hidden disabled value="none">Select Prefix</option>
		        			    		<option name="Mr" value="Mr." <?php if($prefix=="Mr.") echo "selected";?>>Mr.</option>
		        			    		<option name="Miss" value="Miss." <?php if($prefix=="Miss.") echo "selected";?>>Miss.</option>
		        			    		<option name="Mrs" value="Mrs." <?php if($prefix=="Mrs.") echo "selected";?>>Mrs.</option>
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
		        			    <label><input type="text" name="firstname" id="firstname" placeholder="John" class="form-control" onchange="validatename(this.id)"  pattern="[A-Za-z].{2,}" title="Please write your name more than 2 letter" maxlength="20" value="<?php echo $firstname; ?>"></label>
		        			    <br><span id="span_name" class="red"></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Last Name</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="lastname" id="lastname" placeholder="Smith" class="form-control" onchange="validatelastname(this.id)" pattern="[A-Za-z].{2,}" title="Please write your name more than 2 letter"  maxlength="20"  value="<?php echo $lastname; ?>"></label>
		        			    <br><span id="span_lastname" class="red"></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Email</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="email" id="email" placeholder="JohnSmith14@gmail.com" class="form-control"  maxlength="50"  value="<?php echo $email; ?>" readonly></label>
		        			    <br><span id="span_email" class="red">
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Mobile Number</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="text" name="mobileno" id="mobileno" placeholder="9413123321" class="form-control" maxlength="10"  value="<?php echo $mobileno; ?>"></label> <br><span id="span_mobile" class="red">
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Password</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="password" name="password" id="password" placeholder="******" class="form-control"   pattern="(?=.*[!@#$%^&*()_+]).{8,}" title="Must contain at least one special symbol and more than six characters" minlength="8"maxlength="12" class="red"></label>
		        			    <br><span id="span_password" class="red"></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Confirm Password</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="password" name="confirmpassword" id="confirmpassword" placeholder="******" class="form-control" minlength="8"maxlength="12"  pattern="(?=.*[!@#$%^&*()_+]).{8,}" title="Must contain at least one special symbol and more than six characters"></label>
		        			    <br><span id="span_confirmpassword" class="red"></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			<label>Information</label>
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><textarea class="form-control" name="information" id="information" ><?php echo  $information;?></textarea></label>
		        			    <br><span id="span_information" class="red" ></span>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <label><input type="checkbox" name="accept" id="accept" onclick="acceptcondition(this)" > Here by,I accept terms and condition</label>
		                    </div>
		                </div>
		                <div class="row">
		   			 		<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		   			 			
		        			</div>
		        			<div class="col-xl-6 col-md-6 col-sm-6 col-6">
		        			    <input type="submit" name="submit" id="submit" class="btn-lg btn-success" value="Submit">
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
<?php
}
?>