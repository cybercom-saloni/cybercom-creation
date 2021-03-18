<?php $admins=$this->getAdmins();?>
<!DOCTYPE html>
<html>
<head>
	<title>Cybercom Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="page-wrapper">
		<h3 style="font-weight:bold; font-size:32px;">ADMIN VIEW</h3>
		<hr>	
		<a href="<?php echo $this->getUrl('form',Null,Null,false)?>" class="btn btn-lg bg-success text-white">ADD ADMIN</a><br>	<br>
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white">
					<th>ADMIN ID</th>	
					<th>NAME</th>
					<th>CREATED DATE</th>
					<th>STATUS</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>	
					<?php if(!$admins):?>
					<tr>
						<td colspan="6">No Admin Available.</td>
					</tr>
					<?php else:?>
					<?php foreach ($admins->data as $key) :?>
					<tr>	
						<td><?php echo $key->adminId;?></td>
						<td><?php echo $key->userName;?></td>
						<td><?php echo $key->createdDate;?></td>
						<td><?php if($key->status==1):?>
							<a class="btn-lg btn-success text-white" href="<?php echo $this->getUrl('status',Null,['adminId'=>$key->adminId]);?>"><?php echo $key->status?></a>
								<?php else:?>
								<a class="btn-lg btn-danger text-white" href="<?php echo $this->getUrl('status',Null,['adminId'=>$key->adminId]);?>"><?php echo $key->status?></a>
								<?php endif; ?>
							</td>
						
						<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl('form',Null,['adminId'=>$key->adminId]);?>">EDIT</td>
						<td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl('delete',Null,['adminId'=>$key->adminId]);?>">DELETE</td>
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
