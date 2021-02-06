<?php
	class BankAccount{
		public $balance=10.5;
		public function DisplayBalance(){
			return 'Balance : '.$this->balance;
		}
		public function Withdraw($amount){
			try{
				if(($this->balance)<$amount){
				throw new Exception('Not enough balance');
				}else{
				$this->balance=$this->balance - $amount;
				}
			}catch(Exception $e){
				echo 'Error: '.$e->getMessage();
			}
		}

		public function Deposit($amount){
			$this->balance=$this->balance + $amount;

		}
	}

// new instance of class
$account1=new BankAccount;

echo "<br> ACCOUNT 1</br>";
$account1->Deposit(100);
// withdraw 5pounds
$account1->Withdraw(15);
// displaying balance
echo "BALANCE ".$account1->DisplayBalance();

$account2=new BankAccount;

echo "<br> ACCOUNT 2</br>";
$account2->Deposit(1000);
// withdraw 5pounds
$account2->Withdraw(150);
// displaying balance
echo "BALANCE ".$account2->DisplayBalance();
?>