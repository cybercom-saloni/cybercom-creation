<?php 
class Block_Category_Edit_Tabs_Information extends Block_Core_Layout
{
	protected $category=null;
	protected $categoryOptions=[];
	protected $categoryPath = [];

	function __construct()
	{
		$this->setTemplate('./View/Category/Edit/Tabs/Information.php');
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
    		$category=Mage::getModel('Model_Category');
    		if($id=$this->getRequest()->getGet('categoryId')){
    			$category=$category->load($id);
    		}
    	}
    	$this->category=$category;
    	return $this;	
    }

	public function getParentOptions()
	{
		if($this->categoryOptions)
		{
			return $this->categoryOptions;
		}
		$query="SELECT `categoryId`,`name` FROM `{$this->getCategory()->getTableName()}`";
		$options=Mage::getModel('Model_Category')->getAdapter()->fetchPair($query);

		$query1="SELECT `categoryId`,`pathId` FROM `{$this->getCategory()->getTableName()}`";
		$this->categoryOptions=Mage::getModel('Model_Category')->getAdapter()->fetchPair($query1);

		if($this->categoryOptions)
		{
			foreach($this->categoryOptions as $categoryId =>&$pathId)
			 {
			// 	if($categoryId=$this->getRequest()->getGet('categoryId')!=$categoryId)
			// 	{
			// 		$pathIds=explode("=",$pathId);
			// 	}
			$pathIds = explode("=", $pathId);
				foreach($pathIds as $key=>&$id)
				{
					echo 1;
					if(array_key_exists($categoryId,$options))
					{
						$pathIds[$key]=$options[$categoryId];
					}
					// $pathId=implode("/",$pathIds);
					$this->categoryOptions[$categoryId] = implode("/",$pathIds);
					echo "<pre>";
					print_r($pathId);
					
				}
			}
			$this->categoryOptions = ["0"=>"Root Category"] + $this->categoryOptions;
		}
		return $this->categoryOptions;
	}
}
 ?>