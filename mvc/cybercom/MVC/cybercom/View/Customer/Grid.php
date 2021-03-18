<?php $customers=$this->getCustomers();?>
	<div class="page-wrapper">
		<h3 style="font-weight:bold; font-size:32px;">CUSTOMER VIEW</h3>
		<hr>	
		<a href="<?php echo $this->getUrl('form',NULL,Null,false)?>" class="btn btn-lg bg-success text-white">ADD CUSTOMER</a><br>	<br>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>CUSTOMER ID</th>	
					<th>FIRSTNAME</th>
					<th>LASTNAME</th>
					<th>EMAIL</th>
					<th>PASSWORD</th>
					<th>MOBILE NO.</th>
					<th>CREATED DATE</th>
					<th>UPDATED DATE</th>
					<th>STATUS</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>	
					<?php if(!$customers):?>
					<tr>
						<td colspan="10">No Customers Avaiable.</td>
					</tr>
					<?php else:?>
					<?php foreach ($customers->data as $key) : ?>
					<tr>	
						<td><?php echo $key->customerId;?></td>
						<td><?php echo $key->firstName;?></td>
						<td><?php echo $key->lastName;?></td>
						<td><?php echo $key->email;?></td>
						<td><?php echo $key->password;?></td>
						<td><?php echo $key->mobile;?></td>
						<td><?php echo $key->createdDate;?></td>
						<td><?php echo $key->updatedDate;?></td>
						<td><?php if($key->status==0):?>
							  	<a class="btn-lg btn-success text-white" href="<?php echo $this->getUrl('status',NULL,['customerId'=>$key->customerId]);?>"><?php echo $key->status?></a>
								<?php else:?>
								<a class="btn-lg btn-danger text-white" href="<?php echo $this->getUrl('status',NULL,['customerId'=>$key->customerId]);?>"><?php echo $key->status?></a>
								<?php endif; ?></td>
						
						<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl('form',Null,['customerId'=>$key->customerId]);?>">EDIT</td>

						<td><a class="btn-lg bg-danger text-white" href="<?php echo $this->getUrl('delete',NULL,['customerId'=>$key->customerId]);?>">DELETE</td>
					</tr>
					<?php endforeach; endif;?>
				</tbody>
		</table><br><br>
	</div>

