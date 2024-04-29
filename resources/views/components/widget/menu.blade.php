{{-- widget/menu --}}

<div class="fat-nav">
    <div class="fat-nav__wrapper">
        {{ $slot }}
        {{-- <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
        </ul> --}}
    </div>
</div>

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/fatNav/jquery.fatNav.css') }}" />
    @endpush

    @push('foot')
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="{{ asset('plugins/fatNav/jquery.fatNav.js') }}"></script>
        <script>
            (function() {

                $.fatNav();

            }());
        </script>
    @endpush
@endonce
