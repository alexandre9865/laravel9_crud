<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js')}}"></script>

    </head>
    <body>
        <header>
            @include('menu.header')
        </header>
        <section class="container mt-2">
            @yield('content')
        </section>
    
    </body>
    @yield('custom_js')
</html>