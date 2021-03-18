<!-- <?php
 $category//=//$this->getCategory();
?> -->
	<div class="page-wrapper">
		<form action="<?php echo $this->getUrl('save',null,null,false)?>" method="post">
			<?php echo $this->getTabContent();?>
			<!-- <div class="form-group">
			   <?php// if($category->categoryId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Category</label><br>
			  	<?php// else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add Category</label><br>
			  	<?php// endif; ?>
			</div>
				
	  		<div class="form-group">
			    <label class="form-label text-uppercase">name</label>
			    <input type="text" class="form-control form-control-lg" id="name" placeholder="name" name="category[name]" value="<?php //echo $category->name;?>">
	  		</div>	 
	  			
	  		<div class="form-group">
	  			<label class="form-label text-uppercase">description</label>
	  			<textarea name="category[description]" id="description" class="form-control form-control-lg"><?php //echo $category->description;?></textarea>
	  		</div>

	  		<div class="form-group">
			    <label class="form-label text-uppercase">status</label>
			    <select class="form-control form-control-lg" name='status' id="status">
				<?php //foreach($category->getStatusOptions() as $key=>$value):?>
					<option value="none" selected hidden disabled>STATUS</option>
					<option value="<?php //echo $key?>"<?php //if($category->status==$key): ?> selected <?php //endif; ?>><?php //echo $key?></option>
				<?php //endforeach; ?>
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
	  		</div> -->
		</form>
		<br><br>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>