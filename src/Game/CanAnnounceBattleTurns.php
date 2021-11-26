<?php

namespace App\Game;

use App\Actors\AbstractFighter;

trait CanAnnounceBattleTurns
{

    // We could have the Observer pattern (Events) for better decoupling
    // We are using two traits for "Announcing" stuff to cover the S and I in SOLID

    public function announceDraw(AbstractFighter $fighter, AbstractFighter $enemy) {
        echo "Both {$fighter->getName()} and {$enemy->getName()} got tired of fighting! They called it a draw and went home! \n";
    }

    public function announceWinner(AbstractFighter $fighter) {
        echo "{$fighter->getName()} has won the battle! \n";
    }

    public function announceNewTurn(AbstractFighter $fighter,AbstractFighter $enemy) {
        $fighterHealth = $fighter->getHealth() >= 0 ? $fighter->getHealth() : 0;
        $enemyHealth = $enemy->getHealth() >= 0 ? $enemy->getHealth() : 0;
        echo "\n\n------------------------------\n".
             "{$fighter->getName()}: {$fighterHealth}HP\n".
             "{$enemy->getName()}: {$enemyHealth}HP\n".
             "------------------------------\n";
    }
}