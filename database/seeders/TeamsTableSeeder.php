<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\League;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = ['Chelsea', 'Arsenal', 'Manchester', 'Liverpool'];
        $leagueId = League::firstOrFail()->id;

        array_map(
            fn (string $team) => Team::firstOrCreate(['name' => $team, 'league_id' => $leagueId]),
            $teams
        );
    }
}
