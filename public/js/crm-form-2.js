/**
 * CRM FORM v2
 */

const debug_console = true;
const COOKIE_NAME = "r";
const PARAMETER_NAME = "r";
const AGENT_MAX_AGE = 60;
const PARTNER_MAX_AGE = 360;

const REFERRER_CODE = "referrer_code";
const REFERRER_EMAIL = "referrer_email";
const REFERRER_NAME = "referrer_name";
const REFERRER_TYPE = "referrer_type";
const REFERRER_TYPE_AGENT = "Agent";
const REFERRER_TYPE_PARTNER = "Partner";

const LEAD_SOURCE = "Lead_Source";
const REFERRAL_URL = "referral_url";
const SOURCE_WEBPAGE = "Source_Webpage";
const SOURCE_DETAILS = "Source_Details";
const INTEREST = "interest";
const REGION = "region";
const ONLINE_ADS = "Online Ads";

const SOURCE_DETAILS_ENGLISH = "2Futures Website";
const SOURCE_DETAILS_FRENCH = "2Futures French Website";
const SOURCE_DETAILS_DEFAULT = SOURCE_DETAILS_ENGLISH;
const LEAD_SOURCE_DEFAULT = "Contact Form";

const FACEBOOK_PPC_KEY = "facebook_ppc";
const FACEBOOK_PPC_VALUE = "Facebook PPC";
const GOOGLE_PPC_VALUE = "Google PPC";
const GOOGLE_PPC_KEY = "google_ppc";
const LINKEDIN_PPC_KEY = "linkedin_ppc";
const LINKEDIN_PPC_VALUE = "LinkedIn PPC";
const TWO_FUTURES_WEBSITE = "2Futures Website";
const TWO_FUTURES_WEBSITE_FR = "2Futures French Website";

const LEAD_CAMPAIGN = "Lead_Campaign";
const CAMPAIGN_DETAILS = "Campaign_Details";

const DOMAIN_NAME = "agents.2futures.com";
const CHECK_REFERRER_URI = `https://${DOMAIN_NAME}/api/referrer/search`;
const FORM_SUBMIT = `https://${DOMAIN_NAME}/api/form/submit/`;
const FORM_SELECTOR = ".crm-engagebay-form";
const FORM_CLASS = "crm_engagebay_form";

const TRUE = "true";
const FALSE = "false";
const IN_PROGRESS = "in progress";
const FAILED = "fail";

var formCount = 0;
var counter = 0;
var eventSent = false;

window.addEventListener("DOMContentLoaded", event => {
    console.group("CRM Form v2");
    console.debug("crm-form-2.js loaded!");

    document.addEventListener("before_form_load", e => {
        //
    });

    document.addEventListener("after_form_load", e => {
        loadReferrers();
    });

    loadForms();

    console.groupEnd();
});

function loadForms() {
    console.group("loadForms");

    const formContainers = document.querySelectorAll(FORM_SELECTOR);
    if (!formContainers || formContainers.length == 0) {

        console.warn("There is no form to load in this page!");
        return;
    }

    formCount = formContainers.length;

    document.dispatchEvent(new CustomEvent("before_form_load", {
        bubbles: true,
        cancelable: true
    }));

    formContainers.forEach(container => {
        buildFormInContainer({ container });
    });

    console.groupEnd();
}

function buildFormInContainer({ container }) {
    console.group("buildFormInContainer");
    if (container.dataset.loaded == "true" || (container.dataset.loaded == "false" && container.dataset.status == "in progress")) {
        console.debug(`Form "${container.dataset.id}" loaded or loading in progress`);
        return;
    }

    console.debug(`Building the form "#${container.dataset.id}"`);
    loadForm({ container });

    console.groupEnd();
}

function loadForm({ container }) {
    console.group("loadForm");

    const id = container.dataset.id;
    const redirect = parseRedirectUrl(container.dataset.redirect);
    const submit = container.dataset.submit;
    const uri = `${submit}?action=form&id=${id}`;
    const request = new XMLHttpRequest();

    request.addEventListener("load", e => {
        console.debug("request done! Parsing data");
        console.debug({ response: request.response });

        const response = JSON.parse(request.response);
        console.debug(response);
        const form = buildForm({
            attributes: response.form,
            id
        });

        console.debug(`Removing all container child  in #${id}`);
        while (container.firstChild) {
            container.removeChild(container.firstChild);
        }

        console.debug(`Adding the form to container #${id}`);
        container.appendChild(form);

        counter++;
        console.debug(`Form n°${counter} managed!`);
        console.debug({ eventSent });

        if (formCount == counter && eventSent == false) {
            eventSent = true;

            document.dispatchEvent(new CustomEvent("after_form_load", {
                bubbles: true,
                cancelable: true,
                detail: {
                    formCount,
                    counter,
                    eventSent
                }
            }));
        } else {
            console.debug("No `after_form_load` sent!");
        }

    });

    request.addEventListener("error", e => {
        console.error({
            event: e,
            response: request.response,
            request
        });
    });

    request.open("GET", uri, true);
    request.send();
    console.debug(`Requesting form load for #${id}!`);

    console.groupEnd();
}

function buildForm({ attributes, id }) {
    console.group("buildForm");
    console.debug(`Building form #${id}`);

    const form = document.createElement("form");
    form.classList.add(FORM_CLASS);
    form.action = FORM_SUBMIT + id;
    form.method = "POST";

    buildFields({ form, attributes });
    buildButton({ form, attributes });
    submitForm({ form, attributes });

    console.debug(`Form #${id} loaded!`);
    console.groupEnd();

    return form;
}

function buildFields({ form, attributes }) {
    if (attributes.form_fields.length == 0) {
        console.warn("This form has no fields!!!");

        return;
    }

    attributes.form_fields.forEach(field => {
        const row = buildRow({ field });
        form.append(row);
    });
}

function buildButton({ form, attributes }) {
    const row = document.createElement("div");
    row.classList.add("form_group", "button_row");
    const inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    const button = document.createElement("button");
    button.classList.add("form-input");
    button.name = "btn-subscribe";
    button.type = "submit";
    button.innerHTML = stripTags(attributes.submit_button_text);
    inputContainer.append(button);
    row.append(inputContainer);

    form.append(row);
}

function submitForm({ form, attributes }) {
    form.addEventListener("submit", e => {
        e.preventDefault();

        const xhr = new XMLHttpRequest();
        const formData = new FormData(form);
        console.debug(formData);
        console.debug({
            lead_source: formData.get('Lead_Source'),
            source_details: formData.get('Source_Details'),
        });
        // return;

        xhr.addEventListener("load", event => {
            const response = JSON.parse(xhr.response);
            submitFormSuccess({ form, attributes, response });
        });

        xhr.addEventListener("loadstart", event => {
            submitFormLoadStart({ form, attributes, request: xhr });
        });

        xhr.addEventListener("loadend", event => {
            submitFormLoadEnd({ form, attributes, request: xhr });
        });

        xhr.addEventListener("error", event => {
            submitFormFail({ form, attributes, request: xhr });
        });

        xhr.open(form.method, form.action);
        xhr.send(formData);
    });
}

function submitFormSuccess({ form, attributes, response }) {
    console.group("Submit Form Success !");
    console.debug({ response });
    const container = form.parentNode;
    const redirectUrl = parseRedirectUrl(container.dataset.redirect);
    console.debug({ redirectUrl });

    window.location.href = (redirectUrl.length > attributes.redirect_url.length) ? redirectUrl : attributes.redirect_url;
    console.groupEnd();
    return;
};

function submitFormFail({ form, attributes, request }) {
    console.group("Submit Form Failed !");
    console.debug({
        response,
        request,
        status: request.status,
        statusText: request.statusText,
    });/**
 * CRM FORM v2
 */

const debug_console = true;
const COOKIE_NAME = "r";
const PARAMETER_NAME = "r";
const AGENT_MAX_AGE = 60;
const PARTNER_MAX_AGE = 360;

const REFERRER_CODE = "referrer_code";
const REFERRER_EMAIL = "referrer_email";
const REFERRER_NAME = "referrer_name";
const REFERRER_TYPE = "referrer_type";
const REFERRER_TYPE_AGENT = "Agent";
const REFERRER_TYPE_PARTNER = "Partner";

const LEAD_SOURCE = "Lead_Source";
const REFERRAL_URL = "referral_url";
const SOURCE_WEBPAGE = "Source_Webpage";
const SOURCE_DETAILS = "Source_Details";
const INTEREST = "interest";
const REGION = "region";
const ONLINE_ADS = "Online Ads";

const SOURCE_DETAILS_ENGLISH = "2Futures Website";
const SOURCE_DETAILS_FRENCH = "2Futures French Website";
const SOURCE_DETAILS_DEFAULT = SOURCE_DETAILS_ENGLISH;
const LEAD_SOURCE_DEFAULT = "Contact Form";

const FACEBOOK_PPC_KEY = "facebook_ppc";
const FACEBOOK_PPC_VALUE = "Facebook PPC";
const GOOGLE_PPC_VALUE = "Google PPC";
const GOOGLE_PPC_KEY = "google_ppc";
const LINKEDIN_PPC_KEY = "linkedin_ppc";
const LINKEDIN_PPC_VALUE = "LinkedIn PPC";
const TWO_FUTURES_WEBSITE = "2Futures Website";
const TWO_FUTURES_WEBSITE_FR = "2Futures French Website";

const LEAD_CAMPAIGN = "Lead_Campaign";
const CAMPAIGN_DETAILS = "Campaign_Details";

const DOMAIN_NAME = "agents.2futures.com";
const CHECK_REFERRER_URI = `https://${DOMAIN_NAME}/api/referrer/search`;
const FORM_SUBMIT = `https://${DOMAIN_NAME}/api/form/submit/`;
const FORM_SELECTOR = ".crm-engagebay-form";
const FORM_CLASS = "crm_engagebay_form";

const TRUE = "true";
const FALSE = "false";
const IN_PROGRESS = "in progress";
const FAILED = "fail";

var formCount = 0;
var counter = 0;
var eventSent = false;

window.addEventListener("DOMContentLoaded", event => {
    console.group("CRM Form v2");
    console.debug("crm-form-2.js loaded!");

    document.addEventListener("before_form_load", e => {
        //
    });

    document.addEventListener("after_form_load", e => {
        loadReferrers();
    });

    loadForms();

    console.groupEnd();
});

function loadForms() {
    console.group("loadForms");

    const formContainers = document.querySelectorAll(FORM_SELECTOR);
    if (!formContainers || formContainers.length == 0) {

        console.warn("There is no form to load in this page!");
        return;
    }

    formCount = formContainers.length;

    document.dispatchEvent(new CustomEvent("before_form_load", {
        bubbles: true,
        cancelable: true
    }));

    formContainers.forEach(container => {
        buildFormInContainer({ container });
    });

    console.groupEnd();
}

function buildFormInContainer({ container }) {
    console.group("buildFormInContainer");
    if (container.dataset.loaded == "true" || (container.dataset.loaded == "false" && container.dataset.status == "in progress")) {
        console.debug(`Form "${container.dataset.id}" loaded or loading in progress`);
        return;
    }

    console.debug(`Building the form "#${container.dataset.id}"`);
    loadForm({ container });

    console.groupEnd();
}

function loadForm({ container }) {
    console.group("loadForm");

    const id = container.dataset.id;
    const redirect = parseRedirectUrl(container.dataset.redirect);
    const submit = container.dataset.submit;
    const uri = `${submit}?action=form&id=${id}`;
    const request = new XMLHttpRequest();

    request.addEventListener("load", e => {
        console.debug("request done! Parsing data");
        console.debug({ response: request.response });

        const response = JSON.parse(request.response);
        console.debug(response);
        const form = buildForm({
            attributes: response.form,
            id
        });

        console.debug(`Removing all container child  in #${id}`);
        while (container.firstChild) {
            container.removeChild(container.firstChild);
        }

        console.debug(`Adding the form to container #${id}`);
        container.appendChild(form);

        counter++;
        console.debug(`Form n°${counter} managed!`);
        console.debug({ eventSent });

        if (formCount == counter && eventSent == false) {
            eventSent = true;

            document.dispatchEvent(new CustomEvent("after_form_load", {
                bubbles: true,
                cancelable: true,
                detail: {
                    formCount,
                    counter,
                    eventSent
                }
            }));
        } else {
            console.debug("No `after_form_load` sent!");
        }

    });

    request.addEventListener("error", e => {
        console.error({
            event: e,
            response: request.response,
            request
        });
    });

    request.open("GET", uri, true);
    request.send();
    console.debug(`Requesting form load for #${id}!`);

    console.groupEnd();
}

function buildForm({ attributes, id }) {
    console.group("buildForm");
    console.debug(`Building form #${id}`);

    const form = document.createElement("form");
    form.classList.add(FORM_CLASS);
    form.action = FORM_SUBMIT + id;
    form.method = "POST";

    buildFields({ form, attributes });
    buildButton({ form, attributes });
    submitForm({ form, attributes });

    console.debug(`Form #${id} loaded!`);
    console.groupEnd();

    return form;
}

function buildFields({ form, attributes }) {
    if (attributes.form_fields.length == 0) {
        console.warn("This form has no fields!!!");

        return;
    }

    attributes.form_fields.forEach(field => {
        const row = buildRow({ field });
        form.append(row);
    });
}

function buildButton({ form, attributes }) {
    const row = document.createElement("div");
    row.classList.add("form_group", "button_row");
    const inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    const button = document.createElement("button");
    button.classList.add("form-input");
    button.name = "btn-subscribe";
    button.type = "submit";
    button.innerHTML = stripTags(attributes.submit_button_text);
    inputContainer.append(button);
    row.append(inputContainer);

    form.append(row);
}

function submitForm({ form, attributes }) {
    form.addEventListener("submit", e => {
        e.preventDefault();

        const xhr = new XMLHttpRequest();
        const formData = new FormData(form);
        console.debug(formData);
        console.debug({
            lead_source: formData.get('Lead_Source'),
            source_details: formData.get('Source_Details'),
        });
        // return;

        xhr.addEventListener("load", event => {
            const response = JSON.parse(xhr.response);
            submitFormSuccess({ form, attributes, response });
        });

        xhr.addEventListener("loadstart", event => {
            submitFormLoadStart({ form, attributes, request: xhr });
        });

        xhr.addEventListener("loadend", event => {
            submitFormLoadEnd({ form, attributes, request: xhr });
        });

        xhr.addEventListener("error", event => {
            submitFormFail({ form, attributes, request: xhr });
        });

        xhr.open(form.method, form.action);
        xhr.send(formData);
    });
}

function submitFormSuccess({ form, attributes, response }) {
    console.group("Submit Form Success !");
    console.debug({ response });
    const container = form.parentNode;
    const redirectUrl = parseRedirectUrl(container.dataset.redirect);
    console.debug({ redirectUrl });
    
    sendEvents2GoogleAnalytics({ form });
    setTimeout(() => {
        window.location.href = (redirectUrl.length > attributes.redirect_url.length) ? redirectUrl : attributes.redirect_url;
    }, 500);
    console.groupEnd();
    return;
};

function sendEvents2GoogleAnalytics({ form }) {
    if(gtag == undefined) {
        console.warn("GTAG is undefined!!!");
        return;
    }

    gtag('event', 'form_submit', {
        event_category: 'Contact Form',
        event_action: 'Submit',
        event_label: 'Visitor submits information',
    });
}

function submitFormFail({ form, attributes, request }) {
    console.group("Submit Form Failed !");
    console.debug({
        response,
        request,
        status: request.status,
        statusText: request.statusText,
    });
    const container = form.parentNode;
    const redirectUrl = parseRedirectUrl(container.dataset.redirect);
    console.debug({ redirectUrl });

    window.location.href = (redirectUrl.length > attributes.redirect_url.length) ? redirectUrl : attributes.redirect_url;
    return;
};

function submitFormLoadStart({ form, attributes, request }) {
    const button = form.querySelector("button.form-input");
    form.dataset.inProgress = true;
    if (!button) {
        console.debug("Button not found!");
        return false;
    }
    if (button.querySelector(".loader-container")) {
        console.debug("Loader already placed!");
        return false;
    }
    console.debug("Adding loader to button");
    const container = document.createElement("div");
    const bar1 = document.createElement("span");
    const bar2 = document.createElement("span");
    const bar3 = document.createElement("span");
    container.classList.add("loader-container");
    container.appendChild(bar1);
    container.appendChild(bar2);
    container.appendChild(bar3);
    button.appendChild(container);
};

function submitFormLoadEnd({ form, attributes, request }) {
    const button = form.querySelector("button.form-input");
    if (!button) return false;
    const loader = button.querySelector(".loader-container");
    if (!loader) return false;
    button.removeChild(loader);
    form.removeAttribute("data-in-progress");
};

function buildRow({ field }) {
    const row = document.createElement("div");
    row.classList.add("form_group");
    const input = buildInput({ attributes: field });
    if (input.type == "hidden") {
        row.style.display = "none";
    }
    row.append(input);

    return row;
}

function buildInput({ attributes }) {
    const inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    if (attributes.type == "select") {
        inputContainer.append(buildSelect({ attributes }));

        return inputContainer;
    }

    if (attributes.type == "textarea") {
        inputContainer.append(buildTextarea({ attributes }));

        return inputContainer;
    }

    if (attributes.type == "hiddentype") {

        return buildHidden({ attributes });
    }

    if (attributes.type == "phone") {
        const otherAttributes = { name: attributes.name, id: attributes.name, value: "" };
        const hidden = buildHidden({ attributes: otherAttributes });
        inputContainer.append(hidden);
        const input = buildPhone({ attributes });
        inputContainer.append(input);

        initializePhone({ attributes, input, hidden });

        return inputContainer;
    }

    inputContainer.append(buildNormalInput({ attributes }));

    return inputContainer;
}

function buildNormalInput({ attributes }) {
    const input = document.createElement("input");
    input.classList.add("form-input");
    input.dataset.type = attributes.type;
    input.type = attributes.hasOwnProperty("type") ? parseInputType(attributes.type) : "text";
    input.id = attributes.hasOwnProperty("name") ? attributes.name : "";
    input.name = input.id;
    input.placeholder = attributes.hasOwnProperty("placeholder") ? attributes.placeholder : "";
    input.required = attributes.hasOwnProperty("required") ? attributes.required == "true" : false;
    if(input.required) {
        console.debug(`#${input.id} is "required"`);
    }

    return input;
}

function buildSelect({ attributes }) {
    const select = document.createElement("select");
    select.classList.add("form-input");
    select.name = attributes.name;
    select.id = select.name;
    select.required = attributes.hasOwnProperty("required") ? attributes.required == "true" : false;
    if(select.required) {
        console.debug(`#${select.id} is "required"`);
    } else if(select.name == "Preferred_Language" || select.name == "country" || select.name == "Budget") {
        select.required = true;
    }
    select.placeholder = attributes.placeholder;
    const placeholder = document.createElement("option");
    placeholder.value = "";
    placeholder.innerHTML = attributes.placeholder;
    select.append(placeholder);

    if (!attributes.hasOwnProperty("options_array")) return select;

    if(attributes.name == "country") {
        select.dataset.countryList = false;
        const addCountryList = () => {
            const countries = attributes.options_array;
            countries.forEach(o => {
                const option = document.createElement("option");
                option.value = o;
                option.innerHTML = o;
                select.append(option);
            });
        };
        setTimeout(() => {
            addCountryList();
        }, 5000);
    } else {
        attributes.options_array.forEach(o => {
            const option = document.createElement("option");
            option.value = o;
            option.innerHTML = o;
            select.append(option);
        });
    }

    return select;
}

function buildTextarea({ attributes }) {
    const textarea = document.createElement("textarea");
    textarea.placeholder = attributes.placeholder;
    textarea.name = attributes.name;
    textarea.id = attributes.name;
    textarea.classList.add("form-input");

    return textarea;
}

function buildHidden({ attributes }) {
    console.debug({ attributes });
    const hidden = document.createElement("input");
    hidden.type = "hidden";
    hidden.name = attributes.name;
    hidden.id = attributes.id ? attributes.id : attributes.name;
    hidden.value = attributes.value;

    return hidden;
}

function buildPhone({ attributes }) {
    const input = document.createElement("input");
    input.type = "tel";
    input.id = "phone_" + Math.floor(Math.random() * 100);
    input.name = input.id;
    input.placeholder = attributes.placeholder;
    input.classList.add('form-input');
    input.maxLength = 15;
    input.required = true;

    return input;
}

function initializePhone({ attributes, input, hidden }) {
    if (typeof window.intlTelInput != "function") {
        console.warn("Tel plugin is not initialized!!!");

        return;
    }

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

    return tel;
}

function parseInputType(type) {
    if (type == "phone") return "tel";

    return ["text", "tel", "date", "email"].includes(type) ? type : "text";
}

function stripTags(text) {
    return text.replace(/(<([^>]+)>)/gi, "");
}

function loadReferrers() {
    console.group("loadReferrers");

    if (uriHasParameter(PARAMETER_NAME)) {
        const code = uriParameterValue(PARAMETER_NAME);
        console.debug(`Parameter "${PARAMETER_NAME}" found! Loading / Overriding Parameters info!`);
        checkReferrer({ code })
            .then(() => {
                updateForms();
            })
    } else {
        console.debug(`Parameter "${PARAMETER_NAME}" not found! No referrer overriding!`);
        updateForms();
    }

    console.groupEnd();
}

function checkReferrer({ code }) {
    console.group("checkReferrer");
    const promise = new Promise((resolve, reject) => {
        const uri = CHECK_REFERRER_URI;
        const data = new FormData();
        data.append("code", code);
        const request = new XMLHttpRequest();

        request.addEventListener("load", event => {
            const response = JSON.parse(request.response);
            if (!response.done) {
                reject(new Error("Response Error!"));
                console.error({
                    response: request.response,
                    status: { code: request.status, text: request.statusText }
                });
                return;
            }

            if (!response.referrer.code && !response.referrer.firstname && !response.referrer.lastname && !response.referrer.email) {
                console.debug("Referrer not found!");
                unsetReferrerInfo();
                return;
            }

            if (response.is_partner) {
                console.debug("Referrer is PARTNER");
                definePartner(response, code);
                return;
            }

            console.debug("Referrer is AGENT");
            defineAgent(response, code);
            resolve(response);

            return;
        });

        request.addEventListener("error", event => {
            console.error({
                status: `Status: ${request.status} - ${request.statusText}`,
                response: request.response,
                event: event,
            });

            reject(new Error(`Status: ${request.status} - ${request.statusText}`));
        });

        console.debug(`Requesting ${uri}`);
        request.open("GET", uri, true);
        request.send(data);
    });
    console.groupEnd();

    return promise;
}

function parseRedirectUrl(rawUrl) {
    if (!rawUrl) return "";

    if (rawUrl.length == 0) return "";

    const parts = rawUrl.split("|");
    if (parts.length == 0) return "";

    const url = parts[0].split(":");

    return url.length ? decodeURIComponent(url[1]) : "";
}

function cookieSet(name, value, options = {}) {
    if (Number.isInteger(options)) {
        console.debug("Options is Integer");
        console.debug({
            status: "TRANSFORM",
            options,
        });
        expires = new Date();
        expires.setTime(expires.getTime() + options * 24 * 3600 * 1000);
        options = {
            expires: expires,
        };
    }
    console.debug({
        status: "BEFORE",
        options,
    });
    options = {
        path: "/",
        secure: true,
        samesite: "strict",
        ...options,
    };
    console.debug({
        status: "AFTER",
        options,
    });
    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }
    let updatedCookie =
        encodeURIComponent(name) + "=" + encodeURIComponent(value);
    Object.entries(options).forEach(([key, val]) => {
        updatedCookie += `; ${key}`;
        if (val !== true) updatedCookie += `=${val}`;
    });
    console.debug({ updatedCookie, options });
    document.cookie = updatedCookie;
}

function cookieGet(name) {
    let matches = document.cookie.match(
        new RegExp(
            "(?:^|; )" +
            name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
            "=([^;]*)"
        )
    );

    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function cookieCheck(name) {
    return cookieGet(name) ? true : false;
}

function cookieDelete(name) {
    cookieSet(name, "", -1);
}

function uriHasParameter(param) {
    const UrlParameters = new URLSearchParams(window.location.search);
    return UrlParameters.has(param);
}

function uriParameterValue(param) {
    const UrlParameters = new URLSearchParams(window.location.search);
    return UrlParameters.get(param);
}

function setReferrerInfo({ referrer, maxAge }) {
    console.debug("Set Referrer Info");
    if (!referrer) {
        console.debug(`Referrer is NULL !!!`);
        return;
    }
    let referrerType = "";
    if (referrer.is_agent) referrerType = REFERRER_TYPE_AGENT;
    else if (referrer.is_partner) referrerType = REFERRER_TYPE_PARTNER;
    else referrerType = referrer.type;
    cookieSet(REFERRER_CODE, referrer.code, maxAge);
    cookieSet(REFERRER_NAME, referrer.fullname, maxAge);
    cookieSet(REFERRER_EMAIL, referrer.email, maxAge);
    cookieSet(REFERRER_TYPE, referrerType, maxAge);
}

function getReferrerInfo() {
    console.debug("Get Referrer Info");
    return {
        code: cookieGet(COOKIE_NAME),
        name: cookieGet(REFERRER_NAME),
        email: cookieGet(REFERRER_EMAIL),
        type: cookieGet(REFERRER_TYPE),
        isValid: function () {
            console.debug({
                code: this.code,
                name: this.name,
                email: this.email,
                type: this.type,
            });
            return (
                this.code &&
                this.code.length > 0 &&
                this.name &&
                this.name.length > 0 &&
                this.email &&
                this.email.length > 0 &&
                this.type &&
                this.type.length > 0
            );
        },
    };
}

function unsetReferrerInfo() {
    console.debug("Unset Referrer Info");
    cookieDelete(COOKIE_NAME);
    cookieDelete(REFERRER_NAME);
    cookieDelete(REFERRER_EMAIL);
    cookieDelete(REFERRER_TYPE);
}

function defineAgent(response, referrer_code) {
    console.debug("Define Agent");
    cookieDelete(COOKIE_NAME);
    cookieSet(COOKIE_NAME, referrer_code, AGENT_MAX_AGE);
    setReferrerInfo({
        referrer: response.referrer,
        maxAge: AGENT_MAX_AGE,
    });
}

function definePartner(response, referrer_code) {
    console.debug("Define Partner");
    cookieDelete(COOKIE_NAME);
    cookieSet(COOKIE_NAME, referrer_code, PARTNER_MAX_AGE);
    setReferrerInfo({
        referrer: response.referrer,
        maxAge: PARTNER_MAX_AGE,
    });
}

function updateForms() {
    console.debug("updateForms");
    addHiddenValues();
    addReferrerInfo();
    addCampaignInfo();
}

function addHiddenValues() {
    console.group("add hidden values");

    const forms = document.querySelectorAll('.' + FORM_CLASS);
    if (!forms || forms.length == 0) {
        console.debug("No form to add Referrer Info");
        return;
    }

    forms.forEach(form => {
        const container = form.parentNode;

        console.debug({
            form,
            container
        });

        form.append(buildHidden({ attributes: { name: "Email_Valid?", id: "Email_Valid", value: "Yes" } }));
        form.append(buildHidden({ attributes: { name: "Can_We_Contact?", id: "Can_We_Contact", value: "Yes" } }));
        form.append(buildHidden({
            attributes: {
                name: LEAD_SOURCE,
                id: LEAD_SOURCE,
                value: container.hasAttribute("data-lead_source") ? container.getAttribute("data-lead_source") : LEAD_SOURCE_DEFAULT,
            }
        }));
        form.append(buildHidden({
            attributes: {
                name: SOURCE_DETAILS,
                id: SOURCE_DETAILS,
                value: container.hasAttribute("data-source-details") ? container.getAttribute("data-source-details") : guessSourcedetails(),
            }
        }));
        form.append(buildHidden({
            attributes: {
                name: REFERRAL_URL,
                id: REFERRAL_URL,
                value: document.referrer,
            }
        }));
        form.append(buildHidden({
            attributes: {
                name: SOURCE_WEBPAGE,
                id: SOURCE_WEBPAGE,
                value: window.location.href,
            }
        }));
        if (container.hasAttribute("data-interest"))
            form.append(buildHidden({
                attributes: {
                    name: `${INTEREST}[]`,
                    id: INTEREST,
                    value: container.dataset.interest,
                }
            }));
        if (container.hasAttribute("data-region"))
            form.append(buildHidden({
                attributes: {
                    name: REGION,
                    id: REGION,
                    value: container.dataset.region,
                }
            }));
    });

    console.groupEnd();
}

function addReferrerInfo() {
    console.group("Add referrer Info!");

    const referrer = getReferrerInfo();
    if (!referrer.isValid()) {
        console.debug("No Referrer Info!");
        return;
    }

    const forms = document.querySelectorAll('.' + FORM_CLASS);
    if (!forms || forms.length == 0) {
        console.debug("No form to add Referrer Info");
        return;
    }

    forms.forEach(form => {
        console.debug(form);
        form.append(buildHidden({ attributes: { name: REFERRER_CODE, value: referrer.code } }));
        form.append(buildHidden({ attributes: { name: REFERRER_NAME, value: referrer.name } }));
        form.append(buildHidden({ attributes: { name: REFERRER_EMAIL, value: referrer.email } }));
        form.append(buildHidden({ attributes: { name: REFERRER_TYPE, value: referrer.type } }));
    });
    console.groupEnd();
}

function addCampaignInfo() {
    const campaign = getCampaignInfo();
    if (!campaign.isValid()) {
        console.debug("No Campaign info!");
        return;
    }

    const forms = document.querySelectorAll('.' + FORM_CLASS);
    if (!forms || forms.length == 0) {
        console.debug("No form to add Referrer Info");
        return;
    }

    forms.forEach(form => {
        const leadSource = form.querySelector(`#${LEAD_SOURCE}`);
        if (leadSource) {
            leadSource.value = ONLINE_ADS;
        } else {
            form.append(buildHidden({ attributes: { name: LEAD_SOURCE, value: ONLINE_ADS } }));
        }

        let source_details = guessSourcedetails();
        const sourceDetails = document.querySelector(`#${SOURCE_DETAILS}`);
        if(sourceDetails) {
            sourceDetails.value = source_details;
        } else {
            form.append(buildHidden({ attributes: { name: SOURCE_DETAILS, value: source_details } }));
        }
        
        form.append(buildHidden({ attributes: { name: LEAD_CAMPAIGN, value: campaign.utm_campaign } }));
        form.append(buildHidden({ attributes: { name: CAMPAIGN_DETAILS, value: campaign.utm_content } }));
    });
}

function guessSourcedetails(defaultValue = SOURCE_DETAILS_DEFAULT) {
    const campaign = getCampaignInfo();
    if(!campaign.isValid()) {
        console.debug("No campaign info!");
        return guessSourcedetailsFromUrl();
    }
    if (campaign.ppc_source == FACEBOOK_PPC_KEY) return FACEBOOK_PPC_VALUE;
    else if (campaign.ppc_source == GOOGLE_PPC_KEY) return GOOGLE_PPC_VALUE;
    else if (campaign.ppc_source == LINKEDIN_PPC_KEY) return LINKEDIN_PPC_VALUE;

    return guessSourcedetailsFromUrl();
}

function guessSourcedetailsFromUrl() {
    const url = window.location.href;
    if(url.includes('/fr/')) {
        return TWO_FUTURES_WEBSITE_FR
    }
    
    return TWO_FUTURES_WEBSITE;
}

function getCampaignInfo() {
    return {
        ppc_source: cookieGet('ppc_source'),
        utm_campaign: cookieGet('utm_campaign'),
        utm_content: cookieGet('utm_content'),
        isValid: function () {
            return (this.ppc_source != undefined && this.utm_campaign != undefined && this.utm_content != undefined);
        }
    };
}
    const container = form.parentNode;
    const redirectUrl = parseRedirectUrl(container.dataset.redirect);
    console.debug({ redirectUrl });

    window.location.href = (redirectUrl.length > attributes.redirect_url.length) ? redirectUrl : attributes.redirect_url;
    return;
};

function submitFormLoadStart({ form, attributes, request }) {
    const button = form.querySelector("button.form-input");
    form.dataset.inProgress = true;
    if (!button) {
        console.debug("Button not found!");
        return false;
    }
    if (button.querySelector(".loader-container")) {
        console.debug("Loader already placed!");
        return false;
    }
    console.debug("Adding loader to button");
    const container = document.createElement("div");
    const bar1 = document.createElement("span");
    const bar2 = document.createElement("span");
    const bar3 = document.createElement("span");
    container.classList.add("loader-container");
    container.appendChild(bar1);
    container.appendChild(bar2);
    container.appendChild(bar3);
    button.appendChild(container);
};

function submitFormLoadEnd({ form, attributes, request }) {
    const button = form.querySelector("button.form-input");
    if (!button) return false;
    const loader = button.querySelector(".loader-container");
    if (!loader) return false;
    button.removeChild(loader);
    form.removeAttribute("data-in-progress");
};

function buildRow({ field }) {
    const row = document.createElement("div");
    row.classList.add("form_group");
    const input = buildInput({ attributes: field });
    if (input.type == "hidden") {
        row.style.display = "none";
    }
    row.append(input);

    return row;
}

function buildInput({ attributes }) {
    const inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    if (attributes.type == "select") {
        inputContainer.append(buildSelect({ attributes }));

        return inputContainer;
    }

    if (attributes.type == "textarea") {
        inputContainer.append(buildTextarea({ attributes }));

        return inputContainer;
    }

    if (attributes.type == "hiddentype") {

        return buildHidden({ attributes });
    }

    if (attributes.type == "phone") {
        const otherAttributes = { name: attributes.name, id: attributes.name, value: "" };
        const hidden = buildHidden({ attributes: otherAttributes });
        inputContainer.append(hidden);
        const input = buildPhone({ attributes });
        inputContainer.append(input);

        initializePhone({ attributes, input, hidden });

        return inputContainer;
    }

    inputContainer.append(buildNormalInput({ attributes }));

    return inputContainer;
}

function buildNormalInput({ attributes }) {
    const input = document.createElement("input");
    input.classList.add("form-input");
    input.dataset.type = attributes.type;
    input.type = attributes.hasOwnProperty("type") ? parseInputType(attributes.type) : "text";
    input.id = attributes.hasOwnProperty("name") ? attributes.name : "";
    input.name = input.id;
    input.placeholder = attributes.hasOwnProperty("placeholder") ? attributes.placeholder : "";
    input.required = attributes.hasOwnProperty("required") ? attributes.required == "true" : false;
    if(input.required) {
        console.debug(`#${input.id} is "required"`);
    }

    return input;
}

function buildSelect({ attributes }) {
    const select = document.createElement("select");
    select.classList.add("form-input");
    select.name = attributes.name;
    select.id = select.name;
    select.required = attributes.hasOwnProperty("required") ? attributes.required == "true" : false;
    if(select.required) {
        console.debug(`#${select.id} is "required"`);
    } else if(select.name == "Preferred_Language" || select.name == "country" || select.name == "Budget") {
        select.required = true;
    }
    select.placeholder = attributes.placeholder;
    const placeholder = document.createElement("option");
    placeholder.value = "";
    placeholder.innerHTML = attributes.placeholder;
    select.append(placeholder);

    if (!attributes.hasOwnProperty("options_array")) return select;

    if(attributes.name == "country") {
        select.dataset.countryList = false;
        const addCountryList = () => {
            const countries = attributes.options_array;
            countries.forEach(o => {
                const option = document.createElement("option");
                option.value = o;
                option.innerHTML = o;
                select.append(option);
            });
        };
        setTimeout(() => {
            addCountryList();
        }, 5000);
    } else {
        attributes.options_array.forEach(o => {
            const option = document.createElement("option");
            option.value = o;
            option.innerHTML = o;
            select.append(option);
        });
    }

    return select;
}

function buildTextarea({ attributes }) {
    const textarea = document.createElement("textarea");
    textarea.placeholder = attributes.placeholder;
    textarea.name = attributes.name;
    textarea.id = attributes.name;
    textarea.classList.add("form-input");

    return textarea;
}

function buildHidden({ attributes }) {
    console.debug({ attributes });
    const hidden = document.createElement("input");
    hidden.type = "hidden";
    hidden.name = attributes.name;
    hidden.id = attributes.id ? attributes.id : attributes.name;
    hidden.value = attributes.value;

    return hidden;
}

function buildPhone({ attributes }) {
    const input = document.createElement("input");
    input.type = "tel";
    input.id = "phone_" + Math.floor(Math.random() * 100);
    input.name = input.id;
    input.placeholder = attributes.placeholder;
    input.classList.add('form-input');
    input.maxLength = 15;

    return input;
}

function initializePhone({ attributes, input, hidden }) {
    if (typeof window.intlTelInput != "function") {
        console.warn("Tel plugin is not initialized!!!");

        return;
    }

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

    return tel;
}

function parseInputType(type) {
    if (type == "phone") return "tel";

    return ["text", "tel", "date", "email"].includes(type) ? type : "text";
}

function stripTags(text) {
    return text.replace(/(<([^>]+)>)/gi, "");
}

function loadReferrers() {
    console.group("loadReferrers");

    if (uriHasParameter(PARAMETER_NAME)) {
        const code = uriParameterValue(PARAMETER_NAME);
        console.debug(`Parameter "${PARAMETER_NAME}" found! Loading / Overriding Parameters info!`);
        checkReferrer({ code })
            .then(() => {
                updateForms();
            })
    } else {
        console.debug(`Parameter "${PARAMETER_NAME}" not found! No referrer overriding!`);
        updateForms();
    }

    console.groupEnd();
}

function checkReferrer({ code }) {
    console.group("checkReferrer");
    const promise = new Promise((resolve, reject) => {
        const uri = CHECK_REFERRER_URI;
        const data = new FormData();
        data.append("code", code);
        const request = new XMLHttpRequest();

        request.addEventListener("load", event => {
            const response = JSON.parse(request.response);
            if (!response.done) {
                reject(new Error("Response Error!"));
                console.error({
                    response: request.response,
                    status: { code: request.status, text: request.statusText }
                });
                return;
            }

            if (!response.referrer.code && !response.referrer.firstname && !response.referrer.lastname && !response.referrer.email) {
                console.debug("Referrer not found!");
                unsetReferrerInfo();
                return;
            }

            if (response.is_partner) {
                console.debug("Referrer is PARTNER");
                definePartner(response, code);
                return;
            }

            console.debug("Referrer is AGENT");
            defineAgent(response, code);
            resolve(response);

            return;
        });

        request.addEventListener("error", event => {
            console.error({
                status: `Status: ${request.status} - ${request.statusText}`,
                response: request.response,
                event: event,
            });

            reject(new Error(`Status: ${request.status} - ${request.statusText}`));
        });

        console.debug(`Requesting ${uri}`);
        request.open("GET", uri, true);
        request.send(data);
    });
    console.groupEnd();

    return promise;
}

function parseRedirectUrl(rawUrl) {
    if (!rawUrl) return "";

    if (rawUrl.length == 0) return "";

    const parts = rawUrl.split("|");
    if (parts.length == 0) return "";

    const url = parts[0].split(":");

    return url.length ? decodeURIComponent(url[1]) : "";
}

function cookieSet(name, value, options = {}) {
    if (Number.isInteger(options)) {
        console.debug("Options is Integer");
        console.debug({
            status: "TRANSFORM",
            options,
        });
        expires = new Date();
        expires.setTime(expires.getTime() + options * 24 * 3600 * 1000);
        options = {
            expires: expires,
        };
    }
    console.debug({
        status: "BEFORE",
        options,
    });
    options = {
        path: "/",
        secure: true,
        samesite: "strict",
        ...options,
    };
    console.debug({
        status: "AFTER",
        options,
    });
    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }
    let updatedCookie =
        encodeURIComponent(name) + "=" + encodeURIComponent(value);
    Object.entries(options).forEach(([key, val]) => {
        updatedCookie += `; ${key}`;
        if (val !== true) updatedCookie += `=${val}`;
    });
    console.debug({ updatedCookie, options });
    document.cookie = updatedCookie;
}

function cookieGet(name) {
    let matches = document.cookie.match(
        new RegExp(
            "(?:^|; )" +
            name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
            "=([^;]*)"
        )
    );

    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function cookieCheck(name) {
    return cookieGet(name) ? true : false;
}

function cookieDelete(name) {
    cookieSet(name, "", -1);
}

function uriHasParameter(param) {
    const UrlParameters = new URLSearchParams(window.location.search);
    return UrlParameters.has(param);
}

function uriParameterValue(param) {
    const UrlParameters = new URLSearchParams(window.location.search);
    return UrlParameters.get(param);
}

function setReferrerInfo({ referrer, maxAge }) {
    console.debug("Set Referrer Info");
    if (!referrer) {
        console.debug(`Referrer is NULL !!!`);
        return;
    }
    let referrerType = "";
    if (referrer.is_agent) referrerType = REFERRER_TYPE_AGENT;
    else if (referrer.is_partner) referrerType = REFERRER_TYPE_PARTNER;
    else referrerType = referrer.type;
    cookieSet(REFERRER_CODE, referrer.code, maxAge);
    cookieSet(REFERRER_NAME, referrer.fullname, maxAge);
    cookieSet(REFERRER_EMAIL, referrer.email, maxAge);
    cookieSet(REFERRER_TYPE, referrerType, maxAge);
}

function getReferrerInfo() {
    console.debug("Get Referrer Info");
    return {
        code: cookieGet(COOKIE_NAME),
        name: cookieGet(REFERRER_NAME),
        email: cookieGet(REFERRER_EMAIL),
        type: cookieGet(REFERRER_TYPE),
        isValid: function () {
            console.debug({
                code: this.code,
                name: this.name,
                email: this.email,
                type: this.type,
            });
            return (
                this.code &&
                this.code.length > 0 &&
                this.name &&
                this.name.length > 0 &&
                this.email &&
                this.email.length > 0 &&
                this.type &&
                this.type.length > 0
            );
        },
    };
}

function unsetReferrerInfo() {
    console.debug("Unset Referrer Info");
    cookieDelete(COOKIE_NAME);
    cookieDelete(REFERRER_NAME);
    cookieDelete(REFERRER_EMAIL);
    cookieDelete(REFERRER_TYPE);
}

function defineAgent(response, referrer_code) {
    console.debug("Define Agent");
    cookieDelete(COOKIE_NAME);
    cookieSet(COOKIE_NAME, referrer_code, AGENT_MAX_AGE);
    setReferrerInfo({
        referrer: response.referrer,
        maxAge: AGENT_MAX_AGE,
    });
}

function definePartner(response, referrer_code) {
    console.debug("Define Partner");
    cookieDelete(COOKIE_NAME);
    cookieSet(COOKIE_NAME, referrer_code, PARTNER_MAX_AGE);
    setReferrerInfo({
        referrer: response.referrer,
        maxAge: PARTNER_MAX_AGE,
    });
}

function updateForms() {
    console.debug("updateForms");
    addHiddenValues();
    addReferrerInfo();
    addCampaignInfo();
}

function addHiddenValues() {
    console.group("add hidden values");

    const forms = document.querySelectorAll('.' + FORM_CLASS);
    if (!forms || forms.length == 0) {
        console.debug("No form to add Referrer Info");
        return;
    }

    forms.forEach(form => {
        const container = form.parentNode;

        console.debug({
            form,
            container
        });

        form.append(buildHidden({ attributes: { name: "Email_Valid?", id: "Email_Valid", value: "Yes" } }));
        form.append(buildHidden({ attributes: { name: "Can_We_Contact?", id: "Can_We_Contact", value: "Yes" } }));
        form.append(buildHidden({
            attributes: {
                name: LEAD_SOURCE,
                id: LEAD_SOURCE,
                value: container.hasAttribute("data-lead_source") ? container.getAttribute("data-lead_source") : LEAD_SOURCE_DEFAULT,
            }
        }));
        form.append(buildHidden({
            attributes: {
                name: SOURCE_DETAILS,
                id: SOURCE_DETAILS,
                value: container.hasAttribute("data-source-details") ? container.getAttribute("data-source-details") : guessSourcedetails(),
            }
        }));
        form.append(buildHidden({
            attributes: {
                name: REFERRAL_URL,
                id: REFERRAL_URL,
                value: document.referrer,
            }
        }));
        form.append(buildHidden({
            attributes: {
                name: SOURCE_WEBPAGE,
                id: SOURCE_WEBPAGE,
                value: window.location.href,
            }
        }));
        if (container.hasAttribute("data-interest"))
            form.append(buildHidden({
                attributes: {
                    name: `${INTEREST}[]`,
                    id: INTEREST,
                    value: container.dataset.interest,
                }
            }));
        if (container.hasAttribute("data-region"))
            form.append(buildHidden({
                attributes: {
                    name: REGION,
                    id: REGION,
                    value: container.dataset.region,
                }
            }));
    });

    console.groupEnd();
}

function addReferrerInfo() {
    console.group("Add referrer Info!");

    const referrer = getReferrerInfo();
    if (!referrer.isValid()) {
        console.debug("No Referrer Info!");
        return;
    }

    const forms = document.querySelectorAll('.' + FORM_CLASS);
    if (!forms || forms.length == 0) {
        console.debug("No form to add Referrer Info");
        return;
    }

    forms.forEach(form => {
        console.debug(form);
        form.append(buildHidden({ attributes: { name: REFERRER_CODE, value: referrer.code } }));
        form.append(buildHidden({ attributes: { name: REFERRER_NAME, value: referrer.name } }));
        form.append(buildHidden({ attributes: { name: REFERRER_EMAIL, value: referrer.email } }));
        form.append(buildHidden({ attributes: { name: REFERRER_TYPE, value: referrer.type } }));
    });
    console.groupEnd();
}

function addCampaignInfo() {
    const campaign = getCampaignInfo();
    if (!campaign.isValid()) {
        console.debug("No Campaign info!");
        return;
    }

    const forms = document.querySelectorAll('.' + FORM_CLASS);
    if (!forms || forms.length == 0) {
        console.debug("No form to add Referrer Info");
        return;
    }

    forms.forEach(form => {
        const leadSource = form.querySelector(`#${LEAD_SOURCE}`);
        if (leadSource) {
            leadSource.value = ONLINE_ADS;
        } else {
            form.append(buildHidden({ attributes: { name: LEAD_SOURCE, value: ONLINE_ADS } }));
        }

        let source_details = guessSourcedetails();
        const sourceDetails = document.querySelector(`#${SOURCE_DETAILS}`);
        if(sourceDetails) {
            sourceDetails.value = source_details;
        } else {
            form.append(buildHidden({ attributes: { name: SOURCE_DETAILS, value: source_details } }));
        }
        
        form.append(buildHidden({ attributes: { name: LEAD_CAMPAIGN, value: campaign.utm_campaign } }));
        form.append(buildHidden({ attributes: { name: CAMPAIGN_DETAILS, value: campaign.utm_content } }));
    });
}

function guessSourcedetails(defaultValue = SOURCE_DETAILS_DEFAULT) {
    const campaign = getCampaignInfo();
    if(!campaign.isValid()) {
        console.debug("No campaign info!");
        return guessSourcedetailsFromUrl();
    }
    if (campaign.ppc_source == FACEBOOK_PPC_KEY) return FACEBOOK_PPC_VALUE;
    else if (campaign.ppc_source == GOOGLE_PPC_KEY) return GOOGLE_PPC_VALUE;
    else if (campaign.ppc_source == LINKEDIN_PPC_KEY) return LINKEDIN_PPC_VALUE;

    return guessSourcedetailsFromUrl();
}

function guessSourcedetailsFromUrl() {
    const url = window.location.href;
    if(url.includes('/fr/')) {
        return TWO_FUTURES_WEBSITE_FR
    }
    
    return TWO_FUTURES_WEBSITE;
}

function getCampaignInfo() {
    return {
        ppc_source: cookieGet('ppc_source'),
        utm_campaign: cookieGet('utm_campaign'),
        utm_content: cookieGet('utm_content'),
        isValid: function () {
            return (this.ppc_source != undefined && this.utm_campaign != undefined && this.utm_content != undefined);
        }
    };
}