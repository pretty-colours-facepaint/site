<?php
$title = "Prijzen — Pretty Colours Facepaint";
$description = "Bekijk de prijzen voor schminken en glittertattoo's bij Pretty Colours Facepaint, actief voor kinderfeestjes en evenementen rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/pages/prijzen.html";
$ogDescription = "Bekijk de prijzen voor schminken en glittertattoo's bij Pretty Colours Facepaint, actief rond Hoofddorp.";
$base = '../';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php
head_open($title, $description, $canonical, $title, $ogDescription);
og_title_description_url($title, $ogDescription, $canonical);
favicon_and_tailwind($base);
google_font_pacifico();
tailwind_cdn();
custom_style(fontDisplay: true, rainbowFill: true);
?>
<style>
  @keyframes mask-zap {
    0%, 11% { mask-size: 92%; mask-position: 48% 46%; -webkit-mask-size: 92%; -webkit-mask-position: 48% 46%; }
    12%, 27% { mask-size: 100%; mask-position: 54% 45%; -webkit-mask-size: 100%; -webkit-mask-position: 54% 45%; }
    28%, 34% { mask-size: 89%; mask-position: 45% 54%; -webkit-mask-size: 89%; -webkit-mask-position: 45% 54%; }
    35%, 58% { mask-size: 98%; mask-position: 52% 52%; -webkit-mask-size: 98%; -webkit-mask-position: 52% 52%; }
    59%, 63% { mask-size: 93%; mask-position: 50% 50%; -webkit-mask-size: 93%; -webkit-mask-position: 50% 50%; }
    64%, 89% { mask-size: 102%; mask-position: 47% 55%; -webkit-mask-size: 102%; -webkit-mask-position: 47% 55%; }
    90%, 100% { mask-size: 92%; mask-position: 48% 46%; -webkit-mask-size: 92%; -webkit-mask-position: 48% 46%; }
  }
  @keyframes icon-flash {
    0%, 100% { filter: brightness(1) saturate(1); }
    11% { filter: brightness(1.12) saturate(1.1); }
    27% { filter: brightness(1) saturate(1); }
    34% { filter: brightness(1.15) saturate(1.12); }
    58% { filter: brightness(1) saturate(1); }
    63% { filter: brightness(1.18) saturate(1.15); }
    89% { filter: brightness(1) saturate(1); }
  }
  @keyframes icon-shimmer {
    0%, 100% { filter: brightness(1) saturate(1); }
    50% { filter: brightness(1.12) saturate(1.1); }
  }
  @keyframes mask-heartbeat {
    0%, 100% { mask-size: 90%; -webkit-mask-size: 90%; }
    15% { mask-size: 102%; -webkit-mask-size: 102%; }
    30% { mask-size: 90%; -webkit-mask-size: 90%; }
    45% { mask-size: 102%; -webkit-mask-size: 102%; }
    60% { mask-size: 90%; -webkit-mask-size: 90%; }
  }
  @keyframes spin-cw {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }
  @keyframes spin-ccw {
    from { transform: rotate(0deg); }
    to { transform: rotate(-360deg); }
  }
  .icon-spin-mask, .icon-spin-counter, .icon-zap, .icon-heartbeat {
    pointer-events: none;
  }
  .icon-spin-mask, .icon-spin-counter {
    transform-origin: center;
  }
  .icon-spin-mask {
    animation: spin-cw 14s linear infinite,
      icon-shimmer 3s ease-in-out infinite;
    animation-play-state: paused;
  }
  .icon-spin-counter {
    animation: spin-ccw 14s linear infinite;
    animation-play-state: paused;
  }
  .icon-zap {
    animation: mask-zap 2.6s steps(1, jump-end) infinite,
      icon-flash 2.6s steps(1, jump-end) infinite;
    animation-play-state: paused;
    transform-origin: center;
  }
  .icon-heartbeat {
    animation: mask-heartbeat 2.1s ease-in-out infinite,
      icon-shimmer 2.1s ease-in-out infinite;
    animation-play-state: paused;
  }
  .price-card:hover .icon-spin-mask,
  .price-card:hover .icon-spin-counter,
  .price-card:hover .icon-zap,
  .price-card:hover .icon-heartbeat {
    animation-play-state: running;
  }
  .price-card {
    isolation: isolate;
    transform: translateZ(0);
    background-color: var(--card-bg-light);
  }
  .price-card:hover {
    background-color: var(--card-bg-medium);
    z-index: 20;
  }
</style>
</head>
<body class="font-sans text-gray-700 bg-white">
<?php site_header(base: $base); ?>

  <section class="max-w-3xl mx-auto px-4 py-16">
    <a href="<?= $base ?>index.html#werk" class="text-sm text-pink-600 font-normal">&larr; Terug</a>
    <h1 class="font-display text-3xl mt-4 mb-10 text-pink-600"><?= content_config('prijzen.titel') ?></h1>

    <div class="relative isolate">
      <div class="relative z-10 grid sm:grid-cols-3 gap-6">
      <a href="<?= $base ?>pages/aanvraag.html" class="price-card relative z-10 border rounded-xl shadow-sm text-center p-8 flex flex-col items-center transition cursor-pointer" style="--card-bg-light:rgb(253,238,246);--card-bg-medium:rgb(252,217,234);">
        <img src="<?= $base ?>MAAK_HIER_AANPASSINGEN/covers/foto1.jpg" alt="Voorbeeld schminken" class="w-48 h-48 object-cover mb-4 icon-heartbeat" style="<?= mask_style('<path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />') ?>">
        <h3 class="font-display text-2xl text-pink-600 mb-1"><?= content_config('prijzen.hart.titel') ?></h3>
        <p class="text-xl font-semibold text-gray-800 mb-2"><?= content_config('prijzen.hart.prijs') ?></p>
        <p class="text-gray-500 text-sm"><?= content_config('prijzen.hart.tekst') ?></p>
      </a>
      <a href="<?= $base ?>pages/aanvraag.html" class="price-card relative z-10 border rounded-xl shadow-sm text-center p-8 flex flex-col items-center transition cursor-pointer" style="--card-bg-light:rgb(244,240,248);--card-bg-medium:rgb(230,221,239);">
        <img src="<?= $base ?>MAAK_HIER_AANPASSINGEN/covers/foto2.jpg" alt="Voorbeeld glittertattoo" class="w-48 h-48 object-cover mb-4 icon-zap" style="<?= mask_style('<path d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" />') ?>">
        <h3 class="font-display text-2xl text-purple-600 mb-1"><?= content_config('prijzen.bliksem.titel') ?></h3>
        <p class="text-xl font-semibold text-gray-800 mb-2"><?= content_config('prijzen.bliksem.prijs') ?></p>
        <p class="text-gray-500 text-sm"><?= content_config('prijzen.bliksem.tekst') ?></p>
      </a>
      <a href="<?= $base ?>pages/aanvraag.html" class="price-card relative z-10 border rounded-xl shadow-sm text-center p-8 flex flex-col items-center transition cursor-pointer" style="--card-bg-light:rgb(245,249,238);--card-bg-medium:rgb(233,242,216);">
        <div class="w-48 h-48 mb-4 icon-spin-mask" style="overflow:hidden;<?= mask_style('<path fill-rule="evenodd" clip-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" />') ?>">
          <img src="<?= $base ?>MAAK_HIER_AANPASSINGEN/covers/foto3.jpg" alt="Voorbeeld feest" class="w-full h-full object-cover icon-spin-counter">
        </div>
        <h3 class="font-display text-2xl text-green-600 mb-1"><?= content_config('prijzen.ster.titel') ?></h3>
        <p class="text-xl font-semibold text-gray-800 mb-2"><?= content_config('prijzen.ster.prijs') ?></p>
        <p class="text-gray-500 text-sm"><?= content_config('prijzen.ster.tekst') ?></p>
      </a>
    </div>
      <img src="<?= $base ?>assets/splash-left.jpg" alt="" class="hidden lg:block absolute -z-10 -left-20 top-1/2 -translate-y-1/2 w-24 pointer-events-none select-none" aria-hidden="true">
      <img src="<?= $base ?>assets/splash-right.jpg" alt="" class="hidden lg:block absolute -z-10 -right-20 top-1/2 -translate-y-1/2 w-24 pointer-events-none select-none" aria-hidden="true">
    </div>

    <p class="text-center text-gray-500 text-sm mt-16"><?= content_config('prijzen.footnote') ?></p>
  </section>
<?php footer_full('text-xs', $base); ?>
<?php script_js($base); ?>

</body>
</html>
