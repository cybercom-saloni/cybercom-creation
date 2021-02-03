<?php
if(isset($_POST['submit'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
				$name=htmlentities($_POST['name']);
				$email=htmlentities($_POST['email']);
				$subject=htmlentities($_POST['subject']);
				$message=htmlentities($_POST['message']);
				$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				$_SESSION['subject']=$subject;
				$_SESSION['message']=$message;

					if (!preg_match ("/^[a-zA-z]*$/", $name) ) {
						$ErrMsg = "Only alphabets and whitespace are allowed."; 
						// echo $ErrMsg;
						echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
					}elseif(!preg_match ("/^[a-zA-z]*$/", $subject)){
						$ErrMsg = "Only alphabets and whitespace are allowed."; 
						// echo $ErrMsg;
						echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
						
					}elseif(!preg_match ("/^[a-zA-z]*$/", $message)){
						$ErrMsg = "Only alphabets and whitespace are allowed."; 
						// echo $ErrMsg;
						echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
						
					}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$ErrMsg = "email is not valid."; 
						// echo $ErrMsg;
						echo "<script type='text/javascript'>alert('$ErrMsg');</script>";
						
					}
					echo "Thanks for contacting us. ".$name."<br> Your email address is: ".$email."<br>";
					echo "Your Subject is : ".$subject."<br>Your message is : ".$message;

				}else{//empty
				$name="";
				$email="";
				$subject="";
				$message="";
				echo '<script>alert("Require All the fields*****");</script>';
				
			}
		}else{//isset
			$name="";
			$email="";
			$subject="";
			$message="";
			echo '<script>alert("Require All the fields*****");</script>';
		}
	}else{//request method
		echo '<script>alert("Page is modified.");</script>';
		die('error in loading page........');
	}
}else{//submit
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TASK 4 CONTACT FORM</title>
	<link rel="stylesheet" type="text/css" href="TASK-4_Contact_Us.css">
</head>
<body>
<div class="body">
	<div class="mainbox">
		<div class="mainbox-inner">
			<div class="mainbox-subinner">
				<div class="row">
					<div class="mainbox-subinner-header">
						CONTACT US!
					</div>
					<form action="TASK-4_Contact_Us.php" method="post">
						<div class="mainbox-subinner-body">
							<input type="text" name="name" placeholder="Name...">
							<br><span id="span_name" class="red"></span>
							<input type="text" name="email" placeholder="Email...">
							<br><span id="span_email" class="red"></span>
							<input type="text" name="subject" placeholder="Subject...">
							<br><span id="span_subject" class="red"></span>
							<textarea name="message" placeholder="Message..."></textarea>
							<br><span id="span_message" class="red"></span>
						</div>
						<div class="mainbox-subinner-footer">
							<input type="submit" name="submit" value="SEND MESSAGE">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>