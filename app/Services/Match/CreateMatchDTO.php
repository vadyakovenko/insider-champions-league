<?php

declare(strict_types=1);

namespace App\Services\Match;

use App\Models\League;
use App\Models\Team;

final class CreateMatchDTO
{
    private League $league;
    private int $week;
    private Team $firstTeam;
    private Team $secondTeam;

    public function __construct(League $league, int $week, Team $firstTeam, Team $secondTeam)
    {
        $this->league = $league;
        $this->week = $week;
        $this->firstTeam = $firstTeam;
        $this->secondTeam = $secondTeam;
    }

    public function getLeague(): League
    {
        return $this->league;
    }

    public function getWeek(): int
    {
        return $this->week;
    }

    public function getFirstTeam(): Team
    {
        return $this->firstTeam;
    }

    public function getSecondTeam(): Team
    {
        return $this->secondTeam;
    }

}
