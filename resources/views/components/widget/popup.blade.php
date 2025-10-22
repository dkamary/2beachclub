{{-- Popup --}}

@php
    $id = uniqid();
@endphp

@props([
    'title' => null,
    'close' => true,
    'id' => 'popup-' . $id,
    'classes' => '',
    'footer' => null,
    'delay' => 5000,
    'name' => 'popup-' . $id,
])

<div class="custom-popup" data-delay="{{ $delay }}" data-name="{{ $name }}">
    <section id="{{ $id }}" class="custom-popup__container {{ $classes }}">
        @if ($close)
            <button type="button" data-target="#" class="custom-popup__close">
                <span class="icon">&times;</span>
            </button>
        @endif

        @isset($title)
            <header class="custom-popup__header">
                <h4 class="title">{!! $title !!}</h4>
            </header>
        @endisset

        <main class="custom-popup__main">{{ $slot }}</main>

        @isset($footer)
            <footer class="custom-popup__footer">{!! $footer !!}</footer>
        @endisset
    </section>
</div>

@once
    @push('foot')
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const popups = document.querySelectorAll('.custom-popup');
                if (!popups && popups.length == 0) {
                    console.warn('No popups found!');
                    return;
                }

                const showPopup = ({name}) => {
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    const halloweenEnd = new Date('2025-11-01');
                    halloweenEnd.setHours(0, 0, 0, 0);

                    if (today > halloweenEnd) return false;

                    const now = '{{ date("Y-m-d") }}';
                    const lastseen = localStorage.getItem(name + '-last-seen') || '2025-11-01';

                    console.debug({now, lastseen, cmp: now === lastseen});

                    if (now === lastseen) return false;

                    return true;
                };

                const closePopup = ({name}) => {
                    localStorage.setItem(name, 'closed');
                    localStorage.setItem(name + '-last-seen', '{{ date("Y-m-d") }}');
                };

                popups.forEach(popup => {
                    const delay = parseInt(popup.dataset.delay || popup.getAttribute('data-delay') || '0');
                    const name = popup.dataset.name || popup.getAttribute('data-name');

                    console.debug({delay, name});

                    if (!showPopup({name})) {
                        console.warn(`No ${name} popup!`);
                        return;
                    }

                    if (delay > 0) {
                        setTimeout(() => {
                            popup.classList.add('show');
                        }, delay);
                    } else {
                        popup.classList.add('show');
                    }

                    popup.addEventListener('click', (event) => {
                        if (event.target.classList.contains('custom-popup')) {
                            popup.classList.remove('show');
                            closePopup({name});
                        }
                    });

                    const closeButton = popup.querySelector('.custom-popup__close');
                    if (closeButton) {
                        closeButton.addEventListener('click', () => {
                            popup.classList.remove('show');
                            closePopup({name});
                        });
                    }
                });
            });
        </script>
    @endpush

    @push('head')
        <style>
            /* Animations */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes popIn {
                0% {
                    transform: translate(-50%, -50%) scale(0.5);
                    opacity: 0;
                }

                100% {
                    transform: translate(-50%, -50%) scale(1);
                    opacity: 1;
                }
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .custom-popup {
                position: fixed;
                top: 0%;
                left: 0%;
                right: 0%;

                width: 100%;
                height: 0%;
                overflow: hidden;
                background: rgba(0, 0, 0, 0.7);
                backdrop-filter: blur(5px);
                z-index: 9997;
                opacity: 0;
                display: none;
                transition: opacity 1s ease-in, height .3s ease-in, bottom .3s ease-in;
                pointer-events: none;
            }

            .custom-popup.show {
                display: block;
                opacity: 1;
                bottom: 0%;
                height: 100%;
                overflow: visible;
                pointer-events: auto;
            }

            .custom-popup__container {
                position: absolute;
                top: -100%;
                left: 50%;
                width: 80%;
                height: auto;
                transform: translate(-50%, -50%);
                background-color: transparent;
                border-radius: 6px;
                padding: 0;
                display: none;
                opacity: 1;
                transition: all 1.2s ease-in;
                z-index: 9998;
            }

            .custom-popup.show .custom-popup__container {
                position: absolute;
                top: 50%;
                display: block;
            }

            .custom-popup__header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                padding: 0;
                border-bottom: 1px solid #ccc;
            }

            .custom-popup__header .title {
                font-size: 1.2rem;
                font-weight: 600;
                text-align: left;
                line-height: 125%;
                color: #323232;
            }

            .custom-popup__main,
            .custom-popup__footer {
                display: block;
                width: 100%;
                padding: 0;
            }

            .custom-popup__main {
                min-height: 10vh;
            }

            .custom-popup__close {
                position: absolute;
                top: -16px;
                right: -16px;
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background: #af1212;
                z-index: 9999;
                cursor: pointer;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
                border: none;
            }

            .custom-popup__close .icon {
                font-size: 2rem;
                font-weight: 600;
                color: #fff;
                display: block;
                padding-bottom: 8px;
            }
        </style>
    @endpush
@endonce
