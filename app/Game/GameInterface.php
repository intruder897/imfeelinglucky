<?php

namespace App\Game;

use App\Game\Enum\GameResult;

interface GameInterface
{
    const MIN_DIGIT = 1;
    const MAX_DIGIT = 1000;

    public function play(): int;
    public function getResult(int $score): GameResult;

    public function calculatePrize(int $score): int;
}
