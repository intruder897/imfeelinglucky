<?php

namespace App\Console\Commands;

use App\Game\GameInterface;
use Illuminate\Console\Command;

class CachePrizeCalculations extends Command
{
    protected $signature = 'prizes:precache';

    protected $description = 'Pre-calculates and caches prize results for optimized performance';

    public function handle(GameInterface $game): int
    {
        for ($i = $game::MIN_DIGIT; $i <= $game::MAX_DIGIT; $i++) {
            $game->getResult($i);
            $game->calculatePrize($i);
        }

        $this->info('Prizes successfully cached');
        return 0;
    }
}
