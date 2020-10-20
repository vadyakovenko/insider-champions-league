<?php

declare(strict_types=1);

namespace App\Services\League;

use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

final class LeagueRepository
{
    /**
     * @param int $leagueId
     * @return LeagueTableRow[]
     */
    public function getLeagueTable( int $leagueId ): array
    {
        $result = collect([]);
        $teams = Team::where('league_id', $leagueId)
            ->withCount(['matches' => fn (Builder $q) => $q->whereNotNull('played_at')])
            ->get();

        //todo optimize it
        /** @var Team $team */
        foreach ($teams as $team) {

            $played = $team->matches_count;

            $won = DB::table('match_team AS m1')
                ->join('match_team AS m2', 'm2.match_id', '=', 'm1.match_id')
                ->whereRaw('m1.goals > m2.goals')
                ->where('m1.team_id', $team->id)
                ->count();

            $lost = DB::table('match_team AS m1')
                ->join('match_team AS m2', 'm2.match_id', '=', 'm1.match_id')
                ->whereRaw('m1.goals < m2.goals')
                ->where('m1.team_id', $team->id)
                ->count();

            $goalsFor = $team->matches->pluck('pivot.goals')->sum();
            $goalsAgainst = (int)DB::table('match_team')
                ->whereIn('match_id', $team->matches->pluck('id')->toArray())
                ->where('team_id', '!=', $team->id)
                ->sum('goals');
            $goalDifference = $goalsFor - $goalsAgainst;

            $drawn = $played - $won - $lost;

            $result->push(new LeagueTableRow(
                $team->name,
                $won * 3 + $drawn,
                $played,
                $won,
                $drawn,
                $lost,
                $goalsFor,
                $goalsAgainst,
                $goalDifference
            ));
        }

        return $result->sortBy(fn (LeagueTableRow $row) => -$row->getPoints())->toArray();
    }

    /**
     * @param LeagueTableRow[] $data
     */
    public function getPredictionsOfChampionship(array $data): array
    {
        $result = collect([]);
        $pointsSum = array_sum(array_map(fn (LeagueTableRow $row) => $row->getPoints(), $data));

        foreach ($data as $row) {
            $result->push(
                new PredictionOfChampionship(
                    $row->getName(),
                    (int)round($row->getPoints() / $pointsSum * 100))
            );
        }

        return $result->sortBy(fn (PredictionOfChampionship $row) => -$row->getPercent())->toArray();
    }
}
