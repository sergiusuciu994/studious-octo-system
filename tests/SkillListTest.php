<?php

namespace App\Tests;

use App\ActorSkills\MagicShieldSkill;
use App\ActorSkills\SkillList;
use PHPUnit\Framework\TestCase;

class SkillListTest extends TestCase
{
    public function testThatOneSkillCanBeAddedToTheSkillList(): void
    {
        //We check for a specific skill before adding it
        $skillList = new SkillList();
        $this->assertNull($skillList->getSkill(MagicShieldSkill::class));

        //We add the skill and check that the list contains the added skill
        $skillList->addSkill(new MagicShieldSkill());
        $this->assertNotNull($skillList->getSkill(MagicShieldSkill::class));
        $this->assertEquals(MagicShieldSkill::class, get_class($skillList->getSkill(MagicShieldSkill::class)));
    }
}
