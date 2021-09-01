<?php

require 'BankAccount.php';
require 'Owner.php';

$owner01 = new Owner('Matthieu');
$owner02 = new Owner('Marina');

$bankAccount01 = new BankAccount(null, 'Matthieu'); // Matthieu a 0 sur son compte
$bankAccount02 = new BankAccount(null, 'Nassim');
$bankAccount03 = new BankAccount(null, 'Toto');
$bankAccount04 = new BankAccount(null, 'Titi');
$bankAccount05 = new BankAccount(null, 'Tata');

$bankAccount01->addOwner($owner01)->addOwner($owner02);

echo $bankAccount01->getBalance().'<br />';

$bankAccount01->depositMoney(1000)->depositMoney(1000);

echo 'Montant Compte 1 :'.$bankAccount01->getBalance().'<br />';
echo 'Montant Compte 2 :'.$bankAccount02->getBalance().'<br />';

$bankAccount01->withdrawMoney(1000);

// Virement
$bankAccount01->wireTo($bankAccount02, 1000);
// $bankAccount02->wireTo($bankAccount01, 1000);

echo 'Montant Compte 1 :'.$bankAccount01->getBalance().'<br />';
echo 'Montant Compte 2 :'.$bankAccount02->getBalance().'<br />';

require 'print_r.php';

super_print_r($bankAccount01);
echo '<br /><br />';
super_print_r($bankAccount02);
echo '<br /><br />';
super_print_r($bankAccount01->getOwners()); // Matthieu, Marina
echo '<br /><br />';

super_print_r(BankAccount::$accountList);
