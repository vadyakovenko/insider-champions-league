<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MatchPlayRequest;
use App\Models\Match;
use App\Services\Match\MatchService;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    private MatchService $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    public function play(MatchPlayRequest $request)
    {
        $matches = Match::where('week', $request->week)->get();

        DB::transaction(function () use ($matches) {
            $matches->each(function(Match $match) {
                $this->matchService->play($match);
            });
        });

        return redirect()->route('home');
    }

    public function destroy()
    {
        $this->matchService->destroyAll();
        return redirect()->route('home');
    }
}
