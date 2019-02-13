<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
<<<<<<< HEAD
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custome.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>

    <!-- fontawesome css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
=======
    <script src="{{ asset('js/app.js') }}" ></script>
>>>>>>> 1cf931eaf44dd3b6d26871206ff32ceae909f599

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">
<<<<<<< HEAD
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    @yield('CSS')

=======
    @yield('css')
>>>>>>> 1cf931eaf44dd3b6d26871206ff32ceae909f599
</head>
<body class="bg-secondary">
    @include('etc.header')
    <div id="app" class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<<<<<<< HEAD
    @yield('js')
    @show
=======
    @include('etc.footer')
>>>>>>> 1cf931eaf44dd3b6d26871206ff32ceae909f599
</body>
</html>
