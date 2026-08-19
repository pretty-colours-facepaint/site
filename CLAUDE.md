# pretty-colours-facepaint

## Build system

The `.html` pages (e.g. `pages/prijzen.html`, `index.html`) are **generated output**, not source. The real source lives in `backend/pages/*.php`.

- `make build` (`php backend/build.php`) renders the PHP pages into static `.html` files: `index.php` → `index.html` at the repo root, everything else → `pages/*.html`. This split keeps the root free for `index.html` plus the client-facing folders (`assets/`, `MAKE_CHANGES_HERE/`).
- `make watch` runs this automatically via `fswatch` whenever anything under `backend/` changes.
- If `make watch` is running (check with `ps aux | grep fswatch`), any direct edit to a generated `.html` file gets silently overwritten the next time a `backend/` file changes.

**Always edit the PHP source in `backend/pages/`, never the generated `.html` files directly.** If a generated `.html` file needs a one-off fix and there's no matching PHP source, edit it directly but be aware it may already be out of sync with its `.php` counterpart.

## Root-absolute paths — must be served over HTTP, never `file://`

Every asset reference in the templates (`/script.js`, `/assets/...`, `/MAKE_CHANGES_HERE/...`) is root-absolute so that pages under `pages/` and at the root both resolve correctly. This means:

- **Local preview must go through a webserver** (e.g. `php -S localhost:8917`), not by double-clicking an `.html` file — `file://` treats a leading `/` as the filesystem root, not the site root, so scripts/config/images all 404.
- This works unmodified on the live site because of the `CNAME` file (`prettycolours-facepaint.nl`): GitHub Pages serves the site at the **domain root**, matching what the root-absolute paths expect. If Pages ever served this from `https://<org>.github.io/<repo>/` instead (no custom domain), all these paths would break.

## MAKE_CHANGES_HERE/ — client-editable content, no rebuild needed

`MAKE_CHANGES_HERE/` holds the content the client edits directly without touching code or running a build:

- `MAKE_CHANGES_HERE/config.js` — page text/copy, read at runtime by `script.js` via `SITE_CONFIG`. See `content_config()` in `backend/partials/layout.php`.
- `MAKE_CHANGES_HERE/foto-voorpagina/` — the 3 homepage photos (fixed filenames, see its `LEES-MIJ.txt`).
- `MAKE_CHANGES_HERE/mijn-werk/{schminken,glittertattoos,feesten-events}/` — numbered gallery photos (`foto1.jpg`, `foto2.jpg`, ...), read directly by `script.js`'s numbered-gallery logic, no config needed.

`assets/` still holds the non-client-editable static assets (logo, icons, splash images) referenced with root-absolute paths.
