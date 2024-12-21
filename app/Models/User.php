<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    /** Configuration */

    protected $fillable = [
        'username',
        'phone',
    ];

    protected $with = [
        'page'
    ];

    /** Relationships */

    public function page(): HasOne
    {
        return $this->hasOne(Page::class);
    }
}
