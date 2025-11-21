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
  const juegosCarrito = document.getElementById("juegosCarrito");


  const abrirModal = () => {
    if (!modal) return;
    modal.classList.add("active");
    if (overlay) overlay.classList.add("active");
  };

  const cerrarModal = () => {
    if (!modal) return;
    modal.classList.add("closing");
    if (overlay) overlay.classList.remove("active");

    const handler = function (e) {
      if (e.propertyName === "right" && modal.classList.contains("closing")) {
        modal.classList.remove("active", "closing");
        modal.removeEventListener("transitionend", handler);
      }
    };
    modal.addEventListener("transitionend", handler);
  };

  if (abrirBtn) abrirBtn.addEventListener("click", abrirModal);
  cerrarBtns.forEach(btn => btn.addEventListener("click", cerrarModal));
  if (overlay) overlay.addEventListener("click", cerrarModal);


  if (juegosCarrito) {
    juegosCarrito.addEventListener("click", (e) => {

      const btnMas = e.target.closest(".mas");
      if (btnMas) {
        const cantidadSpan = btnMas.closest(".cantidad-control")?.querySelector(".cantidad");
        if (cantidadSpan) {
          cantidadSpan.textContent = String(parseInt(cantidadSpan.textContent, 10) + 1);
        }
        return;
      }


      const btnMenos = e.target.closest(".menos");
      if (btnMenos) {
        const cantidadSpan = btnMenos.closest(".cantidad-control")?.querySelector(".cantidad");
        if (cantidadSpan) {
          let val = parseInt(cantidadSpan.textContent, 10);
          if (isNaN(val)) val = 1;
          if (val > 1) cantidadSpan.textContent = String(val - 1);
        }
        return;
      }


      const trash = e.target.closest(".bi-trash3, .trash");
      if (trash) {
        const juego = trash.closest(".juegoCarrito");
        if (!juego) return;


        juego.style.transition = "opacity .18s, height .18s, margin .18s, padding .18s";
        juego.style.opacity = "0";
        juego.style.height = "0";
        juego.style.margin = "0";
        juego.style.padding = "0";

        setTimeout(() => {
          juego.remove();
          checkEmpty();
        }, 200);

        return;
      }
    });


    checkEmpty();
  }


  function checkEmpty() {
    if (!juegosCarrito) return;
    const cantidadItems = juegosCarrito.querySelectorAll(".juegoCarrito").length;
    const existingMsg = document.getElementById("carritoVacio");

    if (cantidadItems === 0) {
      if (!existingMsg) {
        const p = document.createElement("p");
        p.id = "carritoVacio";
        p.textContent = "Todavía no hay nada en el carrito";
        p.style.padding = "20px";
        p.style.textAlign = "center";
        juegosCarrito.appendChild(p);
      }
    } else {
      if (existingMsg) existingMsg.remove();
    }
  }
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
window.addEventListener("beforeunload", () => {
  sessionStorage.setItem("scrollPos", window.scrollY);
});

window.addEventListener("load", () => {
  const scrollPos = sessionStorage.getItem("scrollPos");
  if (scrollPos) {
    window.scrollTo(0, scrollPos);
  }
});

const acordeones = document.querySelectorAll('.Acordeon-Contenido-Historia');

acordeones.forEach((acordeon) => {
  const cabecera = acordeon.querySelector('.Cabecera-acordeon');
  const flecha = acordeon.querySelector('#Flecha-Abajo-Acordeon-Historia');

  cabecera.addEventListener('click', () => {
    const activo = acordeon.classList.contains('activo');

    acordeones.forEach((a) => {
      a.classList.remove('activo');
      const f = a.querySelector('#Flecha-Abajo-Acordeon-Historia');
      f.classList.remove('rotada');
    });

    if (!activo) {
      acordeon.classList.add('activo');
      flecha.classList.add('rotada');
    }
  });
});

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

  // 👇 Único bloque load
  window.addEventListener('load', () => {
    const h = location.hash;
    if (h) {
      const el = document.querySelector(h);
      if (el) {
        const found = Array.from(slides).indexOf(el);
        if (found >= 0) {
          index = found;
          update();
        }
      }
    }

    // Nuevo bloque: bajar al final si hay parámetro "page"
    const params = new URLSearchParams(window.location.search);
    if (params.has("page")) {
      setTimeout(() => {
        window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
      }, 1); // 👈 aquí va tu línea
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

(function fm_initPaymentPage() {
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

  fmCardNumber.addEventListener('input', function () { fm_formatCardNumber(this); });
  fmCardExp.addEventListener('input', function () { fm_formatCardExpiry(this); });
  fmCardCvc.addEventListener('input', function () { this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4); });

  fmCardForm.addEventListener('submit', function (e) {
    e.preventDefault();
    fm_handleCardSubmit({
      number: fmCardNumber.value,
      name: fmCardName.value,
      exp: fmCardExp.value,
      cvc: fmCardCvc.value
    });
  });

  [fmPaypalBtn, fmGooglePayBtn, fmApplePayBtn].forEach(el => {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      const target = el.getAttribute('data-target') || '#';
      fm_redirectToExternalMethod(target);
    });
  });

  fmFinalizeBtn.addEventListener('click', function () {
    window.location.href = 'confirmacion.html';
  });

  function fm_formatCardNumber(input) {
    let v = input.value.replace(/\D/g, '').slice(0, 16);
    v = v.match(/.{1,4}/g)?.join(' ') || v;
    input.value = v;
  }

  function fm_formatCardExpiry(input) {
    let v = input.value.replace(/\D/g, '').slice(0, 4);
    if (v.length >= 3) v = v.slice(0, 2) + '/' + v.slice(2);
    input.value = v;
  }

  function fm_showNotice(msg) { alert(msg); }

  function fm_validateCardForm(data) {
    const numClean = data.number.replace(/\s/g, '');
    if (numClean.length < 13) return 'Número de tarjeta inválido';
    if (!/^[0-9]{2}\/[0-9]{2}$/.test(data.exp)) return 'Vencimiento inválido (MM/AA)';
    if (!/^[0-9]{3,4}$/.test(data.cvc)) return 'CVC inválido';
    if (data.name.trim().length < 2) return 'Nombre en la tarjeta inválido';
    return null;
  }

  function fm_handleCardSubmit(data) {
    fmSubmitCardBtn.disabled = true;
    fmSubmitCardBtn.textContent = 'Procesando...';
    const error = fm_validateCardForm(data);
    if (error) {
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

  function fm_redirectToExternalMethod(targetUrl) {
    window.location.href = targetUrl;
  }
})();

//Página perfil (profile.php)
function mostrarTarjeta(miembroID) {
  let secciones = document.querySelectorAll('.seccion');
  secciones.forEach(s => s.classList.remove('activa'));

  let tarjeta = document.getElementById(miembroID);
  if (tarjeta) tarjeta.classList.add('activa');

  let botones = document.querySelectorAll('#navPerfil button');
  botones.forEach(btn => {
    if (btn.dataset.section === miembroID) {
      btn.classList.add('activa');
    } else {
      btn.classList.remove('activa');
    }
  });
}

document.querySelectorAll('#navPerfil button').forEach(btn => {
  btn.addEventListener('click', () => {
    mostrarTarjeta(btn.dataset.section);
  });
});




//editions

document.addEventListener('DOMContentLoaded', () => {

  console.log("[editions] modo tarjetas estáticas");

  const editions = {
    standard: {
      name:'Edición Estándar',
      tag:'Incluye el juego base',
      price:1199,
      features:['Juego base','Actualizaciones gratuitas','Soporte multijugador']
    },
    deluxe: {
      name:'Edición Deluxe',
      tag:'Contenido digital adicional',
      price:1799,
      features:['Juego base','Pase de temporada (1 DLC)','Traje exclusivo','Banda sonora digital']
    },
    ultimate: {
      name:'Edición Ultimate',
      tag:'Todo el contenido + extras físicos (ed. limitada)',
      price:2599,
      features:['Juego base','Pase de temporada completo','Contenido cosmético completo','Artbook digital','Pack de inicio en línea']
    },
    collector: {
      name:'Edición Coleccionista',
      tag:'Caja coleccionista + extras físicos',
      price:4999,
      features:['Caja metálica','Figura 20cm','Artbook físico','Banda sonora física','Todos los contenidos digitales']
    }
  };

  function formatPrice(n){
    return n.toLocaleString('es-AR',{style:'currency',currency:'ARS'}).replace(',00','');
  }

  
  function selectEdition(id){
    const data = editions[id];
    if (!data) return;

    
    document.querySelectorAll('.sf-card').forEach(btn => {
      btn.classList.toggle('sf-card--active', btn.dataset.id === id);
    });

    
    document.getElementById('edition-name').textContent = data.name;
    document.getElementById('edition-tag').textContent = data.tag;
    document.getElementById('edition-price').textContent = formatPrice(data.price);

    const list = document.getElementById('features-list');
    list.innerHTML = '';
    data.features.forEach(f => {
      const li = document.createElement('li');
      li.textContent = f;
      list.appendChild(li);
    });
  }

  
  document.querySelectorAll('.sf-card').forEach(btn => {
    btn.addEventListener('click', () => {
      selectEdition(btn.dataset.id);
    });
  });

  selectEdition('standard');
});

