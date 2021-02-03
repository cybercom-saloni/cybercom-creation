<!DOCTYPE html>
<html>
<head>
	<title>TASK-2 USER FORM</title>
	<link rel="stylesheet" type="text/css" href="css/TASK-2_User_Form.css">
	
</head>
<body>
<div class="box">
	<div class="inner-box">
		<fieldset>
			<legend align="center">USER FORM</legend>
			<form action="TASK-2_User_FormProcess.php"  name="UserForm"  method="post" onsubmit="return validation()">
				<table>
					<tr>
						<td><ul><li><label>Enter Name</label></li></ul>
						</td>
						<td><input type="text" name="name" id="name" pattern="[A-Za-z].{2,}" title="Please write your name more than 2 letter" class="input"><br><span id="span_name" class="red"></td>	
					</tr>						
					<tr>
						<td><ul><li><label>Enter Password</label></li></ul>
						</td>
						<td><input type="text" name="password" id="password" class="input" pattern="(?=.*[!@#$%^&*()_+]).{6,}" title="Must contain at least one special symbol and more than six characters"><br><span id="span_password" class="red"></span></td>
					</tr>		
					
					<tr>
						<td><ul><li><label>Gender</label></li></ul>
						</td>
						<td><input type="radio" name="gender" value="Male" id="gender" class="input-radio">Male<input type="radio" name="gender" value="Female" id="gender" class="input-radio">Female <br><span id="span_gender" class="red"> </span> </td>
					</tr>

					<tr>
						<td><ul><li><label>Enter Address</label></li></ul>
						</td>
						<td><textarea cols="20" rows="2" name="address" id="address" class="input"></textarea><br><span id="span_address" class="red"> </td>
					</tr>

					<tr>
						<td><ul><li><label>D.O.B</label></li></ul>
						</td>
						<td>
							<select name="Month" id="Month" class="input-select input-select-margin">
							<option selected hidden disabled value="none">MONTH</option>
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
							<option selected hidden disabled value="none" >DAY</option>
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
							<option selected hidden disabled value="none">YEAR</option>
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
						<td><ul><li><label>Select Game</label></li></ul>
						</td>
						<td>
							<input type="checkbox" name="game[]" value="Hockey">Hockey
							<input type="checkbox" name="game[]" value="Football">Football	
							<input type="checkbox" name="game[]" value="Cricket">Cricket
							<input type="checkbox" name="game[]" value="VolleyBall">VolleyBall<br><span id="span_selectgame" class="red"> </span> 
						</td>
					</tr>

					<tr>
						<td><ul><li><label>Marital Status</label></li></ul>
						</td>
						<td><input type="radio" name="MaritalStatus" id="MaritalStatus" value="Married" class="input-radio">Married<input type="radio" id="MaritalStatus"name="MaritalStatus" value="Unmarried" class="input-radio">Unmarried <br><span id="span_maritalstatus" class="red"> </span> </td>
						
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Submit" id ="UserSubmit">&nbsp;<input type="reset" name="reset"></td></td>
					</tr>

					<tr>
						<td></td>
						<td><input type="checkbox" name="accept" id="accept" onclick="acceptcondition(this)"><b>I accept all terms and condition</b></td>	
					</tr>
				</table>
			</form>
		</fieldset>
	</div>
</div>
</body>
<script type="text/javascript" src="js/TASK-2_User_Form.js"></script>
</html>