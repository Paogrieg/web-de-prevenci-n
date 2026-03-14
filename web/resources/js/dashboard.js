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
  // Iniciar carousel solo si estamos en inicio
  if (window.location.pathname === '/') {
    setTimeout(initCarousel, 50);
  }
});