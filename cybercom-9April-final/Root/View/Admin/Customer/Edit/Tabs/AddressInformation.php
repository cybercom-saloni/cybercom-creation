<?php $billing=$this->getBilling();?>
<?php $shipping=$this->getShipping(); ?>

	
<?php if($billing->addressId):?>
<!-- <input type="hidden" name="billing[addressId]" value="<?php //echo $billing->addressId;?>"> -->
<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Customer Billing Address</label><br>
<?php else:?>
	<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Add Customer Billing Address</label><br>
<?php endif; ?>

	<label class="form-label text-uppercase">Address</label>
	<input type="text" class="form-control form-control-lg" id="address" placeholder="address" name="billing[address]" value="<?php echo $billing->address; ?>">	

	<label class="form-label text-uppercase">city</label>
	<input type="text" class="form-control form-control-lg" id="city" placeholder="city" name="billing[city]" value="<?php echo $billing->city; ?>">	

	<label class="form-label text-uppercase">state</label>
	<input type="text" class="form-control form-control-lg" id="state" placeholder="state" name="billing[state]" value="<?php echo $billing->state; ?>">

	<label class="form-label text-uppercase">Zip code</label>
	<input type="text" class="form-control form-control-lg" id="zipcode" placeholder="zipcode" name="billing[zipCode]" value="<?php echo $billing->zipCode; ?>">

	<label class="form-label text-uppercase">country</label>
	<input type="text" class="form-control form-control-lg" id="country" placeholder="country" name="billing[country]" value="<?php echo $billing->country; ?>">


	<?php if($shipping->addressId):?>
<!-- <input type="hidden" name="shipping[addressId]" value="<?php //echo $shipping->addressId;?>"> -->
<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Customer shipping Address</label><br>
<?php else:?>
	<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Add Customer shipping Address</label><br>
<?php endif; ?>

	<label class="form-label text-uppercase">Address</label>
	<input type="text" class="form-control form-control-lg" id="address" placeholder="address" name="shipping[address]" value="<?php echo $shipping->address; ?>">	

	<label class="form-label text-uppercase">city</label>
	<input type="text" class="form-control form-control-lg" id="city" placeholder="city" name="shipping[city]" value="<?php echo $shipping->city; ?>">	

	<label class="form-label text-uppercase">state</label>
	<input type="text" class="form-control form-control-lg" id="state" placeholder="state" name="shipping[state]" value="<?php echo $shipping->state; ?>">

	<label class="form-label text-uppercase">Zip code</label>
	<input type="text" class="form-control form-control-lg" id="zipcode" placeholder="zipcode" name="shipping[zipCode]" value="<?php echo $shipping->zipCode; ?>">

	<label class="form-label text-uppercase">country</label>
	<input type="text" class="form-control form-control-lg" id="country" placeholder="country" name="shipping[country]" value="<?php echo $shipping->country; ?>">

	
<button type="button" class="btn btn-lg bg-success text-white" onclick="submitForm();">SUBMIT</a></button><br>	<br>
<!-- <button type="button" class="btn btn-lg bg-success text-white"><a href="<?php //echo $this->getUrl('save','Customer_AddressInformation');?>" class="text-white ">SUBMIT</button> --> -->
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
function submitForm()
{
	event.preventDefault();
	$('#form').attr('action',"<?php echo $this->getUrl()->getUrl('save','Customer_AddressInformation');?>");
	$('#form').submit();
}
</script>




