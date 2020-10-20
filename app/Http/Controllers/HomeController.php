<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Match;
use App\Models\Team;
use App\Services\LeagueService;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    private LeagueService $leagueService;

    public function __construct(LeagueService $leagueService)
    {
        $this->leagueService = $leagueService;
    }

    public function index()
    {
        $league = League::first();

        $lastWeek = Match::whereNotNull('played_at')->max('week');
        $maxWeek = Match::max('week');

        $teams = $lastWeekMatches = null;
        $firstWeekMatches = null;

        if (is_null($lastWeek)) {
            $firstWeekMatches = $league->matches()->where('week', 1)->with('teams')->get();
        } else {
            $teams = Team::withCount(['matches' => fn (Builder $q) => $q->whereNotNull('played_at')])->get();
            $lastWeekMatches = $league->matches()->where('week', $lastWeek)->with('teams')->get();
        }

        return view(
            'home',
            compact('league', 'teams', 'lastWeek', 'firstWeekMatches', 'lastWeekMatches', 'maxWeek')
        );
    }
}
