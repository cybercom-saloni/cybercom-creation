<?php
Mage::loadFileByClassName('Model_Core_Table');
Mage::loadFileByClassName('Model_Core_Adapter');
class Model_Category extends Model_Core_Table{
	public function __construct()
	{
		$this->setTableName("category");
		$this->setPrimaryKey("categoryId");
	}
	
	public function updatePathId()
	{
		if(!$this->parentId)
		{
			$path=$this->categoryId;
		}
		else
		{
			$parent=Mage::getModel('Model_Category')->load($this->parentId,null);
			$path=$parent->pathId."=".$this->categoryId;
		}
		$this->pathId=$path;
	}

	public function updateChildrenPathId($categorypathId,$parent=null)
	{
		echo "<pre>";
		$categorypathId=$categorypathId."=";
		print_r($categorypathId);
		print_r($parent);
		$query="SELECT * 
					FROM `{$this->getTableName()}` 
					WHERE `pathId` LIKE '{$categorypathId}%'
						ORDER BY `pathId` ASC";
		echo $query;
		$categories=$this->fetchAll($query);
		print_r($categories);
		if($categories)
		{
			foreach($categories->getData() as $key=>$row)
			{
				$row=$this->load($row->categoryId);
				if($parent!=NUll)
				{
					$row->parentId=$parent;
				}
				$row->updatePathId();
			}
		}
		
	}
}
?>