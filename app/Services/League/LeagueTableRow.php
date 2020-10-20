<?php

declare(strict_types=1);

namespace App\Services\League;

class LeagueTableRow
{
    private string $name;
    private int $points;
    private int $played;
    private int $won;
    private int $drawn;
    private int $lost;
    private int $gf;
    private int $ga;
    private int $gd;

    public function __construct(string $name, int $points, int $played, int $won, int $drawn, int $lost, int $gf, int $ga, int $gd)
    {
        $this->name = $name;
        $this->points = $points;
        $this->played = $played;
        $this->won = $won;
        $this->drawn = $drawn;
        $this->lost = $lost;
        $this->gf = $gf;
        $this->ga = $ga;
        $this->gd = $gd;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getPlayed(): int
    {
        return $this->played;
    }

    public function getWon(): int
    {
        return $this->won;
    }

    public function getDrawn(): int
    {
        return $this->drawn;
    }

    public function getLost(): int
    {
        return $this->lost;
    }

    public function getGF(): int
    {
        return $this->gf;
    }

    public function getGA(): int
    {
        return $this->ga;
    }

    public function getGD(): int
    {
        return $this->gd;
    }
}
