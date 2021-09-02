<?php

class Warrior extends Character
{
    // protected $strenght = 20;

    public function __construct($n)
    {
        parent::__construct($n);
        $this->strenght *= 2;
    }
}
