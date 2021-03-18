<!DOCTYPE html>
<html>
<head>
	<title>Cybercom Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./Skin/Admin/Css/OneColumn.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-12 bg-secondary mainHeader">
					<?php echo $this->getChild("header")->toHtml(); ?>
				</div>
			</div>
			<div class="row mainBody">
				<div class="col-sm-12 col-lg-12 col-md-12 col-sm-12 col-xl-12 col-12 bg-light Body">
					<?php echo $this->createBlock('Block_Core_Layout_Message')->toHtml();?>
					<?php echo $this->getChild('content')->toHtml();?>
				</div>
			</div>
			<div class="row fixed-bottom">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-12 mainFooter bg-secondary">
						Footer
				</div>		
			</div>
		</div>
	</div>
	
</body>
</html>