# pretty-colours-facepaint

## Build system

The `.html` pages at the repo root (e.g. `prijzen.html`, `index.html`) are **generated output**, not source. The real source lives in `backend/pages/*.php`.

- `make build` (`php backend/build.php`) renders the PHP pages into static `.html` files.
- `make watch` runs this automatically via `fswatch` whenever anything under `backend/` changes.
- If `make watch` is running (check with `ps aux | grep fswatch`), any direct edit to a root `.html` file gets silently overwritten the next time a `backend/` file changes.

**Always edit the PHP source in `backend/pages/`, never the generated root `.html` files directly.** If a root `.html` file needs a one-off fix and there's no matching PHP source, edit it directly but be aware it may already be out of sync with its `.php` counterpart.
