# Pretty Colours Facepaint

Simple static Dutch-language site for a face painting events business, styled with [Tailwind CSS](https://tailwindcss.com) (via CDN, no build step) and a contact form powered by [Static Forms](https://staticforms.dev).

- `index.html` — homepage
- `werk-schminken.html`, `werk-glittertattoos.html`, `werk-feesten-events.html` — placeholder photo albums linked from the homepage's "Bekijk mijn werk" section
- `prijzen.html` — placeholder pricing page linked from the "Bekijk de prijzen" button
- `assets/` — logo, service icons, and portrait
- `assets/mijn-werk/` — the photos for the album pages, one subfolder per page
- `assets/foto-voorpagina/` — the 3 teaser photos shared by the homepage and prices page
- `config.js` — every piece of editable page text (prices, contact info, homepage copy, form labels), one JS object

## Setup

The contact form is already wired up with a live Static Forms API key. Just replace placeholder text and photos in the album pages with real content.

## Adding photos to an album page

No config file, no PHP, no code, **no rebuild** — just drop image files into a folder and push. See `assets/mijn-werk/LEES-MIJ.txt` for the walkthrough in Dutch; short version:

Each album page (`werk-schminken.html`, `werk-glittertattoos.html`, `werk-feesten-events.html`) shows every photo it finds, numbered `foto1.jpg` through `foto16.jpg`, in its matching folder:

- `assets/mijn-werk/schminken/`
- `assets/mijn-werk/glittertattoos/`
- `assets/mijn-werk/feesten-events/`

To add a photo: drop a `.jpg` file named with the next free number (`foto2.jpg`, `foto3.jpg`, ...) into the right folder — numbers don't need to be consecutive. To remove one: delete it. The browser checks for `foto1.jpg` through `foto16.jpg` itself on page load, so this needs **no PHP rebuild at all** — the change is live as soon as it's pushed.

The 3 teaser photos in `assets/foto-voorpagina/` work the same way but at fixed positions — see that folder's `LEES-MIJ.txt`.

## Editing page text

No code — just edit `config.js`, a single JavaScript object with every editable string on the site (prices, contact info, homepage copy, form field labels), grouped by page/section. Change only the text between the quotes; leave everything else as-is. Type `<br>` inside a text to force a line break.

Like photos, this needs **no PHP rebuild** — `config.js` is loaded directly by the browser on every page load, so editing and pushing it is the entire workflow. If the file has a typo (broken JavaScript) or a value is missing, the affected spot on the page shows a clear red error instead of failing silently or breaking the whole page.

## Running locally

Just open `index.html` in a browser, or serve the folder:

```
npx serve .
```

## Deploying

This is a static site — deploy the folder as-is to GitHub Pages, Netlify, Vercel, etc.

## Editing pages

The `.html` files are generated from templates in `backend/` (PHP, used only to build — nothing server-side runs in production). Edit the shared markup in `backend/partials/layout.php` or a page in `backend/pages/`, then rebuild:

```
make build
```

This overwrites the `.html` files at the repo root. Commit both the `backend/` changes and the regenerated `.html` files.
