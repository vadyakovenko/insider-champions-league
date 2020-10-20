<?php

declare(strict_types=1);

namespace App\Services\Match;

use App\Models\Match;
use App\Models\Team;
use App\Services\Match\MatchSimulator\MatchResult;
use App\Services\Match\MatchSimulator\MatchSimulatorInterface;
use Illuminate\Support\Facades\DB;

final class MatchService
{
    private MatchSimulatorInterface $matchSimulator;

    public function __construct(MatchSimulatorInterface $matchSimulator)
    {
        $this->matchSimulator = $matchSimulator;
    }

    public function create(CreateMatchDTO $dto): Match
    {
        return DB::transaction(function() use ($dto) {
            /** @var Match $match */
            $match = Match::create([
                'week' => $dto->getWeek(),
                'league_id' => $dto->getLeague()->getKey(),
            ]);

            $match->teams()->attach([$dto->getFirstTeam()->id, $dto->getSecondTeam()->id]);

            return $match;
        });
    }

    public function saveMatchResult(Match $match, MatchResult $matchResult): Match
    {
        return DB::transaction(function () use ($match, $matchResult) {
            $match->update(['played_at' => now()]);
            foreach ($match->teams as $team) {
                $team->pivot->goals = $matchResult->getGoalsForTeam($team);
                $team->pivot->save();
            }
            return $match;
        });
    }

    public function play(Match $match): void
    {
        $result = $this->matchSimulator->simulate($match);
        $this->saveMatchResult($match, $result);
    }

    public function updateGoalsCount(Match $match, Team $team, int $goals): void
    {
        $foundTeam = $match->teams()->findOrFail($team->id);

        $foundTeam->pivot->goals = $goals;
        $foundTeam->pivot->save();
    }

    public function destroyAll(): void
    {
        Match::all()->each(function (Match $match) {
            $match->teams()->detach();
            $match->delete();
        });
    }
}
