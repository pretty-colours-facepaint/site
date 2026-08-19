<?php
/**
 * Shared head/header/footer markup for every page.
 * Pages under backend/pages/ call these instead of repeating the HTML.
 */

/**
 * Renders a placeholder that the browser fills in at runtime from
 * config.js (see script.js) — the text at SITE_CONFIG.<path>, dotted
 * (e.g. content_config('prijzen.hart.prijs')). Editing config.js needs
 * no PHP rebuild: the browser reads it directly on every page load.
 */
function content_config(string $path): string
{
    $escaped = htmlspecialchars($path, ENT_QUOTES);
    return "<span data-config=\"{$escaped}\"></span>";
}

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

function favicon_and_tailwind(string $base = ''): void
{
    echo <<<HTML

  <link rel="icon" href="{$base}assets/logo.jpg">
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

/**
 * Loads the Tailwind CDN, then pins every shade of the purple/pink/green
 * palettes to the brand's exact hex values, so e.g. bg-purple-500 and
 * bg-purple-700 render identically — no other purple, pink, or green.
 */
function tailwind_cdn(): void
{
    echo <<<HTML

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            purple: { 50: '#7642a6', 100: '#7642a6', 200: '#7642a6', 300: '#7642a6', 400: '#7642a6', 500: '#7642a6', 600: '#7642a6', 700: '#7642a6', 800: '#7642a6', 900: '#7642a6', 950: '#7642a6', DEFAULT: '#7642a6' },
            pink: { 50: '#ec2b8a', 100: '#ec2b8a', 200: '#ec2b8a', 300: '#ec2b8a', 400: '#ec2b8a', 500: '#ec2b8a', 600: '#ec2b8a', 700: '#ec2b8a', 800: '#ec2b8a', 900: '#ec2b8a', 950: '#ec2b8a', DEFAULT: '#ec2b8a' },
            green: { 50: '#84b525', 100: '#84b525', 200: '#84b525', 300: '#84b525', 400: '#84b525', 500: '#84b525', 600: '#84b525', 700: '#84b525', 800: '#84b525', 900: '#84b525', 950: '#84b525', DEFAULT: '#84b525' },
          }
        }
      }
    };
  </script>
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
    .rainbow-top-border {
      border-top: 2px solid transparent;
      border-image: linear-gradient(90deg, #f43f5e, #f97316, #eab308, #22c55e, #3b82f6, #8b5cf6, #ec4899) 1;
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

/** Envelope icon markup, reused by the mail CTA and the footer's mail badge. */
function mail_icon_svg(string $extraClass = '', float $strokeWidth = 1.5): string
{
    $class = trim("shrink-0 {$extraClass}");
    return <<<HTML
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="{$strokeWidth}" stroke="currentColor" class="{$class}">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
          </svg>
HTML;
}

/**
 * The site's rainbow CTA button, in two variants: 'solid' fills the button with the
 * rainbow gradient (white text), 'outline' keeps a white button with a thin rainbow
 * gradient border (black text). Renders as an <a> (pass $href) or a <button> (pass $type).
 *
 * Requires custom_style(..., rainbowFill: true) on the page when $variant is 'solid' —
 * the outline gradient rule is always emitted, the fill rule is opt-in.
 */
function rainbow_button(string $label, string $variant = 'solid', ?string $href = null, ?string $type = null, string $extraClass = ''): void
{
    $class = $variant === 'outline'
        ? 'rainbow-border-btn text-black hover:bg-gray-50'
        : 'rainbow-fill-btn text-white shadow hover:opacity-90';
    $class = trim("{$class} rounded-full transition cursor-pointer {$extraClass}");

    if ($type !== null) {
        echo "<button type=\"{$type}\" class=\"{$class}\">{$label}</button>";
    } else {
        echo "<a href=\"{$href}\" class=\"{$class}\">{$label}</a>";
    }
}

/**
 * CSS mask (style="...") that clips an element into the shape of an SVG icon.
 * Pass the icon's inner <path ...> markup (from a 0 0 24 24 viewBox icon).
 */
function mask_style(string $pathMarkup): string
{
    $svg = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>{$pathMarkup}</svg>";
    $uri = 'data:image/svg+xml;base64,' . base64_encode($svg);
    return "mask-image:url('{$uri}');-webkit-mask-image:url('{$uri}');"
        . 'mask-repeat:no-repeat;-webkit-mask-repeat:no-repeat;'
        . 'mask-position:center;-webkit-mask-position:center;'
        . 'mask-size:contain;-webkit-mask-size:contain;';
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
    $titel = content_config('overlay.titel');
    $tekst = content_config('overlay.tekst');
    $knop = content_config('overlay.knop');
    echo <<<HTML

  <!-- Under construction notice -->
  <div id="construction-overlay" class="fixed inset-0 z-[100] bg-white/95 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white border rounded-2xl shadow-lg max-w-sm w-full p-6 text-center">
      <p class="text-3xl mb-3">🚧</p>
      <h2 class="font-display text-2xl text-pink-600 mb-2">{$titel}</h2>
      <p class="text-sm text-gray-500 mb-6">{$tekst}</p>
      <button id="construction-dismiss" class="bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 text-white rounded-full px-8 py-4 text-sm font-medium shadow hover:opacity-90 transition cursor-pointer">{$knop}</button>
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

/**
 * Header used on every page: same logo, same nav, same CTA everywhere.
 *
 * @param bool $onHome  Underlines the "Home" link when it's the current page.
 */
function site_header(bool $onHome = false, bool $onWerk = false, string $base = ''): void
{
    $homeClass = 'text-pink-600' . ($onHome ? ' font-bold underline underline-offset-4' : ' hover:underline hover:underline-offset-4');
    $werkClass = 'text-pink-600' . ($onWerk ? ' font-bold underline underline-offset-4' : ' hover:underline hover:underline-offset-4');
    ob_start();
    rainbow_button(content_config('contact.ctaAanvraag'), 'outline', href: "{$base}pages/aanvraag.html", extraClass: 'px-7 py-3.5 font-medium');
    $ctaButton = ob_get_clean();
    echo <<<HTML

  <!-- Header -->
  <header id="site-header" class="sticky top-0 bg-white/90 backdrop-blur border-b border-transparent z-50">
    <div class="max-w-5xl mx-auto flex items-center justify-between px-4 py-6 flex-wrap gap-3">
      <a href="{$base}index.html" class="flex flex-col items-center gap-1">
        <img id="logo-img" src="{$base}assets/logo.jpg" alt="Pretty Colours Facepaint" class="h-28 w-28 rounded-full object-cover transition-all duration-500 ease-in-out">
        <p id="logo-tagline" class="text-[10px] tracking-widest mt-1 overflow-hidden">SCHMINK &amp; GLITTERTATTOO'S</p>
      </a>
      <nav class="flex items-center gap-6 text-sm">
        <a href="{$base}index.html" class="{$homeClass}">Home</a>
        <a href="{$base}pages/werk.html" class="{$werkClass}">Mijn werk</a>
        {$ctaButton}
      </nav>
    </div>
  </header>
HTML;
}

/** Rich footer: logo, contact details, social badges. Used by most pages. */
function footer_full(string $taglineClass = 'font-display text-base text-pink-500', string $base = ''): void
{
    $mailIconPink = mail_icon_svg('size-4 text-pink-500');
    $tagline = content_config('contact.tagline');
    $telefoon = content_config('contact.telefoon');
    $email = content_config('contact.email');
    $regio = content_config('contact.regio');
    echo <<<HTML

  <!-- Footer -->
  <footer class="rainbow-top-border">
    <div class="max-w-5xl mx-auto px-4 py-10 flex flex-col sm:flex-row items-center justify-between gap-10 text-sm text-gray-500">
      <div class="flex items-center gap-3">
        <img src="{$base}assets/logo.jpg" alt="Pretty Colours Facepaint" class="h-12 w-12 rounded-full object-cover">
        <p class="{$taglineClass}">{$tagline}</p>
      </div>
      <div class="space-y-3 text-center sm:text-left">
        <p class="flex items-center justify-center sm:justify-start gap-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 shrink-0 text-pink-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
          </svg>
          {$telefoon}
        </p>
        <p class="flex items-center justify-center sm:justify-start gap-2.5">
          {$mailIconPink}
          {$email}
        </p>
        <p class="flex items-center justify-center sm:justify-start gap-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 shrink-0 text-pink-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
          </svg>
          {$regio}
        </p>
      </div>
      <div class="flex gap-4">
        <div data-social-badges class="contents"></div>
      </div>
    </div>
  </footer>
HTML;
}

function script_js(string $base = ''): void
{
    echo <<<HTML

  <script src="{$base}MAKE_CHANGES_HERE/config.js"></script>
  <script src="{$base}script.js"></script>
HTML;
}

/**
 * Photo grid for the werk-* album pages. Renders an empty container that
 * script.js fills at runtime by trying to load foto1.jpg, foto2.jpg, ...
 * up to 16 from $folderPath, keeping whichever numbers actually exist.
 * Adding a photo is just dropping the next-numbered file in that folder —
 * no config file, no code, no PHP rebuild.
 */
function werk_gallery_body(string $heading, string $folderPath, bool $fontDisplay = false, string $base = ''): void
{
    $headingClass = $fontDisplay ? 'font-display text-3xl mt-4 mb-10 text-pink-600' : 'text-3xl font-bold mt-4 mb-10';
    $path = htmlspecialchars($folderPath, ENT_QUOTES);
    echo <<<HTML

  <section class="py-16 px-4">
    <div class="max-w-5xl mx-auto">
      <a href="{$base}index.html#werk" class="text-sm text-pink-600 font-normal">&larr; Terug</a>
      <h1 class="{$headingClass}">{$heading}</h1>
      <div data-numbered-gallery="{$path}" class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <div class="aspect-square bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-sm">Foto's laden&hellip;</div>
      </div>
    </div>
  </section>
HTML;
}

/**
 * One category block on the werk-overzicht hub page: heading, short text,
 * a handful of preview photos (same self-serve foto1.jpg, foto2.jpg, ...
 * mechanism as the full album pages, capped to $maxPreview), and a link
 * through to that category's full album page.
 */
function werk_overzicht_kaart(string $heading, string $tekst, string $folderPath, string $albumHref, string $accentClass, int $maxPreview = 3): void
{
    $path = htmlspecialchars($folderPath, ENT_QUOTES);
    $href = htmlspecialchars($albumHref, ENT_QUOTES);
    echo <<<HTML

    <div class="border border-gray-100 rounded-2xl p-6 sm:p-8">
      <h2 class="font-display text-3xl mb-2 {$accentClass}">{$heading}</h2>
      <p class="text-sm text-gray-500 mb-6 max-w-md">{$tekst}</p>
      <div data-numbered-gallery="{$path}" data-numbered-gallery-max="{$maxPreview}" class="grid grid-cols-3 gap-4 mb-6">
        <div class="aspect-square bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-sm">Foto's laden&hellip;</div>
      </div>
      <a href="{$href}" class="text-sm font-medium {$accentClass} hover:underline hover:underline-offset-4">Bekijk alle foto's &rarr;</a>
    </div>
HTML;
}
