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
						header("location:TASK-4_Contact_Us.php?msg=true");
					}elseif(!preg_match ("/^[a-zA-z]*$/", $subject)){
						header("location:TASK-4_Contact_Us.php?msg=true");
					}elseif(!preg_match ("/^[a-zA-z]*$/", $message)){
						header("location:TASK-4_Contact_Us.php?msg=true");
					}elseif(filter_var($email, FILTER_VALIDATE_EMAIL)){
						header("location:TASK-4_Contact_Us.php?msg=true");
					}


				}else{//empty
				$name="";
				$email="";
				$subject="";
				$message="";
				echo '<script>alert("Require All the fields*****");</script>';
				header('location:TASK-4_Contact_Us.php');
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