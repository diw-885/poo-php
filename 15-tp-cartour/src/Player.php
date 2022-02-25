<?php

namespace CarTour;

class Player
{
    public $name;
    public $team;
    public $car;
    private $level = 1;
    private $luck;
    private static $counter = 0;

    public function __construct($name, $team, Car $car, $level)
    {
        $this->name = $name;
        $this->team = $team;
        $this->car = $car;

        if ($level > 0 && $level <= 100) {
            $this->level = $level;
        }

        $this->luck = rand(0, 5);

        self::$counter++;
    }

    public function getIdentity()
    {
        return $this->name.' - '.$this->team;
    }

    public function getCar()
    {
        return $this->car->model;
    }

    public static function getCounter()
    {
        return self::$counter;
    }

    public function drive()
    {
        if ($this->car->isStart()) {
            $performance = rand(0, 100 + $this->luck * 2) + $this->level / 10;

            if ($performance < 10) {
                $this->car->decreaseSpeed();
            } else if ($performance > 50) {
                $this->car->increaseSpeed();
            }
        } else {
            $this->car->start()->increaseSpeed();
        }

        return $this->car->speed;
    } 
}
