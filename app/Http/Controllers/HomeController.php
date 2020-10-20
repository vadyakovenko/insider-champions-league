<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Match;
use App\Services\League\LeagueRepository;

class HomeController extends Controller
{
    public function index(LeagueRepository $leagueRepository)
    {
        $league = League::first();

        $lastWeek = Match::whereNotNull('played_at')->max('week');
        $maxWeek = Match::max('week');

        $firstWeekMatches = $lastWeekMatches = $leagueTableContent = $predictionsOfChampionship = null;

        if (is_null($lastWeek)) {
            $firstWeekMatches = $league->matches()->where('week', 1)->with('teams')->get();
        } else {
            $lastWeekMatches = $league->matches()->where('week', $lastWeek)->with('teams')->get();
            $leagueTableContent = $leagueRepository->getLeagueTable($league->id);
            $predictionsOfChampionship = $leagueRepository->getPredictionsOfChampionship($leagueTableContent);
        }

        return view(
            'home',
            compact(
                'league',
                'lastWeek',
                'firstWeekMatches',
                'lastWeekMatches',
                'maxWeek',
                'leagueTableContent',
                'predictionsOfChampionship'
            )
        );
    }
}
