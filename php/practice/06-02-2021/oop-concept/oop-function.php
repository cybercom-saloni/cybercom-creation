<?php
class BankAccount{
	public $balance=0;
	
	public function DisplayBalance(){
		echo 'Balance : '.$this->balance;
	}
}
$account=new BankAccount;
$account->DisplayBalance();
?>