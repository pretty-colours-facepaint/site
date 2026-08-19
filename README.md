# Pretty Colours Facepaint

Simple static Dutch-language site for a face painting events business, styled with [Tailwind CSS](https://tailwindcss.com) (via CDN, no build step) and a contact form powered by [Static Forms](https://staticforms.dev).

- `index.html` — homepage
- `pages/werk.html` — "Mijn werk" overview, linking to the three album pages below
- `pages/werk-schminken.html`, `pages/werk-glittertattoos.html`, `pages/werk-feesten-events.html` — photo albums
- `pages/prijzen.html` — pricing page
- `pages/aanvraag.html` — contact/request form
- `assets/` — logo, service icons, and portrait (not meant for client edits)
- `MAAK_HIER_AANPASSINGEN/` — everything the client edits directly, see below

## MAAK_HIER_AANPASSINGEN/ — what the client can change without touching code

- `MAAK_HIER_AANPASSINGEN/site-text-content.js` — every piece of editable page text (prices, contact info, homepage copy, form labels), one JS object
- `MAAK_HIER_AANPASSINGEN/portfolio/` — the photos for the album pages, one subfolder per page
- `MAAK_HIER_AANPASSINGEN/covers/` — the 3 teaser photos shared by the homepage and prices page

## Setup

The contact form is already wired up with a live Static Forms API key. Just replace placeholder text and photos with real content.

## Adding photos to an album page

No config file, no PHP, no code, **no rebuild** — just drop image files into a folder and push. See `MAAK_HIER_AANPASSINGEN/portfolio/LEES-MIJ.txt` for the walkthrough in Dutch; short version:

Each album page (`pages/werk-schminken.html`, `pages/werk-glittertattoos.html`, `pages/werk-feesten-events.html`) shows every photo it finds, numbered `foto1.jpg` through `foto16.jpg`, in its matching folder:

- `MAAK_HIER_AANPASSINGEN/portfolio/schminken/`
- `MAAK_HIER_AANPASSINGEN/portfolio/glittertattoos/`
- `MAAK_HIER_AANPASSINGEN/portfolio/feesten-events/`

To add a photo: drop a `.jpg` file named with the next free number (`foto2.jpg`, `foto3.jpg`, ...) into the right folder — numbers don't need to be consecutive. To remove one: delete it. The browser checks for the numbered files itself on page load, so this needs **no PHP rebuild at all** — the change is live as soon as it's pushed.

The 3 teaser photos in `MAAK_HIER_AANPASSINGEN/covers/` work the same way but at fixed positions — see that folder's `LEES-MIJ.txt`.

## Editing page text

No code — just edit `MAAK_HIER_AANPASSINGEN/site-text-content.js`, a single JavaScript object with every editable string on the site (prices, contact info, homepage copy, form field labels), grouped by page/section. Change only the text between the quotes; leave everything else as-is. Type `<br>` inside a text to force a line break.

Like photos, this needs **no PHP rebuild** — `site-text-content.js` is loaded directly by the browser on every page load, so editing and pushing it is the entire workflow. If the file has a typo (broken JavaScript) or a value is missing, the affected spot on the page shows a clear red error instead of failing silently or breaking the whole page.

## Running locally

Just open `index.html` in a browser (double-click works — all internal links and assets use relative paths, no local server required), or serve the folder:

```
npx serve .
```

## Deploying

This is a static site — deploy the folder as-is to GitHub Pages, Netlify, Vercel, etc. Every internal link is relative, so it also works fine if the site ends up served from a subpath instead of a domain root.

## Editing pages

The `.html` files are generated from templates in `backend/` (PHP, used only to build — nothing server-side runs in production). Edit the shared markup in `backend/partials/layout.php` or a page in `backend/pages/`, then rebuild:

```
make build
```

`index.php` builds to `index.html` at the repo root; every other page builds into `pages/`. This overwrites the generated `.html` files. Commit both the `backend/` changes and the regenerated `.html` files.

Every template other than `index.php` sets `$base = '../';` near the top (since it renders one level below the root, into `pages/`) and threads it through `site_header()`, `footer_full()`, `script_js()`, etc. via a `base: $base` argument, and through folder paths as `$base . 'MAAK_HIER_AANPASSINGEN/...'`. Keep that pattern when adding pages or links so `file://` preview keeps working.
