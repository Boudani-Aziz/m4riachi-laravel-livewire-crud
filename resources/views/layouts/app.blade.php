<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crud Livewire</title>

    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">

    @livewireStyles
</head>

<body class="p-4">
    @yield('content')

    <script src="{{ url(mix('js/app.js')) }}"></script>
    @livewireScripts
</body>

</html>
