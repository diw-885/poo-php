<?php

// Cat hérite de la classe Animal
// On dit que Animal est la classe mère
// Cat est la classe enfant
class Cat extends Animal
{
    public function climbsOnRoof()
    {
        return $this->name.' grimpe sur le toit.';
    }

    public function move()
    {
        return parent::move().' silencieusement.';
    }
}
