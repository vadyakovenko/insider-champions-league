<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Champions League</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Insider (Formerly SOCIAPlus) Champions League</a>
            @if (isset($lastWeek) && $lastWeek)
                <div class="">
                    <a class="btn btn-sm btn-primary" href="{{route('matches.edit')}}">Edit Championship</a>
                    <form onsubmit="return confirm('RESET championship')" class="d-inline float-right" method="POST" action="{{route('matches.destroy')}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">RESET championship</button>
                    </form>
                </div>
            @endif
        </div>

    </nav>

    <main role="main" class="container">
        @yield('content')
    </main>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
