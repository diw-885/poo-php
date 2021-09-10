<?php

class Fish extends Animal implements KingdomAnimalInterface
{
    public function cry()
    {
        return 'Bulle';
    }

    public function breathe()
    {
        return 'Respire avec des bronches';
    }
}
