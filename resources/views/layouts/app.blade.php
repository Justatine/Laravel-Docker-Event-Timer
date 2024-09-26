<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col">

    @include('components.header')

    <div class="container flex-grow p-8">
        @yield('content')
    </div>

    @include('components.footer')

    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>