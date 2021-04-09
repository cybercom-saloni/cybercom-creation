<?php $configGroups=$this->getconfigGroups(); ?>
	<div class="page-wrapper mt-4">
		<h3 style="font-weight:bold; font-size:32px;">CONFIG VIEW</h3>
		<hr>	
		<a href="<?php echo $this->getUrl()->getUrl('configForm',Null,Null,false)?>" class="btn btn-lg bg-success text-white">ADD CONFIG</a>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>GROUP ID</th>
					<th>NAME</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>	
				<tbody>	
					<?php if(!$configGroups):?>
					<tr>
						<td colspan="9">No Conifig Available.</td>
					</tr>
					<?php else:?>
					<tr>
					<?php foreach ($configGroups->getData() as $configGroup) :?>	
						<td><?= $configGroup->groupId?></td>
						<td><?= $configGroup->name?></td>
						<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl()->getUrl('configForm',Null,['configGroupId'=>$configGroup->groupId],null);?>">EDIT</td>
						<td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl()->getUrl('configGroupDelete',Null,['configGroupId'=>$configGroup->groupId]);?>">DELETE</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
				</tbody>
		</table><br><br>
	</div>
</body>
