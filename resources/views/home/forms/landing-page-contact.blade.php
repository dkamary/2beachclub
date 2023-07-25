{{-- Contact form on landing page --}}

@php
    $id = uniqid();
    $form_submit = route('form_submit');
    $form_id = '4632344205459456';
@endphp

<form action="{{ $form_submit }}" method="POST" class="crm_engagebay_form" id="form-{{ $id }}">
    <div class="form_group">
        <p style="font-size: 22px;">Choose your membership:</p>
        <div class="membership-container">
            <label for="platinum"><input type="radio" class="form-input" name="membership" id='platinum' value="platinum" checked> Platinum</label>&nbsp;
            <label for="gold"><input type="radio" class="form-input" name="membership" id="gold" value="gold"> Gold</label>&nbsp;
            <label for="silver"><input type="radio" class="form-input" name="membership" id="silver" value="silver"> Silver</label>
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
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <input class="form-input" data-type="text" type="text" id="unit_number" name="unit_number" placeholder="Unit Number" required="">
        </div>
    </div>
    <div class="form_group">
        <div class="input-container">
            <select id="residence" name="residence" class="form-input">
                <option value="">Place of residence</option>
            </select>
        </div>
    </div>
    <div class="form_group button_row">
        <div class="input-container">
            <button class="form-input" name="btn-subscribe" type="submit" disabled>SEND</button>
        </div>
    </div>
</form>

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/intlTelInput.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/engagebay-form.css') }}" />
        <style>
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
            .iti__country-name {
                font-size: 14px !important;
            }

            .iti__flag {
                background-image: url({{ asset('img/flags.png') }});
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

                    hidden.value = value;
                    console.groupEnd();
                };

                input.addEventListener("keyup", handleChange);
                input.addEventListener("change", handleChange);
            });
        </script>
    @endpush
@endonce
