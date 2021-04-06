<?php $cms=$this->getCms();?>
	<div class="page-wrapper">
		<h3 style="font-weight:bold; font-size:32px;">CMS VIEW</h3>
		<hr>	
		<a href="<?php echo $this->getUrl()->getUrl('form',NULL,Null,false)?>" class="btn btn-lg bg-success text-white">ADD CMS</a><br>	<br>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>PAGE ID</th>	
					<th>TITLE</th>
					<th>IDENTIFER</th>
					<th>CONTENT</th>
					<th>CREATED DATE</th>
					<th>STATUS</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>	
					<?php if(!$cms):?>
					<tr>
						<td colspan="10">No cms Avaiable.</td>
					</tr>
					<?php else:?>
					<?php foreach ($cms->getData() as $key) : ?>
					<tr>	
						<td><?php echo $key->pageId;?></td>
						<td><?php echo $key->title;?></td>
						<td><?php echo $key->identifier;?></td>
						<td><?php echo $key->content;?></td>
						<td><?php echo $key->createDate;?></td>
						<td><?php if($key->status==0):?>
							  	<a class="btn-lg btn-danger text-white" href="<?php echo $this->getUrl()->getUrl('status',NULL,['pageId'=>$key->pageId]);?>"><?php echo "Disabled";?></a>
								<?php else:?>
								<a class="btn-lg  btn-success  text-white" href="<?php echo $this->getUrl()->getUrl('status',NULL,['pageId'=>$key->pageId]);?>"><?php echo "Enabled";?></a>
								<?php endif; ?></td>
						
						<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl()->getUrl('form',Null,['pageId'=>$key->pageId]);?>">EDIT</td>

						<td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl()->getUrl('delete',NULL,['pageId'=>$key->pageId]);?>">DELETE</td>
					</tr>
					<?php endforeach; endif;?>
				</tbody>
		</table><br><br>
	</div>

