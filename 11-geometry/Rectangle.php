<?php

namespace Geometry;

class Rectangle
{
    protected $length;
    protected $width;

    /**
     * On construit le rectangle avec une longueur et une largeur.
     */
    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function area()
    {
        return $this->length * $this->width;
    }

    public function perimeter()
    {
        // return 2 * $this->length + 2 * $this->width;
        return 2 * ($this->length + $this->width);
    }
}
