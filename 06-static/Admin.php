<?php

class Admin
{
    private $name;
    private static $bans = [];

    public function __construct($n)
    {
        $this->name = $n;
    }

    public function setBan($banneds)
    {
        foreach ($banneds as $banned) {
            self::$bans[] = $banned;
        }
    }

    public function getBan()
    {
        var_dump(self::$bans);
    }
}
