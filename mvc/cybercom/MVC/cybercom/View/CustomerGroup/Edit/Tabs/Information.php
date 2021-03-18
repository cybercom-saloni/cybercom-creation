<?php $customerGroup=$this->getCustomerGroup(); ?>
<div class="form-group">
    <?php if($customerGroup->groupId):?>
    <label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update CustomerGroup</label><br>
    <?php else: ?>
	<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add CustomerGroup</label><br>
	<?php endif; ?>
</div>
<div class="form-group">
    <label class="form-label text-uppercase">Name</label>
    <input type="text" class="form-control form-control-lg" id="name" placeholder="name" name="customerGroup[name]" value="<?php echo $customerGroup->name;?>">
</div>
<div class="form-group">
	<label class="form-label text-uppercase">status</label>
	<select class="form-control form-control-lg" name=customerGroup[status] id="status">
	    <?php foreach($customerGroup->getStatusOptions() as $key=>$value):?>
	    <option value="none" selected hidden disabled>STATUS</option>
	    <option value="<?php echo $key?>"<?php if($customerGroup->status==$key): ?> selected <?php endif; ?>><?php echo $key?></option>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group">
	<div class="row">
	  	<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	</div>
	  	<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  		<input type="submit" name="submit" id="submit" class="form-control form-control-lg bg-success">
	  	</div>	
	  	<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  	    <input type="reset" name="reset" id="reset" class="form-control form-control-lg bg-danger">
	  	</div>
	    <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	</div>	
	</div>
</div>