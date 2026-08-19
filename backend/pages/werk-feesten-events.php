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
tailwind_cdn();
?>

</head>
<body class="font-sans text-gray-800">
<?php header_sub(); ?>
<?php werk_gallery_body('Terug naar Bekijk mijn werk', 'Elke feest of event'); ?>
<?php footer_simple(); ?>
<?php script_js(); ?>

</body>
</html>
