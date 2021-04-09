<?php $attribute = $this->getAttribute();?>
<form id="attributeForm" method="post">
<div class="form-group">
			<?php if($attribute->attributeId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update config</label><br>
			<?php else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add config</label><br>
			<?php endif; ?>
			</div>
			 <div class="form-group">
			    <label class="form-label text-uppercase">entity type Id</label>
	  		</div>	
			    <select type="text" class="form-control form-control-lg" id="entityTypeId"  name="attribute[entityTypeId]">
				<option value=""></option>
				</select>
	  		<div class="form-group">
			    <label class="form-label text-uppercase">name</label>
			    <input type="text" class="form-control form-control-lg" id="name" placeholder="name" name="attribute[name]" value="<?php echo $attribute->name; ?>">
	  		</div>	 
	  		<div class="form-group">
			    <label class="form-label text-uppercase">code</label>
			    <input type="text" class="form-control form-control-lg" id="code" placeholder="code" name="attribute[code]" value="<?php echo $attribute->code; ?>">
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">inputType</label>
			    <input type="text" class="form-control form-control-lg" id="inputType" name="inputType" placeholder="inputType" value="<?php echo $attribute->inputType; ?>">
	  		</div>
              <div class="form-group">
			    <label class="form-label text-uppercase">backend Type</label>
			    <input type="text" class="form-control form-control-lg" id="backendType" name="backendType" placeholder="backendType" value="<?php echo $attribute->backendType; ?>">
	  		</div>
              <div class="form-group">
			    <label class="form-label text-uppercase">sort order</label>
			    <input type="text" class="form-control form-control-lg" id="sortOrder" name="sortOrder" placeholder="sortOrder" value="<?php echo $attribute->sortOrder; ?>">
	  		</div>
              <div class="form-group">
			    <label class="form-label text-uppercase">backend Model</label>
			    <input type="text" class="form-control form-control-lg" id="backendModel" name="backendModel" placeholder="backendModel" value="<?php echo $attribute->backendModel; ?>">
	  		</div>
	  			
	  			
	  		<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="submit" name="submitAdd" id="submitAdd"  onclick="attribute();" class="form-control form-control-lg bg-success">
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
function attribute()
{
	var form=document.getElementById('attributeForm');
		form.setAttribute('Action','<?php echo $this->getUrl()->getUrl('attribute','attribute',null,null);?>');
		form.submit();
}
</script>