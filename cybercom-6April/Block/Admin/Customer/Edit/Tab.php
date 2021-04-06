<?php 
namespace Block\Admin\Customer\Edit;
class Tab extends \Block\Core\Template
{
	protected $tabs=[];
	protected $defaultTab=null;
	public function __construct()
	{
		$this->setTemplate('./View/Admin/Customer/Edit/Tab.php');
		$this->prepareTab();
	}

	public function prepareTab()
	{
		$this->addTab('PersonalInformation',['label'=>'Personal Information','block'=>'Admin\Customer\Edit\Tabs\PersonalInformation']);
		$this->addTab('AddressInformation',['label'=>'Address Information','block'=>'Admin\Customer\Edit\Tabs\AddressInformation']);
		$this->setDefaultTab('PersonalInformation');
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