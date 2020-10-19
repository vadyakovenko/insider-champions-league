<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Champions League</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Insider (Formerly SOCIAPlus) Champions League</a>
        </div>
    </nav>

    <main role="main" class="container">
        @yield('content')
    </main>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
