{{-- Top/Header --}}

@php
    $class = array_merge(['top-header'], $class ?? ['container']);
    $id = $id ?? 'top-header';
@endphp

<section @class($class) id="{{ $id }}">
    <header>
        {{-- LOGO --}}
    </header>
    <main>
        <nav>
            {{-- MENU --}}
        </nav>
    </main>
</section>
