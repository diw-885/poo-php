<?php

class Magus extends Character
{
    public function __construct($n)
    {
        parent::__construct($n);
        $this->mana *= 2;
    }
}
