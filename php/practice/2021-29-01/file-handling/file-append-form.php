<?php
if(isset($_GET['name'])){
	if(!empty($_GET['name'])){
		$handle=fopen('name.txt','a');
		fwrite($handle,$_GET['name']."\n");
		echo "NAMES IN FILES : <br>";
		$count=1;
		$readin=file('name.txt');
		$readin_count=count($readin);
		foreach ($readin as $name) {
			echo trim($name);
			if($count!=$readin_count){
				echo " , ";
			}
			$count++;
		}

	}else{
		echo "please enter *****";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="get" action="file-append-form.php">
	NAME:<br><input type="text" name="name"><br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>