{{-- The team --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class)>

    <div class="row">
        <div class="col-12">
            <h2 class="special-heading fw-bold text-center pb-3" style="font-size: 60px">The team</h2>
        </div>
    </div>

    <div class="row my-5">

        <div class="col-12 col-sm-6 col-md-4">
            <x-widget.team>

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading text-center my-3">Team member</h3>
                        <h4 class="special-heading text-center my-3">Job title</h4>
                        <p class="text-muted text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>

            </x-widget.team>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <x-widget.team>

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading text-center my-3">Team member</h3>
                        <h4 class="special-heading text-center my-3">Job title</h4>
                        <p class="text-muted text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>

            </x-widget.team>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <x-widget.team>

                <div class="row">
                    <div class="col-12">
                        <h3 class="special-heading text-center my-3">Team member</h3>
                        <h4 class="special-heading text-center my-3">Job title</h4>
                        <p class="text-muted text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                </div>

            </x-widget.team>
        </div>

    </div>

</div>
