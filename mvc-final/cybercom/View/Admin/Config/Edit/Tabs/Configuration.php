<?php $config = $this->getConfig()?>
<?php $id=$this->getRequest()->getGet('configGroupId');?>
<div class="container">
    <h3>Config</h3>
    <hr>
    <form action="<?php echo $this->getUrl()->getUrl('updateConfig','config');?>" method="post">
        <div class="form-group">
            <input type="submit" value="update" class="btn btn-success btn-lg">
            <input type="button" name="addConfig" onclick="addRow()" value="Add Config" class="btn btn-lg btn-info">
        </div>
        <table class="table table-bordered bg-light  table-hover" id="existingOption">				
				<thead>
					<th>title</th>
					<th>code</th>
                    <th>value</th>
					<th>ACTION</th>
				</thead>
				<tbody>	
				<tbody>	
					<?php if(!$config):?>
					<tr id='NoDataFound'>
						<td colspan="9">No Conifig Available.</td>
					</tr>
					<?php else:?>
					<tr>
					<?php foreach ($config->getData() as $configData) :?>	
						<td><input type="text" name="Exist[<?php echo $configData->configId?>][title]" placeholder="title" value="<?php echo $configData->title;?>"></td>
                        <td><input type="text" name="Exist[<?php echo $configData->configId?>][code]" placeholder="code" value="<?php echo $configData->code?>"></td>
                        <td><input type="text" name="Exist[<?php echo $configData->configId?>][value]" placeholder="value" value="<?= $configData->value?>"></td>
                        <td><a  class="btn btn-lg btn-secondary" href="<?=$this->getUrl()->getUrl('deleteConfig','config',['configGroupId'=>$id,'configId'=>$configData->configId],true);?>">Remove</a></td>
					</tr>
					<?php endforeach;?>
					<?php endif;?>
				</tbody>
		</table><br><br>
    </form>
    <div style="display:none">
        <table id="newOption" class="table" class="table table-bordered bg-light  table-hover">	
            <tbody>
                <tr>
                    <td><input type="text" name="new[title][]" placeholder="title"></td>
                    <td><input type="text" name="new[code][]" placeholder="code"></td>
                    <td><input type="text" name="new[value][]" placeholder="value"></td>
                    <td><a type="button" name="remove" value="Remove" onclick="removeOption(this)" class="btn btn-lg text-white btn-secondary">Remove</a></td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function addRow()
    {
        var newOptionTable = document.getElementById('newOption');
        var existOptionTable = document.getElementById('existingOption').children[0];
        var NoDataFound = document.getElementById('NoDataFound');
        existOptionTable.append(newOptionTable.children[0].children[0].cloneNode(true));
        // NoDataFound.remove();
    }

    function removeOption(button)
    {
        var objTraversal=(button).closest('tr');
        console.log(button);
        objTraversal.remove();
    }


</script>