{{-- Meta data --}}

@php
    $meta = $meta ?? get_meta();
@endphp

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url" content="{{ Request::fullUrl() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $meta['title'] ?? 'N/A' }}" />
<meta property="og:description" content="{{ $meta['description'] ?? 'N/A' }}" />
<meta property="og:image" content="{{ $meta['preview'] ?? '' }}" />
<meta property="og:locale" content="{{ $meta['language'] ?? 'en' }}" />
<title>{{ $meta['title'] ?? 'N/A' }}</title>
<link rel="shortcut icon" href="{{ asset('ico/favicon.ico') }}" type="image/x-icon" />
