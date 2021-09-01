<?php

class Animal
{
    protected $name;

    public function __construct($n)
    {
        $this->name = $n;
    }

    public function move()
    {
        return $this->name.' se déplace.';
    }
}
