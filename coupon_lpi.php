<!DOCTYPE html>
<?php
  $page_title = 'Coupon LPI — Morrolinux';
  $page_description = 'Ottieni la certificazione Linux e inizia la tua carriera come professionista IT in un settore in rapida crescita grazie al corso bestseller italiano su Linux. Scopri la nostra selezione di corsi ideati su misura per te!';
?>
<html lang="it" class="theme-auto">
<head>
<?php include 'snippets/head.php'; ?>
</head>

<body id="top">

<?php include 'snippets/nav.php'; ?>

  <main id="main">
    <header class="page-head wrap">
      <p class="eyebrow">Certificazioni LPI</p>
      <h1>Richiedi il tuo coupon LPI</h1>
      <p>
        Come <b>Training Partner Autorizzato</b> del Linux Professional Institute (LPI) posso generare
        per i miei iscritti uno speciale <b>coupon sconto</b> per la prenotazione di <b>tutti gli esami LPI</b>.
        Compila il modulo e ricevi il tuo coupon entro 48 ore.
      </p>
      <p style="margin-top: 1.75rem">
        <a class="btn btn-primary" href="https://requests.morrolinux.it/form/lpi-coupon" target="_blank" rel="noopener" data-umami-event="lpi_coupon">Richiedi il tuo coupon <?= icon('arrow', 18) ?></a>
      </p>
    </header>

    <article class="prose">
      <h2>Come si usa il coupon?</h2>
      <p>
        Una volta ricevuto il codice, potrai usarlo per <b>acquistare il voucher d'esame a prezzo scontato</b>
        sul portale <a href="https://people.lpi.org/vouchers" target="_blank" rel="noopener">people.lpi.org</a>.
        La procedura richiede 4 semplici passaggi:
      </p>

      <ol class="steps">
        <li>
          Vai su <a href="https://people.lpi.org/vouchers" target="_blank" rel="noopener">people.lpi.org</a> e dalla
          barra laterale seleziona "Shop" → "Vouchers", poi "BUY VOUCHERS" in alto a destra.
          <img src="img/LPI_COUPONS_1.webp" alt="Pagina Vouchers del portale LPI" width="1360" height="886" loading="lazy">
        </li>
        <li>
          Seleziona la tipologia di esame che desideri sostenere: serie "Essentials" (Linux Essentials,
          Security Essentials, …) oppure "Professional" (LPIC-1, LPIC-2, …).
          <img src="img/LPI_COUPONS_2.webp" alt="Scelta della serie d'esame" width="1360" height="886" loading="lazy">
        </li>
        <li>
          Aggiungi l'esame al carrello.
          <img src="img/LPI_COUPONS_3.webp" alt="Esame aggiunto al carrello" width="1360" height="886" loading="lazy">
        </li>
        <li>
          Inserisci il codice coupon nella finestra pop-up, premi "APPLY" e poi "CHECKOUT".
          <img src="img/LPI_COUPONS_4.webp" alt="Inserimento del codice coupon" width="1360" height="886" loading="lazy">
        </li>
      </ol>

      <h2>Come si prenota l'esame?</h2>
      <p>
        Acquistato il voucher, potrai usarlo per prenotare l'esame direttamente dal portale Pearson VUE.
        Per i dettagli consulta la <a href="https://odoo.lpi.org/web/content/58272?access_token=4f7cc131-7670-4574-92b1-35bdde9a9a12" target="_blank" rel="noopener">guida ufficiale</a> di LPI.
      </p>
    </article>
  </main>

<?php include 'snippets/footer.php'; ?>

</body>
</html>
