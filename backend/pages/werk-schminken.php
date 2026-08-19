<?php
$title = "Schminken — Pretty Colours Facepaint";
$description = "Voorbeelden van schminkwerk door Pretty Colours Facepaint, voor kinderfeestjes en evenementen rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/werk-schminken.html";
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
<?php werk_gallery_body('Schminken', fontDisplay: true); ?>
<?php footer_full(); ?>
<?php script_js(); ?>

</body>
</html>
