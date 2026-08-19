<?php
/**
 * Renders backend/pages/*.php to the static .html files at the repo root.
 * Run after editing anything under backend/: php backend/build.php
 */

require __DIR__ . '/partials/layout.php';

$root = dirname(__DIR__);
$pagesDir = __DIR__ . '/pages';

$pages = [
    'index.php' => 'index.html',
    'prijzen.php' => 'prijzen.html',
    'aanvraag.php' => 'aanvraag.html',
    'werk.php' => 'werk.html',
    'werk-schminken.php' => 'werk-schminken.html',
    'werk-glittertattoos.php' => 'werk-glittertattoos.html',
    'werk-feesten-events.php' => 'werk-feesten-events.html',
];

foreach ($pages as $source => $output) {
    ob_start();
    require $pagesDir . '/' . $source;
    $html = ob_get_clean();

    // Collapse the blank lines left behind by PHP's open/close tags.
    $html = preg_replace('/\n{3,}/', "\n\n", $html);
    $html = ltrim($html) . "\n";

    file_put_contents($root . '/' . $output, $html);
    echo "built {$output}\n";
}
