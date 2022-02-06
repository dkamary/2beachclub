// require('./bootstrap');

window.addEventListener("DOMContentLoaded", (event) => {
    console.log("DOMContentLoaded !!!");
    lazyloadVideo(1000);
});

const lazyloadVideo = (timeout = 500) => {
    setTimeout(() => {
        console.log("Lazy load video");
        const headerVideo = document.querySelector("#header_video");
        if (headerVideo) {
            const sources = headerVideo.querySelectorAll("source");
            sources.forEach((source) => {
                source.src = source.getAttribute("data-src");
            });
            headerVideo.load();
            headerVideo.play();
            console.log("Video loaded and played!");
        } else {
            console.log("Video not found");
        }
    }, timeout);
};
