<?php 
namespace Block\Admin\Config\Edit;
class Tabs extends \Block\Core\Template
{
    protected $tabs=[];
	protected $defaultTab=null;
    
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Config/Edit/Tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'information','block'=>'Admin\Config\Edit\Tabs\Information']);
        $this->addTab('configuration',['label'=>'configuration','block'=>'Admin\Config\Edit\Tabs\Configuration']);
        $this->setDefaultTab('information');
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