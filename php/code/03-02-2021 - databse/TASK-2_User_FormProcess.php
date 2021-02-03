<?php
require 'databaseconnection.php';
	if(isset($_POST['accept'])){
		// var_dump($_POST);
	if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['game']) && isset($_POST['gender']) && isset($_POST['MaritalStatus']) &&isset($_POST['Day']) && isset($_POST['Month']) && isset($_POST['Year'])){
		// echo "yes";
		if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['game']) && !empty($_POST['gender']) && !empty($_POST['MaritalStatus']) && !empty($_POST['Day']) && !empty($_POST['Month']) && !empty($_POST['Year'])){
				$name=$_POST['name'];
				$password=md5($_POST['password']);
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
	echo "please check agreement";
	header('location:Task-2_User_Form.php?msg="please check agreement"');
	exit();
}

?>