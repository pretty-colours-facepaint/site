.PHONY: build watch

build:
	sh builder/rebuild.sh

watch:
	sh builder/rebuild.sh
	fswatch -o builder MAAK_HIER_AANPASSINGEN/site-text-content.js assets/error-content.js | xargs -n1 -I{} sh builder/rebuild.sh
