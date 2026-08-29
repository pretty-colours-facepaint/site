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

/**
 * Reads a plain JS file that declares `const <varName> = { ... }` and returns
 * that object as a PHP array, by letting node evaluate it. Used to pull the
 * client-editable copy (site-text-content.js / error-content.js) into the
 * build so it can be baked into the static HTML for crawlers — script.js still
 * re-applies the same values at runtime, so client edits keep working without
 * a rebuild. Returns [] if node is unavailable or the file can't be parsed.
 */
function ssr_load_js_object(string $file, string $varName): array
{
    if (!is_file($file)) {
        return [];
    }
    // Append the stringify call inside the eval'd source so it shares scope
    // with the `const <varName>` declaration (a const in direct eval doesn't
    // leak to the surrounding scope).
    $script = 'const fs=require("fs");'
        . 'const src=fs.readFileSync(process.argv[1],"utf8");'
        . 'eval(src + "\n;process.stdout.write(JSON.stringify(' . $varName . '));");';
    $cmd = 'node -e ' . escapeshellarg($script) . ' ' . escapeshellarg($file) . ' 2>/dev/null';
    $out = shell_exec($cmd);
    $data = json_decode((string) $out, true);
    if (!is_array($data)) {
        fwrite(STDERR, "warning: could not load {$varName} from {$file} for server-side rendering\n");
        return [];
    }
    return $data;
}

$GLOBALS['SSR_CONTENT'] = ssr_load_js_object($root . '/MAAK_HIER_AANPASSINGEN/site-text-content.js', 'SITE_CONFIG');
$GLOBALS['SSR_ERROR_CONTENT'] = ssr_load_js_object($root . '/assets/error-content.js', 'ERROR_CONTENT');

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
