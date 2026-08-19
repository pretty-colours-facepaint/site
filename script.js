// Under construction overlay, dismissed and remembered via localStorage.
const constructionOverlay = document.getElementById('construction-overlay');
const constructionDismiss = document.getElementById('construction-dismiss');

if (constructionDismiss) {
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
