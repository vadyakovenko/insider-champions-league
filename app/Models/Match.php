<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ {
    Model,
    Relations\BelongsToMany
};

class Match extends Model
{
    protected $fillable = ['week', 'league_id', 'played_at'];

    protected $casts = [
        'played_at' => 'datetime',
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->withPivot(['goals']);
    }
}
