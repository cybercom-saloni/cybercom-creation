<?php $customer=$this->getCustomer(); ?>
<div class="form-group">
			   <?php if($customer->customerId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Customer</label><br>
			  	<?php else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add Customer</label><br>
			  	<?php endif; ?>
			</div>
			 <div class="form-group">
			    <label class="form-label text-uppercase">First Name</label>
			    <input type="text" class="form-control form-control-lg" id="firstName" placeholder="firstName" name="customer[firstName]" value="<?php echo $customer->firstName; ?>">
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">Last Name</label>
			    <input type="text" class="form-control form-control-lg" id="lastName" placeholder="lastName" name="customer[lastName]" value="<?php echo $customer->lastName; ?>">
	  		</div>	 
	  		<div class="form-group">
			    <label class="form-label text-uppercase">Email</label>
			    <input type="text" class="form-control form-control-lg" id="email" placeholder="email" name="customer[email]" value="<?php echo $customer->email; ?>">
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">Password</label>
			    <input type="text" class="form-control form-control-lg" id="password" name="password" placeholder="password" value="<?php echo $customer->password; ?>">
	  		</div>
	  			
	  		<div class="form-group">
	  			<label class="form-label text-uppercase">mobile</label>
	  			<input type="text" name="customer[mobile]" id="mobile" class="form-control form-control-lg" placeholder="9413143321" value="<?php echo $customer->mobile; ?>">
	  		</div>
	  		<div class="form-group">
			    <label class="form-label text-uppercase">status</label>
			    <select class="form-control form-control-lg" name='customer[status]' id="status">
				<?php foreach($customer->getStatusOptions() as $key=>$value):?>
					<option value="none" selected hidden disabled>STATUS</option>
					<option value="<?php echo $key?>"<?php if($customer->status==$key): ?> selected <?php endif; ?>><?php echo $value;?></option>
				<?php endforeach; ?>
			    </select>
	  		</div>		
	  		<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="submit" name="submitAdd" id="submitAdd" class="form-control form-control-lg bg-success">
	  				</div>	
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="reset" name="reset" id="reset" class="form-control form-control-lg bg-danger">
	  				</div>
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>	
	  			</div>
	  		</div>