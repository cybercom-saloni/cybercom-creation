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

class SavingAccount extends BankAccount{
	public $type="saving";
}

$account1=new BankAccount;
echo "<br> BANK ACCOUNT 1</br>";
$account1->Deposit(100);
$account1->Withdraw(15);
echo "BALANCE ".$account1->DisplayBalance();


$account2=new SavingAccount;
echo "<br> SAVING BANK ACCOUNT :</br>";
$account2->Deposit(1000);
$account2->Withdraw(150);
echo "TYPE : ".$account2->type;
echo "   BALANCE ".$account2->DisplayBalance();
