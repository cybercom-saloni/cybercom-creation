<?php $customerGroups=$this->getCustomerGroup(); $product=$this->getProduct();?>
<div class="page-wrapper mt-4">
		<h3 style="font-weight:bold; font-size:32px;">CUSTOMER GROUP</h3>
		<hr>	
		<button type="button" class="btn btn-lg bg-success text-white" onclick="submitForm();">UPDATE</a></button><br>	<br>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>GROUP ID</th>	
					<th>NAME</th>
					<th>PRICE</th>
					<th>GROUP PRICE</th>
				</thead>
				<tbody  class="text-dark">	
					<?php if(!$customerGroups):?>
					<tr>
						<td colspan="4">No Groups Available.</td>
					</tr>
					<?php else:?>
					<?php foreach ($customerGroups->getData() as $key=>$customerGroup) :?>
					<?php $rowStatus=($customerGroup->entityId)?'exists':'new';?>
                    <tr>	
						<td><?php echo $customerGroup->groupId;?></td>
						<td><?php echo $customerGroup->name;?></td>
						<td><?php echo $customerGroup->price;?></td>
                        <td><input type="text" value="<?php echo $customerGroup->price ?>" name="groupPrice[<?php echo $rowStatus ?>][<?php echo $customerGroup->groupId?>]"></td>
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
<script>
function submitForm()
{
    event.preventDefault();
    
    $('#form').attr('action',"<?php echo $this->getUrl()->getUrl('save','Product_GroupPrice');?>");
    $('#form').submit();
    
}
</script>
</html>
