<?php
class BankAccount{
	// public $balance=3500;
	var $balance=3500;
	public function DisplayBalance(){
		return $this->balance;
	}
}
$account=new BankAccount;
echo $account->balance;
?>