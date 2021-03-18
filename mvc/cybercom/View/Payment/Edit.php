<?php
 $payment=$this->getPayment();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cybercom Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
</head>
<body>
	<div class="page-wrapper">
		<form action="<?php echo $this->getUrl('save',Null,Null,false)?>" method="post">
			<div class="form-group">
			   
			  	<?php if($payment->paymentId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Payment</label><br>
			  	<?php else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add Payment</label><br>
			  	<?php endif; ?>
			</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">name</label>
			    <input type="text" class="form-control form-control-lg" id="name" placeholder="name" name="payment[name]" value="<?php echo$payment->name;?>">
	  		</div>	 
	  		<div class="form-group">
			    <label class="form-label text-uppercase">code</label>
			    <input type="text" class="form-control form-control-lg" id="code" placeholder="code" name="payment[code]" value="<?php echo$payment->code;?>"> 
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">description</label>
			    <input type="text" class="form-control form-control-lg" id="description" name="payment[description]" placeholder="description" value="<?php echo$payment->description;?>">
	  		</div>
	  		
	  		<div class="form-group">
			    <label class="form-label text-uppercase">status</label>
			    <select class="form-control form-control-lg" name=payment[status] id="status">
				
				<?php foreach($payment->getStatusOptions() as $key=>$value):?>
					<option value="none" selected hidden disabled>STATUS</option>
					<option value="<?php echo $key?>"<?php if($payment->status==$key): ?> selected <?php endif; ?>><?php echo $key?></option>
				<?php endforeach; ?>
			    </select>
	  		</div>		
	  		<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="submit" name="submit" id="submit" class="form-control form-control-lg bg-success">
	  				</div>	
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="reset" name="reset" id="reset" class="form-control form-control-lg bg-danger">
	  				</div>
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>	
	  			</div>
	  		</div>
		</form>
		<br><br>
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>