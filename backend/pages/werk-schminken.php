<?php
$title = "Schminken — Pretty Colours Facepaint";
$description = "Voorbeelden van schminkwerk door Pretty Colours Facepaint, voor kinderfeestjes en evenementen rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/pages/werk-schminken.html";
$base = '../';
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
<body class="font-sans text-gray-800">
<?php site_header(base: $base); ?>
<?php werk_gallery_body(content_config('werkPaginas.schminken'), $base . 'MAKE_CHANGES_HERE/mijn-werk/schminken/foto', fontDisplay: true, base: $base); ?>
<?php footer_full(base: $base); ?>
<?php script_js($base); ?>

</body>
</html>
