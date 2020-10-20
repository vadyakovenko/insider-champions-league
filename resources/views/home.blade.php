@extends('layouts.main')

@section('content')
    <div class="row py-3">
        @if(is_null($lastWeek))
            <div class="col-md-12">
                <h1>There is no played matches</h1>
            </div>
            <br>
            <div class="col-md-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th colspan="2" >
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
            <div class="col-md-8 bg-white">
                <div class="row py-3">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="7" class="text-center" >{{$league->name}} Table</th>
                            </tr>
                            <tr>
                                <th scope="col">Teams</th>
                                <th scope="col" title="Points">PTS</th>
                                <th scope="col" title="Played">P</th>
                                <th scope="col" title="Won">W</th>
                                <th scope="col" title="Drawn">D</th>
                                <th scope="col" title="Lost">L</th>
                                <th scope="col" title="Goal Difference">GD</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->name}}</td>
                                    <td>-</td>
                                    <td>{{$team->matches_count}}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
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
                                        <th scope="col">{{$match->teams[0]->name}}</th>
                                        <th scope="col">
                                            {{$match->teams[0]->pivot->goals ?? 0}}
                                            -
                                            {{$match->teams[1]->pivot->goals ?? 0}}
                                        </th>
                                        <th scope="col">{{$match->teams[1]->name}}</th>
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

            <div class="col-md-4 bg-white">
                <div class="row pt-3 pr-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">{{$lastWeek}}-th Predictions of Championship</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <th scope="col">{{$team->name}}</th>
                                <th scope="col">%45</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
