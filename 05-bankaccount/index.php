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

/**
 * On va ajouter un système de livret qui va hériter d'un compte standard.
 */
$savingAccount01 = new SavingAccount(123457, 'Matthieu'); // Matthieu a 0 sur son livret
$savingAccount01->depositMoney(1000); // Matthieu a 1000 sur son livret
$savingAccount01->applyInterest(0.75); // Augmente le montant du livret de 0,75%
$savingAccount01->withdrawMoney(1000); // Matthieu a 7,5 sur son livret
echo $savingAccount01->getBalance(); // Renvoie 7,5
