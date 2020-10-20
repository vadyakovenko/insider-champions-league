<?php

namespace App\Services\Match\MatchSimulator;

use App\Models\Match;

interface MatchSimulatorInterface
{
    public function simulate(Match $match): MatchResult;
}
