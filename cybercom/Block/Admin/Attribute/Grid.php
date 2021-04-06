<?php
namespace Block\Admin\Attribute;
class Grid extends \Block\Core\Template
{
	
    protected $attributes=null;

    public function __construct()
    {
        $this->setTemplate('./View/Admin/Attribute/Grid.php');
    }

	public function setAttributes($attributes=Null){
		if(!$attributes){
			$attributes=\Mage::getModel('Attribute');
			$attributes=$attributes->fetchAll();
		}
		$this->attributes=$attributes;
		return $this;
	}

	public function getAttributes()
	{
		if(!$this->attributes){
			$this->setAttributes();
		}
		return $this->attributes;
	}
}
?>