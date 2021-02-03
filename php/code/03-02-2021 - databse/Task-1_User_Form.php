<?php

require 'databaseconnection.php';
// echo $_SERVER['REQUEST_METHOD'];
if(isset($_POST['submit']))	{
	var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['game']) &&isset($_POST['address']) && isset($_POST['gender'])&& isset($_FILES["filetoupload"]["name"])){
				if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['age']) && !empty($_POST['game']) && !empty($_POST['address']) && !empty($_POST['gender']) && !empty($_FILES["filetoupload"]["name"])){
					require 'fileupload.php';
					$name=$_POST['name'];
					$password=$_POST['password'];
					$password1=md5($password);
					$address=$_POST['address'];
					$age=$_POST['age'];
					$game=$_POST['game'];
					$gender=$_POST['gender'];
					$file=$_FILES["filetoupload"]["name"]; 
					 // echo $file;
						if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
						    $ErrMsg = "Only alphabets and whitespace are allowed."; 
						    // echo $ErrMsg;
						    echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
						}elseif (!preg_match ("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $password) ) {
							 $ErrMsg = "Required pattern does not match.";
							 echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
						// }elseif (!preg_match ("/^(?=.*[A-Za-z])[0-9A-Za-z-]*$/", $address) ) {  
						//     $ErrMsg = "Address space is invalid"; 
						//     // echo $ErrMsg;
						//     echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
							
						}else {    
							echo "Welcome, ".$name."!!!!<br>";
							echo "password: ".$password1."<br>";
							echo "address: ".$address."<br>";
							echo "age: ".$age."<br>";
							echo "gender: ".$gender."<br>";
							// echo $file;
							echo "Select Game :<br>";
							$game_length=count($game);
							// echo $game_length;
							$count=1;
							foreach($game as $value){
								if($count<= $game_length){
									echo $value;
								}
								if($count < $game_length){
				                    echo ",";
				                }
				                $count++;
							}
							$game1=implode(',',$game);
							// echo "<br> new game".$game1;
							$qry="INSERT INTO `form1_table`(`name`, `password`, `address`, `age`, `gender`,`game`,`picture`) VALUES ('".$name."','".$password1."','".$address."','".$age."','".$gender."','".$game1."','".$_FILES["filetoupload"]["name"]."')";
							//echo $qry;
							$rs=mysqli_query($conn,$qry);
							if($rs){
								echo "<br>"."insert sucessfull";
							}
							else{
								echo "insert unsucessfull!!";
							}
						}
					}else{
							$name="";
							$password="";
							$address="";
							$age="";
							$game="";
							$gender="";
							$file="";
							 echo '<script>alert("Please fill the  fields****.");</script>';
					}
			
		}else{
					
					echo '<script>alert("Please fill the  fields****.");</script>';
		}
	}else{
		echo '<script>alert("REQUEST METHOD DOES NOT FULL FILL.");</script>';
		die('error in loading page........');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TASK-1 USER FORM</title>
	<link rel="stylesheet" type="text/css" href="css/TASK-1_User_Form.css">
	<script type="text/javascript" src="js/TASK-1_User_Form.js"></script>
</head>
<body>
<div class="wrapper">
	<form action="TASK-1_User_Form.php"  name="UserForm" method="post" enctype="multipart/form-data" onsubmit="return validation()">
			<table border="2px" class="center">
				<tr class="backcolor-yellow">
					<td colspan="2" class="text-red">USER FORM</td>
				</tr>
				<tr class="backcolor-blue">
					<td><label>Enter Name</label></td>
					<td><input type="text" name="name" id="name" class="input" onchange="validatename(this.id)" pattern="[A-Za-z].{2,}" title="Please write your name more than 2 letter"><br><span id="span_name" class="red"></span></td>

				</tr>
				<tr class="backcolor-blue">
					<td><label>Enter Password</label></td>
					<td><input type="text" name="password" id="password" class="input" onchange="validatepassword(this.id)"  pattern="(?=.*[!@#$%^&*()_+]).{6,}" title="Must contain at least one special symbol and more than six characters"><br><span id="span_password" class="red"></span></td>
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
						<input type="checkbox" name="game[]" value="Hockey" id="game[]">Hockey <br>	
						<input type="checkbox" name="game[]" value="Football" id="game[]">Football<br>	
						<input type="checkbox" name="game[]" value="Badminton" id="game[]">Badminton<br>	
						<input type="checkbox" name="game[]" value="Cricket" id="game[]">Cricket<br>	
						<input type="checkbox" name="game[]" value="VolleyBall" id="game[]">VolleyBall
						<br><span id="span_selectgame" class="red"> </span> 
					</td>
				</tr>
				<tr class="backcolor-blue">	
					<td><label>Gender</label></td>
					<td><input type="radio" name="gender" value="Male" id="gender">Male<input type="radio" name="gender" value="Female" id="gender">Female
						<br><span id="span_gender" class="red"> </span> 
					</td>
				</tr>
				<tr class="backcolor-blue">	
					<td><label>Select ur age</label></td>
					<td>
						<select name="age" id="age">
						<option name="select"  selected hidden disabled value="none">SELECT</option>
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
					<td colspan="2"><input type="file" name="filetoupload" class="input1" id="filetoupload"><br>
					<span id="span_file" class="red"> </span> </td>
				</tr>
				<tr class="backcolor-blue">	
					<td colspan="2"><input type="reset" name="reset" class="input21">&nbsp;<input type="submit" name="submit" value="Submit Form" class="input2"></td>
				</tr>
			</table>
	</form>
</div>
</body>
</html>