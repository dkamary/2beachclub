{{-- typology styles --}}

<style id="typo-styles">

    :root{
        --font_header: 'DM Serif Display', serif;
        --color_default: #003F57;
        --color_header: #3F9CAA;
        --color_footer: #3F9CAA;
        --color_title: #3F9CAA;
        --bg_header: rgba(0, 0, 0, .1);
        --bg_color: rgba(196, 196, 196, 0.2);
    }

    .layout-v2 {
        font-size: 16px;
        line-height: 126%;
    }

    .layout-v2 h1,
    .layout-v2 h2,
    .layout-v2 h3,
    .layout-v2 h4,
    .layout-v2 h5,
    .layout-v2 h6 {
        font-weight: 600;
        font-family: var(--font_header);
    }

    .layout-v2 h1 {
        font-size: 48px;
    }

    .layout-v2 h2 {
        font-size: 28px;
    }

    .layout-v2 h3 {
        font-size: 24px;
    }

    .layout-v2 h4 {
        font-size: 20px;
    }

    .layout-v2 h5 {
        font-size: 18px;
    }

    .layout-v2 h6 {
        font-size: 16px;
    }

    .special-heading {
        color: var(--color_header);
    }

    .btn-container.contact-button.book-table {
        background-color: #3F9CAA;
        padding: 8px 12px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        border-radius: 30px;
        min-width: 12.5rem;
        text-align: center;
    }

    .btn-container.contact-button.book-table a {
        color: #FFFFFF;
        text-decoration: none;
        font-weight: 600;
        font-size: 16px;
        display: block;
        width: 100%;
        height: 100%;
    }

    .special-heading a {
        color: var(--color_header);
        text-decoration: none;
    }
</style>
