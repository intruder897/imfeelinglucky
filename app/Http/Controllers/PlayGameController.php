<?php

namespace App\Http\Controllers;

use App\Game\GameInterface;
use App\Models\Page;
use App\Services\HistoryService;
use Illuminate\Http\JsonResponse;

class PlayGameController extends Controller
{
    public function __invoke(Page $page, GameInterface $game, HistoryService $historyService): JsonResponse
    {
        abort_if(!$page->live, 422);

        $score = $game->play();
        $result = $game->getResult($score);
        $prize = $game->calculatePrize($score);

        $historyService->addHistory($page, $score, $result, $prize);

        return response()->json(compact('score', 'result', 'prize'));
    }
}
