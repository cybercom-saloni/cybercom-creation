<?php
	class BankAccount{
		public $balance=10.5;
		public function DisplayBalance(){
			return 'Balance : '.$this->balance;
		}
		public function Withdraw($amount){
			if(($this->balance)<$amount){
				echo 'Not enough balance';
			}else{
			$this->balance=$this->balance - $amount;
			}
		}
	}

// new instance of class
$account=new BankAccount;
// withdraw 5pounds
$account->Withdraw(15);
// displaying balance
echo $account->DisplayBalance();
?>