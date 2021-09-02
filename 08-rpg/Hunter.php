<?php

class Hunter extends Character
{
    public function rangedAttack($target)
    {
        $target->pv = $target->pv - $this->strenght * 3;

        echo $this->name.' attaque '.$target->name.' <br />';

        $this->checkKill($target);

        return $this;
    }
}
