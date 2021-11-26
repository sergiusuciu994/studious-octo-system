<?php

namespace App\ActorSkills;

class RapidStrikeSkill extends AbstractSkill
{
    const SKILL_PROBABILITY = 10;

    public function getSkillProbability(): float
    {
        return self::SKILL_PROBABILITY; //%
    }

    public function getSkillEffect(float $damage): float
    {
        return $damage * 2;
    }
}