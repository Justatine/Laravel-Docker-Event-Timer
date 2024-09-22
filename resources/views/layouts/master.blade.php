<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Laravel App')</title>
    
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('components.header')

    <div class="container">
        @yield('content')
    </div>

    @include('components.footer')

    <script src="{{ url('js/app.js') }}" defer></script>
</body>
</html>
