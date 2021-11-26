<?php

namespace App\Actors;


use App\ActorSkills\SkillList;
use App\Game\CanAnnounceFighterMoves;

abstract class AbstractFighter
{
    use CanAnnounceFighterMoves;

    private float $health = 0;
    private int $defence = 0;
    private int $strength = 0;
    private int $speed = 0;
    private int $luck = 0;
    protected string $name;
    private SkillList $skillList;


    public function __construct(string $name, SkillList $skillList) {
        $this->skillList = $skillList;
        $this->name = $name;
    }

    public function recieveDamage(float $flatDamageReceived) {
        $this->health -= $flatDamageReceived;
    }


    public function attacksBefore(AbstractFighter $enemy): bool
    {
        $mySpeed = $this->getSpeed();
        $enemySpeed = $enemy->getSpeed();

        if($mySpeed === $enemySpeed) {
            return $this->getLuck() > $enemy->getLuck();
        }

        // to be discussed the case where both speed and luck are equal
        return  $mySpeed > $enemySpeed;
    }


    public function attacks(AbstractFighter $enemy)
    {
        $damage = $this->determineDamageDealtOnAttack($enemy);
        $this->announceDamageDealt($this, $damage);
        $enemy->recieveDamage($damage);
    }

    protected function isLuckyDefending(): bool
    {
        return rand(0, 100) < $this->getLuck();
    }


    protected function determineDamageDealtOnAttack(AbstractFighter $enemy)
    {
        $damage = floatval($enemy->getDefence() - $this->getStrength()) * -1;
        return $damage > 0 ? $damage : 0;
    }

    public function getHealth() {
        return $this->health;
    }

    public function getDefence(): int
    {
        return $this->defence;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }


    public function getSkillList(): SkillList
    {
        return $this->skillList;
    }

    public function getName(): string {
        return $this->name;
    }


    public function setHealth($health): void
    {
        $this->health = $health;
    }

    public function setDefence(int $defence): void
    {
        $this->defence = $defence;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function setLuck(int $luck): void
    {
        $this->luck = $luck;
    }

}