<?php
$title = "Prijzen — Pretty Colours Facepaint";
$description = "Bekijk de prijzen voor schminken en glittertattoo's bij Pretty Colours Facepaint, actief voor kinderfeestjes en evenementen rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/prijzen.html";
$ogDescription = "Bekijk de prijzen voor schminken en glittertattoo's bij Pretty Colours Facepaint, actief rond Hoofddorp.";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php
head_open($title, $description, $canonical, $title, $ogDescription);
og_title_description_url($title, $ogDescription, $canonical);
favicon_and_tailwind();
tailwind_cdn();
custom_style(fontDisplay: false, rainbowBtn: true);
?>

</head>
<body class="font-sans text-gray-700 bg-white">
<?php header_sub('rainbow-border-btn text-black rounded-full px-5 py-2.5 font-medium hover:bg-gray-50 transition'); ?>

  <section class="max-w-3xl mx-auto px-4 py-16">
    <a href="index.html#werk" class="text-sm text-pink-600 font-medium">&larr; Terug naar home</a>
    <h1 class="text-3xl font-bold mt-4 mb-10 text-pink-600">Prijzen</h1>

    <div class="grid sm:grid-cols-3 gap-6">
      <div class="border rounded-xl p-6 shadow-sm text-center">
        <img src="assets/example-schminken.jpg" alt="Voorbeeld schminken" class="w-16 h-16 rounded-full object-cover mx-auto mb-3 shadow-sm">
        <h3 class="font-semibold text-lg mb-2 text-pink-600">Schminken</h3>
        <p class="text-2xl font-bold mb-2">€ 0,-</p>
        <p class="text-gray-500 text-sm">Placeholder tekst over de schminkprijzen.</p>
      </div>
      <div class="border rounded-xl p-6 shadow-sm text-center">
        <img src="assets/example-glittertattoo.jpg" alt="Voorbeeld glittertattoo" class="w-16 h-16 rounded-full object-cover mx-auto mb-3 shadow-sm">
        <h3 class="font-semibold text-lg mb-2 text-purple-600">Glittertattoo's</h3>
        <p class="text-2xl font-bold mb-2">€ 0,-</p>
        <p class="text-gray-500 text-sm">Placeholder tekst over de glittertattoo-prijzen.</p>
      </div>
      <div class="border rounded-xl p-6 shadow-sm text-center">
        <img src="assets/example-feest.jpg" alt="Voorbeeld feest" class="w-16 h-16 rounded-full object-cover mx-auto mb-3 shadow-sm">
        <h3 class="font-semibold text-lg mb-2 text-green-600">Feestjes &amp; evenementen</h3>
        <p class="text-2xl font-bold mb-2">€ 0,-</p>
        <p class="text-gray-500 text-sm">Placeholder tekst over de prijzen voor feestjes en evenementen.</p>
      </div>
    </div>

    <p class="text-center text-gray-500 text-sm mt-10">Placeholder tekst: neem contact op voor een offerte op maat.</p>
    <div class="text-center mt-4">
      <a href="aanvraag.html" class="inline-block bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 text-white rounded-full px-6 py-3 text-sm font-medium shadow hover:opacity-90 transition">AANVRAAG DOEN ✉</a>
    </div>
  </section>
<?php footer_full('text-xs'); ?>

</body>
</html>
