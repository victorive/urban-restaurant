<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Urban Restaurant - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@yield('content')

@yield('tables')

@stack('scripts')

</body>
</html>
