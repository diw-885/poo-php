<?php

class Character
{
    protected $name;
    protected $pv = 100;
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

        $this->checkKill($target);

        return $this;
    }

    /**
     * La méthode est utilisable uniquement dans la classe et les enfants
     */
    protected function checkKill($target)
    {
        if ($target->pv <= 0) {
            $target->pv = 0;

            echo $this->name.' a tué '.$target->name.' <br />';
        }
    }
}
