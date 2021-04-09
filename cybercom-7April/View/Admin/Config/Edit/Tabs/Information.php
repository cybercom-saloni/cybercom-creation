<?php $configGroup = $this->getConfigGroup();
print_r($configGroup);?>
<input type="button" name="addOption"  value="Add Option" onclick="addRow()" class="btn btn-lg btn-success">
<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>group Id</th>
					<th>name</th>
					<th>ACTION</th>
				</thead>
				<tbody>	
				<form method="POST" id="update">
				<input type="button" value="update" class="btn-light" onclick="update();">
				<?php if($configGroup):?>
						<?php foreach($configGroup->getData() as $key => $item):?>
						<tr>
							<td><?= $item->groupId;?></td>
							<td><input type="text" name="configGroup[<?php echo $item->configGroupId?>]" value="<?php echo $item->name;?>"></td>
							<td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl()->getUrl('delete',Null,['configGroupId'=>$item->configGroupId]);?>">DELETE</td>
						</tr>
						<?php endforeach;?>
				<?php endif;?>
				</form>
				</tbody>
		</table>
        <div style="display:none">
        <table id='newOption' class='table'>
            <tbody>
                <tr>
                        <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                        <td><input type="text" name="New[Name][]" placeholder="Name"></td>
                        <td><a type="button" name="remove" value="remove Option"  onclick="removeOption(this)" class="btn btn-danger btn-md">DELETE</a></td>
                </tr> 
            </tbody>
        </table>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	function update()
	{
		var form=document.getElementById('update');
		form.setAttribute('Action','<?php echo $this->getUrl()->getUrl('update','config',null,null);?>');
		form.submit();
	}
    function addRow() {
        var newOptiontable = document.getElementById('newOption');
        var existOptiontable = document.getElementById('existingOption').children[0];
        var NoDataFound = document.getElementById('NoDataFound');
        existOptiontable.append(newOptiontable.children[0].children[0].cloneNode(true));
        NoDataFound.remove();
    }
</script>