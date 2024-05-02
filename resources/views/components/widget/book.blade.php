{{-- Book reservation --}}

<div class="btn-container contact-button book-table my-4">
    <a href="{{ route($link ?? 'booking_tracking') }}" class="text-uppercase">
        Book a table
    </a>
</div>

@once

    @push('head')

    <style id="book-table-styles">

        .btn-container.contact-button.book-table a {
            border-radius: 1.5rem;
            border: none;
            box-shadow: none;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 24px;
            padding-right: 24px;
        }

    </style>

    @endpush

@endonce
