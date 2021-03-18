<?php
Mage::loadFileByClassName('Block_Core_Template');
/**
 * Block_Category_Grid
 */
class Block_Category_Grid extends Block_Core_Template
{
	protected $categories=[];
	protected $categoriesOptions=[];
	function __construct()
	{
		$this->setTemplate('./View/Category/Grid.php');
	}

	public function setCategories($categories=Null){
		if(!$categories){
			$categories=Mage::getModel('Model_Category');
			$categories=$categories->fetchAll();
		}
		$this->categories=$categories;
		return $this;
	}

	public function getCategories()
	{
		if(!$this->categories){
			$this->setCategories();
		}
		return $this->categories;
	}
	public function getName($category)
	{
		if(!$this->categoriesOptions)
		{
			$query="SELECT `categoryId`,`name`
					FROM `category`";
			$this->categoryOptions=Mage::getModel('Model_Category')->getAdapter()->fetchPair($query);
		}

		echo $category;
		die();
	}
}
?>