<?php
$title = "Elke feest of event — Pretty Colours Facepaint";
$description = "Foto's van schmink en glittertattoo's op (kinder)feestjes en evenementen door Pretty Colours Facepaint. Vanuit Hoofddorp, binnen geheel Nederland.";
$canonical = "https://prettycolours-facepaint.nl/pages/portfolio/sectionC.html";
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
<body class="font-sans text-gray-800">
<?php site_header(base: $base); ?>
<?php werk_gallery_body(content_config('portfolio.paginas.sectionC'), $base . 'MAAK_HIER_AANPASSINGEN/portfolio/sectionC/', fontDisplay: true, base: $base); ?>
<?php footer_full(base: $base); ?>
<?php script_js($base); ?>

</body>
</html>
