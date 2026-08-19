// ============================================================
// SITE_CONFIG — alle teksten staan in config.js, niet hier. Deze code
// zet ze op de pagina: elk [data-config="pad.naar.tekst"] krijgt de
// bijbehorende tekst uit config.js. Ontbreekt config.js of een waarde
// erin, dan verschijnt een duidelijke rode foutmelding op die plek in
// plaats van niets.
// ============================================================
function escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text;
  return div.innerHTML;
}

function configErrorHtml(message) {
  return `<span style="color:#dc2626;font-weight:bold;">${escapeHtml(message)}</span>`;
}

function getConfigValue(path) {
  return path.split('.').reduce((value, key) => {
    return value && typeof value === 'object' ? value[key] : undefined;
  }, typeof SITE_CONFIG === 'undefined' ? undefined : SITE_CONFIG);
}

if (typeof SITE_CONFIG === 'undefined') {
  document.querySelectorAll('[data-config]').forEach((el) => {
    el.innerHTML = configErrorHtml('config.js kon niet geladen worden (typefout?). Zie de browserconsole voor details.');
  });
} else {
  document.querySelectorAll('[data-config]').forEach((el) => {
    const path = el.dataset.config;
    const value = getConfigValue(path);
    if (typeof value !== 'string') {
      el.innerHTML = configErrorHtml(`Ontbrekende tekst in config.js: ${path}`);
      return;
    }
    el.innerHTML = escapeHtml(value).replace(/&lt;br\s*\/?&gt;/gi, '<br>');
  });
}

// ============================================================
// SOCIALE-MEDIA-BADGES — optioneel, uit SITE_CONFIG.socials (een lijst
// van { titel, logo, link, kleur }). Ontbreekt de lijst, is hij leeg, of
// mist een badge titel/logo/link, dan wordt die badge simpelweg niet
// getoond — dit is geen foutmelding-waardige situatie, badges zijn optie.
// kleur is ook optioneel (een hex-code zoals "#E1306C"); zonder geldige
// kleur wordt het rondje standaard grijs.
// ============================================================
const HEX_COLOR = /^#[0-9a-f]{3,8}$/i;

document.querySelectorAll('[data-social-badges]').forEach((container) => {
  const socials = typeof SITE_CONFIG === 'undefined' ? undefined : SITE_CONFIG.socials;
  if (!Array.isArray(socials)) {
    return;
  }

  container.innerHTML = socials
    .filter((social) => social && social.titel && social.logo && social.link)
    .map((social) => {
      const titel = escapeHtml(social.titel);
      const logo = escapeHtml(social.logo);
      const link = escapeHtml(social.link);
      const heeftKleur = typeof social.kleur === 'string' && HEX_COLOR.test(social.kleur);
      const klasse = heeftKleur
        ? 'w-9 h-9 rounded-full text-white flex items-center justify-center text-xs hover:opacity-90 transition'
        : 'w-9 h-9 rounded-full bg-gray-800 text-white flex items-center justify-center text-xs hover:opacity-90 transition';
      const stijl = heeftKleur ? ` style="background-color:${escapeHtml(social.kleur)};"` : '';
      return `<a href="${link}" target="_blank" rel="noopener" aria-label="${titel}" title="${titel}" class="${klasse}"${stijl}>${logo}</a>`;
    })
    .join('');
});

// ============================================================
// GENUMMERDE FOTOGALERIJEN — voor elke [data-numbered-gallery="pad/naar/foto"]
// wordt geprobeerd pad/naar/foto1.jpg t/m foto16.jpg te laden; wat bestaat,
// wordt getoond. Een foto toevoegen is dus alleen het bestand met het
// eerstvolgende nummer in de map zetten — geen configbestand nodig.
// ============================================================
const MAX_GALLERY_PHOTOS = 16;

function photoExists(src) {
  return new Promise((resolve) => {
    const img = new Image();
    img.onload = () => resolve(src);
    img.onerror = () => resolve(null);
    img.src = src;
  });
}

document.querySelectorAll('[data-numbered-gallery]').forEach((gallery) => {
  const prefix = gallery.dataset.numberedGallery;
  const maxPreview = parseInt(gallery.dataset.numberedGalleryMax, 10) || null;
  const checks = [];
  for (let number = 1; number <= MAX_GALLERY_PHOTOS; number += 1) {
    checks.push(photoExists(`${prefix}${number}.jpg`));
  }

  Promise.all(checks).then((results) => {
    let photos = results.filter((src) => src !== null);
    if (maxPreview) {
      photos = photos.slice(0, maxPreview);
    }

    if (photos.length === 0) {
      gallery.innerHTML = '<p class="col-span-full text-center text-gray-400 text-sm">Nog geen foto\'s toegevoegd.</p>';
      return;
    }

    gallery.innerHTML = photos
      .map((src) => `<img src="${escapeHtml(src)}" alt="" class="aspect-square w-full object-cover rounded-lg shadow-sm">`)
      .join('');
  });
});

// Under construction overlay, dismissed and remembered via localStorage.
// Fully switched off via SITE_CONFIG.overlay.actief: false in config.js —
// e.g. once the site goes live, without touching any other code.
const constructionOverlay = document.getElementById('construction-overlay');
const constructionDismiss = document.getElementById('construction-dismiss');
const overlayConfig = typeof SITE_CONFIG === 'undefined' ? undefined : SITE_CONFIG.overlay;

if (constructionOverlay && overlayConfig && overlayConfig.actief === false) {
  constructionOverlay.classList.add('hidden');
  document.documentElement.classList.remove('overflow-hidden');
} else if (constructionDismiss) {
  constructionDismiss.addEventListener('click', () => {
    localStorage.setItem('constructionAcknowledged', 'true');
    constructionOverlay.classList.add('hidden');
    document.documentElement.classList.remove('overflow-hidden');
  });
}

// Shrink the header logo as the page scrolls, down to a minimum size.
const logo = document.getElementById('logo-img');
const logoTagline = document.getElementById('logo-tagline');
// Measured before any inline height/margin is applied, so it reflects the natural size.
const TAGLINE_HEIGHT = logoTagline ? logoTagline.offsetHeight : 0;
const TAGLINE_MARGIN = 4; // px, matches mt-1
const LOGO_MAX = 112; // px, matches h-28
const LOGO_MIN = 48;  // px, matches h-12
const LOGO_SHRINK_DISTANCE = 200; // px of scroll over which the shrink happens

if (logo) {
  function updateLogoSize() {
    const progress = Math.min(window.scrollY / LOGO_SHRINK_DISTANCE, 1);
    const size = LOGO_MAX - progress * (LOGO_MAX - LOGO_MIN);
    logo.style.height = `${size}px`;
    logo.style.width = `${size}px`;

    if (logoTagline) {
      const remaining = 1 - progress;
      logoTagline.style.opacity = String(remaining);
      logoTagline.style.height = `${TAGLINE_HEIGHT * remaining}px`;
      logoTagline.style.marginTop = `${TAGLINE_MARGIN * remaining}px`;
    }
  }

  window.addEventListener('scroll', updateLogoSize, { passive: true });
  updateLogoSize();
}

// Show the header's bottom border only once the page has scrolled past the top.
const siteHeader = document.getElementById('site-header');

if (siteHeader) {
  function updateHeaderBorder() {
    siteHeader.classList.toggle('border-gray-200', window.scrollY > 0);
    siteHeader.classList.toggle('border-transparent', window.scrollY === 0);
  }

  window.addEventListener('scroll', updateHeaderBorder, { passive: true });
  updateHeaderBorder();
}

// Contact form submission.
const form = document.getElementById('contact-form');
const status = document.getElementById('form-status');

if (form) {
  // Static Forms API key, split up so it isn't a single grep-able string in the page source.
  const keyParts = ['c2ZfYmIz', 'OTQ0OWI0', 'YWY5NDY3', 'ZGE3YjQ1', 'ZjQ4'];
  const apiKey = atob(keyParts.join(''));

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    status.textContent = 'Versturen...';
    status.className = 'text-sm text-center text-gray-500';

    try {
      const formData = new FormData(form);
      formData.append('apiKey', apiKey);

      const res = await fetch(form.action, {
        method: 'POST',
        headers: { Accept: 'application/json' },
        body: formData,
      });
      const data = await res.json();

      if (data.success) {
        status.textContent = 'Bedankt! We nemen snel contact met je op.';
        status.className = 'text-sm text-center text-green-600';
        form.reset();
      } else {
        status.textContent = data.message || 'Er ging iets mis, probeer het opnieuw.';
        status.className = 'text-sm text-center text-red-600';
      }
    } catch (err) {
      status.textContent = 'Er ging iets mis, probeer het opnieuw.';
      status.className = 'text-sm text-center text-red-600';
    }
  });
}
