{{-- Javascripts --}}

<script src="{{ asset('v2/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/lazyload.js')}}"></script>
@handheld
    <script src="{{ asset('v2/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('v2/slick/slick.min.js') }}"></script>
    <script>
        (function($){

            $(function() {
                $('.slick-carousel').slick({
                    infinite: true,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            });

        }(window.jQuery));
    </script>
@endhandheld
