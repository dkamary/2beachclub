{{-- Contact form on landing page --}}

@php
    $id = uniqid();
    $form_submit = route('form_submit');
    $form_id = '4632344205459456';
@endphp

<form action="{{ $form_submit }}" method="POST" class="crm_engagebay_form position-sticky" id="form-{{ $id }}">
    <div class="form_group">
        <p style="font-size: 20px;">Choose your membership. <a href="#membership-details" class="scroll-smooth d-none">See details</a></p>
        <div class="membership-container">
            @handheld
                <label for="platinum" class="flex-label"><input type="radio" class="form-input" name="membership" id='platinum' value="platinum" checked> Platinum</label>&nbsp;
                <label for="gold" class="flex-label"><input type="radio" class="form-input" name="membership" id="gold" value="gold"> Gold</label>&nbsp;
                <label for="silver" class="flex-label"><input type="radio" class="form-input" name="membership" id="silver" value="silver"> Silver</label>
            @elsehandheld
                <label for="platinum"><input type="radio" class="form-input" name="membership" id='platinum' value="platinum" checked> Platinum</label>&nbsp;
                <label for="gold"><input type="radio" class="form-input" name="membership" id="gold" value="gold"> Gold</label>&nbsp;
                <label for="silver"><input type="radio" class="form-input" name="membership" id="silver" value="silver"> Silver</label>
            @endhandheld
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="name" name="name"
                placeholder="First name" required="">
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="last_name" name="last_name" placeholder="Last name" required="">
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="email" type="email" id="email" name="email" placeholder="Email address" required="">
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="phone" type="phone" id="phone" name="phone" placeholder="Phone number" required="">
            <input type="hidden" name="phone_number" id="phone_number" value="">
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <select id="residence" name="residence" class="form-input" required>
                <option value="">Place of residence</option>
                {{-- <option value="2Beach Club">2Beach Club</option> --}}
                <option value="2Beach Residences">2Beach Residences</option>
                <option value="AO Residences">AO Residences</option>
                <option value="Cape Bay">Cape Bay</option>
                <option value="Casa Alegria">Casa Alegria</option>
                <option value="Element Bay Beach">Element Bay Beach</option>
                <option value="Element Bay II">Element Bay II</option>
                {{-- <option value="Grand Baie Business Quarters">Grand Baie Business Quarters</option> --}}
                <option value="Infinity by the Sea">Infinity by the Sea</option>
                <option value="Ki Residences">Ki Residences</option>
                <option value="Ki Resort">Ki Resort</option>
                <option value="La Pirogue Residences">La Pirogue Residences</option>
                <option value="La Residence">La Residence</option>
                <option value="Le Barachois Beachfront Residences">Le Barachois Beachfront Residences</option>
                <option value="Le Domaine de Grand Baie">Le Domaine de Grand Baie</option>
                <option value="Les Residences de Mont Choisy">Les Residences de Mont Choisy</option>
                <option value="Manta Cove">Manta Cove</option>
                <option value="Marina Bay">Marina Bay</option>
                {{-- <option value="Mont Choisy Business Quarter - IQ">Mont Choisy Business Quarter - IQ</option>
                <option value="Mont Choisy Business Quarter - iQ 2">Mont Choisy Business Quarter - iQ 2</option> --}}
                <option value="Mont Choisy Le Parc">Mont Choisy Le Parc</option>
                <option value="Ocean Grand Gaube">Ocean Grand Gaube</option>
                <option value="Ocean Point Beachfront Residences">Ocean Point Beachfront Residences</option>
                <option value="Serenity Villas">Serenity Villas</option>
                <option value="Sunset Cove">Sunset Cove</option>

            </select>
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="unit_number" name="unit_number" placeholder="Unit number" required="">
        </div>
    </div>
    <div class="form_group button_row">
        <div class="input-container">
            <button class="form-input" name="btn-subscribe" type="submit">SEND</button>
        </div>
    </div>
    @csrf
</form>

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/intlTelInput.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/engagebay-form.css') }}" />
        <style>
            .crm_engagebay_form {
                background-color: #ffffff;
                margin-top: 0px !important;
            }

            .input-container button.form-input {
                padding: 16px 25px;
                background-color: rgb(0, 54, 95);
                color: #ffffff;
                border-radius: 0px;
                font-weight: 500;
                font-size: 16px;
                text-transform: uppercase;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: 0.8s;
                cursor: pointer;
            }

            .input-container button.form-input:hover {
                background-color: rgb(0, 41, 72);
            }

            .membership-container {
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .membership-container label {
                display: inline-block;
                width: 33.33%;
                font-size: 20px;
            }

            .iti.iti--allow-dropdown {
                width: 100%;
            }

            .iti__selected-dial-code,
            .iti__country-name,
            .iti__dial-code {
                font-size: 14px !important;
            }

            .iti__flag {
                background-image: url({{ asset('img/flags.png') }});
            }

            .membership-container label.flex-label {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .form_group a,
            .form_group a:link,
            .form_group a:visited {
                color: #003F57;
                transition: 0.8s;
            }

            .form_group a:hover {
                color: #002d3e;
            }
        </style>
    @endpush

    @push('foot')
        <script src="{{ asset('js/intlTelInput.min.js') }}"></script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                if (typeof window.intlTelInput != "function") {
                    console.warn("Tel plugin is not initialized!!!");

                    return;
                }

                const input = document.querySelector('#phone');
                const tel = window.intlTelInput(input, {
                    initialCountry: "auto",
                    geoIpLookup: (success, fail) => {
                        fetch("https://ipapi.co/json/")
                            .then(response => { return response.json(); })
                            .then(data => { success(data && data.country ? data.country : 'mu'); });
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.min.js",
                    nationalMode: true,
                    separateDialCode: true
                });

                const allowChar = (charCode) => {
                    if (charCode == 43) return true;
                    return (charCode > 31 && (charCode < 48 || charCode > 57)) ? false : true;
                };

                const sanitizeTel = (telValue) => {
                    let value = '';
                    for (i = 0; i < telValue.length; i++) {
                        const charCode = telValue.charCodeAt(i);
                        if (!allowChar(charCode)) continue;
                        value += telValue.charAt(i);
                    }

                    return value;
                };

                const handleChange = e => {
                    console.group("handleChange");
                    let value = e.target.value;
                    const lastChar = value.slice(-1);
                    if (!allowChar(lastChar.charCodeAt(0))) {
                        e.preventDefault();

                        return;
                    }

                    value = (typeof tel.getNumber == "function") ? tel.getNumber() : input.value;
                    console.debug({
                        input_value: input.value,
                        getNumber: (typeof tel.getNumber == "function") ? tel.getNumber() : undefined,
                        value
                    });
                    value = sanitizeTel(value);
                    console.debug({
                        value
                    });

                    const hidden = document.querySelector("#phone_number");
                    if (hidden) {
                        hidden.value = value;
                    }
                    console.groupEnd();
                };

                input.addEventListener("keyup", handleChange);
                input.addEventListener("change", handleChange);
            });
        </script>
        <script>
            window.addEventListener("DOMContentLoaded", () => {
                const scrollSmooth = document.querySelectorAll(".scroll-smooth");
                if (scrollSmooth && scrollSmooth.length > 0) {
                    scrollSmooth.forEach(element => {
                        element.addEventListener("click", e => {
                            e.preventDefault();
                            const target = document.querySelector(element.getAttribute("href"));
                            if (target) target.scrollIntoView({ behavior: 'smooth' });
                        });
                    });
                }
            });
        </script>
    @endpush
@endonce
