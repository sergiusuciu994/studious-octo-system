<?php

namespace App\ActorSkills;

class MagicShieldSkill extends AbstractSkill
{
    const SKILL_PROBABILITY = 20;

    public function getSkillProbability(): float
    {
        return self::SKILL_PROBABILITY; //%
    }

    public function getSkillEffect(float $damage): float
    {
        return $damage / 2;
    }
}