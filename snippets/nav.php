<?php
/* Navbar comune. Sulla home le voci sono ancore della pagina stessa ($home
   vuoto), sulle altre pagine riportano alla home. */
$home = $home ?? '/';
?>
  <a class="skip-link" href="#main">Vai al contenuto</a>

  <header class="site-nav" id="site-nav">
    <div class="wrap">
      <a class="brand" href="<?= $home ?>#top"><img src="img/logo.svg" alt="" width="34" height="34">Morrolinux</a>

      <button class="nav-toggle" type="button" aria-controls="nav-links" aria-expanded="false" aria-label="Apri il menu">
        <?= icon('menu', 22) ?>
      </button>

      <nav aria-label="Principale">
        <ul class="nav-links" id="nav-links">
          <li><a href="<?= $home ?>#corsi">Corsi</a></li>
          <li><a href="<?= $home ?>#progetti">Progetti</a></li>
          <li><a href="<?= $home ?>#sostieni">Sostieni</a></li>
          <li><a href="<?= $home ?>#about">Chi sono</a></li>
        </ul>
      </nav>
    </div>
  </header>
