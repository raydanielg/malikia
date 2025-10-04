import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Global page loader: inject and control visibility
(() => {
  const ensureLoaderEl = () => {
    let el = document.getElementById('global-loader');
    if (!el) {
      el = document.createElement('div');
      el.id = 'global-loader';
      el.innerHTML = `<span class="loader"></span><span style="color:white;font-weight:600;margin-top:6px">Loading...</span>`;
      document.body.appendChild(el);
    }
    return el;
  };

  const show = () => ensureLoaderEl().classList.add('show');
  const hide = () => {
    const el = document.getElementById('global-loader');
    if (el) el.classList.remove('show');
  };

  // Show loader until full page load
  document.addEventListener('DOMContentLoaded', () => {
    show();
  });
  window.addEventListener('load', () => {
    hide();
  });

  // Link navigation (same-origin) -> show loader
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (!a) return;
    if (a.getAttribute('target') === '_blank') return;
    const href = a.getAttribute('href');
    if (!href || href.startsWith('#') || href.startsWith('javascript:')) return;
    try {
      const url = new URL(href, window.location.href);
      if (url.origin === window.location.origin) {
        show();
      }
    } catch (_) { /* ignore */ }
  }, true);

  // Non-AJAX forms -> show loader on submit
  document.addEventListener('submit', (e) => {
    const form = e.target;
    // If the form prevents default (AJAX), it won't navigate; but we show preemptively; hide will occur if page stays
    if (form.hasAttribute('data-no-global-loader')) return;
    show();
    // If submission is prevented within the same tick, hide again on next microtask
    queueMicrotask(() => {
      if (e.defaultPrevented) hide();
    });
  }, true);
})();
