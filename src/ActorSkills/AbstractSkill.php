<?php

namespace App\ActorSkills;

abstract class AbstractSkill
{
    // We could probably refactor this (maybe add the type of the skill ~attacking/defending~)

    abstract public function getSkillProbability(): float;
    public abstract function getSkillEffect(float $damage): float;

    public function takesEffect(): bool {
        return rand(0, 100) <= $this->getSkillProbability();
    }
    public function getNameParsed(): string {
        return substr(strrchr(get_class($this), '\\'), 1);
    }

    public function getName(): string {
        return self::class;
    }
}