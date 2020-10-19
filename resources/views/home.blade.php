@extends('layouts.main')

@section('content')
    <div class="row py-3">
        <div class="col-md-8 bg-white">
            <div class="row py-3">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="7" class="text-center" >League Table</th>
                        </tr>
                        <tr>
                            <th scope="col">Teams</th>
                            <th scope="col">PTS</th>
                            <th scope="col">P</th>
                            <th scope="col">W</th>
                            <th scope="col">D</th>
                            <th scope="col">L</th>
                            <th scope="col">GD</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Chelsea</td>
                            <td>8</td>
                            <td>4</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Arsenal</td>
                            <td>10</td>
                            <td>4</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>Manchester</td>
                            <td>10</td>
                            <td>4</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>Liverpool</td>
                            <td>10</td>
                            <td>4</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                            <td>11</td>
                        </tr>
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
                            <th colspan="3" class="text-center">4-th Week Match Result</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">Chelsea</th>
                            <th scope="col">3 - 2</th>
                            <th scope="col">Liverpool</th>
                        </tr>
                        <tr>
                            <th scope="col">Arsenal</th>
                            <th scope="col">3 - 3</th>
                            <th scope="col">Manchester</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-info btn-sm float-left">Play all</button>
                    <button class="btn btn-sm btn-outline-warning float-right">Next week</button>
                </div>
            </div>
        </div>

        <div class="col-md-4 bg-white">
            <div class="row pt-3 pr-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th colspan="2" class="text-center">4-th Predictions of Championship</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="col">Chelsea</th>
                        <th scope="col">%45</th>
                    </tr>
                    <tr>
                        <th scope="col">Arsenal</th>
                        <th scope="col">%25</th>
                    </tr>
                    <tr>
                        <th scope="col">Manchester</th>
                        <th scope="col">%25</th>
                    </tr>
                    <tr>
                        <th scope="col">Liverpool</th>
                        <th scope="col">%5</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
