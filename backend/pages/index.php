<?php
$title = "Pretty Colours Facepaint — Schminken &amp; Glittertattoo's in Hoofddorp";
$description = "Sanne Lek schminkt en maakt glittertattoo's voor kinderfeestjes, evenementen en bedrijven in een straal van 30 km rond Hoofddorp. Vraag vrijblijvend een offerte aan.";
$canonical = "https://prettycolours-facepaint.nl/";
$ogDescription = "Schminken en glittertattoo's voor kinderfeestjes, evenementen en bedrijven, in een straal van 30 km rond Hoofddorp.";
$ogImage = "https://prettycolours-facepaint.nl/assets/example-schminken.jpg";
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
  <section id="werk" class="max-w-5xl mx-auto px-4 pt-16 pb-14">
    <div class="grid sm:grid-cols-3 gap-6 text-center">
      <div>
        <img src="assets/icon-schminken.png" alt="" class="w-14 h-14 rounded-full mx-auto mb-3 shadow-sm">
        <h3 class="font-display text-xl mb-1 text-pink-600">Schminken</h3>
        <p class="text-xs text-gray-500">Creatieve en kleurrijke schmink voor jong en oud.</p>
      </div>
      <div>
        <img src="assets/icon-glittertattoo.png" alt="" class="w-14 h-14 rounded-full mx-auto mb-3 shadow-sm">
        <h3 class="font-display text-xl mb-1 text-purple-600">Glittertattoo's</h3>
        <p class="text-xs text-gray-500">Mooie, tijdelijke glittertattoo's in allerlei designs.</p>
      </div>
      <div>
        <img src="assets/icon-feest.png" alt="" class="w-14 h-14 rounded-full mx-auto mb-3 shadow-sm">
        <h3 class="font-display text-xl mb-1 text-green-600">Feestjes &amp; Evenementen</h3>
        <p class="text-xs text-gray-500">Voor kinderfeestjes, schoolfeesten, markten en andere gelegenheden.</p>
      </div>
    </div>

    <!-- Three example photos, linking to their album -->
    <div class="relative">
      <img src="assets/splash-left.jpg" alt="" class="hidden lg:block absolute z-0 -left-20 top-1/2 -translate-y-1/2 w-24 pointer-events-none select-none" aria-hidden="true">
      <img src="assets/splash-right.jpg" alt="" class="hidden lg:block absolute z-0 -right-20 top-1/2 -translate-y-1/2 w-24 pointer-events-none select-none" aria-hidden="true">

      <div class="relative z-10 grid sm:grid-cols-3 gap-6 mt-8">
        <a href="werk-schminken.html">
          <img src="assets/example-schminken.jpg" alt="Voorbeeld schminken" class="aspect-square w-full object-cover rounded-xl shadow-sm hover:opacity-90 transition">
        </a>
        <a href="werk-glittertattoos.html">
          <img src="assets/example-glittertattoo.jpg" alt="Voorbeeld glittertattoo" class="aspect-square w-full object-cover rounded-xl shadow-sm hover:opacity-90 transition">
        </a>
        <a href="werk-feesten-events.html">
          <img src="assets/example-feest.jpg" alt="Voorbeeld feest" class="aspect-square w-full object-cover rounded-xl shadow-sm hover:opacity-90 transition">
        </a>
      </div>
    </div>

    <!-- Two CTA buttons -->
    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">
      <a href="werk-schminken.html" class="border-2 border-pink-500 text-pink-600 rounded-full px-6 py-3 text-sm text-center font-medium hover:bg-pink-50 transition">🖼 BEKIJK MIJN WERK</a>
      <a href="prijzen.html" class="border-2 border-purple-500 text-purple-600 rounded-full px-6 py-3 text-sm text-center font-medium hover:bg-purple-50 transition">🏷 BEKIJK DE PRIJZEN</a>
    </div>
  </section>

  <!-- About / bio card -->
  <section id="over" class="max-w-5xl mx-auto px-4 pb-20">
    <div class="border border-orange-100 rounded-2xl p-6 sm:p-10 flex flex-col sm:flex-row items-center gap-8 bg-orange-50">
      <img src="assets/portrait.png" alt="Portret" class="w-56 h-56 sm:w-64 sm:h-64 rounded-full object-cover shrink-0 shadow-sm">
      <div class="text-center sm:text-left">
        <h2 class="font-display text-3xl mb-3 text-pink-600">Hoi, ik ben Sanne!</h2>
        <p class="text-sm text-gray-500 mb-6 max-w-md">Mijn naam is Sanne Lek en ik schmink op kinderfeestjes, evenementen en voor bedrijven of winkels in een straal van 30 km rond Hoofddorp.</p>
        <a href="aanvraag.html" class="inline-block rainbow-fill-btn text-white rounded-full px-6 py-3 text-sm font-medium shadow hover:opacity-90 transition">AANVRAAG DOEN ✉</a>
      </div>
    </div>
  </section>
<?php footer_full(); ?>
<?php script_js(); ?>

</body>
</html>
