/* Selettore del tema: automatico -> chiaro -> scuro -> automatico.
   "automatico" non salva nulla, così la pagina continua a seguire il sistema
   anche se la preferenza cambia. La classe sta su <html>: snippets/theme-init.php
   la applica già in <head>, questo qui si limita a sincronizzare l'icona.
   È la stessa logica di corsolinux.com (js/common.js): se ne cambi una,
   allinea l'altra. */
(function() {
  var btn = document.getElementById('theme-toggle');
  if (!btn) return;

  var root  = document.documentElement;
  var ORDER = ['auto', 'light', 'dark'];
  var ICON  = { auto: 'fa-adjust', light: 'fa-sun-o', dark: 'fa-moon-o' };
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
    for (var i = 0; i < ORDER.length; i++) root.classList.remove('theme-' + ORDER[i]);
    root.classList.add('theme-' + theme);

    var icon = btn.querySelector('i');
    if (icon) icon.className = 'fa ' + ICON[theme];
    btn.title = LABEL[theme];
    btn.setAttribute('aria-label', LABEL[theme]);

    if (!save) return;
    try {
      if (theme === 'auto') localStorage.removeItem('theme');
      else localStorage.setItem('theme', theme);
    } catch (e) { /* storage non disponibile: la scelta vale solo per questa pagina */ }
  }

  apply(current(), false);   // allinea l'icona a quanto già applicato in <head>

  btn.addEventListener('click', function() {
    apply(ORDER[(ORDER.indexOf(current()) + 1) % ORDER.length], true);
  });
})();

/* Evidenziatore: il tratto si disegna quando la frase arriva in campo.
   Con threshold .35 parte quando la spanna è entrata per un terzo, non al
   primo pixel. Senza IntersectionObserver il segno resta già disegnato. */
(function() {
  var segni = document.querySelectorAll('.marker');
  if (!segni.length) return;
  if (!('IntersectionObserver' in window)) return;

  var osservatore = new IntersectionObserver(function(voci) {
    voci.forEach(function(voce) {
      if (!voce.isIntersecting) return;
      voce.target.classList.add('is-inview');
      osservatore.unobserve(voce.target);
    });
  }, { threshold: .35 });

  Array.prototype.forEach.call(segni, function(segno) { osservatore.observe(segno); });
})();
