// Lazy Load functions

window.addEventListener("DOMContentLoaded", function() {
    lazyloadImage();
});

function lazyloadImage({ selector = ".lazy-load-image" } = {}) {

    console.group('lazy load image');

    const images = document.querySelectorAll(selector);

    if (images.length == 0) {

        console.debug("No lazy load image found!");
        return;

    }

    console.debug(`Lazy load image found ${images.length}`);

    images.forEach(img => {
        const src = img.dataset.src;

        if (!src) {
            console.warn(`This image is a lazy load image but the data-src is missing: image's source: ${img.src}`);
            return;
        }

        if (img.classList.contains('loaded')) {
            console.warn(`This image is already loaded!!!`);
            return;
        }

        const preloadImg = new Image();

        preloadImg.onload = function(){
            console.debug(`Image ${src} loaded!`);
            img.src = src;
            img.classList.add("loaded");
        };
        preloadImg.src = src;
    });

    console.groupEnd();

}
