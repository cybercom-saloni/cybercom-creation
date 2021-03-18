<!DOCTYPE html>
<html>
<head>
	<title>Cybercom Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./Skin/Admin/Css/ThreeColumn.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-12 mainHeader bg-secondary">
						header
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-12 mainBody">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xl-3 col-3 Leftside bg-primary">
							<?php echo $this->getChild("leftTab")->toHtml(); ?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 col-6 bg-light Body">
								<?php  echo $this->createBlock('Block_core_layout_message')->toHtml();?>
								<?php echo $content=$this->getChild('content')->toHtml(); ?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xl-3 col-3 bg-primary Rightside">Rightside
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="fixed-bottom">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-12 mainFooter bg-secondary">
							Footer
					</div>		
				</div>
			</footer>
		</div>
		
	</div>
</body>
</html>