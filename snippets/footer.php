<?php $home = $home ?? '/'; ?>
  <footer class="site-footer">
    <div class="wrap">
      <div class="footer-main">
        <div>
          <a class="brand" href="<?= $home ?>#top"><img src="img/logo.svg" alt="" width="32" height="32">Morrolinux</a>
          <?= socials($SOCIALS) ?>
        </div>

        <nav aria-label="Sito">
          <h5>Il sito</h5>
          <ul>
            <li><a href="<?= $home ?>#corsi">Corsi</a></li>
            <li><a href="<?= $home ?>#progetti">Progetti</a></li>
            <li><a href="<?= $home ?>#sostieni">Sostieni</a></li>
            <li><a href="<?= $home ?>#about">About me</a></li>
          </ul>
        </nav>

        <nav aria-label="Corsi e servizi">
          <h5>Corsi e servizi</h5>
          <ul>
            <li><a href="https://corsolinux.com/">CorsoLinux.com</a></li>
            <li><a href="https://corsoreti.it/">CorsoReti.it</a></li>
            <li><a href="/coupon_lpi">Coupon esami LPI</a></li>
            <li><a href="https://www.patreon.com/Morrolinux" target="_blank" rel="noopener">Patreon</a></li>
          </ul>
        </nav>
      </div>

      <div class="footer-legal">
        <p>Moreno Razzoli · P.IVA IT04063670360 · <a href="/privacy_policy">Privacy Policy</a></p>
        <p>
          Icone di <a href="https://www.freepik.com/" target="_blank" rel="noopener">Freepik</a> da <a href="https://www.flaticon.com/" target="_blank" rel="noopener">Flaticon</a>
        </p>
      </div>
    </div>
  </footer>

<?php include __DIR__ . '/theme-toggle.php'; ?>

  <script src="js/site.js" defer></script>
