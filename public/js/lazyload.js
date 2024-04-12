// Lazy Load functions

window.addEventListener("DOMContentLoaded", function() {
    lazyloadImage();
});

function lazyloadImage({ selector = ".lazy-load-image" } = {}) {

    const images = document.querySelectorAll(selector);

    if (images.length == 0) {

        console.debug("No lazy load image found!");
        return;

    }

    console.debug(`Lazy load image found ${images.length}`);

    images.forEach(img => {
        const src = img.dataset.src;
        const preloadImg = new Image();

        preloadImg.onload = function(){
            console.debug(`Image ${src} loaded!`);
            img.src = src;
            img.classList.add("loaded");
        };
        preloadImg.src = src;
    });

}
