<?php

class Car
{
    public $wheels = 4;
    private $color = 'white';
    public $brand;
    public $model;
    public $fuel = 50;

    public function __construct($brand = null, $model = null, $color = 'white', $wheels = 4)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->wheels = $wheels;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function drive()
    {
        // Réduire la jauge d'essence
        $this->fuel -= 2;

        return $this->brand.' roule.';
    }

    public function klaxon()
    {
        return $this->brand.' klaxonne.';
    }
}
