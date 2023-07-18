<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CriptoPreco</title>
    <script src="https://kit.fontawesome.com/d850a5eef9.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2474/2474240.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/e.css') }}">
</head>
<body>
    <div id="app">
    @yield('content')
    </div>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>