// Campaign management

// La durée du cookie en jours
const COOKIE_DURATION = 365;

window.addEventListener("DOMContentLoaded", event => {
    campaignManagement();
});

function campaignManagement() {
    console.group("Campaign Management");

    // Récupérer les paramètres de l'URL
    const url = new URL(window.location.href);
    const searchParams = new URLSearchParams(url.search);

    handlePPC(searchParams);
    handleUtmCampaign(searchParams);
    handleUtmContent(searchParams);

    console.groupEnd();
}

function handlePPC(searchParams) {
    // Vérifier si le paramètre "ppc_source" est présent
    if (!searchParams.has('ppc_source')) {
        console.debug("No ppc_source in the URL");
        return;
    }

    console.debug({
        ppc_source: searchParams.get('ppc_source')
    });

    const ppcSource = searchParams.get('ppc_source');

    // Vérifier si le cookie "ppc_source" existe déjà
    if (cCheck('ppc_source')) {
        // Écraser la valeur du cookie "ppc_source" avec la nouvelle valeur
        cSet('ppc_source', ppcSource, COOKIE_DURATION);
        console.debug(`Écraser la valeur du cookie "ppc_source" avec la nouvelle valeur`);
    } else {
        // Créer le cookie "ppc_source" avec une date d'expiration dans le futur
        const expiryDate = new Date(Date.now() + COOKIE_DURATION * 24 * 60 * 60 * 1000);
        cSet('ppc_source', ppcSource, COOKIE_DURATION);
        console.debug(`Créer le cookie "ppc_source" avec une date d'expiration dans le futur`);
    }
}

function handleUtmCampaign(searchParams) {
    // Vérifier si le cookie "utm_campaign" existe déjà
    console.debug({
        utm_campaign: searchParams.get('utm_campaign')
    });
    if (searchParams.has('utm_campaign')) {
        if (cCheck('utm_campaign')) {
            // Écraser la valeur du cookie "utm_campaign" avec la valeur du paramètre "utm_campaign" de l'URL
            const utmCampaign = searchParams.get('utm_campaign');
            cSet('utm_campaign', utmCampaign, COOKIE_DURATION);
            console.debug(`Écraser la valeur du cookie "utm_campaign" avec la valeur du paramètre "utm_campaign" de l'URL`);
        } else {
            // Créer le cookie "utm_campaign" avec une date d'expiration identique à celle de "ppc_source"
            const expiryDate = new Date(Date.now() + COOKIE_DURATION * 24 * 60 * 60 * 1000);
            const utmCampaign = searchParams.get('utm_campaign');
            cSet('utm_campaign', utmCampaign, COOKIE_DURATION);
            console.debug(`Créer le cookie "utm_campaign" avec une date d'expiration identique à celle de "ppc_source"`);
        }
    }
}

function handleUtmContent(searchParams) {
    // Même opération pour le cookie "utm_content"
    console.debug({
        utm_content: searchParams.get('utm_content')
    });
    if (searchParams.has('utm_content')) {
        if (cCheck('utm_content')) {
            const utmContent = searchParams.get('utm_content');
            cSet('utm_content', utmContent, COOKIE_DURATION);
            console.debug("Ecrasement de la valeur du cookie utm_content");
        } else {
            const utmContent = searchParams.get('utm_content');
            cSet('utm_content', utmContent, COOKIE_DURATION);
            console.debug("Nouveau cookie utm_content");
        }
    }
}

function cSet(name, value, options = {}) {
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

function cGet(name) {
    let matches = document.cookie.match(
        new RegExp(
            "(?:^|; )" +
            name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
            "=([^;]*)"
        )
    );

    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function cCheck(name) {
    return cGet(name) ? true : false;
}

function cDelete(name) {
    cSet(name, "", -1);
}