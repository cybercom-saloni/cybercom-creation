<?php
// var_dump($_GET);
$fn=$_GET['fn'];
$ln=$_GET['ln'];
$month=$_GET['Month'];
$Day=$_GET['Day'];
$Year=$_GET['Year'];
$gender=$_GET['gender'];
$email=$_GET['email'];
$password=$_GET['password'];
$secques=$_GET['secques'];
$secans=$_GET['secans'];
$address=$_GET['address'];
$city=$_GET['city'];
$state=$_GET['state'];
$zip=$_GET['zip'];
$mobile=$_GET['mobile'];
$phone=$_GET['phone'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
<table border="1px">	
		<tr>
			<td>First Name</td>
			<td><?php echo $fn; ?></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><?php echo $ln; ?></td>
		</tr>
		<tr>
			<td>Date Of Birth</td>
			<td><?php echo $month."-".$Day."-".$Year; ?></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><?php echo $gender; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><?php echo $password; ?></td>
		</tr>
		<tr>
			<td>Security Question</td>
			<td><?php echo $secques; ?></td>
		</tr>
		<tr>
			<td>Security Answer</td>
			<td><?php echo $secans; ?></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><?php echo $address; ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $city; ?></td>
		</tr>
		<tr>
			<td>State</td>
			<td><?php echo $state; ?></td>
		</tr>
		<tr>
			<td>Zip code</td>
			<td><?php echo $zip; ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $mobile.$phone; ?></td>
		</tr>
</table>
</body>
</html>