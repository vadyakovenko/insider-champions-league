@extends('layouts.main')

@section('content')
    <div class="offset-3 col-md-6 bg-white">
        <div class="row pt-3 pr-3 pl-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="5" class="text-center">Edit matches result (via ajax)</th>
                    </tr>
                    <tr>
                        <th class="text-center">First team</th>
                        <th class="text-center">Goals</th>
                        <th class="text-center">-</th>
                        <th class="text-center">Goals</th>
                        <th class="text-center">Second team</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($playedMatches as $match)
                        <tr>
                            <th scope="col">{{ $match->firstTeam()->name }}</th>
                            <th scope="col">
                                <input
                                    class="input-sm edit-goals"
                                    type="number"
                                    value="{{ $match->firstTeam()->pivot->goals }}"
                                    data-value="{{ $match->firstTeam()->pivot->goals }}"
                                    data-match-id="{{ $match->id }}"
                                    data-team-id="{{ $match->firstTeam()->id }}"
                                >
                            </th>
                            <th scope="col">-</th>
                            <th scope="col">
                                <input
                                    class="input-sm edit-goals"
                                    type="number"
                                    value="{{ $match->secondTeam()->pivot->goals }}"
                                    data-value="{{ $match->secondTeam()->pivot->goals }}"
                                    data-match-id="{{ $match->id }}"
                                    data-team-id="{{ $match->secondTeam()->id }}"
                                >
                            </th>
                            <th scope="col">{{ $match->secondTeam()->name }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
