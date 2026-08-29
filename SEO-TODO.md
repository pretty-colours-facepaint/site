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

- [ ] **Eliminate render-blocking resources / cut Largest Contentful Paint to
      < 2.5s.** Check what blocks first paint: the Tailwind CDN script, the
      Google Fonts stylesheet, `script.js`. Options: self-host a built Tailwind
      CSS file instead of the CDN, `preload` + `display=swap` the font (partly
      done), defer non-critical JS, inline critical CSS.
- [ ] **Serve images in a modern format (WebP/AVIF).** Convert `assets/*.jpg`,
      `MAAK_HIER_AANPASSINGEN/posters/*` and portfolio photos to WebP (keep a
      JP/PNG fallback via `<picture>` or let the host negotiate). Biggest single
      speed win.
- [ ] **Serve properly sized images.** `assets/logo.jpg` is 1254×1254 but shown
      at ~112px in the header and ~48px in the footer. Ship a small version
      (e.g. `logo-128.webp`) and/or use `srcset`/`sizes`. Same for poster and
      portfolio thumbnails.
- [ ] **Fix distorted images.** The checker flagged at least one image whose
      displayed aspect ratio ≠ its real ratio. Audit every `<img>`: the
      rendered box (CSS `w-*`/`h-*`/`aspect-*`) must match the file's aspect, or
      use `object-cover`. Re-check the generated favicon PNGs (`icon-512.png`
      etc.) — they were padded to square, confirm they don't look stretched.
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
