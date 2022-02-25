<?php

namespace CarTour;

class Car
{
    public $model;
    public $speed = 0;
    private $engine = false;
    const MAX_SPEED = 350;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function start()
    {
        $this->engine = true;

        return $this;
    }

    public function isStart()
    {
        return $this->engine;
    }

    public function increaseSpeed()
    {
        $this->speed += 10;

        if ($this->speed >= self::MAX_SPEED) {
            $this->speed = self::MAX_SPEED;
        }

        return $this;
    }

    public function decreaseSpeed()
    {
        $this->speed -= 10;

        if ($this->speed <= 0) {
            $this->speed = 0;
        }

        return $this;
    }
}
