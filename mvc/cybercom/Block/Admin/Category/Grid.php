<?php
namespace Block\Admin\Category;
class Grid extends \Block\Core\Template
{
	protected $categories=[];
	protected $categoryOptions=[];
	function __construct()
	{
		$this->setTemplate('./View/Admin/Category/Grid.php');
	}

	public function setCategories($categories=Null){
		if(!$categories){
			$query="SELECT *
			FROM `category` 
			ORDER BY `pathId` ASC;";
			$categories=\Mage::getModel('Category');
			$categories=$categories->fetchAll($query);
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
	public function getName($category) {
        $categoryModel = \Mage::getModel('Category');

        if(!$this->categoryOptions) {
            $query = "SELECT `categoryId`, `name` FROM `{$categoryModel->getTableName()}`;";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPair($query);
        }


        $pathIds = explode("=", $category->pathId);
                    
        foreach($pathIds as $key => &$id) {
            if(array_key_exists($id, $this->categoryOptions)) {
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode("/", $pathIds);
        return $name;
    }
}
?>