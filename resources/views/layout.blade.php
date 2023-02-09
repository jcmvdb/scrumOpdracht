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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
    @yield("content")
</body>
<script src="/assets/js/main.js"></script>
</html>
