<?php

    class BankAccount{
        private $balance;

        public function __construct($balance){
            $this->balance = $balance;
        }

        public function getBalance(){
            return $this->balance;
        }
        public function deposit($amount){
            if($amount > 0){
                $this->balance += $amount;
            }
            return $this;
        }
    }
    class SavingAccount extends BankAccount{//Ke thua toan phan 
        //Tai su dung lai cai ma tu lop cha
        private $interestRate;

        public function __construct($balance, $interestRate){
            parent::__construct($balance);
            $this->interestRate = $interestRate;
        }

        public function setInterestRate($interestRate)
            {
                $this->interestRate = $interestRate;
            }
        public function addInterest(){
            //tinh lai suat 
            $interest = $this->interestRate * $this->getBalance();
            $this->deposit($interest);
            }

    }

  /*  $account = new SavingAccount();
    $account->deposit(200);//Goi method cha

    $account->setInterestRate(0.06);*/

    $account = new SavingAccount(50000,0.1);

    $account->addInterest();

    echo $account->getBalance();//Goi method cha 






?>