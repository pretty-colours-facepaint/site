<?php
/**
 * Renders backend/pages/*.php to static .html files: index.php goes to the
 * repo root, everything else goes to /pages/ — so the root only ever holds
 * index.html plus the folders people are meant to touch.
 * Run after editing anything under backend/: php backend/build.php
 */

require __DIR__ . '/partials/layout.php';

$root = dirname(__DIR__);
$pagesDir = __DIR__ . '/pages';

$pages = [
    'index.php' => 'index.html',
    'prijzen.php' => 'pages/prijzen.html',
    'aanvraag.php' => 'pages/aanvraag.html',
    'werk.php' => 'pages/werk.html',
    'werk-schminken.php' => 'pages/werk-schminken.html',
    'werk-glittertattoos.php' => 'pages/werk-glittertattoos.html',
    'werk-feesten-events.php' => 'pages/werk-feesten-events.html',
];

if (!is_dir($root . '/pages')) {
    mkdir($root . '/pages');
}

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
