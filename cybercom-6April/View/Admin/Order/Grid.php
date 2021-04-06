<?php  
$cart=$this->getOrder();
 echo "<pre>";
print_r($this->getOrder()); 
die(); 
?>
<div class="page-wrapper">
		<h3 style="font-weight:bold; font-size:32px;">ORDER VIEW</h3>
		<hr>
        <h3 style="font-weight:bold; font-size:20px;">CUSTOMER BILLING DETAILS</h3>
        <HR>
        <table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>CustomerName</th>
					<th>EMAIL</th>
					<th>ADDRESS</th>
					<th>CITY</th>
					<th>STATE</th>
					<th>COUNTRY</th>
					<th>ZIPCODE</th>
				</thead>
				<tbody>	
				
				</tbody>
		</table>
        <h3 style="font-weight:bold; font-size:20px;">CUSTOMER SHIPPING DETAILS</h3>
        <HR>
        <table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>CustomerName</th>
					<th>EMAIL</th>
					<th>ADDRESS</th>
					<th>CITY</th>
					<th>STATE</th>
					<th>COUNTRY</th>
					<th>ZIPCODE</th>
				</thead>
				<tbody>	
				
				</tbody>
		</table>
        <h3 style="font-weight:bold; font-size:20px;">PRODUCT DETAILS</h3>
		<hr>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>name</th>
					<th>quantity</th>
					<th>Price</th>
					<th>Row Total</th>
					<th>discount</th>
					<th>final total</th>
				</thead>
				<tbody>	
				
				</tbody>
		</table><br><br>
        <h3 style="font-weight:bold; font-size:20px;">CART DETAILS</h3>
        <HR>
        <table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>Total</th>
					<th>discount</th>
					<th>PaymentMethod</th>
					<th>Shipping Method</th>
				</thead>
				<tbody>	
				
				</tbody>
		</table>

        <CENTER><a href="<?=$this->getUrl()->getUrl('order','order',null,null);?>" class="btn btn-lg btn-success">PLACE ORDER</a></CENTER>
	</div>