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
google_font_pacifico();
tailwind_cdn();
custom_style(fontDisplay: true, rainbowFill: true);
?>

</head>
<body class="font-sans text-gray-700 bg-white">
<?php site_header(); ?>

  <section class="max-w-3xl mx-auto px-4 py-16">
    <a href="index.html#werk" class="text-sm text-pink-600 font-medium">&larr; Terug</a>
    <h1 class="font-display text-3xl mt-4 mb-10 text-pink-600">Prijzen</h1>

    <div class="grid sm:grid-cols-3 gap-6">
      <div class="border rounded-xl shadow-sm text-center overflow-hidden flex flex-col">
        <div class="p-6">
          <img src="assets/example-schminken.jpg" alt="Voorbeeld schminken" class="w-28 h-28 object-cover mx-auto mb-4" style="<?= mask_style('<path fill-rule="evenodd" clip-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" />') ?>">
          <h3 class="font-semibold text-lg text-pink-600">Schminken</h3>
        </div>
        <div class="border-t bg-gray-50 p-6 mt-auto">
          <p class="text-2xl font-bold mb-2">€ 0,-</p>
          <p class="text-gray-500 text-sm">Placeholder tekst over de schminkprijzen.</p>
        </div>
      </div>
      <div class="border rounded-xl shadow-sm text-center overflow-hidden flex flex-col">
        <div class="p-6">
          <img src="assets/example-glittertattoo.jpg" alt="Voorbeeld glittertattoo" class="w-28 h-28 object-cover mx-auto mb-4" style="<?= mask_style('<path d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" />') ?>">
          <h3 class="font-semibold text-lg text-purple-600">Glittertattoo's</h3>
        </div>
        <div class="border-t bg-gray-50 p-6 mt-auto">
          <p class="text-2xl font-bold mb-2">€ 0,-</p>
          <p class="text-gray-500 text-sm">Placeholder tekst over de glittertattoo-prijzen.</p>
        </div>
      </div>
      <div class="border rounded-xl shadow-sm text-center overflow-hidden flex flex-col">
        <div class="p-6">
          <img src="assets/example-feest.jpg" alt="Voorbeeld feest" class="w-28 h-28 object-cover mx-auto mb-4" style="<?= mask_style('<path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />') ?>">
          <h3 class="font-semibold text-lg text-green-600">Feestjes &amp; evenementen</h3>
        </div>
        <div class="border-t bg-gray-50 p-6 mt-auto">
          <p class="text-2xl font-bold mb-2">€ 0,-</p>
          <p class="text-gray-500 text-sm">Placeholder tekst over de prijzen voor feestjes en evenementen.</p>
        </div>
      </div>
    </div>

    <p class="text-center text-gray-500 text-sm mt-10">Placeholder tekst: neem contact op voor een offerte op maat.</p>
    <div class="text-center mt-4">
      <?php rainbow_button('AANVRAAG DOEN ' . mail_icon_svg('size-4 inline align-text-bottom ml-2', strokeWidth: 2.5), 'solid', href: 'aanvraag.html', extraClass: 'inline-block px-8 py-4 text-sm font-medium'); ?>
    </div>
  </section>
<?php footer_full('text-xs'); ?>

</body>
</html>
