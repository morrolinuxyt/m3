  <!-- Applica la scelta di tema salvata PRIMA del primo disegno: senza questo
       si vedrebbe un lampo di tema chiaro prima che parta il resto del JS.
       Senza scelta salvata (o senza JS) resta theme-auto, che segue il sistema. -->
  <script>
    (function () {
      try {
        var t = localStorage.getItem('theme');
        if (t === 'light' || t === 'dark') {
          document.documentElement.className = 'theme-' + t;
        }
      } catch (e) { /* storage non disponibile: si resta su theme-auto */ }
    })();
  </script>
