<?php

declare(strict_types=1);

namespace App\Services\League;

use App\Models\League;
use App\Services\Match\CreateMatchDTO;
use App\Services\Match\MatchService;
use DomainException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class LeagueService
{
    private MatchService $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    public function generateMatchesForLeague(League $league)
    {
        /** @var Collection $teams */
        $teams = $league->teams;

        if ($teams->count() < 2) {
            throw new DomainException('League must be have at least 2 team');
        }

        $groups = $this->groupTeams($teams);
        $weeksCount = (int)ceil((2 * count($groups))/$teams->count());
        $qtyMatchesPerWeek = (int)ceil(count($teams)/2);

        DB::beginTransaction();
        for ($week = 1; $week <= $weeksCount; $week++) {
            $exceptTeams = [];
            for ($i = 1; $i <= $qtyMatchesPerWeek; $i++) {
                $key = $this->getNextGroupKey($groups, $exceptTeams);
                $teamsGroup = $groups[$key];
                $exceptTeams = $exceptTeams + $teamsGroup;
                $createMatchDTO = new CreateMatchDTO($league, $week, ...$teamsGroup);
                $this->matchService->create($createMatchDTO);
                unset($groups[$key]);
            }
        }
        DB::commit();
    }

    private function groupTeams(Collection $teams): array
    {
        $groups = [];
        $teams = clone $teams;

        for ($i = 0; $i < $teams->count(); $i++) {
            for ($j = $i+1; $j < $teams->count(); $j++) {
                if (isset($teams[$j])) {
                    $groups[] = [$teams[$i], $teams[$j]];
                }
            }
        }

        return [...$groups, ...$groups];
    }

    private function getNextGroupKey(array $items, array $exceptTeams): int
    {
        if(!count($exceptTeams)) {
            return array_key_first($items);
        }

        foreach ($items as $k => $item) {
            foreach ($exceptTeams as $j => $exceptTeam) {
                if (
                    ($item[0]->id == $exceptTeam->id)
                    || ($item[1]->id == $exceptTeam->id)
                ) {
                    break;
                } elseif (($j+1) == count($exceptTeams)) {
                    return $k;
                }
            }
        }
    }
}
