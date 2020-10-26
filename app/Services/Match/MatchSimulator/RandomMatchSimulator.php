<?php

declare(strict_types=1);

namespace App\Services\Match\MatchSimulator;

use App\Models\Match;

class RandomMatchSimulator implements MatchSimulatorInterface
{
    public function simulate(Match $match): MatchResult
    {
        $goals = [
            $match->firstTeam()->id => ['goals' => $this->generateRandomGoalsNumber()],
            $match->secondTeam()->id => ['goals' => $this->generateRandomGoalsNumber()],
        ];

        return new MatchResult($goals, now());
    }

    private function generateRandomGoalsNumber(): int
    {
        return random_int(0, 9);
    }
}
