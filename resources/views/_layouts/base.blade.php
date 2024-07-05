{{-- Base layout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('home._partials.meta')
    @include('_partials.stylesheets')
    @yield('stylesheets')
    @stack('head')
    <x-widget.google-analytics />
    <x-widget.facebook-pixel />
</head>

<body class="@stack('body_class')">
    @yield('header')
    @yield('main')
    @yield('footer')
    @include('_partials.javascripts')
    @yield('javascripts')
    @stack('foot')
</body>

</html>
