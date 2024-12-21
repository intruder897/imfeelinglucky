<?php

namespace Database\Factories;

use App\Game\GameInterface;
use App\Models\Page;
use App\Models\History;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<History>
 */
class HistoryFactory extends Factory
{
    public function definition(): array
    {
        $game = app(GameInterface::class);

        $score = $game->play();
        $result = $game->getResult($score);
        $prize = $game->calculatePrize($score);

        return [
            'score' => $score,
            'result' => $result,
            'prize' => $prize,
            'page_id' => Page::factory(),
        ];
    }

    public function forPage(Page $page): HistoryFactory
    {
        return $this->state(fn () => [
            'page_id' => $page->id,
        ]);
    }
}
