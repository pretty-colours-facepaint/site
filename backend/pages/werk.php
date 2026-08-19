<?php
$title = "Mijn werk — Pretty Colours Facepaint";
$description = "Overzicht van schminken, glittertattoo's en feestjes & evenementen door Pretty Colours Facepaint, rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/werk.html";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php
head_open($title, $description, $canonical);
og_title_description_url($title, $description, $canonical);
favicon_and_tailwind();
google_font_pacifico();
tailwind_cdn();
custom_style(fontDisplay: true);
?>

</head>
<body class="font-sans text-gray-700 bg-white overflow-x-hidden">
<?php site_header(onWerk: true); ?>

  <section class="max-w-5xl mx-auto px-4 pt-16 pb-20">
    <h1 class="font-display text-4xl mb-2 text-pink-600"><?= content_config('werkOverzicht.titel') ?></h1>
    <p class="text-sm text-gray-500 mb-10 max-w-xl"><?= content_config('werkOverzicht.intro') ?></p>

    <div class="grid gap-8">
<?php
werk_overzicht_kaart(
    content_config('werkOverzicht.schminken.titel'),
    content_config('werkOverzicht.schminken.tekst'),
    'assets/mijn-werk/schminken/foto',
    'werk-schminken.html',
    'text-pink-600'
);
werk_overzicht_kaart(
    content_config('werkOverzicht.glittertattoos.titel'),
    content_config('werkOverzicht.glittertattoos.tekst'),
    'assets/mijn-werk/glittertattoos/foto',
    'werk-glittertattoos.html',
    'text-purple-600'
);
werk_overzicht_kaart(
    content_config('werkOverzicht.feestenEvents.titel'),
    content_config('werkOverzicht.feestenEvents.tekst'),
    'assets/mijn-werk/feesten-events/foto',
    'werk-feesten-events.html',
    'text-green-600'
);
?>
    </div>
  </section>
<?php footer_full(); ?>
<?php script_js(); ?>

</body>
</html>
