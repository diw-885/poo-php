<?php

require 'BankAccount.php';

$bankAccount01 = new BankAccount(123456, 'Matthieu'); // Matthieu a 0 sur son compte
$bankAccount02 = new BankAccount(123457, 'Nassim');

echo $bankAccount01->getBalance().'<br />';

$bankAccount01->depositMoney(1000)->depositMoney(1000);

echo $bankAccount01->getBalance().'<br />';

$bankAccount01->withdrawMoney(1000);

echo $bankAccount01->getBalance().'<br />';

var_dump($bankAccount01);
