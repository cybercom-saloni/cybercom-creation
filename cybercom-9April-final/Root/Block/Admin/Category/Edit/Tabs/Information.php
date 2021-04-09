<?php 
namespace BLock\Admin\Category\Edit\Tabs;
class Information extends \Block\Core\Layout
{
	protected $category=null;
	protected $categoryOptions=[];
	protected $categoryPath = [];

	function __construct()
	{
		$this->setTemplate('./View/Admin/Category/Edit/Tabs/Information.php');
	}

	 public function getCategory()
    {
    	if(!$this->category){
    		$this->setCategory();
    	}
    	return $this->category;
    }
     public function setCategory($category=null)
    {
    	if(!$category){
    		$category=\Mage::getModel('Category');
    		if($id=$this->getRequest()->getGet('categoryId')){
    			$category=$category->load($id);
    		}
    	}
    	$this->category=$category;
    	return $this;	
    }
	public function getParentOptions() {
        if(!$this->categoryOptions) {
            $query = "SELECT `categoryId`, `name` FROM `{$this->getCategory()->getTableName()}`;";
            $options = $this->getCategory()->getAdapter()->fetchPair($query);

            $query = "SELECT `categoryId`, `pathId` FROM `{$this->getCategory()->getTableName()}`;";
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPair($query);   
          
            if($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$pathId) {
                    $pathIds = explode("=", $pathId);
                    foreach($pathIds as $key => &$id) {
                        if(array_key_exists($id, $options)) {
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode("/", $pathIds);
                }
            }   
			$this->categoryOptions = ["0"=>"Root Category"] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }
}
 ?>