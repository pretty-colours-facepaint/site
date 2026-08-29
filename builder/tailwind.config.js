// Config for the self-hosted Tailwind build (see `make css`).
// Mirrors the old in-browser `tailwind.config` from layout.php: every shade of
// purple / pink / green is pinned to the brand's exact hex, so e.g.
// bg-pink-500 and bg-pink-600 render identically.
const flat = (hex) =>
  [50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950].reduce(
    (o, k) => ((o[k] = hex), o),
    { DEFAULT: hex },
  );

module.exports = {
  // Scanned from the repo root (that's where rebuild.sh runs it).
  // script.js is included too: it injects the social badges, gallery photos
  // and form-status messages at runtime with class strings that never appear
  // in the static HTML.
  content: ['./index.html', './pages/**/*.html', './script.js'],
  theme: {
    extend: {
      colors: {
        purple: flat('#7642a6'),
        pink: flat('#ec2b8a'),
        green: flat('#84b525'),
      },
    },
  },
};
