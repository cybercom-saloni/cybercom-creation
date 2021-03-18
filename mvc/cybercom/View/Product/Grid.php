<?php $products=$this->getProducts(); ?>
	<div class="page-wrapper mt-4">
		<h3 style="font-weight:bold; font-size:32px;">PRODUCT VIEW</h3>
		<hr>	
		<a href="<?php echo $this->getUrl('form',Null,Null,false)?>" class="btn btn-lg bg-success text-white">ADD PRODUCT</a><br>	<br>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>PRODUCT ID</th>	
					<th>SKU</th>
					<th>NAME</th>
					<th>PRICE</th>
					<th>DISCOUNT</th>
					<th>QUANTITY</th>
					<th>DESCRIPTION</th>
					<th>CREATED DATE</th>
					<th>UPDATED DATE</th>
					<th>STATUS</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>	
					<?php if(!$products):?>
					<tr>
						<td colspan="12">No Product Available.</td>
					</tr>
					<?php else:?>
					<?php foreach ($products->data as $key) :?>
					<tr>	
						<td><?php echo $key->productId;?></td>
						<td><?php echo $key->sku;?></td>
						<td><?php echo $key->name;?></td>
						<td><?php echo $key->price;?></td>
						<td><?php echo $key->discount;?></td>
						<td><?php echo $key->quantity;?></td>
						<td><?php echo $key->description;?></td>
						<td><?php echo $key->createdDate;?></td>
						<td><?php echo $key->updatedDate;?></td>
						<td><?php if($key->status==1):?> 
							 <a class="btn-lg btn-success text-white" href="<?php echo $this->getUrl('status',Null,['productId'=>$key->productId]);?>"><?php echo $key->status?></a>
								<?php else:?>
								<a class="btn-lg btn-danger text-white" href="<?php echo $this->getUrl('status',Null,['productId'=>$key->productId]);?>"><?php echo $key->status?></a>
								<?php  endif; ?>
							</td>
						
					     <td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl('form',Null,['productId'=>$key->productId]);?>">EDIT</td>
						<td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl('delete',Null,['productId'=>$key->productId]);?>">DELETE</td> 
					</tr>
					 <?php endforeach;?>
				<?php endif;?>
				</tbody>
		</table><br><br>
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
