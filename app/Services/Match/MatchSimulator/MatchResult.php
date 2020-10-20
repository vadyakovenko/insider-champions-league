<?php

declare(strict_types=1);

namespace App\Services\Match\MatchSimulator;

use App\Models\Team;

class MatchResult
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getGoalsForTeam(Team $team): int
    {
        return $this->data[$team->id]['goals'] ?? 0;
    }
}
