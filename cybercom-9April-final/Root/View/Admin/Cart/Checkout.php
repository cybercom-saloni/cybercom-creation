<?php $orderDetails=$this->getOrder();//print_r($orderDetails);?>
<?php $customerBillingAddress=$orderDetails->getCustomerBillingAddress();?>
<?php $customerShippingAddress=$orderDetails->getCustomerShippingAddress();?>
<?php $customerDetails=$orderDetails->getCustomer();?>
<?php //$productDetails = $orderDetails->getProduct();echo "<pre>";print_r($productDetails);?>
<?php $orderItemDetails=$orderDetails->getOrderItem();//echo "<pre>";print_r($orderItemDetails);?>
<?php $orderShippingDetails=$orderDetails->getShipping();?>
<?php $orderPaymentDetails=$orderDetails->getPayment();?>
<div class="page-wrapper">
		<h3 style="font-weight:bold; font-size:32px;">ORDER VIEW</h3>
		<hr>
        <div class="row">
            <div class="col-6">
        <h3 style="font-weight:bold; font-size:20px;">CUSTOMER BILLING DETAILS</h3>
        <HR>
        <table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
				</thead>
				<tbody>	
				<tr>
                	<th>CUSTOMER NAME</th>
					<td><?=$customerDetails->firstName;?><?php echo " ";echo$customerDetails->lastName;?></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td><?=$customerDetails->email;?></td>
				</tr>
				<tr>
					<th>ADDRESS</th>
					<td><?=$customerBillingAddress->address?></td>
				</tr>
				<tr>
					<th>CITY</th>
					<td><?=$customerBillingAddress->city?></td>
				</tr>
				<tr>
					<th>ZIPCODE</th>
					<td><?=$customerBillingAddress->zipCode?></td>
                </tr>
				<tr>
					<th>STATE</th>
					<td><?=$customerBillingAddress->state?></td>
				</tr>
				<tr>
					<th>COUNTRY</th>
					<td><?=$customerBillingAddress->country?></td>
				</tr>
				</tbody>
		</table>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
				</thead>
				<tbody>	
				<tr>
                	<th>SHIPPING MODE</th>
					<td><?=$orderShippingDetails->name;?></td>
				</tr>
				<tr>
                	<th>PAYMENT MODE</th>
					<td><?=$orderPaymentDetails->name;?></td>
				</tr>
		</table>
        </div>
        <div class="col-6">
        <h3 style="font-weight:bold; font-size:20px;">CUSTOMER SHIPPING DETAILS</h3>
        <HR>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
				</thead>
				<tbody>	
				<tr>
                	<th>CUSTOMER NAME</th>
					<td><?=$customerDetails->firstName;?><?php echo " ";echo$customerDetails->lastName;?></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td><?=$customerDetails->email;?></td>
				</tr>
				<tr>
					<th>ADDRESS</th>
					<td><?=$customerShippingAddress->address?></td>
				</tr>
				<tr>
					<th>CITY</th>
					<td><?=$customerShippingAddress->city?></td>
				</tr>
				<tr>
					<th>ZIPCODE</th>
					<td><?=$customerShippingAddress->zipCode?></td>
                </tr>
				<tr>
					<th>STATE</th>
					<td><?=$customerShippingAddress->state?></td>
				</tr>
				<tr>
					<th>COUNTRY</th>
					<td><?=$customerShippingAddress->country?></td>
				</tr>
				</tbody>
		</table>
        </div>
        </div>
		
        <h3 style="font-weight:bold; font-size:20px;">PRODUCT DETAILS</h3>
		<hr>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>name</th>
					<th>quantity</th>
					<th>Price</th>
					<th> Total Price</th>
				</thead>
				<tbody>	
				
					<?php foreach($orderItemDetails->getData() as $key=>$orderItem):?>
						<tr>
						<td><?php echo $orderItem->getProductName()?></td>
						<td><?=$orderItem->quantity;?></td>
						<td>Rs.<?php echo $orderItem->getProductPrice()?></td>
						<td>Rs.<?php $price=$orderItem->getProductPrice()*$orderItem->quantity;echo $price;?>.00</td>
						<?php endforeach;?>
				</tbody>
						</tr>
						<tr>
						<td colspan="3">Shipping Charge</td>
						<td>Rs.<?=$orderDetails->shippingAmount;?></td>
						</tr>
						<tr>
						<td colspan="3">Total</td>
						<td>Rs.<?=$orderDetails->total?></td>
						</tr>
		</table><br><br>
        
        <CENTER><a href="<?=$this->getUrl()->getUrl('order','order',null,null);?>" class="btn btn-lg btn-success">PLACE ORDER</a></CENTER>
	</div>