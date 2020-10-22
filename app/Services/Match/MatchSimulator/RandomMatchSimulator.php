<?php

declare(strict_types=1);

namespace App\Services\Match\MatchSimulator;

use App\Models\Match;

class RandomMatchSimulator implements MatchSimulatorInterface
{
    public function simulate(Match $match): MatchResult
    {
        $teams = $match->teams;
        $data = [
            $teams[0]->id => ['goals' => random_int(0, 10)],
            $teams[1]->id => ['goals' => random_int(0, 10)],
        ];

        return new MatchResult($data);
    }
}
