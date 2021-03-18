<?php $customerGroups=$this->getCustomerGroups();?>
<h3 style="font-weight:bold; font-size:32px;">Customer Group View</h3>
<hr>
<a href="<?php echo $this->getUrl('form',NULL,Null,false)?>" class="btn btn-lg bg-success text-white">ADD CUSTOMER GROUP</a><br>	<br>
<table class="table table-bordered bg-light table-hover">
	<thead class="bg-dark text-white">
		<th>Customer Group ID</th>
		<th>Group Name</th>
		<th>Created Date</th>
		<th>Status</th>
		<th colspan="2">Action</th>
	</thead>
	<tbody>
		<?php if(!$customerGroups): ?>
		<tr>
			<td colspan="6">No Customer Group</td>
		</tr>
		<?php else: ?>
		<?php foreach ($customerGroups->data as $key): ?>
		<tr>
			<td><?php echo $key->groupId; ?></td>
			<td><?php echo $key->name?></td>
			<td><?php echo $key->createdDate?></td>
			<td><?php if($key->status==0):?>
				<a class="btn-lg btn-success text-white" href="<?php echo $this->getUrl('status',NULL,['groupId'=>$key->groupId]);?>"><?php echo $key->status?></a>
				<?php else: ?>
				<a class="btn-lg btn-danger text-white" href="<?php echo $this->getUrl('status',NULL,['groupId'=>$key->groupId]);?>"><?php echo $key->status?></a>
			<?php endif; ?>
			</td>
			<td><a class="btn-lg btn-success text-white" href="<?php echo $this->getUrl('form',NULL,['groupId'=>$key->groupId]);?>">EDIT</a></td>
			<td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl('delete',NULL,['groupId'=>$key->groupId]);?>">DELETE</a></td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>