<?php $image = $this->getImage();?>
<form action="<?php echo $this->getUrl('save','Product_Media');?>" enctype="multipart/form-data"  method="post">
    <div class="float-right mb-2 mr-2">
        <button type="button" onclick="submitForm(this)" class="btn btn-success text-left mt-3 mb-2">Update</button>
        <button type="button" onclick="deleteMedia(this)" class="btn btn-primary text-left mt-3 mb-2">Remove</button>

    </div><br>
    <div class="h2 text-center mb-2" >
        <p>Media Details</p>
    </div>
   
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="row" style="white-space: nowrap;">Image</th>
                <th>Label</th>
                <th>Small</th>
                <th>Thumb</th>
                <th>Base</th>
                <th>Gallery</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody> 
        <?php if (!empty($image)) :?>
        <?php foreach ($image->data as $key => $value): ?>              
            <tr class="text-center">
                <th scope="row" style="white-space: nowrap;"><img src="Images\Product\<?php echo $value->image; ?>" style="height:100px; width:100px" alt=""></th>
                <th><input type="text" name="img[data][<?php echo $value->imageId?>][label]" value="<?php echo $value->label?>" ></th>
                <th><input type="radio" name="img[small]" value="<?php echo $value->imageId?>" <?php if ($value->small == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="radio" name="img[thumb]" value="<?php echo $value->imageId?>" <?php if ($value->thumb == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="radio" name="img[base]" value="<?php echo $value->imageId?>" <?php if ($value->base == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="checkbox" name="img[data][<?php echo $value->imageId?>][gallery]" <?php if ($value->gallery == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="checkbox" name="remove[<?php echo $value->imageId?>]" ></th>
            </tr>
            <?php endforeach;?>    
            <?php else: ?>
                <tr><td colspan="6">NO RECORD FOUND</td></tr>
            <?php endif;?>
        </tbody>
    </table>
    <div class="text-center">
        <div class="input-group mb-3">
                <input type="file" name="img">
            <div class="input-group-prepend">
                <button type="submit" name="upload" class="input-group-text">Upload</button>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function submitForm(button){
        var form = $(button).closest('form');
        form.attr('action', "<?php echo $this->getUrl('update','Product_Media'); ?>");
        form.submit();
        // e.preventDefault();
    }
    
    function deleteMedia(button) {  
        var form = $(button).closest('form');
        form.attr('action',"<?php echo $this->getUrl('delete','Product_Media'); ?>");
        form.submit();
    }
</script>
