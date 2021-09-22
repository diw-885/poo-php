<?php

namespace Geometry;

class Circle
{
    protected $radius;

    /**
     * On construit un cercle avec son rayon.
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return round(M_PI * $this->radius ** 2, 2);
    }

    public function perimeter()
    {
        return round(2 * M_PI * $this->radius, 2);
    }
}
