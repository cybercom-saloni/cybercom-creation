<?php
if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['game']) && isset($_POST['gender']) && isset($_POST['fileupload'])){
	if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['age']) && !empty($_POST['game']) && !empty($_POST['gender']) && !empty($_POST['fileupload'])){
			$name=$_POST['name'];
			$password=$_POST['password'];
			$address=$_POST['address'];
			$age=$_POST['age'];
			$game=$_POST['game'];
			$gender=$_POST['gender'];
			$file=$_POST['fileupload'];
			echo "Welcome, ".$name."!!!!<br>";
			echo "password: ".$password."<br>";
			echo "address: ".$address."<br>";
			echo "age: ".$age."<br>";
			echo "gender: ".$gender."<br>";
			echo "Select Game :<br>";
			foreach($game as $value){
				echo $value." , ";
			}
	}else{
			$name="";
			$password="";
			$address="";
			$age="";
			$game="";
			$gender="";
			$file="";
	}
}else{
			$name="";
			$password="";
			$address="";
			$age="";
			$game="";
			$gender="";
			$file="";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>TASK-1 USER FORM</title>
	<link rel="stylesheet" type="text/css" href="TASK-1_User_Form.css">
	<script type="text/javascript" src="TASK-1_User_Form.js"></script>
</head>
<body>
<div class="wrapper">
	<form action="TASK-1_User_Form.php"  method="post" onsubmit="return validation()">
			<table border="2px" class="center">
				<tr class="backcolor-yellow">
					<td colspan="2" class="text-red">USER FORM</td>
				</tr>
				<tr class="backcolor-blue">
					<td><label>Enter Name</label></td>
					<td><input type="text" name="name" id="name" class="input" pattern="[A-Za-z].{2,}" title="Please write your name more than 2 letter"><br><span id="span_name" class="red"></span></td>

				</tr>
				<tr class="backcolor-blue">
					<td><label>Enter Password</label></td>
					<td><input type="text" name="password" id="password" class="input" pattern="(?=.*[!@#$%^&*()_+]).{6,}" title="Must contain at least one special symbol and more than six characters"><br><span id="span_password" class="red"></span></td>
				</tr>
				<tr class="backcolor-blue">
					<td><label>Enter Address</label></td>
					<td>
						<textarea cols="20" rows="2" name="address" class="input" id="address"></textarea>
						<br><span id="span_address" class="red"> </span> 
					</td>
				</tr>
				<tr class="backcolor-blue">
					<td><label>Select Game</label></td>
					<td>
						<input type="checkbox" name="game[]" value="Hockey" id="Hockey">Hockey <br>	
						<input type="checkbox" name="game[]" value="Football" id="Football">Football<br>	
						<input type="checkbox" name="game[]" value="Badminton" id="Badminton">Badminton<br>	
						<input type="checkbox" name="game[]" value="Cricket" id="Cricket">Cricket<br>	
						<input type="checkbox" name="game[]" value="VolleyBall" id="VolleyBall">VolleyBall
						<br><span id="span_selectgame" class="red"> </span> 
					</td>
				</tr>
				<tr class="backcolor-blue">	
					<td><label>Gender</label></td>
					<td><input type="radio" name="gender" value="Male"  id="gender">Male<input type="radio" name="gender" value="Female"  id="gender">Female
						<br><span id="span_gender" class="red"> </span> 
					</td>
				</tr>
				<tr class="backcolor-blue">	
					<td><label>Select ur age</label></td>
					<td>
						<select name="age" id="age">
						<option name="select"  selected hidden disabled>SELECT</option>
						<option name="age1" value="0 to 10years">0 to 10years</option>
						<option name="age2" value="11 to 18years">11 to 18years</option>
						<option name="age3" value="18 to 22years">18 to 22years</option>
						<option name="age4" value="22 to 40years">22 to 40years</option>
						<option name="age5" value="40 plus years">40 plus years</option>
						</select><br>
						<span id="span_age" class="red"> </span> 
					</td>
				</tr>
				<tr class="backcolor-blue">	
					<td colspan="2"><input type="file" name="fileupload" class="input1" id="fileupload"></td><br>
					<span id="span_file" class="red"> </span> 
				</tr>
				<tr class="backcolor-blue">	
					<td colspan="2"><input type="reset" name="reset" class="input21">&nbsp;<input type="submit" name="submit" value="Submit Form" class="input2"></td>
				</tr>
			</table>
	</form>
</div>
</body>
</html>