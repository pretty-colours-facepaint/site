.PHONY: build watch

build:
	php builder/build.php

watch:
	php builder/build.php
	fswatch -o builder MAAK_HIER_AANPASSINGEN/site-text-content.js assets/error-content.js | xargs -n1 -I{} php builder/build.php
