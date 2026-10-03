/* Morrolinux.it — tutto il JS del sito, senza jQuery.
   Lo scroll morbido e l'offset delle ancore li fa il CSS (scroll-behavior,
   scroll-margin-top): qui restano menu mobile, voce
   attiva, selettore del tema ed evidenziatore. */

/* --- Navbar: menu mobile --- */
(function() {
  var nav = document.getElementById('site-nav');
  if (!nav) return;

  var toggle = nav.querySelector('.nav-toggle');
  function setOpen(open) {
    nav.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', open);
    toggle.setAttribute('aria-label', open ? 'Chiudi il menu' : 'Apri il menu');
  }

  toggle.addEventListener('click', function() { setOpen(!nav.classList.contains('is-open')); });
  nav.querySelectorAll('.nav-links a').forEach(function(a) {
    a.addEventListener('click', function() { setOpen(false); });
  });
  document.addEventListener('keydown', function(e) { if (e.key === 'Escape') setOpen(false); });
})();

/* --- Voce attiva della navbar: la sezione che occupa la fascia alta
   dello schermo. Al posto dello scrollspy di Bootstrap. --- */
(function() {
  if (!('IntersectionObserver' in window)) return;

  var links = {};
  document.querySelectorAll('.nav-links a[href*="#"]').forEach(function(a) {
    var id = a.hash.slice(1);
    if (document.getElementById(id)) links[id] = a;
  });

  var ids = Object.keys(links);
  if (!ids.length) return;

  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (!entry.isIntersecting || window.scrollY < 200) return;
      ids.forEach(function(id) { links[id].classList.toggle('is-active', id === entry.target.id); });
    });
  }, { rootMargin: '-30% 0px -65% 0px' });

  ids.forEach(function(id) { observer.observe(document.getElementById(id)); });

  // In cima alla pagina nessuna voce è attiva
  function clearAtTop() {
    if (window.scrollY < 200) ids.forEach(function(id) { links[id].classList.remove('is-active'); });
  }
  window.addEventListener('scroll', clearAtTop, { passive: true });
})();

/* --- Selettore del tema: automatico -> chiaro -> scuro -> automatico.
   "automatico" non salva nulla, così la pagina continua a seguire il
   sistema. La classe la applica già snippets/theme-init.php in <head>;
   l'icona giusta la mostra il CSS. Stessa logica di corsolinux.com. --- */
(function() {
  var btn = document.getElementById('theme-toggle');
  if (!btn) return;

  var root  = document.documentElement;
  var ORDER = ['auto', 'light', 'dark'];
  var LABEL = { auto:  'Tema: automatico (segue il sistema)',
                light: 'Tema: chiaro',
                dark:  'Tema: scuro' };

  function current() {
    for (var i = 0; i < ORDER.length; i++) {
      if (root.classList.contains('theme-' + ORDER[i])) return ORDER[i];
    }
    return 'auto';
  }

  function apply(theme, save) {
    ORDER.forEach(function(t) { root.classList.remove('theme-' + t); });
    root.classList.add('theme-' + theme);
    btn.title = LABEL[theme];
    btn.setAttribute('aria-label', LABEL[theme]);

    if (!save) return;
    try {
      if (theme === 'auto') localStorage.removeItem('theme');
      else localStorage.setItem('theme', theme);
    } catch (e) { /* storage non disponibile: la scelta vale solo per questa pagina */ }
  }

  apply(current(), false);

  btn.addEventListener('click', function() {
    apply(ORDER[(ORDER.indexOf(current()) + 1) % ORDER.length], true);
  });
})();

/* --- Evidenziatore: il tratto si disegna quando la frase entra in campo.
   Senza IntersectionObserver il segno resta già disegnato. --- */
(function() {
  var marks = document.querySelectorAll('.marker');
  if (!marks.length || !('IntersectionObserver' in window)) return;

  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-inview');
      observer.unobserve(entry.target);
    });
  }, { threshold: .35 });

  marks.forEach(function(m) { observer.observe(m); });
})();
