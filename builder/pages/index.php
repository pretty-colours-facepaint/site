<?php
$title = "Pretty Colours Facepaint — Schminken &amp; Glittertattoo's in Hoofddorp";
$description = "Sanne Lek schminkt en zet glittertattoo's op (kinder)feestjes en evenementen — voor particulieren, bedrijven en winkels. Vanuit Hoofddorp, binnen geheel Nederland. 5 jaar ervaring. Vraag vrijblijvend een offerte aan.";
$canonical = "https://prettycolours-facepaint.nl/";
$ogDescription = "Schminken en glittertattoo's op (kinder)feestjes en evenementen, voor particulieren, bedrijven en winkels. Vanuit Hoofddorp, binnen geheel Nederland.";
$ogImage = "https://prettycolours-facepaint.nl/MAAK_HIER_AANPASSINGEN/posters/1.jpeg";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php
head_open($title, $description, $canonical, $title, $ogDescription);
og_locale_and_site_name();
og_title_description_url($title, $ogDescription, $canonical);
og_and_twitter_image($ogImage);
twitter_title_description($title, $ogDescription, $ogImage);
favicon_and_tailwind();
google_font_pacifico();
tailwind_cdn();
custom_style(fontDisplay: true, rainbowFill: true);
local_business_json_ld();
?>

</head>
<body class="font-sans text-gray-700 bg-white overflow-x-hidden">
<?php construction_overlay(); ?>

  <!-- Header -->
<?php site_header(onHome: true); ?>

  <!-- Three services: icon + heading + text -->
  <section id="portfolio" class="max-w-5xl mx-auto px-4 pt-16 pb-14">
    <div class="grid sm:grid-cols-3 gap-6 text-center">
      <div >
        <img src="assets/icon-schminken.png" alt="" class="w-14 h-14 rounded-full mx-auto mb-3 shadow-sm">
        <h3 class="font-display text-3xl mb-1 text-pink-600"><?= content_config('homepage.sectionA.titel') ?></h3>
        <p class="pt-6 text-sm text-gray-500"><?= content_config('homepage.sectionA.tekst') ?></p>
      </div>
      <div>
        <img src="assets/icon-glittertattoo.png" alt="" class="w-14 h-14 rounded-full mx-auto mb-3 shadow-sm">
        <h3 class="font-display text-3xl mb-1 text-purple-600"><?= content_config('homepage.sectionB.titel') ?></h3>
        <p class="pt-6 text-sm text-gray-500"><?= content_config('homepage.sectionB.tekst') ?></p>
      </div>
      <div>
        <img src="assets/icon-feest.png" alt="" class="w-14 h-14 rounded-full mx-auto mb-3 shadow-sm">
        <h3 class="font-display text-3xl mb-1 text-green-600"><?= content_config('homepage.sectionC.titel') ?></h3>
        <p class="pt-6 text-sm text-gray-500"><?= content_config('homepage.sectionC.tekst') ?></p>
      </div>
    </div>

    <!-- Three example photos, linking to their album -->
    <div class="relative">
      <img src="assets/splash-left.jpg" alt="" class="hidden lg:block absolute z-0 -left-20 top-1/2 -translate-y-1/2 w-24 pointer-events-none select-none" aria-hidden="true">
      <img src="assets/splash-right.jpg" alt="" class="hidden lg:block absolute z-0 -right-20 top-1/2 -translate-y-1/2 w-24 pointer-events-none select-none" aria-hidden="true">

      <div class="relative z-10 grid sm:grid-cols-3 gap-6 mt-8">
        <a href="pages/portfolio/sectionA.html">
          <img <?= content_config_image('homepage.sectionA.cover') ?> alt="Voorbeeld schminken" class="aspect-square w-full object-cover rounded-xl shadow-sm hover:opacity-90 transition">
        </a>
        <a href="pages/portfolio/sectionB.html">
          <img <?= content_config_image('homepage.sectionB.cover') ?> alt="Voorbeeld glittertattoo" class="aspect-square w-full object-cover rounded-xl shadow-sm hover:opacity-90 transition">
        </a>
        <a href="pages/portfolio/sectionC.html">
          <img <?= content_config_image('homepage.sectionC.cover') ?> alt="Voorbeeld feest" class="aspect-square w-full object-cover rounded-xl shadow-sm hover:opacity-90 transition">
        </a>
      </div>
    </div>

    <!-- Two CTA buttons -->
    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
      <a href="pages/portfolio/index.html" class="inline-flex items-center justify-center gap-2 border-2 border-pink-500 text-pink-600 rounded-full px-8 py-4 text-sm text-center font-medium hover:bg-pink-500/10 transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
        <?= content_config('homepage.callToActionPortfolio') ?>
      </a>
      <a href="pages/prijzen.html" class="inline-flex items-center justify-center gap-2 border-2 border-purple-500 text-purple-600 rounded-full px-8 py-4 text-sm text-center font-medium hover:bg-purple-500/10 transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
        </svg>
        <?= content_config('homepage.callToActionPrijzen') ?>
      </a>
    </div>
  </section>

  <!-- About / bio card -->
  <section id="over" class="max-w-5xl mx-auto px-4 pb-20">
    <div class="border border-orange-100 rounded-2xl p-6 sm:p-10 flex flex-col sm:flex-row items-center gap-8 bg-orange-50" style="background-color: #fdf9f5;">
      <img <?= content_config_image('homepage.over.foto') ?> alt="Portret" class="w-56 h-56 sm:w-64 sm:h-64 rounded-full object-cover shrink-0 ">
      <div class="text-center sm:text-left">
        <h2 class="font-display text-3xl mb-3 text-pink-600"><?= content_config('homepage.over.titel') ?></h2>
        <p class="text-sm text-gray-500 mb-6 max-w-md"><?= content_config('homepage.over.tekst') ?></p>
        <?php rainbow_button(content_config('contact.callToAction') . ' ' . mail_icon_svg('size-4 inline align-text-bottom ml-2', strokeWidth: 2.5), 'solid', href: 'pages/aanvraag.html', extraClass: 'inline-block px-8 py-4 text-sm font-medium'); ?>
      </div>
    </div>
  </section>
<?php footer_full(); ?>
<?php script_js(); ?>

</body>
</html>
