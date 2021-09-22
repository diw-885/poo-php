<?php

class SavingAccount extends BankAccount
{
    public function applyInterest($rate)
    {
        $this->amount *= 1 + $rate / 100;
        $this->amount = round($this->amount, 2);
    }
}
