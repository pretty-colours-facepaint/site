<?php
$title = "Aanvraag doen — Pretty Colours Facepaint";
$description = "Vraag vrijblijvend schminken of glittertattoo's aan voor je kinderfeestje, evenement of bedrijf rond Hoofddorp.";
$canonical = "https://prettycolours-facepaint.nl/aanvraag.html";
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
<body class="font-sans text-gray-700 bg-white">
<?php site_header(); ?>

  <!-- Contact form -->
  <section id="contact" class="max-w-lg mx-auto px-4 py-16">
    <a href="index.html" class="text-sm text-pink-600 font-medium">&larr; Terug naar home</a>
    <h1 class="font-display text-3xl text-center mt-6 mb-2 text-pink-600">Aanvraag doen</h1>
    <p class="text-gray-500 text-center text-sm mb-8">Vul het formulier in en ik neem contact met je op over je feest of evenement.</p>

    <form id="contact-form" action="https://api.staticforms.dev/submit" method="POST" class="bg-white border rounded-2xl shadow-sm p-6 space-y-4">
      <input type="hidden" name="subject" value="pretty-colours-facepaint submission">
      <!-- Honeypot field for spam protection -->
      <input type="text" name="honeypot" class="hidden" tabindex="-1" autocomplete="off">

      <div>
        <label for="name" class="block text-sm font-medium mb-1">Naam</label>
        <input type="text" id="name" name="name" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
        <input type="email" id="email" name="email" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>

      <div>
        <label for="eventDate" class="block text-sm font-medium mb-1">Datum evenement</label>
        <input type="date" id="eventDate" name="eventDate" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
      </div>

      <div>
        <label for="message" class="block text-sm font-medium mb-1">Bericht</label>
        <textarea id="message" name="message" rows="5" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
      </div>

      <button type="submit" class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 text-white font-semibold py-4 rounded-full hover:opacity-90 transition">Verstuur aanvraag</button>
      <p id="form-status" class="text-sm text-center"></p>
    </form>
  </section>
<?php footer_full(); ?>
<?php script_js(); ?>

</body>
</html>
