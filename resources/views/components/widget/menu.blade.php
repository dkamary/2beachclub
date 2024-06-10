{{-- widget/menu --}}

<div class="fat-nav">
    <div class="fat-nav__wrapper">

        {{ $slot }}

    </div>
</div>

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/fatNav/jquery.fatNav.css') }}" />

        <style>
            .hamburger__icon,
            .hamburger__icon::before,
            .hamburger__icon::after {
                width: 42px;
                height: 3px;
                background-color: #ffffff;
                box-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
            }

            .hamburger__icon::before {
                top: -10px;
            }

            .hamburger__icon::after {
                top: 10px;
            }

            .hamburger.active .hamburger__icon::after {
                -moz-transform: translateY(-10px) rotate(-45deg);
                -ms-transform: translateY(-10px) rotate(-45deg);
                -webkit-transform: translateY(-10px) rotate(-45deg);
                transform: translateY(-10px) rotate(-45deg);
            }

            .hamburger.active .hamburger__icon::before {
                -moz-transform: translateY(10px) rotate(45deg);
                -ms-transform: translateY(10px) rotate(45deg);
                -webkit-transform: translateY(10px) rotate(45deg);
                transform: translateY(10px) rotate(45deg);
            }

            .hamburger__icon.blue,
            .hamburger__icon.blue::before,
            .hamburger__icon.blue::after {
                background-color: #3f9caa;
            }
        </style>

        <style id="scroll-smooth">
            html {
                scroll-behavior: smooth;
            }
        </style>

    @endpush

    @push('foot')
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="{{ asset('plugins/fatNav/jquery.fatNav.js') }}"></script>
        <script>
            (function() {

                $.fatNav();

            }());
        </script>
        <script>
            window.addEventListener("DOMContentLoaded", function() {

                window.addEventListener('scroll', function() {

                    menuScrollSpy();

                });

                setTimeout(() => {
                    menuScrollSpy();
                }, 2000);

            });

            function menuScrollSpy({
                breakpoint = 0.8,
                class_in = 'white',
                class_out = 'blue'
            } = {}) {
                const menu = document.querySelector('.hamburger__icon');
                if (!menu) {
                    console.warn("Menu not found!");
                    return;
                }

                const scrollThreshold = window.innerHeight * breakpoint;

                if (window.scrollY > scrollThreshold) {
                    if (!menu.classList.contains('blue')) {
                        menu.classList.add('blue');
                        menu.classList.remove('white');
                    }
                } else {
                    if (!menu.classList.contains('white')) {
                        menu.classList.add('white');
                        menu.classList.remove('blue');
                    }
                }
            }
        </script>
    @endpush
@endonce
