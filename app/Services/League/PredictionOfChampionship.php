<?php

declare(strict_types=1);

namespace App\Services\League;

final class PredictionOfChampionship
{
    private string $teamName;
    private int $percent;

    public function __construct(string $teamName, int $percent)
    {
        $this->teamName = $teamName;
        $this->percent = $percent;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }

    public function getPercent(): int
    {
        return $this->percent;
    }
}
