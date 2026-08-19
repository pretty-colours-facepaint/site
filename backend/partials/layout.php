<?php
/**
 * Shared head/header/footer markup for every page.
 * Pages under backend/pages/ call these instead of repeating the HTML.
 */

function head_open(string $title, string $description, string $canonical, ?string $ogTitle = null, ?string $ogDescription = null): void
{
    $ogTitle = $ogTitle ?? $title;
    $ogDescription = $ogDescription ?? $description;
    echo <<<HTML
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$title}</title>
  <meta name="description" content="{$description}">
  <link rel="canonical" href="{$canonical}">
  <meta name="robots" content="index, follow">

  <meta property="og:type" content="website">
HTML;
}

function og_locale_and_site_name(): void
{
    echo <<<HTML

  <meta property="og:locale" content="nl_NL">
  <meta property="og:site_name" content="Pretty Colours Facepaint">
HTML;
}

function og_title_description_url(string $ogTitle, string $ogDescription, string $canonical): void
{
    echo <<<HTML

  <meta property="og:title" content="{$ogTitle}">
  <meta property="og:description" content="{$ogDescription}">
  <meta property="og:url" content="{$canonical}">
HTML;
}

function og_and_twitter_image(string $image): void
{
    echo <<<HTML

  <meta property="og:image" content="{$image}">
  <meta name="twitter:card" content="summary_large_image">
HTML;
}

function twitter_title_description(string $ogTitle, string $ogDescription, string $image): void
{
    echo <<<HTML

  <meta name="twitter:title" content="{$ogTitle}">
  <meta name="twitter:description" content="{$ogDescription}">
  <meta name="twitter:image" content="{$image}">
HTML;
}

function favicon_and_tailwind(): void
{
    echo <<<HTML

  <link rel="icon" href="assets/logo.jpg">
HTML;
}

function google_font_pacifico(): void
{
    echo <<<HTML

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
HTML;
}

function tailwind_cdn(): void
{
    echo <<<HTML

  <script src="https://cdn.tailwindcss.com"></script>
HTML;
}

/**
 * The header's CTA is a rainbow-bordered button on every page, so this rule is
 * always emitted. fontDisplay and rainbowFill are per-page opt-ins.
 *
 * @param bool $fontDisplay include the .font-display rule
 * @param bool $rainbowFill include the .rainbow-fill-btn rule (solid rainbow gradient fill)
 */
function custom_style(bool $fontDisplay, bool $rainbowFill = false): void
{
    echo "\n  <style>";
    if ($fontDisplay) {
        echo <<<HTML

    .font-display {
      font-family: 'Pacifico', cursive;
    }
HTML;
    }
    echo <<<HTML

    .rainbow-border-btn {
      position: relative;
      background: #fff;
    }
    .rainbow-border-btn::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      padding: 2px;
      background: linear-gradient(90deg, #f43f5e, #f97316, #eab308, #22c55e, #3b82f6, #8b5cf6, #ec4899);
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      pointer-events: none;
    }
HTML;
    if ($rainbowFill) {
        echo <<<HTML

    .rainbow-fill-btn {
      background: linear-gradient(90deg, #f43f5e, #f97316, #eab308, #22c55e, #3b82f6, #8b5cf6, #ec4899);
    }
HTML;
    }
    echo "\n  </style>";
}

function local_business_json_ld(): void
{
    echo <<<HTML

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Pretty Colours Facepaint",
    "founder": "Sanne Lek",
    "image": "https://prettycolours-facepaint.nl/assets/logo.jpg",
    "url": "https://prettycolours-facepaint.nl/",
    "description": "Schminken en glittertattoo's voor kinderfeestjes, evenementen en bedrijven, in een straal van 30 km rond Hoofddorp.",
    "areaServed": {
      "@type": "GeoCircle",
      "geoMidpoint": {
        "@type": "GeoCoordinates",
        "addressLocality": "Hoofddorp"
      },
      "geoRadius": "30000"
    },
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Hoofddorp",
      "addressCountry": "NL"
    }
  }
  </script>
HTML;
}

function construction_overlay(): void
{
    echo <<<HTML

  <!-- Under construction notice -->
  <div id="construction-overlay" class="fixed inset-0 z-[100] bg-white/95 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white border rounded-2xl shadow-lg max-w-sm w-full p-6 text-center">
      <p class="text-3xl mb-3">🚧</p>
      <h2 class="font-display text-2xl text-pink-600 mb-2">Website in aanbouw</h2>
      <p class="text-sm text-gray-500 mb-6">Deze website is nog in ontwikkeling. Sommige teksten en foto's zijn nog placeholders.</p>
      <button id="construction-dismiss" class="bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 text-white rounded-full px-6 py-3 text-sm font-medium shadow hover:opacity-90 transition">Ik snap het, ga verder</button>
    </div>
  </div>
  <script>
    (function () {
      if (localStorage.getItem('constructionAcknowledged') === 'true') {
        document.getElementById('construction-overlay').classList.add('hidden');
      } else {
        document.documentElement.classList.add('overflow-hidden');
      }
    })();
  </script>
HTML;
}

/** Header used on every page: same logo, same nav, same CTA everywhere. */
function site_header(): void
{
    echo <<<HTML

  <!-- Header -->
  <header class="sticky top-0 bg-white/90 backdrop-blur border-b z-50">
    <div class="max-w-5xl mx-auto flex items-center justify-between px-4 py-6 flex-wrap gap-3">
      <a href="index.html" class="flex flex-col items-center gap-1">
        <img id="logo-img" src="assets/logo.jpg" alt="Pretty Colours Facepaint" class="h-28 w-28 rounded-full object-cover transition-all duration-500 ease-in-out">
        <p id="logo-tagline" class="text-[10px] tracking-widest text-gray-400 mt-1 overflow-hidden">SCHMINK &amp; GLITTERTATTOO'S</p>
      </a>
      <nav class="flex items-center gap-6 text-sm">
        <a href="index.html#werk" class="hover:text-pink-600">Bekijk mijn werk</a>
        <a href="index.html#over" class="hover:text-pink-600">Over mij</a>
        <a href="aanvraag.html" class="rainbow-border-btn text-black rounded-full px-5 py-2.5 font-medium hover:bg-gray-50 transition">AANVRAAG DOEN</a>
      </nav>
    </div>
  </header>
HTML;
}

/** Rich footer: logo, contact details, social badges. Used by most pages. */
function footer_full(string $taglineClass = 'font-display text-base text-pink-500'): void
{
    echo <<<HTML

  <!-- Footer -->
  <footer class="border-t">
    <div class="max-w-5xl mx-auto px-4 py-8 flex flex-col sm:flex-row items-center justify-between gap-6 text-sm text-gray-500">
      <div class="flex items-center gap-3">
        <img src="assets/logo.jpg" alt="Pretty Colours Facepaint" class="h-12 w-12 rounded-full object-cover">
        <p class="{$taglineClass}">Kleur maakt alles leuker!</p>
      </div>
      <div class="space-y-1 text-center sm:text-left">
        <p>📞 06 – 12345678</p>
        <p>✉ info@voorbeeld.nl</p>
        <p>📍 30 km rond Hoofddorp</p>
      </div>
      <div class="flex gap-3">
        <span class="w-9 h-9 rounded-full bg-pink-500 text-white flex items-center justify-center text-xs">IG</span>
        <span class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs">FB</span>
        <a href="aanvraag.html" class="w-9 h-9 rounded-full bg-purple-500 text-white flex items-center justify-center text-xs">✉</a>
      </div>
    </div>
  </footer>
HTML;
}

/** Plain dark footer, used on the still-placeholder werk-* album pages. */
function footer_simple(): void
{
    echo <<<HTML

  <footer class="bg-gray-900 text-gray-300 text-center py-8 px-4 text-sm">
    <div class="max-w-5xl mx-auto">
      <p>&copy; 2026 Pretty Colours Facepaint. Placeholder footertekst.</p>
    </div>
  </footer>
HTML;
}

function script_js(): void
{
    echo <<<HTML

  <script src="script.js"></script>
HTML;
}

/** Six-photo placeholder grid shared by the werk-* album pages. */
function werk_gallery_body(string $backLabel, string $heading): void
{
    $placeholder = '<div class="aspect-square bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-sm">Foto placeholder</div>';
    $grid = str_repeat("\n        {$placeholder}", 6);
    echo <<<HTML

  <section class="py-16 px-4">
    <div class="max-w-5xl mx-auto">
      <a href="index.html#werk" class="text-sm text-pink-600 font-medium">&larr; {$backLabel}</a>
      <h1 class="text-3xl font-bold mt-4 mb-10">{$heading}</h1>
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">{$grid}
      </div>
    </div>
  </section>
HTML;
}
