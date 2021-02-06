<?php
class BankAccount{
	protected $balance=3500;
	public function DisplayBalance(){
		return $this->balance;
	}
}
$account=new BankAccount;
echo $account->balance;
?>