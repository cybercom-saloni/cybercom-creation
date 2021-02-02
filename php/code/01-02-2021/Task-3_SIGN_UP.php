<?php
if(isset($_POST['agree'])){
	
	if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['game']) && isset($_POST['gender']) && isset($_POST['MaritalStatus']) &&isset($_POST['Day']) && isset($_POST['Month']) && isset($_POST['Year'])){
		if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['game']) && !empty($_POST['gender']) && !empty($_POST['MaritalStatus']) && !empty($_POST['Day']) && !empty($_POST['Month']) && !empty($_POST['Year'])){
				$name=$_POST['name'];
				$password=$_POST['password'];
				$address=$_POST['address'];
				$Day=$_POST['Day'];
				$Month=$_POST['Month'];
				$Year=$_POST['Year'];
				$MaritalStatus=$_POST['MaritalStatus'];
				$game=$_POST['game'];
				$gender=$_POST['gender'];
				
				echo "Welcome, ".$name."!!!!<br>";
				echo "password: ".$password."<br>";
				echo "address: ".$address."<br>";
				echo "gender: ".$gender."<br>";
				echo "Date of Birth: ".$Day." ".$Month." ".$Year."<br>";
				echo "Select Game :<br>";
				foreach($game as $value){
					echo $value." , ";
				}
				echo "<br>Marital Status : ".$MaritalStatus;
		}else{
				$name="";
				$password="";
				$address="";
				$Day="";
				$Month="";
				$Year="";
				$MaritalStatus="";
				$game="";
				$gender="";
		}
	}else{
				$name="";
				$password="";
				$address="";
				$Day="";
				$Month="";
				$Year="";
				$MaritalStatus="";
				$game="";
				$gender="";
	}
}else{
	echo "please check terms and condition";
				$name="";
				$password="";
				$address="";
				$Day="";
				$Month="";
				$Year="";
				$MaritalStatus="";
				$game="";
				$gender="";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TASK-3 SIGN UPFORM</title>
	<link rel="stylesheet" type="text/css" href="TASK-3_SIGN_UP.css">
</head>
<body>
		<div class="box">
				<div class="header">
					<h3>Sign Up</h3>
				</div>
				<div class="body">
					<form>
						<table class="center">
							<tr>
								<td><label>First Name</label>
								</td>
								<td><input type="text" name="name" id="name"  placeholder="Enter First Name" class="input"><br><span id="span_name" class="red"></td>	
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
								</select></td>
							</tr>


							<tr>
								<td><label>Email</label>
								</td>
								<td><input type="text" name="email" id="email" placeholder="Enter Email" class="input"></td>
							</tr>

							<tr>
								<td><label>Phone</label>
								</td>
								<td><input type="text" name="phone" id="phone" placeholder="Enter Phone" class="input"></td>
							</tr>

							<tr>
								<td><label>Password</label>
								</td>
								<td><input type="text" name="password" id="password" placeholder="Enter Password" class="input"></td>
							</tr>

							<tr>
								<td><label>Confirm Password</label>
								</td>
								<td><input type="text" name="confirmpassword" id="confirmpassword" placeholder="Enter Confirm Password" class="input"></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="checkbox" name="agree">I accept this agreement</td>	
							</tr>
						</table>
					</form>
				</div>
				<div class="footer">
					<input type="submit" name="submit" value="Submit" class="input21">&nbsp;<input type="reset" name="reset" value="Cancel" class="input2">
				</div>
		</div>
</body>
</html>




