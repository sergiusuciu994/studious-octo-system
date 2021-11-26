<?php

namespace App\Game;

use App\Actors\AbstractFighter;

class GameHelper
{
    public function setDefaultHeroStats(AbstractFighter $orderus)
    {
        $orderus->setHealth(rand(70, 100));
        $orderus->setStrength(rand(70, 80));
        $orderus->setDefence(rand(45, 55));
        $orderus->setSpeed(rand(40, 50));
        $orderus->setLuck(rand(10, 30));
    }

    public function setDefaultBeastStats(AbstractFighter $wildBeast)
    {
        $wildBeast->setHealth(rand(60, 90));
        $wildBeast->setStrength(rand(60, 90));
        $wildBeast->setDefence(rand(40, 60));
        $wildBeast->setSpeed(rand(40, 60));
        $wildBeast->setLuck(rand(25, 40));
    }
}