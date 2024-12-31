<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Page extends Model
{
    /** @use HasFactory<PageFactory> */
    use HasFactory, HasUuid;

    /** Configuration */

    const DAYS_AMOUNT_PAGE_VALID = 7;

    protected $fillable = [
        'uuid',
        'is_active',
        'user_id',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_active' => 'bool',
    ];

    protected $appends = [
        'live',
        'expired'
    ];

    /** Relationships */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function history(): HasMany
    {
        return $this->hasMany(History::class);
    }

    /** Attributes */

    public function getExpiredAttribute(): bool {
        return $this->expires_at->isPast();
    }

    public function getLiveAttribute(): bool {
        return !$this->expired && $this->is_active === true;
    }

    /** Functions */

    public function getHref(): string
    {
        return route('page.view', ['page' => $this]);
    }

    public function getUpdateKeyHref(): string
    {
        return route('page.update_key', ['page' => $this]);
    }

    public function getActivateHref(): string
    {
        return route('page.activate', ['page' => $this]);
    }

    public function getDeactivateHref(): string
    {
        return route('page.deactivate', ['page' => $this]);
    }

    public function getPlayHref(): string
    {
        return route('page.play', ['page' => $this]);
    }

    public function getHistoryHref(): string
    {
        return route('page.history', ['page' => $this]);
    }
}
