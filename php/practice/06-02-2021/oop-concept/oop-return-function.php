<?php
class BankAccount{
	public $balance=0;
	
	public function DisplayBalance(){
		return 'Balance : '.$this->balance;
	}
}
$account=new BankAccount;
echo $account->DisplayBalance();
?>