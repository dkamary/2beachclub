{{-- Contact form on landing page --}}

@php
    $id = uniqid();
    $form_submit = route('form_submit');
    $form_id = '4632344205459456';
@endphp

<form action="{{ $form_submit }}" method="POST" class="crm_engagebay_form position-sticky" id="form-{{ $id }}">

    @if ($errors->any())
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($membership))
    {{-- Tier page: options hidden, tier preselected --}}
    <div class="form_group">
        <p style="font-size: 20px;">Your membership: <strong>{{ $membershipLabel ?? $membership }}</strong></p>
        <input type="hidden" name="membership" value="{{ $membership }}">
    </div>
    @else
    <div class="form_group">
        <p style="font-size: 20px;">Choose your membership. <a href="#membership-details" class="scroll-smooth d-none">See details</a></p>
        <div class="my-4">
            @handheld
                <div class="mb-3"><label for="platinum-1" class="flex-label"><input type="radio" class="form-input" name="membership" id='platinum-1' value="platinum (option 1)" checked> Platinum (Option 1)</label>&nbsp;</div>
                <div class="mb-3"><label for="platinum-2" class="flex-label"><input type="radio" class="form-input" name="membership" id='platinum-2' value="platinum (option 2)"> Platinum (Option 2)</label>&nbsp;</div>
                <div class="mb-3"><label for="gold" class="flex-label"><input type="radio" class="form-input" name="membership" id="gold" value="gold"> Gold</label>&nbsp;</div>
                <div class="mb-3"><label for="silver" class="flex-label"><input type="radio" class="form-input" name="membership" id="silver" value="silver"> Silver</label></div>
                {{-- Tenants: no longer a tier (included in Platinum memberships) --}}
                {{-- <div class="mb-3"><label for="tenants" class="flex-label"><input type="radio" class="form-input" name="membership" id="tenants" value="2future's holiday tenants"> Tenants</label></div> --}}
            @elsehandheld
                <div class="row mb-3">
                    <div class="col-12 col-sm-6">
                        <label for="platinum-1"><input type="radio" class="form-input" name="membership" id='platinum-1' value="platinum (option 1)" checked> Platinum (Option 1)</label>&nbsp;
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="platinum-2"><input type="radio" class="form-input" name="membership" id='platinum-2' value="platinum (option 2)" > Platinum (Option 2)</label>&nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="gold"><input type="radio" class="form-input" name="membership" id="gold" value="gold"> Gold</label>&nbsp;
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="silver"><input type="radio" class="form-input" name="membership" id="silver" value="silver"> Silver</label>
                    </div>
                    {{-- Tenants: no longer a tier (included in Platinum memberships)
                    <div class="col-12 col-sm-4">
                        <label for="tenants"><input type="radio" class="form-input" name="membership" id="tenants" value="2future's holiday tenants"> Tenants</label>
                    </div> --}}
                </div>
            @endhandheld
        </div>
    </div>
    @endif
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="name" name="name" value="{{ old('name') }}"
                placeholder="First name" required>
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="last_name" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" required>
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="email" type="email" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="phone" type="phone" id="phone" name="phone" placeholder="Phone number" value="{{ old('phone') }}" required>
            <input type="hidden" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <select id="residence" name="residence" class="form-input">
                <option value="">Place of residence</option>
                {{-- <option value="2Beach Club">2Beach Club</option> --}}
                <option value="2Beach Residences"{{ old('residence') === '2Beach Residences' ? ' selected' : '' }}>2Beach Residences</option>
                <option value="AO Residences"{{ old('residence') === 'AO Residences' ? ' selected' : '' }}>AO Residences</option>
                <option value="Cape Bay"{{ old('residence') === 'Cape Bay' ? ' selected' : '' }}>Cape Bay</option>
                <option value="Casa Alegria"{{ old('residence') === 'Casa Alegria' ? ' selected' : '' }}>Casa Alegria</option>
                <option value="Element Bay Beach"{{ old('residence') === 'Element Bay Beach' ? ' selected' : '' }}>Element Bay Beach</option>
                <option value="Element Bay II"{{ old('residence') === 'Element Bay II' ? ' selected' : '' }}>Element Bay II</option>
                {{-- <option value="Grand Baie Business Quarters">Grand Baie Business Quarters</option> --}}
                <option value="Infinity by the Sea"{{ old('residence') === 'Infinity by the Sea' ? ' selected' : '' }}>Infinity by the Sea</option>
                <option value="Ki Residences"{{ old('residence') === 'Ki Residences' ? ' selected' : '' }}>Ki Residences</option>
                <option value="Ki Resort"{{ old('residence') === 'Ki Resort' ? ' selected' : '' }}>Ki Resort</option>
                <option value="La Pirogue Residences"{{ old('residence') === 'La Pirogue Residences' ? ' selected' : '' }}>La Pirogue Residences</option>
                <option value="La Residence"{{ old('residence') === 'La Residence' ? ' selected' : '' }}>La Residence</option>
                <option value="Le Barachois Beachfront Residences"{{ old('residence') === 'Le Barachois Beachfront Residences' ? ' selected' : '' }}>Le Barachois Beachfront Residences</option>
                <option value="Le Domaine de Grand Baie"{{ old('residence') === 'Le Domaine de Grand Baie' ? ' selected' : '' }}>Le Domaine de Grand Baie</option>
                <option value="Les Residences de Mont Choisy"{{ old('residence') === 'Les Residences de Mont Choisy' ? ' selected' : '' }}>Les Residences de Mont Choisy</option>
                <option value="Manta Cove"{{ old('residence') === 'Manta Cove' ? ' selected' : '' }}>Manta Cove</option>
                <option value="Marina Bay"{{ old('residence') === 'Marina Bay' ? ' selected' : '' }}>Marina Bay</option>
                {{-- <option value="Mont Choisy Business Quarter - IQ">Mont Choisy Business Quarter - IQ</option>
                <option value="Mont Choisy Business Quarter - iQ 2"{{ old('residence') === 'Mont Choisy Business Quarter - iQ 2' ? ' selected' : '' }}>Mont Choisy Business Quarter - iQ 2</option> --}}
                <option value="Mont Choisy Le Parc"{{ old('residence') === 'Mont Choisy Le Parc' ? ' selected' : '' }}>Mont Choisy Le Parc</option>
                <option value="Ocean Grand Gaube"{{ old('residence') === 'Ocean Grand Gaube' ? ' selected' : '' }}>Ocean Grand Gaube</option>
                <option value="Ocean Point Beachfront Residences"{{ old('residence') === 'Ocean Point Beachfront Residences' ? ' selected' : '' }}>Ocean Point Beachfront Residences</option>
                <option value="Serenity Villas"{{ old('residence') === 'Serenity Villas' ? ' selected' : '' }}>Serenity Villas</option>
                <option value="Sunset Cove"{{ old('residence') === 'Sunset Cove' ? ' selected' : '' }}>Sunset Cove</option>
                <option value="Gemstone"{{ old('residence') === 'Gemstone' ? ' selected' : '' }}>Gemstone</option>

            </select>
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="unit_number" name="unit_number" placeholder="Unit number" value="{{ old('unit_number') }}">
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

            /* .membership-container {
                display: flex;
                justify-content: flex-start;
                align-items: center;
            } */

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
