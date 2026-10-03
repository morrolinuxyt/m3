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

    <!-- #HERO -->
    <section class="hero">
      <div class="wrap">
        <div class="hero-grid">
          <div>
            <p class="eyebrow">Divulgazione Open Source dal 2008</p>
            <h1>GNU/Linux e Software Libero, <span class="marker">spiegati bene</span>.</h1>
            <p class="hero-lead">
              Ciao, sono <b>Moreno</b>. Da oltre <?= $years ?> anni realizzo video, corsi e progetti
              Open Source per chi vuole capire davvero come funzionano le cose.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="#corsi">Scopri i corsi <?= icon('arrow', 18) ?></a>
              <a class="btn btn-ghost" href="https://www.youtube.com/user/morrolinux/" target="_blank" rel="noopener" data-umami-event="hero_youtube"><?= icon('youtube', 18) ?> Canale YouTube</a>
            </div>
            <dl class="stats">
              <div><dt>video didattici</dt><dd>500+</dd></div>
              <div><dt>anni su YouTube</dt><dd><?= $years ?></dd></div>
              <div><dt>corsi on-demand</dt><dd>5</dd></div>
            </dl>
          </div>

          <div class="video">
            <iframe src="<?= htmlspecialchars($video_link) ?>" title="Ultimi video di Morrolinux" loading="lazy" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>

        <?php if ($show_promo) { ?>
        <a id="promo" class="callout callout--promo" href="#corsi">
          <span class="callout-icon"><?= icon('ticket', 24) ?></span>
          <span class="callout-text"><strong>Offerta a tempo limitato!</strong>Tutti i corsi in offerta speciale al 93% di sconto.</span>
          <span class="callout-arrow"><?= icon('arrow') ?></span>
        </a>
        <?php } ?>

        <a id="coupon" class="callout" href="https://requests.morrolinux.it/form/lpi-coupon" data-umami-event="lpi_coupon">
          <span class="callout-icon"><?= icon('ticket', 24) ?></span>
          <span class="callout-text"><strong>Mi segui su YouTube? Reclama il tuo coupon LPI</strong>Uno sconto sul prezzo di tutti gli esami di certificazione LPI, grazie per il supporto!</span>
          <span class="callout-arrow"><?= icon('arrow') ?></span>
        </a>
      </div>
    </section>

    <!-- #CORSI -->
    <section id="corsi" class="section section--alt">
      <div class="wrap">
        <div class="section-head">
          <p class="eyebrow">Corsi</p>
          <h2>Impara al tuo ritmo</h2>
          <p>
            Oltre ai video gratuiti, dal 2018 realizzo <b>corsi online on-demand</b> per diversi livelli
            e aree di competenza: dalle basi di Linux all'orchestrazione dei container.
          </p>
        </div>

        <?php
          /* Le schede non sono avvolte in un <a>: contengono già il pulsante e
             l'HTML non ammette ancore annidate. A rendere cliccabile tutta la
             scheda ci pensa il ::after del pulsante (vedi .course .btn).
             Gli eventi Umami restano quelli di prima, così le serie già
             raccolte non si spezzano. */
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
          <article class="course<?= $new ? ' course--featured' : '' ?>">
            <?php if ($new) { ?><span class="badge">Novità</span><?php } ?>
            <div class="course-cover">
              <img src="<?= $img ?>" alt="Copertina: <?= $alt ?>" width="960" height="540" loading="lazy">
            </div>
            <div class="course-body">
              <h3><?= $name ?></h3>
              <p><?= $text ?></p>
              <a class="btn btn-primary btn-sm" href="<?= $url ?>" data-umami-event="<?= $event ?>"><?= $cta ?> <?= icon('arrow', 16) ?></a>
            </div>
          </article>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- #PROGETTI -->
    <section id="progetti" class="section">
      <div class="wrap">
        <div class="section-head">
          <p class="eyebrow">Progetti</p>
          <h2>Codice libero, problemi reali</h2>
          <p>Strumenti nati per risolvere un problema concreto, e rilasciati perché possano servire anche ad altri.</p>
        </div>

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

          function tiles($items) {
            echo '<div class="tiles">';
            foreach ($items as [$icon, $title, $text, $url]) {
              echo '<a class="tile" href="'.htmlspecialchars($url).'" target="_blank" rel="noopener">';
              echo '<img class="tile-icon" src="img/fluid/'.$icon.'.svg" alt="" width="52" height="52" loading="lazy">';
              echo '<span class="tile-ext">'.icon('external', 18).'</span>';
              echo '<h4>'.$title.'</h4><p>'.$text.'</p></a>';
            }
            echo '</div>';
          }
        ?>

        <?php tiles($projects); ?>

        <div class="subhead">
          <h3>Contributi ad altri progetti</h3>
        </div>

        <?php tiles($contributions); ?>

        <div class="more-links">
          <a class="btn btn-ghost" href="https://www.youtube.com/watch?v=K1szAL6MKWc&list=PL4L8OWDC99_cgzlY5-vcWbC2LIqNmMbOo" target="_blank" rel="noopener"><?= icon('youtube', 18) ?> La playlist dei progetti</a>
          <a class="btn btn-ghost" href="https://github.com/morrolinux?tab=repositories" target="_blank" rel="noopener"><?= icon('github', 18) ?> Tutto il codice su GitHub</a>
        </div>
      </div>
    </section>

    <!-- #SOSTIENI -->
    <section id="sostieni" class="section section--alt">
      <div class="wrap">
        <div class="section-head">
          <p class="eyebrow">Sostieni</p>
          <h2>Aiutami a mantenere la divulgazione gratuita</h2>
          <p>
            Morrolinux è un progetto di <strong>divulgazione del software libero</strong> da oltre <?= $years ?> anni.
            Contenuti didattici di qualità richiedono un impegno costante: ecco come puoi
            <strong>davvero</strong> dare una mano.
          </p>
        </div>

        <div class="tiles">
          <div class="tile tile--featured">
            <img class="tile-icon" src="img/fluid/patreon.png" alt="" width="52" height="52" loading="lazy">
            <h4>Su Patreon</h4>
            <p>
              Curiosa <b>dietro le quinte</b> con i video in anteprima, partecipa alle <b>votazioni</b> sui prossimi
              contenuti, vedi <b>il tuo nome nella sigla</b> e accedi a <b>contenuti esclusivi</b>.
            </p>
            <a class="btn btn-primary btn-sm" href="https://www.patreon.com/Morrolinux" target="_blank" rel="noopener" data-umami-event="patreon"><?= icon('heart', 16) ?> Diventa sostenitore</a>
          </div>

          <div class="tile">
            <img class="tile-icon" src="img/fluid/youtube.svg" alt="" width="52" height="52" loading="lazy">
            <h4>Su YouTube</h4>
            <ul class="bullet-list">
              <li>Iscrivendoti al canale</li>
              <li>Disattivando eventuali <strong>AdBlock</strong> sul mio canale</li>
              <li>Lasciando like e commenti ai video</li>
              <li>Condividendo i contenuti</li>
            </ul>
          </div>

          <div class="tile">
            <img class="tile-icon" src="img/fluid/amazon.svg" alt="" width="52" height="52" loading="lazy">
            <h4>Su Amazon</h4>
            <p>Accedendo al sito tramite <a href="http://amzn.to/2AC0a6Q" target="_blank" rel="noopener">il mio link</a>:</p>
            <ul class="bullet-list">
              <li>Amazon mi devolve il 5% del suo ricavato</li>
              <li>Zero costi aggiuntivi per te</li>
              <li>Stessa sicurezza e tutela negli acquisti</li>
            </ul>
            <p><a href="https://programma-affiliazione.amazon.it" target="_blank" rel="noopener">Come funziona l'affiliazione</a></p>
          </div>

          <div class="tile">
            <img class="tile-icon" src="img/fluid/share.svg" alt="" width="52" height="52" loading="lazy">
            <h4>Sui social</h4>
            <ul class="bullet-list">
              <li>Citandomi su <a href="https://www.linkedin.com/in/morenorazzoli" target="_blank" rel="noopener">LinkedIn</a></li>
              <li>Seguendomi su <a href="https://mastodon.uno/@morrolinux" target="_blank" rel="me noopener">Mastodon</a> e <a href="https://x.com/morrolinux" target="_blank" rel="noopener">X</a></li>
              <li>Mettendo una stella ai progetti su <a href="https://github.com/morrolinux" target="_blank" rel="noopener">GitHub</a></li>
            </ul>
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
            <p class="eyebrow">Chi sono</p>
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
