<?php

class Dog extends Animal
{
    private $leash;

    public function __construct($n, $l)
    {
        // Appel le constructeur de Animal
        parent::__construct($n);
        $this->leash = $l;
    }

    public function cry()
    {
        return $this->name.' aboie.';
    }
}
