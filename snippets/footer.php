  <footer class="site-footer">
    <div class="wrap">
      <div class="footer-top">
        <div>
          <a class="brand" href="/"><img src="img/logo.svg" alt="" width="34" height="34">Morrolinux</a>
          <p>Divulgazione di GNU/Linux e del Software Libero dal 2008.</p>
        </div>
        <?= socials($SOCIALS) ?>
      </div>

      <div class="footer-bottom">
        <p>© <?= date('Y') ?> Moreno Razzoli · P.IVA IT04063670360 · <a href="/privacy_policy">Privacy Policy</a></p>
        <p class="credits">
          Sito di <a href="https://github.com/r-carissimi" target="_blank" rel="noopener">Riccardo Carissimi</a> ·
          Icone di <a href="https://www.freepik.com/" target="_blank" rel="noopener">Freepik</a> da <a href="https://www.flaticon.com/" target="_blank" rel="noopener">Flaticon</a>
        </p>
      </div>
    </div>
  </footer>

<?php include __DIR__ . '/theme-toggle.php'; ?>

  <script src="js/site.js" defer></script>
