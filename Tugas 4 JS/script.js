const tombolKeAtas = document.getElementById('tombolKeAtas');

function toggleTombolKeAtas() {
  if (window.scrollY > 500) {
    tombolKeAtas.classList.add('show');
  } else {
    tombolKeAtas.classList.remove('show');
  }
}

window.addEventListener('scroll', toggleTombolKeAtas);

tombolKeAtas.addEventListener('click', function() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});