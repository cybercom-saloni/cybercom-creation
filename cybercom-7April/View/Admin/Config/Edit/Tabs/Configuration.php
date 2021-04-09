<?php $config=$this->getConfig();
echo "<pre>";
print_r($config->groupId);
die(); ?>
<form id="configForm" method="post">
<div class="form-group">
			   <?php if($config->configId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update config</label><br>
			  	<?php else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add config</label><br>
			  	<?php endif; ?>
			</div>
			 <div class="form-group">
			    <label class="form-label text-uppercase">GroupId</label>
	  		</div>	
			    <input type="text" class="form-control form-control-lg" id="groupId" placeholder="groupId" name="config[groupId]" value="<?php //echo $config->groupId; ?>">
			    <select type="text" class="form-control form-control-lg" id="groupId"  name="config[groupId]">
				<option value=""></option>
				</select>
	  		<div class="form-group">
			    <label class="form-label text-uppercase">title</label>
			    <input type="text" class="form-control form-control-lg" id="title" placeholder="title" name="config[title]" value="<?php echo $config->title; ?>">
	  		</div>	 
	  		<div class="form-group">
			    <label class="form-label text-uppercase">code</label>
			    <input type="text" class="form-control form-control-lg" id="code" placeholder="code" name="config[code]" value="<?php echo $config->code; ?>">
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">value</label>
			    <input type="text" class="form-control form-control-lg" id="value" name="value" placeholder="value" value="<?php echo $config->value; ?>">
	  		</div>
	  			
	  			
	  		<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="submit" name="submitAdd" id="submitAdd"  onclick="config();" class="form-control form-control-lg bg-success">
	  				</div>	
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="reset" name="reset" id="reset" class="form-control form-control-lg bg-danger">
	  				</div>
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>	
	  			</div>
	  		</div>
	</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
function config()
{
	var form=document.getElementById('configForm');
		form.setAttribute('Action','<?php echo $this->getUrl()->getUrl('config','config',null,null);?>');
		form.submit();
}
</script>