<?php
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['email']) && isset($_POST['password'])){
			if(!empty($_POST['email']) && !empty($_POST['password'])){
				$email=htmlentities($_POST['email']);
				$password=htmlentities($_POST['password']);
				if($email=="saloni" && $password=="s@loni05"){
					echo "valid!!!";
				}else{
					echo "not valid";
					header("location:TASK-5_Login_Form.php");
					exit();
				}
			}
		}
	}else{
		echo "not";
	}
}
?>