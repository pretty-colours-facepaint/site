const form = document.getElementById('contact-form');
const status = document.getElementById('form-status');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  status.textContent = 'Versturen...';
  status.className = 'text-sm text-center text-gray-500';

  try {
    const res = await fetch(form.action, {
      method: 'POST',
      headers: { Accept: 'application/json' },
      body: new FormData(form),
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
