<?php

class Character
{
    private $name;
    private $pv = 100;
    protected $strenght = 10;
    protected $mana = 10;

    public function __construct($n)
    {
        $this->name = $n;
    }

    public function attack($target)
    {
        // $this est l'attaquant
        // $target est la cible
        $target->pv = $target->pv - $this->strenght * 2;

        echo $this->name.' attaque '.$target->name.' <br />';

        return $this;
    }
}
