<?php 
Mage::loadFileByClassName('Block_Core_Template');
/**
 * 
 */
class Block_Customer_Edit_Tabs extends Block_Core_Template
{
	protected $tabs=[];
	protected $defaultTab=null;
	public function __construct()
	{
		$this->setTemplate('./View/Customer/Edit/Tab.php');
		$this->prepareTab();
	}

	public function prepareTab()
	{
		$this->addTab('Personal Information',['label'=>'Personal Information','block'=>'Block_Customer_Edit_Tabs_PersonalInformation']);
		$this->addTab('Address Information',['label'=>'Address Information','block'=>'Block_Customer_Edit_Tabs_AddressInformation']);
		$this->setDefaultTab('customer');
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