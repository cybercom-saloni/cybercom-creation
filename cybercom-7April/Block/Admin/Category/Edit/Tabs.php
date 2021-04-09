<?php 
namespace Block\Admin\Category\Edit;
class Tabs extends \Block\Core\Template
{
	protected $tabs=[];
	protected $defaultTab=null;
	public function __construct()
	{
		$this->setTemplate('./View/Admin/Category/Edit/Tab.php');
		$this->prepareTab();
	}

	public function prepareTab()
	{
		$this->addTab('category',['label'=>'Category Information','block'=>'Admin\Category\Edit\Tabs\Information']);
		$this->addTab('media',['label'=>'Media','block'=>'Admin\Category\Edit\Tabs\Media']);
		$this->addTab('gallery',['label'=>'Gallery','block'=>'Admin\Category\Edit\Tabs\Gallery']);
		$this->setDefaultTab('category');
		return $this;
	}

	public function setDefaultTab($defaultTab)
	{
		$this->defaultTab=$defaultTab;
	}

	public function getDefaultTab()
	{
		return $this->defaultTab;
	}

	public function setTabs(array $tabs=[])
	{
		$this->tabs=$tabs;
		return $this;
	}

	public function getTabs()
	{
		return $this->tabs;
	}

	public function addTab($key,$tab=[])
	{
		$this->tabs[$key]=$tab;
		return $this;
	}

	public function getTab($key)
	{
		if(!array_key_exists($key,$this->tabs))
		{
			return null;
		}
		return $this->tabs[$key];
	}

	public function removeTab($key)
	{
		if(array_key_exists($key,$this->tabs))
		{
			unset($this->tabs[$key]);
		}
	}

}
?>