<?php

namespace App\Game;

use App\Game\Enum\GameResult;
use Illuminate\Support\Facades\Cache;

class GameDefaultImpl implements GameInterface
{
    public function play(): int
    {
        return mt_rand(static::MIN_DIGIT, static::MAX_DIGIT);
    }

    public function getResult(int $score): GameResult
    {
        $cacheKey = 'game_result_' . $score;

        return Cache::rememberForever($cacheKey, function () use ($score) {
            return match (true) {
                $score % 2 === 0 && $score !== 0 => GameResult::win,
                default => GameResult::lose,
            };
        });
    }

    public function calculatePrize(int $score): float
    {
        $cacheKey = 'game_prize_' . $score;

        return Cache::rememberForever($cacheKey, function () use ($score) {
            if ($this->getResult($score) === GameResult::lose) {
                return 0;
            }

            $multiplier = match (true) {
                $score > 900 => 0.7,
                $score > 600 => 0.5,
                $score > 300 => 0.3,
                default => 0.1,
            };

            return $score * $multiplier;
        });
    }
}
