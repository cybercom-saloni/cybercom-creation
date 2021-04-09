<?php
namespace Model\Core;
\Mage::loadFileByClassName('Model\Core\Session');

class Message extends \Model\Core\Session 
{
	public function setSuccess($message) {
		$this->success = $message;
		return $this;
	} 

	public function getSuccess() {
		return $this->success;
	}

	public function setFailure($message) {
		$this->failure = $message;
		return $this;
	} 

	public function getFailure() {
		return $this->failure;
	}

	public function setNotice($message) {
		$this->notice = $message;
		return $this;
	} 

	public function getNotice() {
		return $this->notice;
	}

	public function clearSuccess()
	{
		unset($this->success);
		return $this;
	}
}

?>