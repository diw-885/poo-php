<?php

namespace Parking\Pro;

use Parking\Car;
use Parking\Motorcycle;

class Truck
{
    private $cars = [];

    public function __construct()
    {
        $this->cars = [
            new Car(),
            new Motorcycle(),
            // new \PDO('')
        ];
    }
}
