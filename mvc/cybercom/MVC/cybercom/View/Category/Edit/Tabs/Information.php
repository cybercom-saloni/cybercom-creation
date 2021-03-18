<?php
 $categorys=$this->getCategory();
 $category=$this->getParentOptions();
 echo "<pre>";
 print_r($category);
 die();
?>
<div class="form-group">
			   <?php if($categorys->categoryId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Category</label><br>
			  	<?php else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add Category</label><br>
			  	<?php endif; ?>
			</div> 
			<div class="form-group">
			    <label class="form-label text-uppercase">Parent Category Name</label>
			    <select class="form-control form-control-lg" name='category[parentId]' id="category">
				<option value="none" selected hidden disabled>SELECT</option>
				<?php foreach($category as $key=>$categoryName):?>
					<option value="<?php echo $key?>"<?php if($key==$category->parentId): ?> selected <?php endif; ?>><?php echo $categoryName?></option>
				<?php endforeach; ?>
			    </select>
	  		</div>

	  		<div class="form-group">
			    <label class="form-label text-uppercase">name</label>
			    <input type="text" class="form-control form-control-lg" id="name" placeholder="name" name="category[name]" value="<?php echo $categorys->name;?>">
	  		</div>	 
	  			
	  		<div class="form-group">
	  			<label class="form-label text-uppercase">description</label>
	  			<textarea name="category[description]" id="description" class="form-control form-control-lg"><?php echo $categorys->description;?></textarea>
	  		</div>

	  		<div class="form-group">
			    <label class="form-label text-uppercase">status</label>
			    <select class="form-control form-control-lg" name='status' id="status">
				<?php foreach($categorys->getStatusOptions() as $key=>$value):?>
					<option value="none" selected hidden disabled>STATUS</option>
					<option value="<?php echo $key?>"<?php if($categorys->status==$key): ?> selected <?php endif; ?>><?php echo $key?></option>
				<?php endforeach; ?>
			    </select>
	  		</div>		
	  		<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="submit" name="submit" id="submit" class="form-control form-control-lg bg-success">
	  				</div>	
	  				<div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-4">	
	  					<input type="reset" name="reset" id="reset" class="form-control form-control-lg bg-danger">
	  				</div>
	  				<div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 col-2">	
	  				</div>	
	  			</div>
	  		</div>