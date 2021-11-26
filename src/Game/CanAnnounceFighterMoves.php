<?php

namespace App\Game;

use App\Actors\AbstractFighter;

trait CanAnnounceFighterMoves
{

    // We could have the Observer pattern (Events) for better decoupling
    // We are using two traits for "Announcing" stuff to cover the S and I in SOLID

    public function announceIsLuckyWhenAttacked(AbstractFighter $fighter, AbstractFighter $enemy) {
        echo "{$fighter->getName()} got lucky and completely dodged {$enemy->getName()}'s attack! \n";
    }

    public function announceSkillEffect(AbstractFighter $fighter, \App\ActorSkills\AbstractSkill $skill)
    {
        echo "{$fighter->getName()} used {$skill->getNameParsed()}!\n";
    }

    public function announceDamageDealt(AbstractFighter $fighter, float $damage)
    {
        echo "{$fighter->getName()} deals {$damage} damage!\n";
    }
}