<?php
$title = "Mijn werk — Pretty Colours Facepaint";
$description = "Overzicht van schminken, glittertattoo's en feestjes & evenementen door Pretty Colours Facepaint, rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/pages/portfolio/index.html";
$base = '../../';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php
head_open($title, $description, $canonical);
og_title_description_url($title, $description, $canonical);
favicon_and_tailwind($base);
google_font_pacifico();
tailwind_cdn();
custom_style(fontDisplay: true);
?>

</head>
<body class="font-sans text-gray-700 bg-white overflow-x-hidden">
<?php site_header(base: $base); ?>

  <section class="max-w-5xl mx-auto px-4 pt-16 pb-20">
    <h1 class="font-display text-4xl mb-2 text-pink-600"><?= content_config('portfolio.titel') ?></h1>
    <p class="text-sm text-gray-500 mb-10 max-w-xl"><?= content_config('portfolio.intro') ?></p>

    <div class="grid gap-8">
<?php
werk_overzicht_kaart(
    content_config('portfolio.sectionA.titel'),
    content_config('portfolio.sectionA.tekst'),
    $base . 'MAAK_HIER_AANPASSINGEN/portfolio/sectionA/',
    'sectionA.html',
    'text-pink-600'
);
werk_overzicht_kaart(
    content_config('portfolio.sectionB.titel'),
    content_config('portfolio.sectionB.tekst'),
    $base . 'MAAK_HIER_AANPASSINGEN/portfolio/sectionB/',
    'sectionB.html',
    'text-purple-600'
);
werk_overzicht_kaart(
    content_config('portfolio.sectionC.titel'),
    content_config('portfolio.sectionC.tekst'),
    $base . 'MAAK_HIER_AANPASSINGEN/portfolio/sectionC/',
    'sectionC.html',
    'text-green-600'
);
?>
    </div>
  </section>
<?php footer_full(base: $base); ?>
<?php script_js($base); ?>

</body>
</html>
