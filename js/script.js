// General
// Modal o ventana flotante para support.php o configAccount_view.php 
const abrirModal = document.querySelector("#abrirModal");
const cerrarModal = document.querySelector("#cerrarModal");
const modal = document.querySelector("#modal");

if (abrirModal && modal) {
  abrirModal.addEventListener("click", (e) => {
    modal.showModal();
  });
}

if (cerrarModal && modal) {
  cerrarModal.addEventListener("click", () => {
    modal.close();
  });
}

//Página Soporte support.php
let faqs = document.querySelectorAll(".faq");

faqs.forEach(faq => {
  faq.querySelector(".ques").addEventListener("click", () => {
    if (faq.classList.contains("active")) {
      faq.classList.remove("active");
      return;
    }

    faqs.forEach(f => f.classList.remove("active"));

    faq.classList.add("active");
  });
});

//Página Sobre Nosotros AboutUs.php
function mostrarTarjeta(miembroID) {
  let tarjetas = document.querySelectorAll('.tarjetaMiembro');
  tarjetas.forEach(t => t.classList.remove('activa'));

  let tarjeta = document.getElementById(miembroID);
  if (tarjeta) tarjeta.classList.add('activa');
}

//Página shop.php
(function () {
  const slider = document.querySelector('.slider');
  const slides = document.querySelectorAll('.slider img');
  const navLinks = document.querySelectorAll('.slider-nav a');
  const btnPrev = document.getElementById('prev');
  const btnNext = document.getElementById('next');
  const total = slides.length;
  let index = 0;

  function update() {

    slider.style.transform = `translateX(-${index * 100}%)`;


    navLinks.forEach((a, i) => a.classList.toggle('active', i === index));
  }


  function prev() { index = (index - 1 + total) % total; update(); }
  function next() { index = (index + 1) % total; update(); }

  navLinks.forEach((a, i) => {
    a.addEventListener('click', function (e) {
      e.preventDefault();
      index = i;
      update();


    });
  });


  if (btnPrev) btnPrev.addEventListener('click', prev);
  if (btnNext) btnNext.addEventListener('click', next);


  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') prev();
    if (e.key === 'ArrowRight') next();
  });

  update();


  window.addEventListener('load', () => {
    const h = location.hash;
    if (h) {

      const el = document.querySelector(h);
      if (el) {
        const found = Array.from(slides).indexOf(el);
        if (found >= 0) {
          index = found;
          update();

          setTimeout(() => { window.scrollTo({ top: 0 }); }, 0);
        }
      }
    }
  });
})();


document.querySelectorAll('.slider img').forEach(img => {
  const href = img.dataset.href;
  if (!href) return;
  img.style.cursor = 'pointer';

  img.addEventListener('click', (e) => {

    window.location.href = href;
  });


});
