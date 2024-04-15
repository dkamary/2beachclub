{{-- Team --}}

<div class="team-container d-flex justify-content-center align-items-center flex-column">

    <div class="image-container w-75 d-flex justify-content-center align-items-center mx-auto">
        <img class="img-fluid lazy-load-image rounded-circle" data-src="{{ $image ?? 'https://fakeimg.pl/256x256/' }}" src="{{ $placeholder ?? 'https://fakeimg.pl/32x32/' }}" alt="">
    </div>

    <div class="text-container">
        {{ $slot }}
    </div>

</div>
