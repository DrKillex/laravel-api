import './bootstrap';
import Alpine from 'alpinejs';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
]);

import * as bootstrap from 'bootstrap';

window.Alpine = Alpine;

Alpine.start();

if (document.querySelector('.form-input-image')) {
    const imageInput = document.getElementById('image');
    imageInput.addEventListener('change', showPreview);
}

function showPreview(event) {
    if (event.target.files.length > 0) {
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById("image-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}