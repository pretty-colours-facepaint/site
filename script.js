const form = document.getElementById('contact-form');
const status = document.getElementById('form-status');

// Under construction overlay, dismissed and remembered via localStorage.
const constructionOverlay = document.getElementById('construction-overlay');
const constructionDismiss = document.getElementById('construction-dismiss');

constructionDismiss.addEventListener('click', () => {
  localStorage.setItem('constructionAcknowledged', 'true');
  constructionOverlay.classList.add('hidden');
  document.documentElement.classList.remove('overflow-hidden');
});

// Shrink the header logo as the page scrolls, down to a minimum size.
const logo = document.getElementById('logo-img');
const LOGO_MAX = 112; // px, matches h-28
const LOGO_MIN = 48;  // px, matches h-12
const LOGO_SHRINK_DISTANCE = 200; // px of scroll over which the shrink happens

function updateLogoSize() {
  const progress = Math.min(window.scrollY / LOGO_SHRINK_DISTANCE, 1);
  const size = LOGO_MAX - progress * (LOGO_MAX - LOGO_MIN);
  logo.style.height = `${size}px`;
  logo.style.width = `${size}px`;
}

window.addEventListener('scroll', updateLogoSize, { passive: true });
updateLogoSize();

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
