/* Vicariat des Comores — site behaviour (no dependencies) */
(function () {
    'use strict';

    var $ = function (sel, ctx) { return (ctx || document).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };
    var body = document.body;

    /* Header shadow on scroll */
    var header = $('[data-header]');
    if (header) {
        var onScroll = function () { header.classList.toggle('is-scrolled', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* Mobile menu */
    var toggle = $('.nav-toggle');
    var closeMenu = function () {
        body.classList.remove('nav-open');
        if (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Ouvrir le menu');
        }
    };
    if (toggle) {
        toggle.addEventListener('click', function () {
            if (header) { document.documentElement.style.setProperty('--nav-top', header.getBoundingClientRect().bottom + 'px'); }
            var open = body.classList.toggle('nav-open');
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && body.classList.contains('nav-open')) { closeMenu(); toggle.focus(); }
        });
        window.addEventListener('resize', function () { if (window.innerWidth > 1400) { closeMenu(); } });
    }

    /* Dropdowns (click/tap; hover handled in CSS on desktop) */
    $$('.nav-dropdown-toggle').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var item = btn.closest('.nav-item');
            var open = item.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', String(open));
        });
    });
    document.addEventListener('click', function (e) {
        $$('.nav-item.is-open').forEach(function (item) {
            if (!item.contains(e.target)) {
                item.classList.remove('is-open');
                var b = $('.nav-dropdown-toggle', item);
                if (b) { b.setAttribute('aria-expanded', 'false'); }
            }
        });
    });

    /* Reveal on scroll */
    var reveals = $$('.reveal');
    if ('IntersectionObserver' in window && reveals.length) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });
        reveals.forEach(function (el) { io.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('is-visible'); });
    }

    /* Animated counters */
    var counters = $$('[data-count]');
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var runCounter = function (el) {
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        if (reduceMotion) { el.textContent = target.toLocaleString('fr-FR'); return; }
        var start = null;
        var step = function (ts) {
            if (!start) { start = ts; }
            var p = Math.min((ts - start) / 1400, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased).toLocaleString('fr-FR');
            if (p < 1) { requestAnimationFrame(step); }
        };
        requestAnimationFrame(step);
    };
    if ('IntersectionObserver' in window && counters.length) {
        var co = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { runCounter(entry.target); co.unobserve(entry.target); }
            });
        }, { threshold: 0.6 });
        counters.forEach(function (el) { co.observe(el); });
    } else {
        counters.forEach(runCounter);
    }

    /* "Read more" toggles: <button class="text-toggle" aria-controls="id"> */
    $$('.text-toggle[aria-controls]').forEach(function (btn) {
        var target = document.getElementById(btn.getAttribute('aria-controls'));
        if (!target) { return; }
        var label = $('span', btn);
        var more = btn.getAttribute('data-more') || 'Lire la suite';
        var less = btn.getAttribute('data-less') || 'Réduire';
        btn.addEventListener('click', function () {
            var open = target.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', String(open));
            if (label) { label.textContent = open ? less : more; }
        });
    });

    /* Filter chips: <div data-filter="groupName"> buttons with data-value; items with data-category */
    $$('[data-filter]').forEach(function (group) {
        var name = group.getAttribute('data-filter');
        var items = $$('[data-filter-item="' + name + '"]');
        var empty = $('[data-filter-empty="' + name + '"]');
        var buttons = $$('[data-value]', group);
        buttons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var value = btn.getAttribute('data-value');
                buttons.forEach(function (b) { b.setAttribute('aria-pressed', String(b === btn)); });
                var shown = 0;
                items.forEach(function (item) {
                    var match = value === '*' || item.getAttribute('data-category') === value;
                    item.hidden = !match;
                    if (match) { shown++; }
                });
                if (empty) { empty.hidden = shown !== 0; }
            });
        });
    });

    /* Live text filter: <input data-live-search="target-selector" data-count="#counter"> */
    $$('[data-live-search]').forEach(function (input) {
        var items = $$(input.getAttribute('data-live-search'));
        var counter = input.getAttribute('data-live-count') ? $(input.getAttribute('data-live-count')) : null;
        var empty = input.getAttribute('data-live-empty') ? $(input.getAttribute('data-live-empty')) : null;
        var normalize = function (s) {
            s = (s || '').toLowerCase();
            return s.normalize ? s.normalize('NFD').replace(/[̀-ͯ]/g, '') : s;
        };
        input.addEventListener('input', function () {
            var q = normalize(input.value.trim());
            var shown = 0;
            items.forEach(function (item) {
                var match = !q || normalize(item.getAttribute('data-search')).indexOf(q) !== -1;
                item.hidden = !match;
                if (match) { shown++; }
            });
            if (counter) { counter.textContent = shown + (shown > 1 ? ' paroisses' : ' paroisse'); }
            if (empty) { empty.hidden = shown !== 0; }
        });
    });

    /* Tabs: [role=tablist] with buttons aria-controls */
    $$('[role="tablist"]').forEach(function (list) {
        var tabs = $$('[role="tab"]', list);
        var select = function (tab) {
            tabs.forEach(function (t) {
                var on = t === tab;
                t.setAttribute('aria-selected', String(on));
                t.tabIndex = on ? 0 : -1;
                var panel = document.getElementById(t.getAttribute('aria-controls'));
                if (panel) { panel.hidden = !on; }
            });
        };
        tabs.forEach(function (tab, i) {
            tab.addEventListener('click', function () { select(tab); });
            tab.addEventListener('keydown', function (e) {
                var dir = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
                if (dir) {
                    var next = tabs[(i + dir + tabs.length) % tabs.length];
                    select(next); next.focus();
                }
            });
        });
    });

    /* Sticky sub-navigation: highlight the section in view */
    var subLinks = $$('.subnav a[href^="#"]');
    if (subLinks.length && 'IntersectionObserver' in window) {
        var map = {};
        subLinks.forEach(function (a) { map[a.getAttribute('href').slice(1)] = a; });
        var so = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && map[entry.target.id]) {
                    subLinks.forEach(function (a) { a.classList.remove('is-active'); });
                    map[entry.target.id].classList.add('is-active');
                    map[entry.target.id].scrollIntoView({ block: 'nearest', inline: 'center' });
                }
            });
        }, { rootMargin: '-40% 0px -55% 0px' });
        Object.keys(map).forEach(function (id) {
            var section = document.getElementById(id);
            if (section) { so.observe(section); }
        });
    }

    /* Show / hide password */
    $$('.password-toggle').forEach(function (btn) {
        var input = btn.parentNode.querySelector('input');
        btn.addEventListener('click', function () {
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.setAttribute('aria-label', show ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
            btn.innerHTML = show ? '<i class="fa-regular fa-eye-slash"></i>' : '<i class="fa-regular fa-eye"></i>';
        });
    });

    /* Donation: preset amounts and custom amount share one field */
    var custom = $('#customAmount');
    if (custom) {
        var presets = $$('input[name="preset"]');
        presets.forEach(function (radio) {
            radio.addEventListener('change', function () { if (radio.checked) { custom.value = radio.value; } });
        });
        custom.addEventListener('input', function () {
            presets.forEach(function (radio) { radio.checked = radio.value === custom.value; });
        });
    }
})();
