<?php
namespace Block\Admin\Cms\Edit;
class Tabs extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('./View/Admin/Cms/Edit/Tab.php');
        $this->prepareTabs();
    }
    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'CMSPage','block'=>'Admin\Cms\Edit\Tabs\Information']);
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
?>