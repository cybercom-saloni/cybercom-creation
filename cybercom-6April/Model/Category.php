<?php
namespace Model;
class Category extends Core\Table{
	public function __construct()
	{
		$this->setTableName("category");
		$this->setPrimaryKey("categoryId");
	}
	
	public function updatePathId()
	{
		if(!$this->parentId)
		{
			$pathId=$this->categoryId;
		}
		else
		{
			$parent=\Mage::getBlock('Admin\Category\Edit\Tabs\Information')->getCategory()->load($this->parentId);
			$pathId=$parent->pathId."=".$this->categoryId;
		}
		$this->pathId=$pathId;
		return $this->save();
	}

	
	public function updateChildrenPathIds($categorypathId,$id=null,$parentId=null)
	{
		$category=\Mage::getModel('Category');
		$categorypathId=$categorypathId."=";
		$query="SELECT * 
					FROM `{$this->getTableName()}` 
					WHERE `pathId` LIKE '{$categorypathId}%'
						ORDER BY `pathId` ASC";
		$categories=$category->getAdapter()->fetchAll($query);
		if($categories)
		{
			foreach($categories->getData() as $key=>$row)
			{
				$row=$category->load($row['categoryId']);
				if($parentId!=NUll)
				{
					if($row->parentId==$categoryId)
					{
						$row->parentId=$parentId;
					}
				}
				$row->updatePathId();
			}
		}
		
	}
}
?>