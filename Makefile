.PHONY: build watch

build:
	php builder/build.php

watch:
	php builder/build.php
	fswatch -o builder | xargs -n1 -I{} php builder/build.php
