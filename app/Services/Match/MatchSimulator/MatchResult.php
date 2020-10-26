<?php

declare(strict_types=1);

namespace App\Services\Match\MatchSimulator;

use App\Models\Team;
use Carbon\Carbon;

class MatchResult
{
    private array $goals;
    private Carbon $playedAt;

    public function __construct(array $goals, Carbon $playedAt)
    {
        $this->goals = $goals;
        $this->playedAt = $playedAt;
    }

    public function getGoalsForTeam(Team $team): int
    {
        return $this->goals[$team->id]['goals'] ?? 0;
    }

    public function getPlayedAt(): Carbon
    {
        return $this->playedAt;
    }
}
