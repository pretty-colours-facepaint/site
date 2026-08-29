<?php
$title = "Aanvraag doen - Pretty Colours Facepaint";
$description = "Vraag vrijblijvend schminken of glittertattoo's aan voor je (kinder)feestje of evenement. Vanuit Hoofddorp, in heel Nederland.";
$canonical = "https://prettycolours-facepaint.nl/pages/aanvraag.html";
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
custom_style(fontDisplay: true, rainbowFill: true);
?>

</head>
<body class="font-sans text-gray-700 bg-white">
<?php site_header(base: $base); ?>

  <!-- Contact form -->
  <section id="contact" class="max-w-lg mx-auto px-4 py-16">
    <a href="<?= $base ?>index.html" class="text-sm text-pink-600 font-normal">&larr; Terug</a>
    <h1 class="font-display text-3xl text-center mt-6 mb-2 text-pink-600"><?= content_config('aanvraag.titel') ?></h1>
    <p class="text-gray-500 text-center text-sm mb-8"><?= content_config('aanvraag.intro') ?></p>

    <form id="contact-form" action="https://api.staticforms.dev/submit" method="POST" class="bg-white border rounded-2xl shadow-sm p-6 space-y-4">
      <input type="hidden" name="subject" value="pretty-colours-facepaint submission">
      <!-- Honeypot field for spam protection -->
      <input type="text" name="honeypot" class="hidden" tabindex="-1" autocomplete="off">

      <div>
        <label for="name" class="block text-sm font-medium mb-1"><?= content_config('aanvraag.labelNaam') ?></label>
        <input type="text" id="name" name="name" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium mb-1"><?= content_config('aanvraag.labelEmail') ?></label>
        <input type="email" id="email" name="email" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>

      <div>
        <label for="eventDate" class="block text-sm font-medium mb-1"><?= content_config('aanvraag.labelDatum') ?></label>
        <input type="date" id="eventDate" name="eventDate" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>

      <div>
        <label for="message" class="block text-sm font-medium mb-1"><?= content_config('aanvraag.labelBericht') ?></label>
        <textarea id="message" name="message" rows="5" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
      </div>

      <?php rainbow_button(content_config('aanvraag.knop'), 'solid', type: 'submit', extraClass: 'w-full py-4 font-semibold'); echo "\n      "; ?><p id="form-status" class="text-sm text-center"></p>
    </form>
  </section>
<?php footer_full(base: $base); ?>
<?php script_js($base); ?>

</body>
</html>
