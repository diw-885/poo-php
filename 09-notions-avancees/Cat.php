<?php

class Cat extends Animal
{
    use InteractsWithHuman;

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
