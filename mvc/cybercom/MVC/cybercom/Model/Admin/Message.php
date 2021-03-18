<?php 
Mage::loadFileByClassName('Model_Admin_Session');
/**
 * 
 */
class Model_Admin_Message extends Model_Admin_Session
{
	
	public function setSuccess($message)
	{
		$this->success=$message;
		return $this;
	}

	public function getSuccess()
	{
		return $this->success;
	}

	public function setFailure($message)
	{
		$this->failure=$message;
		return $this;
	}

	public function getFailure()
	{
		return $this->failure;
	}

	public function setNotice($message)
	{
		$this->notice=$message;
		return $this;
	}

	public function getNotice()
	{
		return $this->notice;
	}

	public function clearSuccess()
	{
		unset($this->success);
		return $this;
	}

	public function clearFailure()
	{
		unset($this->failure);
		return $this;
	}
}
 ?>