<?php

namespace App\Models;

use App\Game\Enum\GameResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    /** @use HasFactory<HistoryFactory> */
    use HasFactory;

    /** Configuration */
    protected $table = 'history';
    protected $fillable = [
        'page_id',
        'score',
        'result',
        'prize',
    ];

    protected $casts = [
        'result' => GameResult::class,
    ];

    /** Relationships */

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
