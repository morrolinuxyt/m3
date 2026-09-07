<!DOCTYPE html>
<!--
NAME: Morrolinux.it Website
AUTHOR: Riccardo Carissimi
-->

<html lang="it" class="theme-auto">

<head>

  <script defer src="https://analytics.morrolinux.it/script.js" data-website-id="61bc9268-b5c3-4410-b0d0-2fed3888e9c9"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="favicon.ico" />

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <!-- <meta name="description" content=""> -->

  <title>Morrolinux.it</title>

<?php include 'snippets/theme-init.php';?>
</head>

<body id="page-top">

  <?php
    $DPCM = $essentials = $e101 = $e102 = $networking101 = "";

    if (file_exists('udemy_coupons.json')){
      $show_promo = true;
    } else {
      $show_promo = false;
    }
      $show_promo = false; // TODO: decide weather or not to show the promo banner.

    # $video_link = "https://www.youtube-nocookie.com/embed/videoseries?list=UUnDDucQDLncrauOCmanCIgw";
    $video_link = "https://www.youtube-nocookie.com/embed/videoseries?list=PL4L8OWDC99_cNe6BI2u_irZTJdydA7GL8";
    if (file_exists('embed-video.txt')) {
      $file = fopen("embed-video.txt", "r") or die("Unable to open file!");
      $video_link = fgets($file);
      fclose($file);
    }
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top header-hide" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger font-weight-light" href="#home"><img src="img/logo.svg" width="35px" height="35px" alt="Logo" /><p>Morrolinux</p></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#corsi">Corsi</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#progetti">Progetti</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#sostieni">Sostieni</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>

<!--
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="https://jobs.morrolinux.it"><mark style="background-color: #FAB803; border-radius: 10%">Jobs</mark></a>
          </li>
-->
        </ul>
      </div>
    </div>
  </nav>

<?php include 'snippets/theme-toggle.php';?>

  <!-- #HOME -->
  <section id="home">
    <div class="container mt-5">
      <div class="row align-items-center">
        <div class="yt_video w-100">
          <iframe src="<?php echo $video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <?php if($show_promo){ ?>
          <a id="promo" class="js-scroll-trigger banner" href="#corsi"><div> Offerta a tempo limitato!<br>Tutti i corsi in <b>offerta speciale</b> al 93% di sconto <br><img src="img/right-arrow.svg"/> Clicca qui <img src="img/left-arrow.svg"/></div></a>
	<?php } ?>

        <div class="container mt-5">
          <p class="mb-0 text-center">
    	  <b>Mi segui su YouTube?</b><br>Grazie per il supporto!
          </p>
          <a id="coupon" class="js-scroll-trigger banner" href="https://requests.morrolinux.it/form/lpi-coupon"><div><b>Reclama il tuo COUPON </b><br>per ricevere uno sconto sul prezzo di tutti gli esami LPI.</div></a>
        </div>

      </div>

    </div>
  </section>

  <div class="container">
    <div class="divider"></div>
  </div>

  <!-- #CORSI -->
  <section id="corsi">
    <div class="container">
      <h2 class="section-title">Corsi</h2>

      <p class="section-lead text-center">
        Pubblico video su GNU/Linux ed il panorama del Free Software dal 2008.
        Negli ultimi <?php echo date('Y')-2008;?> anni ho realizzato <i>oltre 500 contenuti video a tema didattico</i>
        ed erogato numerosi corsi di formazione professionale.<br>
        Dal 2018 realizzo anche <b>corsi online</b> consultabili <i>on-demand</i>, per diversi livelli ed aree di competenza:
      </p>

      <?php
        /* Il catalogo è passato da quattro corsi a cinque: in verticale la
           quinta colonna sarebbe stata larga un francobollo, quindi le schede
           sono orizzontali come nella index di corsolinux.com — copertina a
           sinistra, testo e pulsante a destra, una per riga.
           Le schede NON sono più avvolte in <a class="invisible-link">: quella
           ancora ne conteneva un'altra (il pulsante) e l'HTML non ammette
           ancore annidate; il parser lasciava in pagina copie vuote che
           rompevano la griglia. Restano gli eventi Umami dei pulsanti, così le
           serie già raccolte non si spezzano. */
      ?>
      <div class="card-list">

        <div class="card card-h">
          <span class="card-badge">Novità</span>
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/kubernetes-per-comuni-mortali-notext.png" class="card-img" alt="Copertina corso Kubernetes Per Comuni Mortali" title="Kubernetes Per Comuni Mortali">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column">
                <h3 class="card-title">Kubernetes</h3>
                <p class="card-text">
                  Per chi conosce già <b>Docker</b> e vuole fare il salto all'<b>orchestrazione</b>: dal primo <i>Pod</i>
                  al cluster <i>k3s</i>, con TLS automatico, storage persistente e Helm.<br><br>
                  Ogni lezione è costruita intorno a un <b>mini progetto funzionante</b> che potrai replicare nel tuo
                  <i>homelab</i> o in azienda.
                </p>
                <div class="card-actions mt-auto">
                  <a data-umami-event="link_kubernetes" title="Corso Kubernetes" href="https://corsolinux.com/kubernetes" class="btn btn-primary">Informazioni sul corso</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-h">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/proxmox-per-comuni-mortali-notext.png" class="card-img" alt="Copertina corso Proxmox Per Comuni Mortali" title="Proxmox Per Comuni Mortali">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column">
                <h3 class="card-title">Proxmox</h3>
                <p class="card-text">
                  Questo corso adatto a tutti ti guiderà passo passo nella <b>gestione di una infrastruttura IT</b>,
                  dal semplice <i>nodo singolo</i> al <i>cluster iperconvergente</i> in Alta Disponibilità.<br><br>
                  Una risorsa indispensabile per mettere in produzione servizi in modo <b>sicuro e affidabile</b>
                  sulla tua infrastruttura.
                </p>
                <div class="card-actions mt-auto">
                  <a data-umami-event="link_proxmox" title="Corso Proxmox" href="https://corsolinux.com/proxmox" class="btn btn-primary">Informazioni sul corso</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-h">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/docker-per-comuni-mortali-notext.png" class="card-img" alt="Copertina corso Docker Per Comuni Mortali" title="Docker Per Comuni Mortali">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column">
                <h3 class="card-title">Docker</h3>
                <p class="card-text">
                  Questo corso si rivolge a chi ha <b>poca o nessuna esperienza</b> e vuole imparare con un approccio
                  pratico e stimolante.<br><br>
                  Al termine, sarai in grado di <b>gestire i tuoi servizi su Docker</b>, risolvere problemi in autonomia
                  e <b>containerizzare nuove App</b>.
                </p>
                <div class="card-actions mt-auto">
                  <a data-umami-event="link_docker" title="Corso Docker" href="https://corsolinux.com/docker" class="btn btn-primary">Informazioni sul corso</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-h">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/corso-linux.jpg" class="card-img" alt="Copertina corsi Linux" title="Corsi Linux e certificazioni LPI">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column">
                <h3 class="card-title">Linux</h3>
                <p class="card-text">
                  Qui imparerai tutto ciò che c'è da sapere su <i>GNU/Linux</i> ed il suo ecosistema, tramite
                  <b>spiegazioni chiare</b> ed esempi concreti di utilizzo.<br><br>
                  Al termine, potrai anche <b>certificare le tue competenze</b> in ambito professionale con il
                  percorso LPI.
                </p>
                <div class="card-actions mt-auto">
                  <a data-umami-event="link_corsolinux" title="Corso linux" href="https://corsolinux.com/" class="btn btn-primary">Confronta i corsi Linux</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-h">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/corso-networking.jpg" class="card-img" alt="Copertina corso Networking" title="Corso Networking">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column">
                <h3 class="card-title">Networking</h3>
                <p class="card-text">
                  Ho ideato questo corso introduttivo per guidarti in una panoramica sul mondo del Networking.<br><br>
                  Non mancheranno importanti cenni sulla <b>sicurezza informatica</b>, troppo spesso "ignorati" nei
                  corsi base di Networking.
                </p>
                <div class="card-actions mt-auto">
                  <a data-umami-event="link_corsoreti" title="Corso networking" href="https://corsoreti.it/" class="btn btn-primary">Informazioni sul corso</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="container">
    <div class="divider"></div>
  </div>

  <!-- #PROGETTI -->
  <section id="progetti">
    <div class="container">
      <h2 class="section-title">Progetti Open Source</h2>
      <!-- <p class="mb-5 text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et netus et malesuada fames.
      </p> -->

      <div class="row tiles">

        <div class="col-md-6 col-lg-3 mb-4">
          <a class="invisible-link" href="https://github.com/morrolinux/mpradio" target="_blank">
            <div class="project">
              <img src="img/fluid/radio.svg" alt="img">
              <h4>Mpradio</h4>
              <p>Trasforma il tuo Raspberry Pi in una emittente radio FM in grado di trasmettere musica dallo smartphone via Bluetooth!</p>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <a class="invisible-link" href="https://www.youtube.com/watch?v=H9IvFkqy-rc&list=PL4L8OWDC99_dK0kkfVB0dvsVYV3Iz7qMQ" target="_blank">
            <div class="project">
              <img src="img/fluid/distributed.svg" alt="img">
              <h4>Olive distributed</h4>
              <p>Olive è un video editor Open Source per GNU/Linux. Ho realizzato una render farm per l'esportazione distribuita dei video.</p>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <a class="invisible-link" href="https://youtu.be/sacjogF_8ag?list=UUnDDucQDLncrauOCmanCIgw" target="_blank">
            <div class="project">
              <img src="img/fluid/sound.svg" alt="img">
              <h4>Simple ehm</h4>
              <p>Un semplice strumento per rimuovere automaticamente "ehm" e silenzi da video e discorsi pre-registrati</p>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <a class="invisible-link" href="https://www.youtube.com/watch?v=Zt7O5WLnAYc" target="_blank">
            <div class="project">
              <img src="img/fluid/ChimeraDesk.svg" alt="img">
              <h4>ChimeraDesk</h4>
              <p>Un software di desktop remoto ad alte prestazioni progettato per essere semplice e modulare.</p>
            </div>
          </a>
        </div>

      </div>

      <p class="mb-5 text-center">
      </p>

    </div>
  </section>

  <div class="container">
    <div class="divider"></div>
  </div>


  <!-- #CONTRIBUTI -->
  <section id="contributi">
    <div class="container">
      <h2 class="section-title">Contributi a progetti Open Source</h2>
      <!-- <p class="mb-5 text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et netus et malesuada fames.
      </p> -->

      <div class="row tiles">

        <div class="col-md-6 col-lg-4 mb-4">
          <a class="invisible-link" href="https://www.youtube.com/watch?v=3MRYf2OKddc" target="_blank">
            <div class="project">
              <img src="img/fluid/clapperboard.svg" alt="img">
              <h4>Taglio automatico dei silenzi</h4>
              <p>Tramite questo contributo ad Olive video editor, è ora possibile tagliare automaticamente i silenzi in una traccia.</p>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
          <a class="invisible-link" href="https://www.youtube.com/watch?v=BB8LFZtSc1g" target="_blank">
            <div class="project">
              <img src="img/fluid/writing.svg" alt="img">
              <h4>Appunti riascoltabili</h4>
              <p>5 novembre 2018: Pubblicato il primo prototipo della celebre funzionalità di OneNote ora integrata nel software GPL Xournal++</p>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
          <a class="invisible-link" href="https://youtu.be/qJVSuxNIfI4?t=763" target="_blank">
            <div class="project">
              <img src="img/fluid/dash2.svg" alt="img">
              <h4>i3expo-ng</h4>
              <p>Un semplice tool per replicare l'effetto Exposé di MacOS su i3 WM (Linux). Questo fork introduce numerose funzionalità, come descritto sul repo github.</p>
            </div>
          </a>
        </div>

      </div>

    </div>

      <p class="section-note text-center mt-5">
	       Scopri tutti i progetti sulla <a href="https://www.youtube.com/watch?v=K1szAL6MKWc&list=PL4L8OWDC99_cgzlY5-vcWbC2LIqNmMbOo">playlist di YouTube</a><br>
	       Esplora il codice sul mio <a href="https://github.com/morrolinux?tab=repositories">profilo GitHub</a>
      </p>

  </section>


  <div class="container">
    <div class="divider"></div>
  </div>

  <!-- #SOSTIENI -->
  <section id="sostieni">
    <div class="container">
      <h2 class="section-title">Sostieni</h2>
      <p class="section-lead text-center">
        "Morrolinux" è un progetto di <strong>divulgazione del software libero</strong> da oltre 15 anni.<br />
	  Realizzare contenuti didattici di qualità richiede un impegno costante e continuativo. <br>
	Per mantenere il progetto attivo e la divulgazione dei contenuti gratuita, servono aiuti e fondi.<br />
          Ecco alcuni modi con cui puoi <strong>realmente</strong> contribuire al progetto
      </p>

      <div class="row tiles">

        <div class="col-md-6 col-lg-3 mb-4">
          <div class="text-column">
            <img src="img/fluid/youtube.svg" alt="img">
            <h4>Su YouTube</h4>
            <p>
              - Iscrivendoti al canale<br />
              - Disattivando eventuali <strong>AdBlock</strong> sul mio canale<br />
              - Lasciando like e commenti ai video<br />
              - Condividendo i contenuti<br />
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <div class="text-column">
            <img src="img/fluid/amazon.svg" alt="img">
            <h4>Su Amazon</h4>
            <p>
          		Accedendo al sito tramite il mio link: <a href="http://amzn.to/2AC0a6Q" target="_blank">http://amzn.to/2AC0a6Q</a><br />
          		- Amazon mi devolverà il 5% del suo ricavato sulla tua spesa<br />
          		- Zero costi aggiuntivi per te<br />
          		- Totale sicurezza negli acquisti e tutela della tua privacy<br /><br />
          		Per sapere di più: <a href="https://programma-affiliazione.amazon.it" target="_blank">programma di affiliazione Amazon</a><br />
        	  </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <div class="text-column">
            <img src="img/fluid/share.svg" alt="img">
            <h4>Sui social</h4>
            <p>
              - Citandomi su <a href="https://www.linkedin.com/in/morenorazzoli" target="blank_">LinkedIn</a><br />
              - Seguendomi su <a href="https://twitter.com/morrolinux" target="blank_">Twitter</a><br />
              - Stellandomi su <a href="https://github.com/morrolinux" target="blank_">GitHub</a><br />
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
          <div class="text-column">
            <img src="img/fluid/patreon.png" alt="img">
            <h4>Su Patreon</h4>
            <p>
 		Qui potrai curiosare <b>dietro le quinte</b> con video in anteprima e aggiornamenti "in tempo reale" su quello che sto preparando. Inoltre avrai la possibilità di vedere <b>il tuo nome nella sigla</b> dei miei video, partecipare alle <b>votazioni</b> esclusive sui contenuti e accedere a <b>contenuti esclusivi</b> non pubblicabili su YouTube.
            </p>
            <a title="Sostieni" href="https://www.patreon.com/Morrolinux" class="btn btn-primary mt-auto" target="_blank">Sostieni</a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <div class="container">
    <div class="divider"></div>
  </div>

  <!-- #ABOUT -->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="section-title">About me<br>
            <a class="mx-2" href="https://www.facebook.com/MorrolinuxOfficial/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true" style="color:#3c5a99;"></i></a>
            <a class="mx-2" href="https://twitter.com/morrolinux/" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true" style="color:#00acee;"></i></a>
            <a class="mx-2" href="https://telegram.me/morrolinux_feed" target="_blank"><i class="fa fa-comment" aria-hidden="true" style="color:#0088cc;"></i></a>
          </h2>
          <img class="avatar float-left rounded-circle mr-4" src="img/moreno.jpg" alt="Moreno Razzoli" title="Moreno Razzoli">
          <p>
                        Mi chiamo <b>Moreno Razzoli</b>,<br>
                        Sono laureato in Scienze Informatiche, ho conseguito le certificazioni Linux <b>LPI</b>, <b>CompTIA Linux+</b> e <b>Suse CLA</b>,
                        ho realizzato diversi <a href="https://morrolinux.it#progetti">progetti Open Source</a>,
                        contribuito allo sviluppo di nuove funzionalità in altrettanti progetti già avviati e
                        realizzo <b>video didattici dal 2008</b> su <a href="https://www.youtube.com/user/morrolinux/">YouTube</a> e sul
                        mio <a href="https://morrolinux.it"> sito ufficiale.</a><br><br>
          </p>

          <!-- <p>
          Effettivamente non avevo mai pensato a quanto potesse essere imbarazzante scriversi la propria pagina di “Chi sono”.<br /><br />
          Ebbene mi chiamo Moreno Razzoli, ho studiato Computer Science (Informatica) e sono appassionato di GNU/Linux e soluzioni Open Source, di cui parlo spesso sul mio canale YouTube
          anche se non mi piace definirmi “uno youtuber“: tutto ciò che faccio è condividere reciprocamente entusiasmo e scoperte con una comunità (sempre in crescita!)
          di appassionati e professionisti del settore.<br />
          Nella vita sono un System Administrator sempre alla ricerca di nuovi stimoli, ragione per la quale ho conseguito la certificazione LPI assieme ad un continuo lavoro di ricerca delle nuove tecnologie ed opportunità del settore.
          </p> -->
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container footer">
      <p class="m-0 text-center text-white">
        Made with ❤️ by <a href="https://github.com/r-carissimi" target="_blank">Riccardo Carissimi</a><br>
      <a style="opacity:0.5;color:white;" href="http://www.freepik.com/" title="Freepik">Icons made by Freepik</a> <a style="opacity:0.5;color:white;" href="https://www.flaticon.com/" title="Flaticon">from www.flaticon.com</a><br>
        <br>
        <a class="mx-2" href="https://github.com/morrolinux" target="_blank"><i class="fa fa-github-square" aria-hidden="true"></i></a>
        <a class="mx-2" href="https://www.facebook.com/MorrolinuxOfficial/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a class="mx-2" href="https://twitter.com/morrolinux/" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a class="mx-2" href="https://www.youtube.com/user/morrolinux/" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
      <br>
      <a class="mx-2" rel="me" href="https://mastodon.uno/@morrolinux" target="_blank"></a> <!-- TODO: insert fa-mastodon-square icon -->
      <br>
      <a style="opacity:0.5;color:white;" >Moreno Razzoli<br>P.IVA IT04063670360</a> <br>
      <a style="opacity:0.5;color:white;" target="_blank" href="http://morrolinux.it/privacy_policy" title="Privacy Policy">Privacy Policy</a> 
      <br>
      </p>

    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/jquery.fitvids.js"></script>

  <!-- Custom JavaScript -->
  <script src="js/script.js"></script>
  <script src="js/theme.js"></script>


</body>

</html>
