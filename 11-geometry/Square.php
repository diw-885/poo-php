<?php

namespace Geometry;

class Square extends Rectangle
{
    public function __construct($length)
    {
        // On appelle le constructeur du rectangle
        parent::__construct($length, $length);
    }
}
