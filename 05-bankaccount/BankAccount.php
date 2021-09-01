<?php

class BankAccount
{
    private $id;
    private $owner;
    private $amount = 0;
    public static $accountList = [];
    private $ownerList = [];

    public function __construct($id, $owner, $amount = 0)
    {
        // $this->id = $id;
        $this->id = str_pad(rand(1, 6), 7, '0', STR_PAD_LEFT);
        $this->owner = $owner;
        $this->amount = $amount;

        // On va s'assurer que l'id est unique
        while (in_array($this->id, self::$accountList)) {
            $this->id = str_pad(rand(1, 6), 7, '0', STR_PAD_LEFT);
        }

        // On va ajouter l'id du compte à la liste des comptes
        self::$accountList[] = $this->id;
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

    public function addOwner($o)
    {
        $this->ownerList[] = $o;

        return $this;
    }

    public function getOwners()
    {
        foreach ($this->ownerList as $owner) {
            echo $owner->name;
        }
        //return $this->ownerList;
    }
}
