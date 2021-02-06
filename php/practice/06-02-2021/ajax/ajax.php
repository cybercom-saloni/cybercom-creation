<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div id="div1">
</div>
<button>SUBMIT</button>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		// alert("click");
		$("button").click(function(){
			$.ajax({
			url:'ajax-process.php',
			success:function(result){
				$("#div1").html(result);
			}
		});
		});
	});
</script>
</html>