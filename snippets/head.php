<?php
/* <head> comune a tutte le pagine. Prima di includerlo la pagina può
   impostare $page_title e $page_description. */
$page_title       = $page_title ?? 'Morrolinux — Linux e Software Libero dal 2008';
$page_description = $page_description ?? 'Video, corsi e progetti Open Source su GNU/Linux, Docker, Kubernetes, Proxmox e Networking. Divulgazione del software libero dal 2008.';
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Morrolinux">
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
  <meta property="og:image" content="https://morrolinux.it/img/moreno.jpg">
  <meta name="theme-color" content="#FEC224">

  <link rel="icon" href="favicon.ico">
  <link rel="icon" href="img/logo.svg" type="image/svg+xml">
  <link rel="stylesheet" href="css/site.css">

  <script defer src="https://analytics.morrolinux.it/script.js" data-website-id="61bc9268-b5c3-4410-b0d0-2fed3888e9c9"></script>
<?php include __DIR__ . '/theme-init.php'; ?>
<?php include_once __DIR__ . '/icons.php'; ?>
