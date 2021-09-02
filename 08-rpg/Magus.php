<?php

class Magus extends Character
{
    public function __construct($n)
    {
        parent::__construct($n);
        $this->mana *= 2;
    }

    public function castSpell($target)
    {
        $target->pv = $target->pv - $this->mana * 3;

        echo $this->name.' attaque '.$target->name.' <br />';

        $this->checkKill($target);

        return $this;
    }
}
