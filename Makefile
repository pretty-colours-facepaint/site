.PHONY: build watch

build:
	php backend/build.php

watch:
	php backend/build.php
	fswatch -o backend | xargs -n1 -I{} php backend/build.php
