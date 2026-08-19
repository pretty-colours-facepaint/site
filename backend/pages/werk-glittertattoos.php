<?php
$title = "Glittertattoo's — Pretty Colours Facepaint";
$description = "Voorbeelden van glittertattoo's door Pretty Colours Facepaint, voor kinderfeestjes en evenementen rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/werk-glittertattoos.html";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php
head_open($title, $description, $canonical);
og_title_description_url($title, $description, $canonical);
favicon_and_tailwind();
tailwind_cdn();
?>

</head>
<body class="font-sans text-gray-800">
<?php header_sub(); ?>
<?php werk_gallery_body('Terug naar Bekijk mijn werk', "Glittertattoo's"); ?>
<?php footer_simple(); ?>
<?php script_js(); ?>

</body>
</html>
