<?php

class BankAccount
{
    private $id;
    private $owner;
    private $amount = 0;

    public function __construct($id, $owner, $amount = 0)
    {
        $this->id = $id;
        $this->owner = $owner;
        $this->amount = $amount;
    }

    public function getBalance()
    {
        return $this->amount.' €';
    }

    public function depositMoney($deposit)
    {
        $this->amount += $deposit;

        return $this;
    }

    public function withdrawMoney($withdraw)
    {
        $this->amount -= $withdraw;

        return $this;
    }
}
