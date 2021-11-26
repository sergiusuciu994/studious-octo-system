<?php

namespace App\Game;

use App\Actors\AbstractFighter;

class BattleEngine
{
    const NUMBER_OF_TURNS = 20;
    protected bool $gameStarted = false;

    use CanAnnounceBattleTurns;

    public function startStandardBattle(AbstractFighter $fighter, AbstractFighter $enemy) {
        $this->battle($fighter, $enemy, self::NUMBER_OF_TURNS * 2);
    }

    private function battle(AbstractFighter $fighter, AbstractFighter $enemy, int $turnLimit = 40) {
        if(!$this->isGameStarted()) {
            if($enemy->attacksBefore($fighter)) {
                $temporal = $enemy;
                $enemy = $fighter;
                $fighter = $temporal;
            };
            $this->setGameStarted(true);
        }

        if($turnLimit % 2 === 0) {
            sleep(1);
            $this->announceNewTurn($fighter, $enemy);
        }

        if($turnLimit === 0) {
            $this->announceDraw($fighter, $enemy);
            return;
        }

        if($fighter->getHealth() <= 0) {
            $this->announceWinner($enemy);
            return;
        }
        if($enemy->getHealth() <= 0) {
            $this->announceWinner($fighter);
            return;
        }
        $fighter->attacks($enemy);

        $this->battle($enemy, $fighter, $turnLimit - 1);
    }

    /**
     * @return bool
     */
    private function isGameStarted(): bool
    {
        return $this->gameStarted;
    }

    /**
     * @param bool $gameStarted
     */
    private function setGameStarted(bool $gameStarted): void
    {
        $this->gameStarted = $gameStarted;
    }

}