<?php

require 'databaseconnection.php';
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['lastname']) && isset($_POST['phone']) &&isset($_POST['password']) && isset($_POST['confirmpassword'])  && isset($_POST['Day']) && isset($_POST['Month']) && isset($_POST['gender']) && isset($_POST['country'])){
			
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])  && !empty($_POST['Day']) && !empty($_POST['Month']) && !empty($_POST['gender']) && !empty($_POST['country'])){

				if(isset($_POST['agree'])){
					$name=htmlentities($_POST['name']);
					$email=htmlentities($_POST['email']);
					$lastname=htmlentities($_POST['lastname']);
					$phone=htmlentities($_POST['phone']);
					$password=md5($_POST['password']);
					$confirmpassword=md5($_POST['confirmpassword']);
					$Day=$_POST['Day'];
					$Month=$_POST['Month'];
					$Year=$_POST['Year'];
					$gender=$_POST['gender'];
					$country=$_POST['country'];

					if (!preg_match ("/^[a-zA-z]*$/", $name) ) {
								$ErrMsg = "Only alphabets and whitespace are allowed."; 
								echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
							}elseif(!preg_match ("/^[a-zA-z]*$/", $lastname)){
								$ErrMsg = "Only alphabets and whitespace are allowed."; 
								 echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
									
							}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
								$ErrMsg = "Email is invalid."; 
								 echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
							}elseif(!preg_match('/[0-9A-Za-z!@#$%]{8,12}/', $password)){
								// $ErrMsg = ""; 
								 echo "<script type='text/javascript'>alert('Password is invalid.');</script>";

							}elseif(!preg_match('/[0-9A-Za-z!@#$%]{8,12}/', $confirmpassword)){
								// $ErrMsg = ""; 
								 echo "<script type='text/javascript'>alert('CPassword is invalid.');</script>";
							}elseif(!preg_match('/^[6-9][0-9]{9}$/', $phone)){
								// $ErrMsg = ""; 
								 echo "<script type='text/javascript'>alert('phone number is invalid.');</script>";
							}elseif($password!=$confirmpassword){
								echo "<script type='text/javascript'>alert('Password is not match.');</script>";

							}else{//pattern matching
								echo "welcome ".$name." ".$lastname."!!!<br>email: ".$email."<br>phone : ".$phone."<br>password : ".$password."<br>confirmpassword : ".$confirmpassword."<br>DOB : ".$Day."-".$Month."-".$Year."<br>gender: ".$gender."<br>country :".$country;
								$qry="INSERT INTO `reg_table`(`firstname`, `lastname`, `password`, `confirmpassword`, `gender`, `email`, `phone`, `DOB`) VALUES ('".$name."','".$lastname."','".$password."','".$confirmpassword."','".$gender."','".$email."','".$phone."','".$Day.'-'.$Month.'-'.$Year."')";
							echo $qry;
							$rs=mysqli_query($conn,$qry);
							if($rs){
								echo "<br>"."insert sucessfull";
							}
							else{
								echo "insert unsucessfull!!";
							}
							}
				}else{// agreement
					echo '<script>alert("Please accept terms and condition.");</script>';
				}
				
			}else{//not empty
				echo '<script>alert("Not empty  fields.*******");</script>';
			}

		}else{//isset

			echo '<script>alert("Required all fields.*******");</script>';
		}
	}else{//request method
			echo '<script>alert("REQUEST METHOD DOES NOT FULL FILL.");</script>';
		die('error in loading page........');
	}
	
}else{//submit
	// /echo "no";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TASK-3 SIGN UPFORM</title>
	<link rel="stylesheet" type="text/css" href="TASK-3_SIGN_UP.css">
	<script type="text/javascript" src="TASK-3_SIGN_UP.js"></script>
</head>
<body onload="disablebtn()">
		<div class="box">
				<div class="header">
					<h3>Sign Up</h3>
				</div>
				<form action="TASK-3_SIGN_UP.php" method="POST" onsubmit="return validation()" name="UserForm">
					<div class="body">
					
						<table class="center">
							<tr>
								<td><label>First Name</label>
								</td>
								<td><input type="text" name="name" id="name"  placeholder="Enter First Name" class="input" onchange="validatename(this.id)" pattern="[A-Za-z].{2,}" title="Please write your name more than 2 letter"><br><span id="span_name" class="red"></td>	
							</tr>						
							<tr>
								<td><label>Last Name</label>
								</td>
								<td><input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" class="input"><br><span id="span_lastname" class="red"></td>
							</tr>		
							
							<tr>
								<td><label>D.O.B</label>
								</td>
								<td>
									<select name="Month" id="Month" class="input-select">
									<option value="none" selected disabled hidden>Month</option>
									<option value="Jan">Jan</option>
									<option value="Feb">Feb</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">Aug</option>
									<option value="September">Sept</option>
									<option value="October">Oct</option>
									<option value="November">Nov</option>
									<option value="December">Dec</option>
								</select>
								
								<select name="Day" id="Day" class="input-select1">
									<option value="none" selected disabled hidden>Day</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
						

								<select name="Year" id="Year" class="input-select2">
									<option value="none" selected disabled hidden>Year</option>
									<option value="2021">2021</option>
									<option value="2020">2020</option>
									<option value="2019">2019</option>
									<option value="2018">2018</option>
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
									<option value="2009">2009</option>
									<option value="2008">2008</option>
									<option value="2007">2007</option>
									<option value="2006">2006</option>
									<option value="2005">2005</option>
									<option value="2004">2004</option>
									<option value="2003">2003</option>
									<option value="2002">2002</option>
									<option value="2001">2001</option>
									<option value="2000">2000</option>
									<option value="1999">1999</option>
									<option value="1998">1998</option>
								</select>
								<br><span id="span_Month" class="red">  
								</td>
							</tr>

							<tr>
								<td><label>Gender</label>
								</td>
								<td class="input-radio-margin"><input type="radio" name="gender" value="Male" class="input-radio" id="gender">Male<input type="radio" name="gender" value="Female" id="gender" class="input-radio">Female<br><span id="span_gender" class="red"> </span> </td>
							</tr>
							
							<tr>
								<td><label>Country</label>
								</td>
								<td><select name="country" id="country" class="input-select3">
									<option value="none" selected disabled hidden>Country</option>
									<option value="India">India</option>
									<option value="Russia">Russia</option>
									<option value="America">America</option>
									<option value="Indonesia">Indonesia</option>
								</select><br><span id="span_country" class="red"> </span> </td>
							</tr>


							<tr>
								<td><label>Email</label>
								</td>
								<td><input type="text" name="email" id="email" placeholder="Enter Email" class="input"><br><span id="emailids" class="red"> </span> </td>
							</tr>

							<tr>
								<td><label>Phone</label>
								</td>
								<td><input type="text" name="phone" id="phone" placeholder="Enter Phone" class="input">
									<br><span id="mobileno" class="red"> </span> </td>
							</tr>

							<tr>
								<td><label>Password</label>
								</td>
								<td><input type="text" name="password" id="password" placeholder="Enter Password" class="input"><br><span id="span_password"></span></td>
							</tr>

							<tr>
								<td><label>Confirm Password</label>
								</td>
								<td><input type="text" name="confirmpassword" id="confirmpassword" placeholder="Enter Confirm Password" class="input"><br><span id="span_confirmpassword"></span></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="checkbox" name="agree" id="accept" onclick="acceptcondition(this)" >I accept this agreement</td>	
							</tr>
						</table>
				</div>
				<div class="footer">
					<input type="submit" name="submit" id="submit" value="Submit" class="input21">&nbsp;<input type="reset" name="reset" value="Cancel" class="input2">
				</div>
			</form>
		</div>
</body>
</html>




