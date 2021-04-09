<?php $attributes = $this->getAttributes()->getData();?>
	<div class="page-wrapper mt-4">
		<h3 style="font-weight:bold; font-size:32px;">ATTRIBUTE VIEW</h3>
		<hr>	
		<table class="table table-bordered bg-light  table-hover">				
				<thead class="bg-dark text-white text-uppercase">
					<th>Attribute Id</th>	
					<th>entity Type id</th>
					<th>NAME</th>
					<th>Code</th>
					<th>input type</th>
					<th>backend type</th>
					<th>sort order</th>
					<th>backend Model</th>
					<th colspan="2">ACTION</th>
				</thead>
                <tbody>
                    <tr>
                    <?php if(!$attributes):?>
                        <td colspan="10">NO ATTRIBUTE FOUND</td>
                    </tr>
                    <tr>
                    <?php else:?>
                        <?php foreach($attributes as $attribute):?>
                        <td><?= $attribute->attributeId?></td>
                        <td><?= $attribute->entityTypeId?></td>
                        <td><?= $attribute->name?></td>
                        <td><?= $attribute->code?></td>
                        <td><?= $attribute->inputType?></td>
                        <td><?= $attribute->backendType?></td>
                        <td><?= $attribute->sortOrder?></td>
                        <td><?= $attribute->backendModel?></td>
                        <td><a class="btn-lg bg-success text-white" href="<?php echo $this->getUrl()->getUrl('form',null,['attributeId'=>$attribute->attributeId]);?>">EDIT</td>
                        <td><a class="btn-lg bg-secondary text-white" href="<?php echo $this->getUrl()->getUrl('delete',NULL,['attributeId'=>$attribute->attributeId]);?>">DELETE</td>
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
