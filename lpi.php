<!DOCTYPE html>
<!--
NAME: Morrolinux.it Website
AUTHOR: Riccardo Carissimi
-->

<html lang="it">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="favicon.ico" />

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet">

  <!-- <meta name="description" content=""> -->

  <title>LPI :: Morrolinux.it</title>
</head>

<style>
/*FAQ courtesy of https://codepen.io/moso/pen/vKGxMx?editors=1100*/
.faq-nav {
  flex-direction: column;
  margin: 0 0 32px;
  border-radius: 2px;
  border: 1px solid #ddd;
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
.faq-nav .nav-link {
  position: relative;
  display: block;
  margin: 0;
  padding: 13px 16px;
  background-color: #fff;
  border: 0;
  border-bottom: 1px solid #ddd;
  border-radius: 0;
  color: #616161;
  transition: background-color .2s ease;
}
.faq-nav .nav-link:hover {
  background-color: #f6f6f6;
}
.faq-nav .nav-link.active {
  background-color: #f6f6f6;
  font-weight: 700;
  color: rgba(0, 0, 0, 0.87);
}
.faq-nav .nav-link:last-of-type {
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px;
  border-bottom: 0;
}
.faq-nav .nav-link i.mdi {
  margin-right: 5px;
  font-size: 18px;
  position: relative;
}

.tab-content {
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
.tab-content .card {
  border-radius: 0;
}
.tab-content .card-header {
  padding: 15px 16px;
  border-radius: 0;
  background-color: #f6f6f6;
}
.tab-content .card-header h5 {
  margin: 0;
}
.tab-content .card-header h5 button {
  display: block;
  width: 100%;
  padding: 0;
  border: 0;
  font-weight: 700;
  color: rgba(0, 0, 0, 0.87);
  text-align: left;
  white-space: normal;
  background: none;
}
.tab-content .card-header h5 button:hover, .tab-content .card-header h5 button:focus, .tab-content .card-header h5 button:active, .tab-content .card-header h5 button:hover:active {
  text-decoration: none;
}
.tab-content .card-body p {
  color: #616161;
}
.tab-content .card-body p:last-of-type {
  margin: 0;
}

.accordion > .card:not(:first-child) {
  border-top: 0;
}

.collapse.show .card-body {
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
</style>

<body id="page-top">

  <?php
    $essentials = $e101 = $e102 = $networking101 = "";

    if (file_exists('udemy_coupons.json')){
      $show_promo = true;

      $json_data = file_get_contents('udemy_coupons.json');
      $data = json_decode($json_data, true);

      $essentials = $data["Essentials"];
      $e101 = $data["EXAM 101"];
      $e102 = $data["EXAM 102"];
      $networking101 = $data["Networking 101"];

    } else {
      $show_promo = false;
    }

    if(empty($essentials)){
      $essentials = "https://www.udemy.com/course/impara-linux-da-zero-lpi-linux-essentials/?referralCode=9F2C500B1DC009224ABD";
    }
    if(empty($e101)){
      $e101 = "https://www.udemy.com/course/impara-linux-dalle-basi-alla-certificazione/?referralCode=51B7A99838177C89C187";
    }
    if(empty($e102)){
      $e102 = "https://www.udemy.com/course/impara-linux-dalle-basi-alla-certificazione-lpi-exam-102/?referralCode=7018A3D9DC7C34281A3F";
    }
    if(empty($networking101)){
      $networking101 = "https://www.udemy.com/course/networking-101-corso-di-reti-da-zero/?referralCode=B2B920B2090248291B6B";
    }
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top header-hide" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger font-weight-light" href="index.php#home"><img src="img/logo.svg" width="35px" height="35px" alt="Logo" /><p>Morrolinux</p></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/corsi">Corsi</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/progetti">Progetti</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/sostieni">Sostieni</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/about">About</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- #HOME -->
  <section id="home">
    <div class="container mt-5">
      <div class="row align-items-center">
        <div class="yt_video w-100">
           <iframe src="https://www.youtube-nocookie.com/embed/IpfcahnPknM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br /><br />
        </div>
        <?php if($show_promo){ ?>
          <a class="js-scroll-trigger banner" href="/corsi"><div> Offerta a tempo limitato! Tutti i corsi in <b>offerta speciale</b> a 9,99€ anzichè <s>149€</s><br><img src="img/right-arrow.svg"/> Clicca qui <img src="img/left-arrow.svg"/></div></a>
        <?php } ?>
      </div>

    </div>
  </section>

  <div class="container">
    <div class="divider"></div>
  </div>

  <!-- #PROGETTI -->
  <section id="progetti">
    <div class="container">
      <h2 class="my-5 text-center">LPIC-1 vs Linux Essentials</h2>

      <div class="row">

        <div class="col-md-6 col-lg-6">
          <a class="invisible-link" href="<?php echo $essentials; ?>">
            <div class="project">
              <img src="img/fluid/lpi_linux.svg" alt="img">
              <h4>Linux Essentials</h4>
              <p class="text-justify">
                <b>Linux Essentials</b> è un corso che parte "da zero" e introduce a GNU/Linux e al mondo dell'Open Source.<br>
                Si rivolge ad un pubblico di utenti alle prime armi con Linux, ma anche a chi ha qualche lacuna da appianare.
                Il programma completo del corso è diviso in 5 sezioni, e spazia su tutti gli aspetti generali di una distribuzione Linux.<br /><br>
                <u>Acquista il corso cliccando sul bottone qui sotto: avrai accesso illimitato al corso al miglior prezzo disponibile!</u><br><br>
        	<center><a title="Acquista" href="<?php echo $essentials; ?>" class="btn btn-primary mt-auto">Linux Essentials</a></center>
              </p>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-6">
          <a class="invisible-link" href="https://corsolinux.com/#courses">
            <div class="project">
              <img src="img/fluid/lpi_certificate.svg" alt="img">
              <h4>LPIC1</h4>
              <p class="text-justify">
                <b> LPIC-1 </b> è il corso di certificazione professionale LPI di primo livello.
                Partendo dalle conoscenze di base, arriverai a conoscere GNU/Linux in ogni suo aspetto:
                dalla diagnostica dei problemi più comuni all'amministrazione di Server e PC Desktop.
                Questo corso parte dalle basi, ma si rivolge ad una utenza leggermente più consapevole, come:<br />
              </p>
              <ul class="text-left">
                <li>Studenti di Linux Essentials che vogliono continuare a progredire</li>
                <li>Appassionati di informatica e sistemi operativi che vogliono approfondire le proprie conoscenze</li>
                <li>Sistemisti junior che vogliono conseguire la certificazione LPI di primo livello</li>
              </ul>
        	<center>
		  <a title="Exam101" href="<?php echo $e101; ?>" class="btn btn-primary mt-auto">Exam 101</a>
		  <a title="Exam102" href="<?php echo $e102; ?>" class="btn btn-primary mt-auto">Exam 102</a>
		</center>
            </div>
          </a>
        </div>

      </div>

      <p class="mb-5 text-center">
        Nei miei corsi troverai tutte le risorse necessarie a coprire ogni argomento del programma d’esame, dandoti la giusta preparazione a superarlo.<br>
        Per maggiori informazioni su Linux Professional Institute e sulle certificazioni: <a href="http://www.lpi.org" target="blank_">www.lpi.org</a><br><br>
        <a title="Approfondisci" href="https://corsolinux.com/" class="btn btn-primary mt-auto">Approfondisci</a>
      </p>

    </div>
  </section>

  <div class="container">
    <div class="divider"></div>
  </div>

  <section id="faq">
    <div class="container">
      <h2 class="my-5 text-center">FAQ</h2>
      <div class="tab-content" id="faq-tab-content">
        <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
            <div class="accordion" id="accordion-tab-1">

                <div class="card">
                    <div class="card-header" id="accordion-tab-1-heading-1">
                        <h5>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-1" aria-expanded="false" aria-controls="accordion-tab-1-content-1">
                              Ci sono limitazioni alla consultazione? Una volta terminato il corso posso continuare a consultarlo o scade l'accesso?
                            </button>
                        </h5>
                    </div>
                    <div class="collapse show" id="accordion-tab-1-content-1" aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                        <div class="card-body">
                            <p>
                              Non c'è nessun limite di tempo per l'accesso ai corsi. Puoi studiare con calma e ritornare quando vuoi per ripassare: le video lezioni rimangono a tua disposizione per sempre.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="accordion-tab-1-heading-2">
                        <h5>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-2" aria-expanded="false" aria-controls="accordion-tab-1-content-2">
                              A chi posso rivolgermi in caso di dubbi durante il corso?
                            </button>
                        </h5>
                    </div>
                    <div class="collapse" id="accordion-tab-1-content-2" aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                        <div class="card-body">
                            <p>
                              Il docente è sempre a disposizione sulla piattaforma via messaggistica privata o nella sezione D&amp;R per qualsiasi dubbio/domanda/perplessità inerente al corso.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="accordion-tab-1-heading-3">
                        <h5>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-3" aria-expanded="false" aria-controls="accordion-tab-1-content-3">
                              Ho seguito il corso, come posso ottenere la certificazione?
                            </button>
                        </h5>
                    </div>
                    <div class="collapse" id="accordion-tab-1-content-3" aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                        <div class="card-body">
                            <p>
                              Per ottenere la certificazione LPI relativa al corso frequentato ("Linux Essentials" o "LPIC-1") devi sostenere l'esame in un centro esami autorizzato Pearson VUE. Ce ne sono in ogni città, per trovare il centro più vicino a casa tua visita <a href="http://www.pearsonvue.com/servlet/vue.web2.core.Dispatcher?webContext=CandidateSite&webApp=TestCenterLocator&requestedAction=register&cid=374"> questo link</a>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="accordion-tab-1-heading-4">
                        <h5>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-4" aria-expanded="false" aria-controls="accordion-tab-1-content-4">
                              Come si svolge l'esame di certificazione?
                            </button>
                        </h5>
                    </div>
                    <div class="collapse" id="accordion-tab-1-content-4" aria-labelledby="accordion-tab-1-heading-4" data-parent="#accordion-tab-1">
                        <div class="card-body">
                            <p>
                              L'esame "Linux Essentials" è composto di 40 domande da rispondere in 60 minuti, mentre tutti gli esami LPIC sono 60 domande in 90 minuti.
                              <br>Tutti gli esami consistono in domande aperte (es: "con quale comando creo un nuovo file vuoto?") e a scelta multipla.
                              <br>Per maggiori informazioni su esami e certificazioni LPI visita le FAQ sul sito ufficiale lpi.org: <a href="https://www.lpi.org/it/about-lpi/frequently-asked-questions">https://www.lpi.org/it/about-lpi/frequently-asked-questions</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="accordion-tab-1-heading-5">
                        <h5>
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-5" aria-expanded="false" aria-controls="accordion-tab-1-content-5">
                              A quando risale l'ultimo aggiornamento? Il corso diventerà obsoleto?
                            </button>
                        </h5>
                    </div>
                    <div class="collapse" id="accordion-tab-1-content-5" aria-labelledby="accordion-tab-1-heading-5" data-parent="#accordion-tab-1">
                        <div class="card-body">
                            <p>
                              Il programma LPI si aggiorna ogni 5 anni. Ad ogni aggiornamento vengono aggiunti nuovi video integrativi per mantenere il corso aggiornato.
                              <br>Ad esempio a inizio 2019 c'è stato un aggiornamento degli obiettivi d'esame per "LPIC-1" dalla versione "4" alla versione "5", ed il corso è stato aggiornato per coprire le nuove competenze. Il prossimo aggiornamento cadrà entro il 2024.
                              <br><br>Per maggiori dettagli su programma del corso e obiettivi d'esame visita:
                              <br>LPIC-1: Exam 101: <a href="https://www.lpi.org/our-certifications/exam-101-objectives">https://www.lpi.org/our-certifications/exam-101-objectives</a>
                              <br>Exam 102: <a href="https://www.lpi.org/our-certifications/exam-102-objectives">https://www.lpi.org/our-certifications/exam-102-objectives</a>
                              <br>Linux Essentials: <a href="https://www.lpi.org/our-certifications/exam-010-objectives">https://www.lpi.org/our-certifications/exam-010-objectives</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container footer">
      <p class="m-0 text-center text-white">
        Made with ❤️ by <a href="https://github.com/mrriky54" target="_blank">Riccardo Carissimi</a><br><br>
        <a href="https://github.com/morrolinuxyt/website" target="_blank"><i class="fa fa-github-square mx-2" aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/MorrolinuxOfficial/" target="_blank"><i class="fa fa-facebook-square mx-2" aria-hidden="true"></i></a>
        <a href="https://twitter.com/morrolinux/" target="_blank"><i class="fa fa-twitter-square mx-2" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/user/morrolinux/" target="_blank"><i class="fa fa-youtube-square mx-2" aria-hidden="true"></i></a>
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


</body>

</html>
