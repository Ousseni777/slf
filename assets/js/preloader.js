document.addEventListener('DOMContentLoaded', () => {
    "use strict";

    /**
     * Preloader
     */
    const preloader = document.querySelector('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            // Ajouter un délai avant de supprimer le preloader (par exemple, 2 secondes)
            setTimeout(() => {
                preloader.remove();
            }, 1000);
        });
    }

});