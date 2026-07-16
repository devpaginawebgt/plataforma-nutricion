import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;

import { Modal, Dropdown, Collapse, initFlowbite } from 'flowbite';
window.Modal = Modal;
window.Dropdown = Dropdown;
window.Collapse = Collapse;

document.addEventListener('DOMContentLoaded', () => initFlowbite());

// Toggle hamburger/close icons cuando Flowbite abre/cierra el menú móvil.
$(document).on('click', '[data-collapse-toggle]', function () {
    const $btn = $(this);
    const targetId = $btn.attr('data-collapse-toggle');
    // Flowbite toggle-a la clase 'hidden' del target; leemos DESPUÉS del tick.
    setTimeout(() => {
        const isHidden = $('#' + targetId).hasClass('hidden');
        $btn.find('[data-hamburger-icon]').toggleClass('hidden', !isHidden);
        $btn.find('[data-close-icon]').toggleClass('hidden', isHidden);
    }, 0);
});

// Auto-fadeout de mensajes "Saved!" en formularios de perfil.
$(function () {
    $('.js-saved-message').delay(2000).fadeOut(400);
});
