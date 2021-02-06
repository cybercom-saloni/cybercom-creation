<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
<form id="form">
	firstname:<input type="text" name="firstname" id="firstname"><br>
	lastname:<input type="text" name="lastname" id="lastname"><br>
	password:<input type="text" name="password" id="password"><br>
	<input type="submit" name="submit" id="submit">
</form>
<div id="display"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		alert("click");
		$("#submit").click(function(e){
			alert('click2');
			e.preventDefault();
			$.ajax({
				
				type:"POST",
				url:"registration-form-process.php",
				data:$("#form").serialize(),
				dataType:"html",
				success:function(result){
					alert(result);
					$("#display").html(result);
						$("#firstname").val("");
						$("#lastname").val("");
						$("#password").val("");
				}
			});	
		});
	});
</script>
</html>