<?php 
namespace Block\Admin\Product\Edit\Tabs;
class Category extends \Block\Core\Template
{
	protected $categories=null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Product/Edit/Tabs/Category.php');
	}

	public function setCategories($categories = null){
		if(!$categories){
			$categories = \Mage::getModel('Category');
			$categories = $categories->fetchAll();
		}
		$this->categories = $categories;
		return $this;

	}

	public function getCategories(){
		if(!$this->categories){
			$this->setCategories();
		}

		return $this->categories;
	} 
}
?>