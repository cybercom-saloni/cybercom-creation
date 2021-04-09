<?php $configs=$this->getconfigs(); ?>
	<div class="page-wrapper mt-4">
		<h3 style="font-weight:bold; font-size:32px;">CONFIG VIEW</h3>
		<hr>	
		<a href="<?php echo $this->getUrl()->getUrl('configForm',Null,Null,false)?>" class="btn btn-lg bg-success text-white">ADD CONFIG</a>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>CONFIG ID</th>	
					<th>GROUP ID</th>
					<th>TITLE</th>
					<th>CODE</th>
					<th>VALUE</th>
					<th>CREATED DATE</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>	
				<tbody>	
					<?php if(!$configs):?>
					<tr>
						<td colspan="9">No Conifig Available.</td>
					</tr>
					<?php else:?>
					<tr>
					<?php foreach ($configs->getData() as $config) :?>	
						<td><?= $config->configId?></td>
						<td><?= $config->groupId?></td>
						<td><?= $config->title?></td>
						<td><?= $config->code?></td>
						<td><?= $config->value?></td>
						<td><?= $config->createdDate?></td>
						<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl()->getUrl('configForm',Null,['configId'=>$config->configId]);?>">EDIT</td>
						<td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl()->getUrl('delete',Null,['configId'=>$config->configId]);?>">DELETE</td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
				</tbody>
		</table><br><br>
	</div>
</body>
