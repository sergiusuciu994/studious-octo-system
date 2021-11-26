<?php

namespace App\Actors;

use App\ActorSkills\MagicShieldSkill;
use App\ActorSkills\RapidStrikeSkill;
use App\ActorSkills\SkillList;

class Fighter extends AbstractFighter
{
    //Class created for the sake of demonstrating Inheritance and Polymorphism

    public function __construct(string $name, SkillList $skillList) {
        parent::__construct($name, $skillList);
    }


    public function attacks(AbstractFighter $enemy) {

        // We can refactor this to dynamically take into the account the skills used (maybe by type ~attack/defence~)

        // calculate damage and apply skill effects
        $damage = $this->determineDamageDealtOnAttack($enemy);
        $rapidStrike = $this->getSkillList()->getSkill(RapidStrikeSkill::class);
        if($rapidStrike && $rapidStrike->takesEffect()) {
            $this->announceSkillEffect($this, $rapidStrike);
            $damage = $rapidStrike->getSkillEffect($damage);
        }


        //apply defence skill effects
        $magicShield = $enemy->getSkillList()->getSkill(MagicShieldSkill::class);
        if($magicShield && $magicShield->takesEffect()) {
            $this->announceSkillEffect($enemy, $magicShield);
            $damage = $magicShield->getSkillEffect($damage);
        }

        //apply lucky roll for complete dodge
        if($enemy->isLuckyDefending()) {
            $damage = 0;
            $this->announceIsLuckyWhenAttacked($enemy, $this);
        }

        $this->announceDamageDealt($this, $damage);
        $enemy->recieveDamage($damage);
    }




}