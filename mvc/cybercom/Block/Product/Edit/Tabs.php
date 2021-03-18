<?php 
Mage::loadFileByClassName('Block_Core_Template');
/**
 * 
 */
class Block_Product_Edit_Tabs extends Block_Core_Template
{
	protected $tabs=[];
	protected $defaultTab=null;
	public function __construct()
	{
		$this->setTemplate('./View/Product/Edit/Tab.php');
		$this->prepareTab();
	}

	public function prepareTab()
	{
		$this->addTab('product',['label'=>'ProductInformation','block'=>'Block_Product_Edit_Tabs_Information']);
		$this->addTab('media',['label'=>'Media','block'=>'Block_Product_Edit_Tabs_Media']);
		$this->addTab('gallery',['label'=>'Gallery','block'=>'Block_Product_Edit_Tabs_Gallery']);
		$this->addTab('groupPrice',['label'=>'GroupPrice','block'=>'Block_Product_Edit_Tabs_GroupPrice']);
		$this->setDefaultTab('product');
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