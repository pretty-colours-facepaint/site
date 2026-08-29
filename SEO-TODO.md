# SEO to-do (Seobility audit — homepage)

Sorted by priority. The root cause of most "Errors" is that the page text and
headings live in empty `data-config` elements filled by `script.js` at runtime —
crawlers see an almost empty page (Seobility counted 3 words, no H1).

## P1 — Errors (do first)

- [x] **Server-render the page copy at build time.**
      `build.php` now loads `site-text-content.js` + `error-content.js` (via
      node) and `content_config()` / `content_config_image()` bake the real
      text and image `src` into the static HTML. `script.js` still re-applies
      everything at runtime, so client edits need no rebuild — but a rebuild is
      needed for crawlers to see copy changes (`make watch` now also watches
      those two files). Rendered word count went from ~3 to ~440.
      Fixed: "only 3 words", "no paragraphs", "headings have no content".
- [x] **Add one `<h1>` per page.** Every page except the homepage already had
      one; added a real `<h1>` (`homepage.introKop`, editable in
      site-text-content.js) + intro line to the homepage.
- [x] **Fix heading hierarchy.** Homepage service headings bumped `<h3>` →
      `<h2>` so it's `<h1>` → `<h2>` with no skipped level. Error-overlay
      `<h2>` is no longer empty (SSR'd from error-content.js).
- [ ] **Fix the HTTPS redirect (hosting config, not code).**
      Seobility: "redirect to HTTPS is not configured correctly". Check the host
      (GitHub Pages / DNS / CNAME) forces `http://` → `https://` and
      `www` → non-`www` (or vice versa) with a single 301.

## P2 — Warnings

- [x] **Shorten the homepage `<title>`** to < 580px. Now:
      "Schminken & glittertattoo's in Hoofddorp | Pretty Colours" (~510px).
- [x] **Shorten the homepage meta description** to ~150 chars (was ~210).
      Also trimmed the `aanvraag` and `prijzen` descriptions.
- [ ] **Make the title reflect the page content** (depends on the SSR fix — once
      the body has real text about schminken/glittertattoo's/feestjes the title
      will already match much better).
- [ ] **Add meaningful `alt` text to images.**
      - `assets/icon-schminken.png` / `icon-glittertattoo.png` / `icon-feest.png`:
        currently `alt=""`. Either give them real alt ("Schminken", …) or, if
        purely decorative next to a heading, keep `alt=""` **and** confirm the
        adjacent text is crawlable (SSR fix).
      - `data-config-image` photos: replace generic `alt="Portret"` /
        `alt="Voorbeeld schminken"` with descriptive Dutch alt text.
      - `assets/splash-left.jpg` / `splash-right.jpg`: decorative, keep
        `alt="" aria-hidden="true"` (already correct).
- [ ] **Add more internal links with real anchor text.**
      Homepage has 9 internal links, 4 with no anchor text (icon-only / image
      links). Add descriptive text links between homepage ↔ prijzen ↔ portfolio
      sections, and give the image/icon links `aria-label` or visible text.

## P2 — Performance (second SEO checker, mostly HIGH)

- [x] **Self-host Tailwind** (was the main render-blocker: `cdn.tailwindcss.com`
      compiled CSS in the browser on every load). Now a 15 KB static
      `assets/tailwind.css` built by `builder/rebuild.sh` / `make build`.
- [x] **Self-host Pacifico** (was `fonts.googleapis.com` + `fonts.gstatic.com`,
      render-blocking and an AVG/GDPR liability). Now two woff2 subsets in
      `assets/fonts/`, `@font-face` baked into `assets/tailwind.css`,
      `font-display: swap`. The site now makes **zero external requests**.
- [ ] Re-measure LCP on the live site after deploy. `script.js` + the two
      content `.js` files already load at the end of `<body>`.
- [x] **Modern format + properly sized for the `assets/` images** (dev-owned):
      `logo` 138 KB→10 KB (224px webp), `icon-*` 55 KB→6 KB each (112px webp),
      `splash-*` 492 KB→~1 KB (192px webp). All now have explicit `width`/
      `height` (no layout shift). Homepage image weight ~1.3 MB → ~30 KB.
      Originals kept on disk; `logo.jpg` still used by the JSON-LD `logo`/`image`.
- [ ] **Client photos** (`MAAK_HIER_AANPASSINGEN/posters/*`, portfolio galleries)
      left as-is on purpose — the client drops in jpg/png with no tooling.
      Optional later: teach `loadConfigImage()` / the gallery loader to prefer a
      `.webp` sibling if a dev has optimised one, else fall back.
- [x] **Distorted images:** icons regenerated as exact squares to match their
      `object-cover` box; every `<img>` now carries matching `width`/`height`.
- [ ] **Verify the favicon is picked up after deploy.** Second checker still
      reports "lacks a favicon or not referenced properly" — likely it crawled
      before the last deploy. Re-test once `2f06ed0`+ is live; the `<link
      rel="icon">` set and `/favicon.ico` are in place.

## Analytics — SKIPPED (user: "no analytics for now")

## P3 — DNS & security headers (hosting/registrar, not code)

- [ ] **Add an `Strict-Transport-Security` (HSTS) header.**
- [ ] **Add an SPF record** to DNS (and ideally DKIM + DMARC) so the domain
      can't be spoofed in email. Even if no mail is sent from the domain, publish
      a restrictive SPF (`v=spf1 -all`).
- [ ] These plus the HTTPS/`www` redirect (P1) are all done at the host /
      registrar, not in this repo.

## P3 — Tips / nice to have

- [ ] Run a full-site Seobility audit (not just the homepage) and fold the
      per-page findings back into this list.
- [ ] Add social share buttons (or at least the Facebook page link in a visible
      spot). Instagram URL still missing — add to footer + JSON-LD `sameAs`.
- [ ] Add 1–2 relevant external links (e.g. a supplier, a venue partner) — the
      page currently has none.
- [ ] Consider a shorter domain alias (audit flags the domain as "very long") —
      low priority, probably not worth it.

## P4 — Off-site (ongoing, not a code change)

- [ ] **Create & verify a Google Business Profile** (business.google.com) —
      service-area business, region Hoofddorp / Nederland. This is what produces
      the "business card" in Google and lets customers leave reviews.
- [ ] **Build backlinks.** Only 4 referring domains today. Get listed on local
      directories, party/entertainment listings, vendor pages of venues she
      works with, and link from her Facebook/Instagram bio.
