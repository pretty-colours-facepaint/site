<?php
$title = "Elke feest of event — Pretty Colours Facepaint";
$description = "Foto's van schmink en glittertattoo's op kinderfeestjes en evenementen door Pretty Colours Facepaint, rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/werk-feesten-events.html";
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
<body class="font-sans text-gray-800">
<?php site_header(); ?>
<?php werk_gallery_body(content_config('werkPaginas.feestenEvents'), 'assets/mijn-werk/feesten-events/foto', fontDisplay: true); ?>
<?php footer_simple(); ?>
<?php script_js(); ?>

</body>
</html>
