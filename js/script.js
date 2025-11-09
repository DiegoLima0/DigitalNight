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


const abrirModal2 = document.querySelector("#abrirModal2");
const cerrarModal2 = document.querySelector("#cerrarModal2");
const modal2 = document.querySelector("#modal2");

if (abrirModal2 && modal2) {
  abrirModal2.addEventListener("click", (e) => {
    modal2.showModal();
  });
}

if (cerrarModal2 && modal2) {
  cerrarModal2.addEventListener("click", () => {
    modal2.close();
  });
}

//Carrito
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("modalCarrito");
  const overlay = document.getElementById("overlay");
  const abrirBtn = document.getElementById("abrirModalCarrito");
  const cerrarBtns = document.querySelectorAll(".cerrarModalCarrito");

  const abrirModal = () => {
    modal.classList.add("active");
    overlay.classList.add("active");
  };

  const cerrarModal = () => {
    modal.classList.add("closing");
    overlay.classList.remove("active");

    modal.addEventListener("transitionend", function handler(e) {
      if (e.propertyName === "right" && modal.classList.contains("closing")) {
        modal.classList.remove("active", "closing");
        modal.removeEventListener("transitionend", handler);
      }
    });
  };

  abrirBtn.addEventListener("click", abrirModal);
  cerrarBtns.forEach(btn => btn.addEventListener("click", cerrarModal));
  overlay.addEventListener("click", cerrarModal);
});

//Boton de cantidad para el juego dentro del carrito
const botones = document.querySelectorAll('.cantidad-control');

botones.forEach(control => {
  const btnMas = control.querySelector('.mas');
  const btnMenos = control.querySelector('.menos');
  const cantidad = control.querySelector('.cantidad');

  btnMas.addEventListener('click', () => {
    cantidad.textContent = parseInt(cantidad.textContent) + 1;
  });

  btnMenos.addEventListener('click', () => {
    let valor = parseInt(cantidad.textContent);
    if (valor > 1) {
      cantidad.textContent = valor - 1;
    }
  });
});

//Página Soporte support.php
let faqs = document.querySelectorAll(".faq");

if (faqs.length > 0) {
  faqs[0].classList.add("active");

  faqs.forEach((faq, index) => {
    const pregunta = faq.querySelector(".ques");
    if (!pregunta) return;

    pregunta.addEventListener("click", () => {
      if (faq.classList.contains("active")) {
        faq.classList.remove("active");

        const otherIndex = index === 0 ? 1 : 0;
        faqs[otherIndex]?.classList.add("active");
      }

      else {
        faqs.forEach(f => f.classList.remove("active"));
        faq.classList.add("active");
      }
    });
  });
}


//Página de respuesta de la página de soporte (answerFAQ)

function marcar(boton) {
  const botones = boton.parentElement.querySelectorAll('button');

  botones.forEach(b => b.classList.remove('clicked'));

  boton.classList.add('clicked');
}

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

//pay-page
  
    (function fm_initPaymentPage(){
      const fmCardForm = document.getElementById('fm_cardform');
      const fmCardNumber = document.getElementById('fm_card_number');
      const fmCardExp = document.getElementById('fm_card_exp');
      const fmCardCvc = document.getElementById('fm_card_cvc');
      const fmCardName = document.getElementById('fm_card_name');
      const fmSubmitCardBtn = document.getElementById('fm_submit_card_btn');
      const fmPaypalBtn = document.getElementById('fm_paypal_btn');
      const fmGooglePayBtn = document.getElementById('fm_googlepay_btn');
      const fmApplePayBtn = document.getElementById('fm_applepay_btn');
      const fmFinalizeBtn = document.getElementById('fm_finalize_btn');

      fmCardNumber.addEventListener('input', function(){ fm_formatCardNumber(this); });
      fmCardExp.addEventListener('input', function(){ fm_formatCardExpiry(this); });
      fmCardCvc.addEventListener('input', function(){ this.value = this.value.replace(/[^0-9]/g,'').slice(0,4); });

      fmCardForm.addEventListener('submit', function(e){
        e.preventDefault();
        fm_handleCardSubmit({
          number: fmCardNumber.value,
          name: fmCardName.value,
          exp: fmCardExp.value,
          cvc: fmCardCvc.value
        });
      });

      [fmPaypalBtn, fmGooglePayBtn, fmApplePayBtn].forEach(el => {
        el.addEventListener('click', function(e){
          e.preventDefault();
          const target = el.getAttribute('data-target') || '#';
          fm_redirectToExternalMethod(target);
        });
      });

      fmFinalizeBtn.addEventListener('click', function(){
        window.location.href = 'confirmacion.html';
      });

      function fm_formatCardNumber(input){
        let v = input.value.replace(/\D/g,'').slice(0,16);
        v = v.match(/.{1,4}/g)?.join(' ') || v;
        input.value = v;
      }

      function fm_formatCardExpiry(input){
        let v = input.value.replace(/\D/g,'').slice(0,4);
        if (v.length >= 3) v = v.slice(0,2) + '/' + v.slice(2);
        input.value = v;
      }

      function fm_showNotice(msg){ alert(msg); }

      function fm_validateCardForm(data){
        const numClean = data.number.replace(/\s/g,'');
        if (numClean.length < 13) return 'Número de tarjeta inválido';
        if (!/^[0-9]{2}\/[0-9]{2}$/.test(data.exp)) return 'Vencimiento inválido (MM/AA)';
        if (!/^[0-9]{3,4}$/.test(data.cvc)) return 'CVC inválido';
        if (data.name.trim().length < 2) return 'Nombre en la tarjeta inválido';
        return null;
      }

      function fm_handleCardSubmit(data){
        fmSubmitCardBtn.disabled = true;
        fmSubmitCardBtn.textContent = 'Procesando...';
        const error = fm_validateCardForm(data);
        if (error){
          fm_showNotice(error);
          fmSubmitCardBtn.disabled = false;
          fmSubmitCardBtn.textContent = 'Pagar con tarjeta';
          return;
        }
        setTimeout(() => {
          fm_showNotice('Pago aprobado (simulado). Redirigiendo a confirmación.');
          window.location.href = 'confirmacion.html';
        }, 1200);
      }

      function fm_redirectToExternalMethod(targetUrl){
        window.location.href = targetUrl;
      }
    })();
  