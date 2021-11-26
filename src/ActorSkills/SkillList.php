<?php

namespace App\ActorSkills;

class SkillList
{
    private array $skills = [];

    public function addSkill(AbstractSkill $skill): SkillList
    {
        $this->skills[get_class($skill)] = $skill;
        return $this;
    }


    public function getSkill(string $class) : ?AbstractSkill
    {
        return $this->skills[$class] ?? null;
    }



}