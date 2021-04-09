<?php
// $children=Mage::getModel('Model_Core_Table');
// $children=$children->fetchAll();
// echo "<pre>";
// print_r($children);
// die();
$children=$this->getChildren();

foreach ($children as $child) {
	echo $child->toHtml();
}
?>