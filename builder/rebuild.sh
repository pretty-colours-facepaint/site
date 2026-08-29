#!/bin/sh
# Full build: render the PHP pages to static HTML, then (re)generate the
# self-hosted Tailwind CSS by scanning those generated .html files.
# Order matters — Tailwind's content scan needs the HTML to already exist.
set -e
cd "$(dirname "$0")/.."

php builder/build.php

if npx --yes tailwindcss@3 -c builder/tailwind.config.js \
    -i builder/tailwind.input.css -o assets/tailwind.css --minify >/dev/null 2>&1; then
  echo "built assets/tailwind.css"
else
  echo "warning: tailwindcss unavailable — assets/tailwind.css left unchanged" >&2
fi
