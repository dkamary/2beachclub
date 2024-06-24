// Gallery photo

window.addEventListener("DOMContentLoaded", function() {
    load_gallery_photo();
});

function load_gallery_photo({ selector = '.gallery-photo'} = {}) {
    console.debug("load_gallery_photo");

    const modal = document.createElement("div");
    modal.id = "gallery-modal";
    modal.classList.add("gallery-modal");

    const prev = document.createElement("span");
    prev.classList.add("prev");
    prev.innerHTML = "&#10094;"
    modal.appendChild(prev);

    const modalImg = document.createElement("img");
    modalImg.id = "gallery-modal-img";
    modalImg.src = "/v2/svg/Spinner.svg";
    modalImg.alt = "";
    modal.appendChild(modalImg);

    const next = document.createElement("span");
    next.classList.add("next");
    next.innerHTML = "&#10095;";
    modal.appendChild(next);

    document.body.appendChild(modal);

    let currentIndex = 0;

    // Récupérer tous les liens d'images
    const images = Array.from(document.querySelectorAll(selector));

    // Ouvrir l'image en plein écran
    function openModal(index) {
        console.debug({ images });
        currentIndex = index;
        modalImg.src = images[index].dataset.image;
        modal.style.display = 'flex';
    }

    // Fermer le modal
    function closeModal() {
        modal.style.display = 'none';
    }

    // Afficher l'image précédente
    function showPrev() {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
        openModal(currentIndex);
    }

    // Afficher l'image suivante
    function showNext() {
        currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
        openModal(currentIndex);
    }

    // Ajouter les événements
    images.forEach((link, index) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(index);
            console.debug({index});
        });
    });

    prev.addEventListener('click', showPrev);
    next.addEventListener('click', showNext);

    // Fermer le modal en cliquant à l'extérieur de l'image ou en appuyant sur 'Esc'
    modal.addEventListener('click', (e) => {
        if (e.target === modal || e.target === modalImg) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (modal.style.display === 'flex') {
            if (e.key === 'ArrowLeft') {
                showPrev();
            } else if (e.key === 'ArrowRight') {
                showNext();
            } else if (e.key === 'Escape') {
                closeModal();
            }
        }
    });

}
