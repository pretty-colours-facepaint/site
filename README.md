# Pretty Colours Facepaint

Simple static Dutch-language site for a face painting events business, styled with [Tailwind CSS](https://tailwindcss.com) (via CDN, no build step) and a contact form powered by [Static Forms](https://staticforms.dev).

- `index.html` — homepage
- `werk-schminken.html`, `werk-glittertattoos.html`, `werk-feesten-events.html` — placeholder photo albums linked from the homepage's "Bekijk mijn werk" section
- `prijzen.html` — placeholder pricing page linked from the "Bekijk de prijzen" button
- `assets/` — logo, service icons, example photos, and portrait

## Setup

The contact form is already wired up with a live Static Forms API key. Just replace placeholder text and photos in the album pages with real content.

## Running locally

Just open `index.html` in a browser, or serve the folder:

```
npx serve .
```

## Deploying

This is a static site — deploy the folder as-is to GitHub Pages, Netlify, Vercel, etc.
