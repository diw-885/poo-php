<?php

class Cat
{
    public static $count = 0;
    public static $litter = [];
    public $count2 = 0;
    public $litter2 = [];

    public function __construct()
    {
        self::$count++;
        self::$litter[] = $this;
        $this->count2++;
        $this->litter2[] = $this;
    }
}
