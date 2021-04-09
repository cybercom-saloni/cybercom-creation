<?php $cart = $this->getCart(); ?>
<?php $cartItems = $cart->getItems();if($cartItems){$cartItems=$cartItems->getData();}?>
<?php $customers = $cart->getCustomers()?>
<?php $cartBillingAddress = $this->getCartBillingAddress();?>
<?php $cartShippingAddress = $this->getCartShippingAddress();?>
<?php $payments = $this->getCartPayment();if($payments){$payments=$payments->getData();}?>
<?php $shipments = $this->getCartShipment();if($shipments){$shipments=$shipments->getData();}?>
<?php $shipmentAmount=$cart->getShippingAmount();?>
<?php $total=0;?>
<?php $shippingMethodId=$this->getShipmentId();?>
	<div class="page-wrapper">
		<h3 style="font-weight:bold; font-size:32px;">CART VIEW</h3>
		<hr>
		<a href="<?php echo $this->getUrl()->getUrl('grid','product',Null,false)?>" class="btn btn-lg bg-success text-white">BACK TO PRODUCT</a><br>	<br>
		<form method="Post" id="cartForm">
			<div class="form-group">
				<label class="form-label text-uppercase">SELECT Customer</label>
				<select name="customer">
					<?php if($customers):?>
						<?php foreach($customers->getData() as $key => $customer):?>
						<option value="<?php echo $customer->customerId;?>" <?php if($customer->customerId == $cart->customerId){echo "selected"; }?>><?php echo $customer->firstName;?></option>
						<?php endforeach;?>
					<?php endif; ?>
				</select>
				<input type="button" onclick="selectCustomer();" value="select">
			</div>	
		</form>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>product Id</th>
					<th>quantity</th>
					<th>Price</th>
					<th>Row Total</th>
					<th>discount</th>
					<th>final total</th>
					<th>ACTION</th>
				</thead>
				<tbody>	
				<form method="POST" id="update">
				<input type="button" value="update" class="btn-light" onclick="update();">
				<?php if($cartItems):?>
						<?php foreach($cartItems as $key => $item):?>
						<tr>
							<td><?= $item->productId;?></td>
							<td><input type="number" name="quantity[<?php echo $item->cartItemId?>]" value="<?php echo $item->quantity;?>"></td>
							<td><?= $item->price;?></td>
							<td>Rs.<?=(float)$item->price * $item->quantity;?>.00</td>
							<td>Rs.<?=(float) $item->discount * $item->quantity;?>.00</td>
							<td>Rs.<?= (float)$item->price * $item->quantity - $item->discount * $item->quantity;?>.00</td>
							<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl()->getUrl('delete',Null,['cartItemId'=>$item->cartItemId]);?>">DELETE</td>
						</tr>
						<?php endforeach;?>
				<?php endif;?>
				</form>
				</tbody>
		</table><br><br>
	</div>
	<form method="post" id="address">
		<div class="row">
			<div class="col-lg-6">
				<table class="table table-bordered bg-light  table-hover">
					<thead class="bg-dark text-white text-uppercase">
						<th colspan="2">BILLING ADDRESS</th>
					</thead>
					<tbody>
						<tr>
							<td>Address</rd>
							<td><input type="text" value="<?php if($cartBillingAddress){ echo $cartBillingAddress->address;}?>" name="billing[address]"></td>
						</tr>
						<tr>
							<td>City</td>	
							<td><input type="text" value="<?php if($cartBillingAddress){ echo $cartBillingAddress->city;}?>" name="billing[city]"></td>
						</tr>
						<tr>		
							<td>State</td>
							<td><input type="text" value="<?php if($cartBillingAddress){ echo $cartBillingAddress->state;}?>" name="billing[state]"></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><input type="text" value="<?php if($cartBillingAddress){ echo $cartBillingAddress->country;}?>" name="billing[country]"></td>
						</tr>
						<tr>
							<td>ZipCode</td>
							<td><input type="text" value="<?php if($cartBillingAddress){ echo $cartBillingAddress->zipCode;}?>" name="billing[zipcode]"></td>			
						</tr>
						<tr>
							<td></td>
							<td><input type="checkbox" name="billing[saveInAddressBook]">SAVE IN ADDRESS BOOK</td>			
						</tr>	
								
					</tbody>
				</table>
			</div>
			<div class="col-lg-6">
				<table class="table table-bordered bg-light  table-hover">
					<thead class="bg-dark text-white text-uppercase">
							<th colspan="2">SHIPPING ADDRESS</th>
					</thead>
					<tbody>
						<tr>
							<td>Address</rd>
							<td><input type="text" value="<?php if($cartShippingAddress){echo $cartShippingAddress->address;}?>" name="shipping[address]"></td>
						</tr>
						<tr>
							<td>City</td>	
							<td><input type="text" value="<?php if($cartShippingAddress){ echo $cartShippingAddress->city;}?>" name="shipping[city]"></td>
						</tr>
						<tr>		
							<td>State</td>
							<td><input type="text" value="<?php if($cartShippingAddress){ echo $cartShippingAddress->state;}?>" name="shipping[state]"></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><input type="text" value="<?php if($cartShippingAddress){ echo $cartShippingAddress->country;}?>" name="shipping[country]"></td>
						</tr>
						<tr>
							<td>ZipCode</td>
							<td><input type="text" value="<?php if($cartShippingAddress){ echo $cartShippingAddress->zipCode;}?>" name="shipping[zipCode]"></td>			
						</tr>	
						<tr>
							<td><input type="checkbox" name="shipping[sameAsBilling]">SAME AS BILLING</td>			
							<td><input type="checkbox" name="shipping[saveInAddressBook]">SAVE IN ADDRESS BOOK</td>			
						</tr>		
					</tbody>
				</table>
			</div>
		</div>
	<div class="row">
		<div class="col-6">
			<table class="table table-bordered bg-light  table-hover">
				<thead class="bg-dark text-white text-uppercase">
					<th colspan="2">Payment</th>
				</thead>
				<tbody>
						<?php foreach($payments as $payment):?>
						<tr>
							<td><input type="radio" name="payments" value="<?php echo $payment->paymentId?>"<?php if($payment->paymentId ==$cart->paymentMethodId):?><?php echo "checked";?><?php endif;?>><?=$payment->name?></td>
						</tr>
						<?php endforeach;?>	
						
				</tbody>
			</table>
		</div>
		<div class="col-6 bg-light">
			<table class="table table-bordered bg-light  table-hover">
				<thead class="bg-dark text-white text-uppercase">
					<th colspan="2">Shipping</th>
				</thead>
				<tbody>
						<?php foreach($shipments as $shipment):?>
						<tr>
							<td><input type="radio" name="shipments" value="<?php echo $shipment->shipmentId?>"<?php if($shipment->shipmentId ==$cart->shippingMethodId):?><?php echo "checked";?><?php endif;?>><?=$shipment->name?></td>
							<td>RS.<?=$shipment->amount?></td>
						</tr>
						<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered bg-light  table-hover">
				<thead class="bg-dark text-white text-uppercase">
					<tr><th colspan="3">GrandTotal</th></tr>
					<tr><th>product Id</th>
					<th>quantity</th>
					<th>total</th></tr>
				</thead>
				<tbody> 
				<?php foreach($cartItems as $key=>$item):?>
                    <tr>
                    	<td><?= $item->productId;?></td>
                        <td><?= $item->quantity;?></td>
                        <td>Rs.<?=$subtotal = $item->price * $item->quantity; ?>.00</td>
                    </tr>
					<?php $total+=$subtotal?>
                <?php endforeach;?>	
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2">Shipping Amount</th>
									<td>Rs.<?=$shipmentAmount;?></td>	
						</td>
					</tr>
					<tr id="display">
                        <th colspan="2">Total</th>
                      	<td>Rs.<?=$shipmentAmount+$total?>.00</td>
					</tr>
                    </tr>
                </tfoot>
			</table>
			<center><input type="button" onclick="selectAddress();"  class=" btn btn-lg btn-success" value="Update Details">
			<a href="<?php echo $this->getUrl()->getUrl('placeOrder','cart');?>" class=" btn btn-lg btn-info" >Place Order</a></center>
		</div>
		</form>
	</div>	
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
    function selectCustomer() {
        var form = document.getElementById('cartForm');
        form.setAttribute('Action', '<?php echo $this->getUrl()->getUrl('selectCustomer','cart',null,null); ?>');
        form.submit();
    }
</script>
<script type="text/javascript">
	function update()
	{
		var form=document.getElementById('update');
		form.setAttribute('Action','<?php echo $this->getUrl()->getUrl('update','cart',null,null);?>');
		form.submit();
	}
</script>
<script type="text/javascript">
	function selectAddress()
	{
		var form=document.getElementById('address');
		form.setAttribute('Action','<?php echo $this->getUrl()->getUrl('selectAddress','cart',null,null);?>');
		form.submit();
	}
</script>
