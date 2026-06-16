{{-- Book reservation --}}

<div class="btn-container contact-button book-table my-4">
    {{-- <a href="{{ route($link ?? 'booking_tracking') }}" class="text-uppercase">
        Book a table
    </a> --}}
    <a href="https://eatapp.co/reserve/2beachclub?source=iframe" onclick="eatapp_ShowWidget.apply(this, arguments)" target="_blank">
        BOOK TABLE
    </a>
</div>

@once

    {{-- <div style="max-width: 480px; margin: 0 auto;" id="iframe-widget">
        <iframe
        title="Widget config"
        frameborder="0"
        src="https://eatapp.co/reserve/2beachclub?source=iframe"
        style="width: 100%; height: 80dvh; border: none; display: block;"
        ></iframe>
    </div> --}}

    @push('head')

    <style id="book-table-styles">

        .btn-container.contact-button.book-table a {
            border-radius: 1.5rem;
            border: none;
            box-shadow: none;
            padding-top: 4px;
            padding-bottom: 4px;
            padding-left: 0.6rem;
            padding-right: 0.6rem;
        }

    </style>

    @endpush

    @push('footer')
        <script type="text/javascript" src="https://d183cnjuwjcs99.cloudfront.net/assets/widget/widget-iframe.min.js" async></script>
    @endpush

@endonce
