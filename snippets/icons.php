<?php
/* Icone SVG inline al posto di Font Awesome 4: il CDN maxcdn non esiste più
   e un'intera webfont per una dozzina di glifi era sproporzionata.
   Tutte prendono il colore dal testo (currentColor). */

function icon($name, $size = 20) {
  static $brand = [
    'github'   => ['0 0 16 16', '<path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"/>'],
    'youtube'  => ['0 0 24 24', '<path fill-rule="evenodd" d="M2.5 7.1c.2-1.6 1.4-2.8 3-2.9C7.6 4 9.8 4 12 4s4.4 0 6.5.2c1.6.1 2.8 1.3 3 2.9.2 1.6.3 3.2.3 4.9s-.1 3.3-.3 4.9c-.2 1.6-1.4 2.8-3 2.9-2.1.2-4.3.2-6.5.2s-4.4 0-6.5-.2c-1.6-.1-2.8-1.3-3-2.9C2.3 15.3 2.2 13.7 2.2 12s.1-3.3.3-4.9zM10 8.8v6.4l5.5-3.2z"/>'],
    'linkedin' => ['0 0 24 24', '<path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9.75h4V21H3zM9.5 9.75h3.8v1.6h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V21h-4v-4.9c0-1.17-.02-2.68-1.63-2.68-1.64 0-1.89 1.28-1.89 2.6V21h-4z"/>'],
    'x'        => ['0 0 24 24', '<path d="M17.75 3h3.07l-6.7 7.66L22 21h-6.17l-4.83-6.32L5.47 21H2.4l7.17-8.2L2 3h6.33l4.37 5.78zm-1.08 16.2h1.7L7.4 4.73H5.58z"/>'],
    'telegram' => ['0 0 24 24', '<path d="M21.4 4.2 2.9 11.4c-1.3.5-1.3 1.2-.2 1.6l4.8 1.5 1.8 5.6c.2.6.4.8.8.8.4 0 .6-.2.9-.5l2.3-2.2 4.8 3.5c.9.5 1.5.2 1.7-.8l3.1-14.7c.3-1.3-.5-1.9-1.5-1.5zM9.3 14.2l8.6-5.4c.4-.3.8-.1.5.2l-7.1 6.4-.3 3.1z"/>'],
    'facebook' => ['0 0 24 24', '<path d="M13.5 21v-7.5h2.5l.4-3h-2.9V8.6c0-.9.3-1.5 1.5-1.5h1.5V4.4c-.3 0-1.2-.1-2.2-.1-2.2 0-3.7 1.3-3.7 3.8v2.4H8v3h2.5V21z"/>'],
    'mastodon' => ['0 0 24 24', '<path d="M21.3 8.3c0-4.1-2.7-5.3-2.7-5.3C17.2 2.4 14.9 2 12.5 2h-.1c-2.4 0-4.7.4-6.1 1 0 0-2.7 1.2-2.7 5.3 0 .9 0 2.1.1 3.3.1 4.2.8 8.4 4.7 9.4 1.8.5 3.4.6 4.6.5 2.3-.1 3.5-.8 3.5-.8l-.1-1.6s-1.6.5-3.4.5c-1.8-.1-3.7-.2-4-2.4v-.6s1.8.4 4 .5c1.4.1 2.6-.1 4-.2 2.6-.3 4.8-1.9 5.1-3.3.4-2.2.4-5.4.4-5.4zM17.8 14h-2.2V8.6c0-1.1-.5-1.7-1.4-1.7-1 0-1.6.7-1.6 2v2.9h-2.2V8.9c0-1.3-.5-2-1.6-2-.9 0-1.4.6-1.4 1.7V14H5.2V8.5c0-1.1.3-2 .9-2.6.6-.7 1.4-1 2.3-1 1.1 0 2 .4 2.5 1.3l.5.9.5-.9c.6-.9 1.4-1.3 2.5-1.3.9 0 1.7.3 2.3 1 .6.7.9 1.5.9 2.6z"/>'],
  ];

  static $line = [
    'arrow'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
    'external' => '<path d="M7 17 17 7M8 7h9v9"/>',
    'menu'     => '<path d="M4 7h16M4 12h16M4 17h16"/>',
    'close'    => '<path d="M6 6l12 12M18 6 6 18"/>',
    'ticket'   => '<path d="M3 8a2 2 0 0 0 2-2h14a2 2 0 0 0 2 2v2a2 2 0 0 0 0 4v2a2 2 0 0 0-2 2H5a2 2 0 0 0-2-2v-2a2 2 0 0 0 0-4z"/><path d="M14 6v12" stroke-dasharray="2 2"/>',
    'play'     => '<rect x="2.5" y="5" width="19" height="14" rx="4"/><path d="M10 9.3v5.4l4.6-2.7z" fill="currentColor" stroke-width="1.5"/>',
    'cart'     => '<circle cx="9" cy="20" r="1.4"/><circle cx="18" cy="20" r="1.4"/><path d="M2.5 3.5h2.6l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1l1.6-6.8H6"/>',
    'share'    => '<circle cx="18" cy="5.5" r="2.5"/><circle cx="6" cy="12" r="2.5"/><circle cx="18" cy="18.5" r="2.5"/><path d="M8.2 10.8l7.6-4.1M8.2 13.2l7.6 4.1"/>',
    'heart'    => '<path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/>',
    'sun'      => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>',
    'moon'     => '<path d="M20 14.5A8 8 0 0 1 9.5 4a8 8 0 1 0 10.5 10.5z"/>',
    'auto'     => '<circle cx="12" cy="12" r="9"/><path d="M12 3a9 9 0 0 1 0 18z" fill="currentColor"/>',
  ];

  if (isset($brand[$name])) {
    [$box, $paths] = $brand[$name];
    return '<svg width="'.$size.'" height="'.$size.'" viewBox="'.$box.'" fill="currentColor" aria-hidden="true" focusable="false">'.$paths.'</svg>';
  }

  return '<svg class="ico-'.$name.'" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'.$line[$name].'</svg>';
}

/* Profili social: un elenco solo, usato da About e footer. */
$SOCIALS = [
  ['youtube',  'YouTube',  'https://www.youtube.com/user/morrolinux/'],
  ['github',   'GitHub',   'https://github.com/morrolinux'],
  ['mastodon', 'Mastodon', 'https://mastodon.uno/@morrolinux'],
  ['linkedin', 'LinkedIn', 'https://www.linkedin.com/in/morenorazzoli'],
  ['x',        'X (Twitter)', 'https://x.com/morrolinux'],
  ['telegram', 'Telegram', 'https://telegram.me/morrolinux_feed'],
  ['facebook', 'Facebook', 'https://www.facebook.com/MorrolinuxOfficial/'],
];

function socials($list) {
  $out = '<ul class="socials">';
  foreach ($list as [$key, $label, $url]) {
    $rel = $key === 'mastodon' ? 'me noopener' : 'noopener';
    $out .= '<li><a href="'.$url.'" target="_blank" rel="'.$rel.'" title="'.$label.'" aria-label="'.$label.'">'.icon($key, 19).'</a></li>';
  }
  return $out.'</ul>';
}
