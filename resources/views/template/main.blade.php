<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss', 'resources/css/index.css'])
    <script src="https://kit.fontawesome.com/aa7982219a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @yield('contenido')
</body>

</html>
