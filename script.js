const form = document.getElementById('contact-form');
const status = document.getElementById('form-status');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  status.textContent = 'Sending...';
  status.className = 'text-sm text-center text-gray-500';

  try {
    const res = await fetch(form.action, {
      method: 'POST',
      headers: { Accept: 'application/json' },
      body: new FormData(form),
    });
    const data = await res.json();

    if (data.success) {
      status.textContent = "Thanks! We'll be in touch soon.";
      status.className = 'text-sm text-center text-green-600';
      form.reset();
    } else {
      status.textContent = data.message || 'Something went wrong, please try again.';
      status.className = 'text-sm text-center text-red-600';
    }
  } catch (err) {
    status.textContent = 'Something went wrong, please try again.';
    status.className = 'text-sm text-center text-red-600';
  }
});
