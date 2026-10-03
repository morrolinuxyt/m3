<!DOCTYPE html>
<!--
NAME: Morrolinux.it Website
AUTHOR: Riccardo Carissimi
-->
<?php
  // Banner promo: TODO decidere se mostrarlo quando esiste udemy_coupons.json
  $show_promo = false;

  // Il video in apertura si può cambiare senza toccare il codice: basta un
  // embed-video.txt con l'URL di embed nella root del sito.
  $video_link = "https://www.youtube-nocookie.com/embed/videoseries?list=PL4L8OWDC99_cNe6BI2u_irZTJdydA7GL8";
  if (is_readable('embed-video.txt')) {
    $custom = trim(file_get_contents('embed-video.txt'));
    if ($custom !== '') $video_link = $custom;
  }

  $years = date('Y') - 2008;
  $home = '';
?>
<html lang="it" class="theme-auto">
<head>
<?php include 'snippets/head.php'; ?>
</head>

<body id="top">

<?php include 'snippets/nav.php'; ?>

  <main id="main">

    <!-- #HOME -->
    <section class="hero">
      <div class="wrap">
        <div class="hero-grid">
          <div>
            <h1>GNU/Linux e Software Libero, <span class="marker">spiegati bene</span></h1>
            <p>
              Pubblico video su GNU/Linux ed il panorama del Free Software dal 2008.
              Negli ultimi <?= $years ?> anni ho realizzato <b>oltre 500 contenuti video</b> a tema didattico
              ed erogato numerosi corsi di formazione professionale.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="https://www.youtube.com/user/morrolinux/?sub_confirmation=1" target="_blank" rel="noopener" data-umami-event="hero_youtube"><?= icon('youtube', 18) ?> Iscriviti al canale</a>
              <a href="#corsi">Oppure guarda i corsi</a>
            </div>
          </div>

          <div class="video">
            <iframe src="<?= htmlspecialchars($video_link) ?>" title="Ultimi video di Morrolinux" loading="lazy" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>

        <?php if ($show_promo) { ?>
        <a id="promo" class="callout callout--promo" href="#corsi">
          <span class="callout-icon"><?= icon('ticket', 26) ?></span>
          <span class="callout-text"><strong>Offerta a tempo limitato!</strong>Tutti i corsi in offerta speciale al 93% di sconto.</span>
          <span class="callout-arrow"><?= icon('arrow') ?></span>
        </a>
        <?php } ?>

        <a id="coupon" class="callout" href="https://requests.morrolinux.it/form/lpi-coupon" data-umami-event="lpi_coupon">
          <span class="callout-icon"><?= icon('ticket', 26) ?></span>
          <span class="callout-text"><strong>Mi segui su YouTube? Grazie per il supporto!</strong>Reclama il tuo coupon per ricevere uno sconto sul prezzo di tutti gli esami LPI.</span>
          <span class="callout-arrow"><?= icon('arrow') ?></span>
        </a>
      </div>
    </section>

    <!-- #CORSI -->
    <section id="corsi" class="section section--alt">
      <div class="wrap">
        <h2>Corsi</h2>
        <p class="claim">
          Dal 2018 realizzo anche <b>corsi online</b> consultabili <i>on-demand</i>,<br>
          per diversi livelli ed aree di competenza.
        </p>

        <?php
          /* Le schede non sono avvolte in un <a>: l'HTML non ammette ancore
             annidate. A rendere cliccabile tutta la scheda ci pensa il ::after
             del pulsante (vedi .course .btn). Gli eventi Umami restano quelli di
             prima, così le serie già raccolte non si spezzano. */
          $courses = [
            ['Kubernetes', 'img/kubernetes-per-comuni-mortali-notext.webp', 'Kubernetes Per Comuni Mortali',
             'Per chi conosce già <b>Docker</b> e vuole fare il salto all\'<b>orchestrazione</b>: dal primo <i>Pod</i> al cluster <i>k3s</i>, un <b>mini progetto funzionante</b> alla volta.',
             'https://corsolinux.com/kubernetes', 'link_kubernetes', 'Informazioni sul corso', true],
            ['Proxmox', 'img/proxmox-per-comuni-mortali-notext.webp', 'Proxmox Per Comuni Mortali',
             'Dal semplice <i>nodo singolo</i> al <i>cluster iperconvergente</i> in Alta Disponibilità: la <b>gestione di una infrastruttura IT</b> alla portata di tutti.',
             'https://corsolinux.com/proxmox', 'link_proxmox', 'Informazioni sul corso', false],
            ['Docker', 'img/docker-per-comuni-mortali-notext.webp', 'Docker Per Comuni Mortali',
             'Per chi ha <b>poca o nessuna esperienza</b>: al termine saprai <b>gestire i tuoi servizi su Docker</b> e containerizzare nuove App in autonomia.',
             'https://corsolinux.com/docker', 'link_docker', 'Informazioni sul corso', false],
            ['Linux', 'img/corso-linux.jpg', 'Corsi Linux e certificazioni LPI',
             'Tutto ciò che c\'è da sapere su <i>GNU/Linux</i> e il suo ecosistema, fino a <b>certificare le tue competenze</b> con il percorso LPI.',
             'https://corsolinux.com/', 'link_corsolinux', 'Confronta i corsi Linux', false],
            ['Networking', 'img/corso-networking.jpg', 'Corso Networking',
             'Una panoramica sul mondo del Networking, con quei cenni di <b>sicurezza informatica</b> troppo spesso "ignorati" nei corsi base.',
             'https://corsoreti.it/', 'link_corsoreti', 'Informazioni sul corso', false],
          ];
        ?>
        <div class="courses">
          <?php foreach ($courses as [$name, $img, $alt, $text, $url, $event, $cta, $new]) { ?>
          <article class="card course<?= $new ? ' course--featured' : '' ?>">
            <div class="course-cover">
              <img src="<?= $img ?>" alt="Copertina: <?= $alt ?>" width="960" height="540" loading="lazy">
            </div>
            <div class="course-body">
              <h3><?= $name ?><?php if ($new) { ?> <span class="new">Novità</span><?php } ?></h3>
              <p><?= $text ?></p>
              <a class="btn btn-primary" href="<?= $url ?>" data-umami-event="<?= $event ?>"><?= $cta ?></a>
            </div>
          </article>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- #PROGETTI -->
    <section id="progetti" class="section">
      <div class="wrap">
        <h2>Progetti Open Source</h2>

        <?php
          $projects = [
            ['radio', 'Mpradio', 'Trasforma il tuo Raspberry Pi in una emittente radio FM, con la musica in streaming via Bluetooth.', 'https://github.com/morrolinux/mpradio'],
            ['distributed', 'Olive distributed', 'Una render farm per l\'esportazione distribuita dei video con Olive, il video editor Open Source.', 'https://www.youtube.com/watch?v=H9IvFkqy-rc&list=PL4L8OWDC99_dK0kkfVB0dvsVYV3Iz7qMQ'],
            ['sound', 'Simple ehm', 'Rimuove automaticamente "ehm" e silenzi da video e discorsi pre-registrati.', 'https://youtu.be/sacjogF_8ag?list=UUnDDucQDLncrauOCmanCIgw'],
            ['ChimeraDesk', 'ChimeraDesk', 'Un software di desktop remoto ad alte prestazioni, semplice e modulare.', 'https://www.youtube.com/watch?v=Zt7O5WLnAYc'],
          ];
          $contributions = [
            ['clapperboard', 'Taglio automatico dei silenzi', 'Un contributo a Olive video editor: ora i silenzi di una traccia si tagliano da soli.', 'https://www.youtube.com/watch?v=3MRYf2OKddc'],
            ['writing', 'Appunti riascoltabili', 'Il primo prototipo (2018) della celebre funzionalità di OneNote, oggi integrata in Xournal++.', 'https://www.youtube.com/watch?v=BB8LFZtSc1g'],
            ['dash2', 'i3expo-ng', 'L\'effetto Exposé di macOS su i3 WM: questo fork introduce numerose funzionalità in più.', 'https://youtu.be/qJVSuxNIfI4?t=763'],
          ];

          // in fondo a ogni voce si legge dove porta: codice o video
          function dest($url) {
            return strpos($url, 'github.com') !== false
              ? icon('github', 16).' Codice su GitHub'.icon('arrow', 16)
              : icon('youtube', 16).' Guarda il video'.icon('arrow', 16);
          }
        ?>

        <div class="projects">
          <?php foreach ($projects as [$icon, $title, $text, $url]) { ?>
          <a class="card project" href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener">
            <img src="img/fluid/<?= $icon ?>.svg" alt="" width="64" height="64" loading="lazy">
            <h4><?= $title ?></h4>
            <p><?= $text ?></p>
            <span class="project-dest"><?= dest($url) ?></span>
          </a>
          <?php } ?>
        </div>

        <h3 class="sub">Contributi a progetti Open Source</h3>

        <ul class="contribs">
          <?php foreach ($contributions as [$icon, $title, $text, $url]) { ?>
          <li>
            <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener">
              <img src="img/fluid/<?= $icon ?>.svg" alt="" width="36" height="36" loading="lazy">
              <div><h4><?= $title ?></h4><p><?= $text ?></p></div>
              <span class="project-dest"><?= dest($url) ?></span>
            </a>
          </li>
          <?php } ?>
        </ul>

        <p class="more">
          Scopri tutti i progetti sulla <a href="https://www.youtube.com/watch?v=K1szAL6MKWc&list=PL4L8OWDC99_cgzlY5-vcWbC2LIqNmMbOo" target="_blank" rel="noopener">playlist di YouTube</a>
          ed esplora il codice sul mio <a href="https://github.com/morrolinux?tab=repositories" target="_blank" rel="noopener">profilo GitHub</a>.
        </p>
      </div>
    </section>

    <!-- #SOSTIENI -->
    <section id="sostieni" class="section section--alt">
      <div class="wrap">
        <h2>Sostieni</h2>
        <p class="claim">
          "Morrolinux" è un progetto di <span class="marker">divulgazione del software libero</span> da oltre <?= $years ?> anni.
        </p>
        <p class="note">
          Realizzare contenuti didattici di qualità richiede un impegno costante e continuativo.
          Per mantenere il progetto attivo e la divulgazione dei contenuti gratuita, servono aiuti e fondi.
          Ecco alcuni modi con cui puoi <strong>realmente</strong> contribuire al progetto:
        </p>

        <div class="support">
          <div class="card way way--featured">
            <div class="way-body">
              <div class="way-head"><img src="img/fluid/patreon.png" alt="" width="44" height="44" loading="lazy"><h4>Su Patreon</h4></div>
              <p>
                Curiosa <b>dietro le quinte</b> con i video in anteprima, partecipa alle <b>votazioni</b> sui prossimi contenuti,
                vedi <b>il tuo nome nella sigla</b> e accedi a <b>contenuti esclusivi</b> non pubblicabili su YouTube.
              </p>
              <div class="way-action">
                <a class="btn btn-accent" href="https://www.patreon.com/Morrolinux" target="_blank" rel="noopener" data-umami-event="patreon"><?= icon('heart', 18) ?> Sostienimi su Patreon</a>
              </div>
            </div>
          </div>

          <div class="card way">
            <div class="way-body">
              <div class="way-head"><img src="img/fluid/youtube.svg" alt="" width="32" height="32" loading="lazy"><h4>Su YouTube</h4></div>
              <ul class="bullet-list">
                <li>Iscrivendoti al canale</li>
                <li>Disattivando eventuali <strong>AdBlock</strong> sul mio canale</li>
                <li>Lasciando like e commenti ai video</li>
                <li>Condividendo i contenuti</li>
              </ul>
              <div class="way-action">
                <a class="btn btn-ghost" href="https://www.youtube.com/user/morrolinux/?sub_confirmation=1" target="_blank" rel="noopener">Vai al canale</a>
              </div>
            </div>
          </div>

          <div class="card way">
            <div class="way-body">
              <div class="way-head"><img src="img/fluid/amazon.svg" alt="" width="32" height="32" loading="lazy"><h4>Su Amazon</h4></div>
              <p>Accedendo al sito tramite il mio link:</p>
              <ul class="bullet-list">
                <li>Amazon mi devolve il 5% del suo ricavato</li>
                <li>Zero costi aggiuntivi per te</li>
                <li>Stessa sicurezza e tutela negli acquisti</li>
              </ul>
              <p><a href="https://programma-affiliazione.amazon.it" target="_blank" rel="noopener">Come funziona l'affiliazione</a></p>
              <div class="way-action">
                <a class="btn btn-ghost" href="http://amzn.to/2AC0a6Q" target="_blank" rel="noopener" data-umami-event="amazon">Apri Amazon</a>
              </div>
            </div>
          </div>

          <div class="card way">
            <div class="way-body">
              <div class="way-head"><img src="img/fluid/share.svg" alt="" width="32" height="32" loading="lazy"><h4>Sui social</h4></div>
              <ul class="bullet-list">
                <li>Citandomi su LinkedIn</li>
                <li>Seguendomi su Mastodon e X</li>
                <li>Stellandomi su GitHub</li>
              </ul>
              <div class="way-action">
                <?= socials(array_filter($SOCIALS, fn($s) => in_array($s[0], ['linkedin', 'mastodon', 'x', 'github']))) ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- #ABOUT -->
    <section id="about" class="section">
      <div class="wrap">
        <div class="about">
          <img class="avatar" src="img/moreno.webp" alt="Moreno Razzoli" width="220" height="220" loading="lazy">
          <div>
            <h2>Moreno Razzoli</h2>
            <p>
              Sono laureato in Scienze Informatiche e realizzo <b>video didattici dal 2008</b> su
              <a href="https://www.youtube.com/user/morrolinux/" target="_blank" rel="noopener">YouTube</a>.
              Ho sviluppato diversi <a href="#progetti">progetti Open Source</a> e contribuito con nuove
              funzionalità ad altrettanti progetti già avviati.
            </p>
            <ul class="chips" aria-label="Certificazioni">
              <li>LPI</li>
              <li>CompTIA Linux+</li>
              <li>SUSE CLA</li>
            </ul>
            <?= socials($SOCIALS) ?>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php include 'snippets/footer.php'; ?>

</body>
</html>
