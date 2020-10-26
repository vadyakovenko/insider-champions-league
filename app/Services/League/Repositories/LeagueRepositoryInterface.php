<?php

namespace App\Services\League\Repositories;

use App\Services\League\LeagueTableRow;

interface LeagueRepositoryInterface
{
    /**
     * @param int $leagueId
     * @return LeagueTableRow[]
     */
    public function getLeagueTable(int $leagueId): array;

    /**
     * @param LeagueTableRow[] $data
     */
    public function getPredictionsOfChampionship(array $data): array;
}
