{{-- Base layout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('home._partials.meta')
    @include('_partials.stylesheets')
    @yield('stylesheets')
</head>

<body>
    @yield('header')
    @yield('main')
    @yield('footer')
    @include('_partials.javascripts')
    @yield('javascripts')
</body>

</html>
