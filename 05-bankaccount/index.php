<?php

require 'BankAccount.php';

$bankAccount01 = new BankAccount(null, 'Matthieu'); // Matthieu a 0 sur son compte
$bankAccount02 = new BankAccount(null, 'Nassim');
$bankAccount03 = new BankAccount(null, 'Toto');
$bankAccount04 = new BankAccount(null, 'Titi');
$bankAccount05 = new BankAccount(null, 'Tata');

echo $bankAccount01->getBalance().'<br />';

$bankAccount01->depositMoney(1000)->depositMoney(1000);

echo $bankAccount01->getBalance().'<br />';

$bankAccount01->withdrawMoney(1000);

echo $bankAccount01->getBalance().'<br />';

var_dump($bankAccount01);
var_dump($bankAccount02);

var_dump(BankAccount::$accountList);
