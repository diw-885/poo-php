<?php

abstract class Animal implements KingdomAnimalInterface
{
    public function walk()
    {
        return 'Il peut se mouvoir et n\'est pas un humain';
    }
}
