<?php

class Cat extends Animal
{
    public $name;

    public function cry()
    {
        return 'Miaule';
    }

    public function breathe()
    {
        return 'Respire avec des poumons';
    }
}
