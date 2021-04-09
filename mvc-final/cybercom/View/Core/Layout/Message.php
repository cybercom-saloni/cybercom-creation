<div class="center">
	<div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xl-12">
		<?php if($success=$this->getMessage()->getSuccess()): $this->getMessage()->clearSuccess();?>
			<div class="alert alert-success" role="alert">
				<?php echo $success;?>
			</div>
		<?php endif;?>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xl-12">
		<?php if($failure=$this->getMessage()->getFailure()): $this->getMessage()->clearFailure();?>
			<div class="alert alert-warning" role="alert">
				<?php echo $failure;?>
			</div>
		<?php endif;?>
	</div>
</div>