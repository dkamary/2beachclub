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
            padding-top: 4px;
            padding-bottom: 4px;
            padding-left: 0.6rem;
            padding-right: 0.6rem;
        }

    </style>

    @endpush

@endonce
