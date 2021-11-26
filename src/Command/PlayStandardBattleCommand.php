<?php

namespace App\Command;

use App\Actors\Beast;
use App\Actors\Fighter;
use App\ActorSkills\MagicShieldSkill;
use App\ActorSkills\RapidStrikeSkill;
use App\ActorSkills\SkillList;
use App\Game\BattleEngine;
use App\Game\GameHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class PlayStandardBattleCommand extends Command
{
    private BattleEngine $battleEngine;
    private GameHelper $gameHelper;

    public function __construct(string $name = null, BattleEngine $battleEngine, GameHelper $gameHelper)
    {
        parent::__construct($name);
        $this->battleEngine = $battleEngine;
        $this->gameHelper = $gameHelper;
    }

    protected static $defaultName = 'play-standard-battle';
    protected static $defaultDescription = 'Plays the standard battle scenario between Orderus and the wild beast.';

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $orderusSkillList = new SkillList();
        $orderusSkillList->addSkill(new MagicShieldSkill)->addSkill(new RapidStrikeSkill);

        $orderus = new Fighter('Orderus', $orderusSkillList);
        $this->gameHelper->setDefaultHeroStats($orderus);

        $wildBeast = new Fighter('Wild Beast', new SkillList);
        $this->gameHelper->setDefaultBeastStats($wildBeast);

        $this->battleEngine->startStandardBattle($orderus, $wildBeast);


        return Command::SUCCESS;
    }
}
