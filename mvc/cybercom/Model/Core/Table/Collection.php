<?php
class Model_Core_Table_Collection
{
    public $data=[];

	public function setData(array $data)
	{
		$this->data=$data;
		return $this;
	}

	public function getData()
	{
		return $this->data;
	}

	public function count()
	{
		return count($this->data);
	}
}
?>