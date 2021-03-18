<?php
 $product=$this->getProduct();
?>
		<form action="<?php echo $this->getUrl('save',Null,Null,false)?>" method="post" id="form"> 
<div class="form-group">
			   
			  	<?php if($product->productId):?>
			  		<label for="exampleFormControlInput1" style="font-weight:bold; font-size:32px;">Update Product</label><br>
			  	<?php else: ?>
			  		<label for="exampleFormControlInput1"  style="font-weight:bold; font-size:32px;">Add Product</label><br>
			  	<?php endif; ?>
			</div>
			 <div class="form-group">
			    <label class="form-label text-uppercase">sku</label>
			    <input type="text" class="form-control form-control-lg" id="sku" placeholder="sku" name="product[sku]" value="<?php echo $product->sku;?>">
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">name</label>
			    <input type="text" class="form-control form-control-lg" id="name" placeholder="name" name="product[name]" value="<?php echo$product->name;?>">
	  		</div>	 
	  		<div class="form-group">
			    <label class="form-label text-uppercase">price</label>
			    <input type="text" class="form-control form-control-lg" id="price" placeholder="price" name="product[price]" value="<?php echo$product->price;?>"> 
	  		</div>	
	  		<div class="form-group">
			    <label class="form-label text-uppercase">discount</label>
			    <input type="text" class="form-control form-control-lg" id="discount" name="product[discount]" placeholder="discount" value="<?php echo$product->discount;?>">
	  		</div>
	  		<div class="form-group">
			    <label class="form-label text-uppercase">quantity</label>
				 <input type="text" class="form-control form-control-lg" id="discount" name="product[quantity]" placeholder="quantity" value="<?php echo$product->quantity;?>">
	  		</div>		
	  		<div class="form-group">
	  			<label class="form-label text-uppercase">description</label>
	  			<textarea name="product[description]" id="description" class="form-control form-control-lg"><?php echo $product->description;?></textarea>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label text-uppercase">status</label>
			    <select class="form-control form-control-lg" name=product[status] id="status">
				
				<?php foreach($product->getStatusOptions() as $key=>$value):?>
					<option value="none" selected hidden disabled>STATUS</option>
					<option value="<?php echo $key?>"<?php if($product->status==$key): ?> selected <?php endif; ?>><?php echo $key?></option>
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
</form>