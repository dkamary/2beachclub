{{-- Meta data --}}

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url" content="{{ Config::get('meta.page.index.url') }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ Config::get('meta.page.index.title') }}" />
<meta property="og:description" content="{{ Config::get('meta.page.index.description') }}" />
<meta property="og:image" content="{{ Config::get('meta.page.index.preview') }}" />
<meta property="og:locale" content="{{ Config::get('meta.language') }}" />
<title>{{ Config::get('meta.page.index.title') }}</title>
<link rel="shortcut icon" href="{{ asset('ico/favicon.ico') }}" type="image/x-icon" />
