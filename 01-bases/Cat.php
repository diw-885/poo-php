<?php

class Cat
{
    private $name;
    var $type;
    var $fur;

    public function __construct($name = null, $type = null)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName()
    {
        return strtoupper($this->name);
    }

    public function setName($name)
    {
        if (!is_string($name)) {
            throw new Exception('Attention, il faut une chaine');
        }

        $this->name = $name;

        return $this;
    }

    function cry()
    {
        return $this->name.' fait Miaou !';
    }
}
