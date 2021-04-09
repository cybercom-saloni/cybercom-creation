<div class="list-group p-0 h-100 w-100">
<?php foreach($this->getTabs() as $key=>$tab):?>
<a class="list-group-item list-group-item-action" href="<?php echo $this->getUrl()->getUrl(null,null,['tab'=>$key],false);?>"><?=$tab['label']?></a>
<?php endforeach; ?>
</div>