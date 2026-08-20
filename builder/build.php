<?php
/**
 * Renders builder/pages/*.php to static .html files: index.php goes to the
 * repo root, everything else goes to /pages/ — so the root only ever holds
 * index.html plus the folders people are meant to touch.
 * Run after editing anything under builder/: php builder/build.php
 */

require __DIR__ . '/partials/layout.php';

$root = dirname(__DIR__);
$pagesDir = __DIR__ . '/pages';

$pages = [
    'index.php' => 'index.html',
    'prijzen.php' => 'pages/prijzen.html',
    'aanvraag.php' => 'pages/aanvraag.html',
    'portfolio/index.php' => 'pages/portfolio/index.html',
    'portfolio/sectionA.php' => 'pages/portfolio/sectionA.html',
    'portfolio/sectionB.php' => 'pages/portfolio/sectionB.html',
    'portfolio/sectionC.php' => 'pages/portfolio/sectionC.html',
];

if (!is_dir($root . '/pages/portfolio')) {
    mkdir($root . '/pages/portfolio', recursive: true);
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
