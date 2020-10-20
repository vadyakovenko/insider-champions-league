<?php /** @var \App\Services\League\LeagueTableRow $row */ ?>
<? /** @var \App\Services\League\PredictionOfChampionship $prediction */ ?>

@extends('layouts.main')

@section('content')
    <div class="row py-3">
        @if(is_null($lastWeek))
            @if($firstWeekMatches->count())
                <div class="col-md-12">
                    <h1>There are no played matches</h1>
                </div>
                <br>
                <div class="col-md-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2">
                                Waiting 1-th week matches
                                <form class="d-inline" method="POST" action="{{route('matches.play')}}">
                                    @csrf
                                    <input type="hidden" name="week" value="1">
                                    <button class="btn btn-success btn-sm">Simulate</button>
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($firstWeekMatches as $match)
                            <tr>
                                @foreach($match->teams as $team)
                                    <th>{{$team->name}}</th>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <form class="d-inline float-right" method="POST" action="{{route('matches.init')}}">
                    @csrf
                    <button class="btn btn-primary btn-sm">Init championship</button>
                </form>
            @endif
        @else
            <div class="col-md-9 bg-white">
                <div class="row py-3">
                    <div class="col-md-7">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="9" class="text-center">{{ $league->name }} Table</th>
                            </tr>
                            <tr>
                                <th scope="col">Teams</th>
                                <th scope="col" title="Points">PTS</th>
                                <th scope="col" title="Played">P</th>
                                <th scope="col" title="Won">W</th>
                                <th scope="col" title="Drawn">D</th>
                                <th scope="col" title="Lost">L</th>
                                <th scope="col" title="Goal For">GF</th>
                                <th scope="col" title="Goal Against">GA</th>
                                <th scope="col" title="Goal Difference">GD</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leagueTableContent as $row)
                                <tr>
                                    <td>{{ $row->getName() }}</td>
                                    <td>{{ $row->getPoints() }}</td>
                                    <td>{{ $row->getPlayed() }}</td>
                                    <td>{{ $row->getWon() }}</td>
                                    <td>{{ $row->getDrawn() }}</td>
                                    <td>{{ $row->getLost() }}</td>
                                    <td>{{ $row->getGF() }}</td>
                                    <td>{{ $row->getGA() }}</td>
                                    <td>{{ $row->getGD() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="3" class="text-center">Match Results</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center">{{$lastWeek}}-th Week Match Result</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($lastWeekMatches as $match)
                                    <tr>
                                        <th scope="col">{{ $match->firstTeam()->name }}</th>
                                        <th scope="col">
                                            {{ $match->firstTeam()->pivot->goals }}
                                            -
                                            {{ $match->secondTeam()->pivot->goals }}
                                        </th>
                                        <th scope="col">{{ $match->secondTeam()->name }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        <div class="col-md-12">
                            @if($lastWeek < $maxWeek)
                                <form class="float-right" method="POST" action="{{route('matches.play')}}">
                                    @csrf
                                    <input type="hidden" name="week" value="{{$lastWeek + 1}}">
                                    <button class="btn btn-success btn-sm">Next week</button>
                                </form>
                            @endif
                        </div>

                </div>
            </div>

            <div class="col-md-3 bg-white">
                <div class="row pt-3 pr-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">{{$lastWeek}}-th Predictions of Championship</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($predictionsOfChampionship as $prediction)
                            <tr>
                                <th scope="col">{{ $prediction->getTeamName() }}</th>
                                <th scope="col">{{ $prediction->getPercent() }}%</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
