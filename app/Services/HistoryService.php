<?php

namespace App\Services;

use App\Game\Enum\GameResult;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class HistoryService
{
    public function addHistory(Page $page, int $score, GameResult $result, int $prize): void
    {
        $page->history()
            ->create([
                'score' => $score,
                'result' => $result,
                'prize' => $prize
            ]);
    }

    public function getHistory(Page $page): Collection
    {
         return $page->history()
             ->orderBy('id', 'desc')
             ->limit(3)
             ->get();
    }
}
