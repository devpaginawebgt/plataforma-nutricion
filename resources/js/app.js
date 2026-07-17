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

// Dark mode: detección + persistencia + toggle global
function applyTheme(theme) {
    const isDark = theme === 'dark' || (theme === 'system' && matchMedia('(prefers-color-scheme: dark)').matches);
    document.documentElement.classList.toggle('dark', isDark);
}

window.toggleTheme = function () {
    const current = localStorage.getItem('theme') ?? 'system';
    const next = current === 'dark' ? 'light' : current === 'light' ? 'system' : 'dark';
    localStorage.setItem('theme', next);
    applyTheme(next);
    return next;
};

// Reaccionar a cambios del sistema cuando el usuario está en modo 'system'
matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    if ((localStorage.getItem('theme') ?? 'system') === 'system') {
        applyTheme('system');
    }
});

// Sidebar drawer en mobile: toggle + backdrop + cerrar con ESC/click fuera
$(function () {
    const $sidebar = $('#app-sidebar');
    const $backdrop = $('#app-sidebar-backdrop');
    const $toggle = $('#app-sidebar-toggle');

    function openSidebar() {
        $sidebar.removeClass('-translate-x-full');
        $backdrop.removeClass('hidden');
        $toggle.attr('aria-expanded', 'true');
    }

    function closeSidebar() {
        $sidebar.addClass('-translate-x-full');
        $backdrop.addClass('hidden');
        $toggle.attr('aria-expanded', 'false');
    }

    $toggle.on('click', function () {
        $sidebar.hasClass('-translate-x-full') ? openSidebar() : closeSidebar();
    });

    $backdrop.on('click', closeSidebar);

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') closeSidebar();
    });
});