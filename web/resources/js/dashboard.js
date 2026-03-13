function navigate(page) {
  // Hide all views
  document.querySelectorAll('.view').forEach(v => v.classList.remove('active'));
  // Show target view
  const target = document.getElementById('view-' + page);
  if (target) target.classList.add('active');

  // Update active nav item
  document.querySelectorAll('.nav-item').forEach(n => {
    n.classList.toggle('active', n.dataset.page === page);
  });

  // Update topbar title
  const route = routes[page];
  if (route) {
    document.querySelector('.topbar-title').textContent = route.title;
  }

  // Init carousel if going to inicio
  if (page === 'inicio') {
    setTimeout(initCarousel, 50);
  }
}

/* ── CAROUSEL ── */
let cur = 0, tot = 4, tmr;

function initCarousel() {
  cur = 0;
  upd();
  clearInterval(tmr);
  tmr = setInterval(() => chg(1), 5000);
}

function chg(d) {
  cur = (cur + d + tot) % tot;
  upd(); rst();
}

function go(i) {
  cur = i;
  upd(); rst();
}

function upd() {
  const slides = document.getElementById('cs');
  if (slides) slides.style.transform = `translateX(-${cur * 100}%)`;
  document.querySelectorAll('.c-dot').forEach((d, i) => d.classList.toggle('active', i === cur));
}

function rst() {
  clearInterval(tmr);
  tmr = setInterval(() => chg(1), 5000);
}

/* ── TOGGLE SWITCH ── */
function toggleSwitch(el) {
  el.classList.toggle('on');
}

/* ── INIT ── */
document.addEventListener('DOMContentLoaded', () => {
  // Wire up nav items
  document.querySelectorAll('.nav-item[data-page]').forEach(item => {
    item.addEventListener('click', () => navigate(item.dataset.page));
  });

  // Start on inicio
  navigate('inicio');
});