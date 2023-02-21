<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") - brandweer IJsselland</title>
    <link href="/assets/style/css/style.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <link href="/assets/img/logo.png" rel="icon">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
@if (auth()->check())
    <div class="heading">
        <div class="left-side">
            <img src="/assets/img/logo.png" alt="Brandweer logo">
            <a href="/dashboard">Dashboard</a>
            <a href="/manschappen">Manschappen</a>
            <a href="/voertuigen">Voertuigen</a>
            <a href="/log">Log</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </div>
        <div class="right-side">
            <a href="/dashboard">Maak melding +</a>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endif


    @yield("content")
</body>
<script src="/assets/js/main.js"></script>
</html>
