<?php

namespace CarTour;

class Tour
{
    public $location;
    public $laps;
    public $distance;
    public $players = [];
    public $rankings = [];

    public function __construct($location, $laps, $distance)
    {
        $this->location = $location;
        $this->laps = $laps;
        $this->distance = $distance;
    }

    public function addPlayer($player)
    {
        $this->players[] = $player;
    }

    public function start()
    {
        for ($i = 0; $i < $this->laps; $i++) {
            $this->simulateLap();
        }
    }

    public function simulateLap()
    {
        foreach ($this->players as $index => $player) {
            $speed = $player->drive() + ($index + 1);
            $key = round($this->distance / $speed);
            $existing = array_search($player, $this->rankings);

            if ($existing) {
                unset($this->rankings[$existing]);
                $this->rankings[$existing + $key] = $player;
            } else {
                $this->rankings[$key] = $player;
            }
        }
    }

    public function getRanking()
    {
        ksort($this->rankings);

        return $this->rankings;
    }

    public function countPlayers()
    {
        return count($this->players);
    }
}
