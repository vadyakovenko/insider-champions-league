<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ {
    Model,
    Relations\BelongsTo,
    Relations\BelongsToMany
};

class Team extends Model
{
    protected $fillable = ['name'];

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function matches(): BelongsToMany
    {
        return $this->belongsToMany(Match::class)->withPivot('goals');
    }
}
